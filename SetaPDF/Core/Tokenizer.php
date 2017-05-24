<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Tokenizer.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Tokenizer class for PDF documents
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Tokenizer
{
    /**
     * The reader object
     *
     * @var SetaPDF_Core_Reader_ReaderInterface
     */
    protected $_reader;

    /**
     * The constructor.
     *
     * @param SetaPDF_Core_Reader_ReaderInterface $reader
     */
    public function __construct(SetaPDF_Core_Reader_ReaderInterface &$reader)
    {
        $this->setReader($reader);
    }

    /**
     * Clean up resources and release cycled references.
     */
    public function cleanUp()
    {
        $this->_reader->cleanUp();
        $this->_reader = null;
    }

    /**
     * Set the reader class.
     *
     * @param SetaPDF_Core_Reader_ReaderInterface $reader
     */
    public function setReader(SetaPDF_Core_Reader_ReaderInterface &$reader)
    {
        $this->_reader = & $reader;
    }

    /**
     * Get the reader class.
     *
     * @return SetaPDF_Core_Reader_ReaderInterface
     */
    public function getReader()
    {
        return $this->_reader;
    }

    /**
     * Read a token from the reader.
     *
     * @return string
     */
    public function readToken()
    {
        if (($byte = $this->_reader->readByte()) === false) {
            return false;
        }

        if (
            $byte === "\x20" ||
            $byte === "\x0A" ||
            $byte === "\x0D" ||
            $byte === "\x0C" ||
            $byte === "\x09" ||
            $byte === "\x00"
        ) {
            if (false === $this->leapWhiteSpaces()) {
                return false;
            }
            $byte = $this->_reader->readByte();
        }

        switch ($byte) {
            case '/':
            case '[':
            case ']':
            case '(':
            case ')':
            case '%':
            case '{':
            case '}':
                return $byte;
            case '<':
            case '>':
                if ($this->_reader->getByte() === $byte) {
                    $this->_reader->addOffset(1);
                    return $byte . $byte;
                } else {
                    return $byte;
                }
        }

        /* This way is faster than checking single bytes.
         */
        $bufferOffset = $this->_reader->getOffset();
        do {
            $pos = strcspn(
                $lastBuffer = $this->_reader->getBuffer(false),
                "\x00\x09\x0A\x0C\x0D\x20()<>[]{}/%",
                $bufferOffset
            );
        } while (
            // Break the loop if a delimiter or white space char is matched
            // in the current buffer or increase the buffers length
            $lastBuffer !== false &&
            (
                !(
                    $bufferOffset + $pos < strlen($lastBuffer) ||
                    !$this->_reader->increaseLength()
                )
            )
        );

        $result = substr($lastBuffer, $bufferOffset - 1, $pos + 1);
        $this->_reader->setOffset($bufferOffset + $pos);

        return $result;
    }

    /**
     * Leap white spaces.
     *
     * @return boolean
     */
    public function leapWhiteSpaces()
    {
        while (true) {
            $byte = $this->_reader->getByte();
            if (false === $byte) {
                return false;
            }

            if (
                $byte === "\x0A" ||
                $byte === "\x20" ||
                $byte === "\x0D" ||
                $byte === "\x0C" ||
                $byte === "\x09" ||
                $byte === "\x00"
            ) {
                $this->_reader->addOffset(1);
            } else {
                return true;
            }
        }
    }

    /**
     * Check if the current byte is a regular character.
     *
     * @return boolean
     */
    public function isCurrentByteRegularCharacter()
    {
        return strspn($this->_reader->getByte(), "\x00\x09\x0A\x0C\x0D\x20()<>[]{}/%") === 0;
    }
}