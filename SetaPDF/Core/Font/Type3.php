<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Type3.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Class representing a Type3 font.
 *
 * This class is only useable by existing MMType1 fonts.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Font_Type3 extends SetaPDF_Core_Font
    implements SetaPDF_Core_Font_Glyph_Collection_CollectionInterface
{
    /**
     * The font name
     *
     * @var string
     */
    protected $_fontName;

    /**
     * The to unicode table.
     *
     * @var SetaPDF_Core_Font_Cmap
     */
    protected $_toUnicodeTable;

    /**
     * The encoding table.
     *
     * @var array
     */
    protected $_encodingTable;

    /**
     * Glyph widths
     *
     * @var array
     */
    protected $_widths;

    /**
     * The font bounding box
     *
     * @var array
     */
    protected $_fontBBox;

    /**
     * The font matrix
     *
     * @var SetaPDF_Core_Geometry_Matrix
     */
    protected $_fontMatrix;

    /**
     * @return SetaPDF_Core_Font_Cmap|boolean
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    protected function _getCharCodesTable()
    {
        if (null === $this->_toUnicodeTable) {
            if ($this->_dictionary->offsetExists('ToUnicode')) {
                $toUnicodeStream = $this->_dictionary->getValue('ToUnicode')->ensure();

                $stream = $toUnicodeStream->getStream();
                $this->_toUnicodeTable = SetaPDF_Core_Font_Cmap::create(new SetaPDF_Core_Reader_String($stream));

                return $this->_toUnicodeTable;
            }
        } else {
            return $this->_toUnicodeTable;
        }

        return false;
    }

    /**
     * Get the encoding table based on the Encoding dictionary and it's Differences entry (if available).
     *
     * @return array
     */
    protected function _getEncodingTable()
    {
        if (null === $this->_encodingTable) {
            /* 1. Check for an existing encoding which
             *    overwrites the fonts build in encoding
             */
            $baseEncoding = false;
            $diff = array();

            if ($this->_dictionary->offsetExists('Encoding')) {
                $encoding = $this->_dictionary->offsetGet('Encoding')->ensure();
                if ($encoding instanceof SetaPDF_Core_Type_Name) {
                    $baseEncoding = $encoding->getValue();
                    $diff = array();
                } else {
                    $baseEncoding = $encoding->offsetExists('BaseEncoding')
                        ? $encoding->offsetGet('BaseEncoding')->getValue()->toPhp()
                        : false;

                    $diff = $encoding->offsetExists('Differences')
                        ? $encoding->offsetGet('Differences')->getValue()->toPhp()
                        : array();
                }
            }

            if ($baseEncoding) {
                $baseEncoding = substr($baseEncoding, 0, strpos($baseEncoding, 'Encoding'));
                $className = 'SetaPDF_Core_Encoding_' . $baseEncoding;
                $baseEncodingTable = call_user_func(array($className, 'getTable'));
            } else {
                $baseEncodingTable = $this->getBaseEncodingTable();
            }

            $newBaseEncodingTable = array();

            $currentCharCode = null;
            foreach ($diff AS $value) {
                if (is_double($value)) {
                    $currentCharCode = $value;
                    continue;
                }

                $utf16BeCodePoint = SetaPDF_Core_Font_Glyph_List::byName($value);
                if ($utf16BeCodePoint !== '') {
                    $newBaseEncodingTable[$utf16BeCodePoint] = chr($currentCharCode);
                }
                $currentCharCode++;
            }

            foreach ($baseEncodingTable AS $key => $value) {
                if (!isset($newBaseEncodingTable[$key])) {
                    $newBaseEncodingTable[$key] = $value;
                }
            }

            $this->_encodingTable = $newBaseEncodingTable;

            // Try to get the "?" as substitute character
            $this->_substituteCharacter = SetaPDF_Core_Encoding::fromUtf16Be($this->_encodingTable, "\x00\x3F", true);
        }

        return $this->_encodingTable;
    }

    /**
     * Get the font name.
     *
     * @return string
     */
    public function getFontName()
    {
        if (null === $this->_fontName)
            $this->_fontName = $this->_dictionary->offsetGet('BaseFont')->ensure()->getValue();

        return $this->_fontName;
    }

    /**
     * Get the font family.
     *
     * @return string|void
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    public function getFontFamily()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }
    
    /**
     * Checks if the font is bold.
     *
     * @return boolean
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    public function isBold()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }

    /**
     * Checks if the font is italic.
     *
     * @return boolean
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    public function isItalic()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }

    /**
     * Checks if the font is monospace.
     *
     * @return boolean
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    public function isMonospace()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }

    /**
     * Get the font matrix.
     *
     * @return SetaPDF_Core_Geometry_Matrix
     * @throws SetaPDF_Core_Exception
     */
    public function getFontMatrix()
    {
        if (null === $this->_fontMatrix) {
            $fontMatrix = $this->_dictionary->getValue('FontMatrix');
            if (!$fontMatrix) {
                throw new SetaPDF_Core_Exception('No FontMatrix entry found!');
            }

            $fontMatrix = $fontMatrix->ensure()->toPhp();
            $this->_fontMatrix = new SetaPDF_Core_Geometry_Matrix($fontMatrix);
        }

        return $this->_fontMatrix;
    }

    /**
     * Returns the font bounding box.
     *
     * @return array
     * @throws SetaPDF_Core_Exception
     * @internal
     */
    public function getFontBBox()
    {
        $fontBBox = $this->_dictionary->getValue('FontBBox');
        if (!$fontBBox) {
            throw new SetaPDF_Core_Exception('No FontBBox entry found!');
        }

        return $fontBBox->ensure()->toPhp();
    }

    /**
     * Returns the italic angle.
     *
     * @return float
     * @throws SetaPDF_Exception_NotImplemented
     */
    public function getItalicAngle()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }

    /**
     * Returns the distance from baseline of highest ascender (Typographic ascent).
     *
     * @return float
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    public function getAscent()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }

    /**
     * Returns the distance from baseline of lowest descender (Typographic descent).
     *
     * @return float
     * @throws SetaPDF_Exception_NotImplemented
     * @internal
     */
    public function getDescent()
    {
        throw new SetaPDF_Exception_NotImplemented('Type3 font support is not implemented.');
    }

    /**
     * Resolves the width values from the font descriptor and fills the {@link $_width}-array.
     */
    protected function _getWidths()
    {
        $firstChar = $this->_dictionary->offsetGet('FirstChar')->ensure()->toPhp();
        $lastChar = $this->_dictionary->offsetGet('LastChar')->ensure()->toPhp();
        $widths = $this->_dictionary->offsetGet('Widths')->ensure()->toPhp();

        $table = $this->_getCharCodesTable();
        if ($table === false) {
            $table = $this->_getEncodingTable();
        }

        $this->_widths = array();
        $this->_widthsByCharCode = array();

        for ($i = $firstChar ; $i <= $lastChar; $i++) {
            $charCode = chr($i);
            $width = $widths[$i - $firstChar];

            $this->_widthsByCharCode[$charCode] = $width;

            $utf16BeCodePoint = SetaPDF_Core_Encoding::toUtf16Be($table, $charCode, false, true);
            if (!isset($this->_widths[$utf16BeCodePoint])) {
                $this->_widths[$utf16BeCodePoint] = $width;
            }
        }
    }

    /**
     * Get the width of a glyph/character.
     *
     * @see SetaPDF_Core_Font::getGlyphWidth()
     * @param string $char
     * @param string $encoding The input encoding
     * @return float|int
     */
    public function getGlyphWidth($char, $encoding = 'UTF-16BE')
    {
        if (null === $this->_widths) {
            $this->_getWidths();
        }

        return parent::getGlyphWidth($char, $encoding);
    }

    /**
     * Get the width of a glpyh by its char code.
     *
     * @param string $charCode
     * @return float|int
     */
    public function getGlyphWidthByCharCode($charCode)
    {
        if (null === $this->_widthsByCharCode) {
            $this->_getWidths();
        }

        return parent::getGlyphWidthByCharCode($charCode);
    }

    /**
     * Converts char codes from the font specific encoding to another encoding.
     *
     * @param string $charCodes The char codes in the font specific encoding.
     * @param string $encoding The resulting encoding
     * @param bool $asArray
     * @return string|array
     */
    public function getCharsByCharCodes($charCodes, $encoding = 'UTF-8', $asArray = true)
    {
        $table = $this->_getCharCodesTable();
        if ($table === false) {
            $table = $this->_getEncodingTable();
        }

        $chars = SetaPDF_Core_Encoding::toUtf16Be($table, $charCodes, false, true);

        if ($encoding !== 'UTF-16BE')
            $chars = SetaPDF_Core_Encoding::convert($chars, 'UTF-16BE', $encoding);

        if ($asArray) {
            $chars = SetaPDF_Core_Encoding::strSplit($chars, $encoding);
        }

        return $chars;
    }

    /**
     * Get the base encoding of the font.
     *
     * If no BaseEncoding entry is available we use the
     * Standard encoding for now. This should be extended
     * to get the fonts build in encoding later.
     *
     * @return array
     */
    public function getBaseEncodingTable()
    {
        return SetaPDF_Core_Encoding_Standard::$table;
    }
}