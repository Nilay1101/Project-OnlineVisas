<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Parser
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Pdf.php 1041 2017-04-05 14:30:49Z jan.slabon $
 */

/**
 * A PDF parser
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Parser
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Parser_Pdf
{
    /**
     * The reader class
     *
     * @var SetaPDF_Core_Reader_ReaderInterface
     */
    protected $_reader;

    /**
     * The tokenizer
     *
     * @var SetaPDF_Core_Tokenizer
     */
    protected $_tokenizer;

    /**
     * A token stack
     *
     * The parser will add tokens to this stack if a type needs parsing of several tokens prior knowing its type
     *
     * @var array
     */
    protected $_tokenStack = array();

    /**
     * The owner document
     *
     * @var SetaPDF_Core_Document
     */
    protected $_owner = null;

    /**
     * The current object which is parsed
     *
     * @var SetaPDF_Core_Type_IndirectObject
     */
    protected $_currentObject;

    /**
     * If set to true the owning object is passed to parsed child elements
     *
     * This is needed to create a relation between a parsed object and its owning element.
     * The complete chain will be able to get a relation to the owning document.
     * Needed for example for handling en- and decryption of strings or streams.
     *
     * @var boolean
     */
    protected $_passOwningObjectToChilds = false;

    /**
     * The constructor.
     *
     * @param SetaPDF_Core_Reader_ReaderInterface $reader
     */
    public function __construct(SetaPDF_Core_Reader_ReaderInterface $reader)
    {
        $this->_reader = $reader;
        $this->_tokenizer = new SetaPDF_Core_Tokenizer($this->_reader);
    }

    /**
     * Define if the owning object should be passed to it's childs.
     *
     * @param boolean $passOwningObjectToChilds
     * @see $_passOwningObjectToChilds
     */
    public function setPassOwningObjectToChilds($passOwningObjectToChilds = true)
    {
        $this->_passOwningObjectToChilds = (boolean)$passOwningObjectToChilds;
    }

    /**
     * Released memory and resources.
     */
    public function cleanUp()
    {
        $this->_owner = null;
        $this->_tokenizer->cleanUp();
        $this->_tokenizer = null;
        $this->_reader = null;
    }

    /**
     * Set the reader object.
     *
     * @param SetaPDF_Core_Reader_ReaderInterface $reader
     */
    public function setReader(SetaPDF_Core_Reader_ReaderInterface $reader)
    {
        $this->_reader = $reader;

        /* Because reader is passed by reference we have to forward this
         * set-call to the tokenizer as well.
         * This issue is only reproducible by serializing and
         * deserializing a document object (Mantis #585).
         */
        $this->_tokenizer->setReader($reader);

        $this->_tokenStack = array();
    }

    /**
     * Get the reader object.
     *
     * @return SetaPDF_Core_Reader_ReaderInterface
     */
    public function getReader()
    {
        return $this->_reader;
    }

    /**
     * Get the tokenizer object.
     *
     * @return SetaPDF_Core_Tokenizer
     */
    public function getTokenizer()
    {
        return $this->_tokenizer;
    }

    /**
     * Set the owner pdf document.
     *
     * @param SetaPDF_Core_Type_Owner $owner
     */
    public function setOwner(SetaPDF_Core_Type_Owner $owner)
    {
        $this->_owner = $owner;
    }

    /**
     * Get the owner pdf document.
     *
     * @return null|SetaPDF_Core_Document
     */
    public function getOwner()
    {
        return $this->_owner;
    }

    /**
     * Get the PDF version.
     *
     * @TODO Should not be located in this class
     * @return string
     * @throws SetaPDF_Core_Parser_Exception
     */
    public function getPdfVersion()
    {
        $reader = $this->_reader;
        $reader->reset(0);
        while (true) {
            $buffer = $reader->getBuffer(false);
            $offset = strpos($buffer, '%PDF-');
            if (false === $offset) {
                if (!$reader->increaseLength(1000)) {
                    throw new SetaPDF_Core_Parser_CrossReferenceTable_Exception('Unable to find PDF file header.');
                }
                continue;
            }
            break;
        }

        if ($offset + 8 > strlen($buffer)) {
            $reader->increaseLength(1000);
            $buffer = $reader->getBuffer(false);
        }

        $results = array();

        if (0 == preg_match('/%PDF-(\d\.\d)/', $buffer, $results)) {
            throw new SetaPDF_Core_Parser_Exception('Cannot extract PDF version.');
        }

        return $results[1];
    }

    /**
     * Get the next token.
     *
     * @return string
     */
    protected function _getNextToken()
    {
        if (empty($this->_tokenStack)) {
            $token = $this->_tokenizer->readToken();
        } else {
            $token = array_pop($this->_tokenStack);
        }

        /**
         * We jump over a comment.
         * That type is not a real PDF object and will simple ignored.
         */
        if ('%' == $token) {
            $this->_reader->readLine();
            return $this->_getNextToken();
        }

        return $token;
    }

    /**
     * Reset the reader to a specific position.
     *
     * @param integer $pos
     */
    public function reset($pos = 0)
    {
        $this->_reader->reset($pos);
        $this->_tokenStack = array();
    }

    /**
     * Skips tokens until a special token is found.
     *
     * This method can be used to e.g. jump over binary inline image data.
     *
     * @param string $token
     * @return bool
     */
    public function skipUntilToken($token)
    {
        $nextToken = $this->_getNextToken();
        while ($nextToken !== false && $nextToken !== $token) {
            $nextToken = $this->_getNextToken();
        }

        if ($nextToken)
            return true;

        return false;
    }

    /**
     * Read a value based on a token.
     *
     * @param string|null $token
     * @return SetaPDF_Core_Type_AbstractType|false
     * @throws SetaPDF_Core_Parser_Pdf_InvalidTokenException
     * @throws SetaPDF_Core_Exception
     * @throws UnexpectedValueException
     */
    public function readValue($token = null)
    {
        if (null === $token) {
            if (false === ($token = $this->_getNextToken())) {
                return false;
            }
        }

        switch ($token) {
            case '(':
                $pos = $startPos = $this->_reader->getOffset();

                $openBrackets = 1;
                do {
                    $buffer = $this->_reader->getBuffer(false);
                    for ($length = strlen($buffer); $openBrackets != 0 && $pos < $length; $pos++) {
                        switch ($buffer[$pos]) {
                            case '(':
                                $openBrackets++;
                                break;
                            case ')':
                                $openBrackets--;
                                break;
                            case '\\':
                                $pos++;
                        }
                    }
                } while ($openBrackets != 0 && $this->_reader->increaseLength());

                $result = substr($buffer, $startPos, $pos - $startPos - 1);
                $this->_reader->setOffset($pos);

                return new SetaPDF_Core_Type_String(
                    $result,
                    true,
                    $this->_passOwningObjectToChilds ? $this->_currentObject : null
                );

            case '<';
                $bufferOffset = $this->_reader->getOffset();

                while (true) {
                    $buffer = $this->_reader->getBuffer(false);
                    $pos = strpos($buffer, '>', $bufferOffset);
                    if (false === $pos) {
                        if (!$this->_reader->increaseLength()) {
                            return false;
                        }
                        continue;
                    }

                    $result = substr($buffer, $bufferOffset, $pos - $bufferOffset);
                    $this->_reader->setOffset($pos + 1);

                    return new SetaPDF_Core_Type_HexString(
                        $result,
                        false,
                        $this->_passOwningObjectToChilds ? $this->_currentObject : null
                    );
                }
                break;

            case '<<';
                $entries = array();

                while (($token = $this->_getNextToken()) !== '>>') {
                    if (($key = $this->readValue($token)) === false) {
                        return false;
                    }

                    // Ensure the first value to be a Name object
                    if (!($key instanceof SetaPDF_Core_Type_Name)) {
                        $this->skipUntilToken('>>');
                        break;
                    }

                    if (($value = $this->readValue()) === false) {
                        return false;
                    }

                    // Catch missing value
                    if ($value instanceof SetaPDF_Core_Type_Token && $value->getValue() == '>>') {
                        $entries[] = new SetaPDF_Core_Type_Dictionary_Entry($key, new SetaPDF_Core_Type_Null());
                        break;
                    }

                    $entries[] = new SetaPDF_Core_Type_Dictionary_Entry($key, $value);
                }

                return new SetaPDF_Core_Type_Dictionary($entries);

            case '[';
                $result = array();

                // Recurse into this function until we reach the end of the array.
                while (($token = $this->_getNextToken()) !== ']') {
                    if ($token === false || ($value = $this->readValue($token)) === false) {
                        return false;
                    }

                    $result[] = $value;
                }

                return new SetaPDF_Core_Type_Array($result);

            case '/':
                /* It is possible to contact the tokenizer directly, because
                 * the stack will only hold integers until the last element
                 */
                if ($this->_tokenizer->isCurrentByteRegularCharacter()) {
                    return new SetaPDF_Core_Type_Name($this->_getNextToken(), true);
                } else {
                    return new SetaPDF_Core_Type_Name('', true);
                }

            default:

                if (strlen($token) !== strspn($token, '+-.0123456789')) {
                    switch ($token) {
                        case 'true':
                        case 'false':
                            return new SetaPDF_Core_Type_Boolean('true' === $token);

                        case 'null':
                            return new SetaPDF_Core_Type_Null();

                        default:
                            return new SetaPDF_Core_Type_Token($token);

                    }

                } else {

                    if (($token2 = $this->_getNextToken()) !== false) {
                        if (strlen($token2) === strspn($token2, '+-.0123456789')) {
                            if (($token3 = $this->_getNextToken()) !== false) {
                                switch ($token3) {
                                    case 'R':
                                        return new SetaPDF_Core_Type_IndirectReference($token, $token2, $this->getOwner());

                                    case 'obj':
                                        $obj = new SetaPDF_Core_Type_IndirectObject(null, $this->getOwner(), $token, $token2);
                                        $this->_currentObject = $obj;
                                        /**
                                         * @var $value SetaPDF_Core_Type_Dictionary
                                         */
                                        $value = $this->readValue();

                                        $this->_tokenizer->leapWhiteSpaces();
                                        // Reset the buffer to offset = 0 and automatically
                                        // increase the buffer length.
                                        $this->_reader->reset(
                                            $this->_reader->getPos() + $this->_reader->getOffset()
                                        );

                                        if (strpos($this->_reader->getBuffer(), 'stream') === 0) {
                                            $this->_currentObject = null;
                                            $offset = 6; // stream

                                            // Find the first "newline"
                                            while (($firstByte = $this->_reader->getByte($offset)) !== false) {
                                                if ($firstByte != chr(10) && $firstByte != chr(13)) {
                                                    $offset++;
                                                } else {
                                                    break;
                                                }
                                            }

                                            if (false === $firstByte) {
                                                throw new SetaPDF_Core_Exception(
                                                    'Unable to parse stream data. No newline followed the stream keyword.'
                                                );
                                            }

                                            $sndByte = $this->_reader->getByte($offset + 1);
                                            if ($firstByte == chr(10) || $firstByte == chr(13))
                                                $offset++;
                                            if ($sndByte == chr(10) && $firstByte != chr(10))
                                                $offset++;

                                            $this->_reader->setOffset($offset);
                                            $pos = $this->_reader->getPos();
                                            $pos = $pos + $offset;

                                            try {
                                                $length = $value->offsetGet('Length');
                                                if (null === $length) {
                                                    throw new UnexpectedValueException();
                                                }

                                                try {
                                                    $length = $length->ensure()->getValue();
                                                } catch (SetaPDF_Core_Type_IndirectReference_Exception $e) {
                                                    throw new UnexpectedValueException();
                                                }

                                                /* 0 bytes lengths is very uncommon, so ensure that the stream has
                                                 * really a length of zero bytes by searching for the endstream key-
                                                 * word.
                                                 */
                                                if ($length == 0) {
                                                    throw new UnexpectedValueException();
                                                }

                                                $this->_reader->reset($pos, $length);
                                                $buffer = $this->_reader->getBuffer();

                                            } catch (UnexpectedValueException $e) {
                                                $this->_reader->reset($pos);
                                                // TODO: Change to read line by line and match
                                                //       only the first 8 characters of that line
                                                //       The current version will also stop if the
                                                //       endstream token will be found within the stream
                                                while (true) {
                                                    $buffer = $this->_reader->getBuffer(false);
                                                    $length = strpos($buffer, 'endstream');
                                                    if (false === $length) {
                                                        if (!$this->_reader->increaseLength(100000)) {
                                                            return false;
                                                        }
                                                        continue;
                                                    }
                                                    break;
                                                }

                                                $buffer = substr($buffer, 0, $length);
                                                $lastByte = substr($buffer, -1);

                                                // Check for EOL
                                                if ($lastByte == chr(10))
                                                    $buffer = substr($buffer, 0, -1);

                                                $lastByte = substr($buffer, -1);
                                                if ($lastByte == chr(13))
                                                    $buffer = substr($buffer, 0, -1);

                                                $length = strlen($buffer);
                                            }

                                            $streamType = null;
                                            if ($_streamType = $value->getValue('Type')) {
                                                $streamType = $_streamType->getValue();
                                            }

                                            switch ($streamType) {
                                                case 'ObjStm':
                                                    $streamClass = 'SetaPDF_Core_Type_ObjectStream';
                                                    break;
                                                default:
                                                    $streamClass = 'SetaPDF_Core_Type_Stream';
                                            }

                                            $stream = new $streamClass(
                                                $value,
                                                $buffer,
                                                $this->_passOwningObjectToChilds ? $obj : null
                                            );

                                            $obj->setValue($stream);
                                            $buffer = null;

                                            $this->_reader->reset($pos + $length);

                                            // jump over the last "endstream" token
                                            $nextToken = $this->_getNextToken();
                                            if ('endstream' != $nextToken)
                                                $this->_tokenStack[] = $nextToken;
                                            // jump over the last "endobj" token
                                            $nextToken = $this->_getNextToken();
                                            if ('endobj' != $nextToken)
                                                $this->_tokenStack[] = $nextToken;

                                            return $obj;

                                        } else {
                                            $this->_currentObject = null;
                                            $nextToken = $this->_getNextToken();
                                            if ('endobj' != $nextToken)
                                                $this->_tokenStack[] = $nextToken;

                                            $obj->setValue($value);

                                            return $obj;
                                        }

                                }
                                $this->_tokenStack[] = $token3;
                            }
                        }
                        $this->_tokenStack[] = $token2;
                    }

                    return new SetaPDF_Core_Type_Numeric($token);
                }
        }
    }
}