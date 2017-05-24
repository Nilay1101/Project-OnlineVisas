<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Glyph.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A class representing a glyph.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Font_TrueType_Table_GlyphData_Glyph
{
    /**
     * The glyph data table
     *
     * @var SetaPDF_Core_Font_TrueType_Table_GlyphData
     */
    protected $_glyphData;

    /**
     * Offset of this glyph
     *
     * @var integer
     */
    protected $_offset;

    /**
     * Length of this glyph
     *
     * @var integer
     */
    protected $_length;

    /**
     * The constructor.
     *
     * @param SetaPDF_Core_Font_TrueType_Table_GlyphData $glyphData
     * @param integer $offset The byte offset position for this glyph
     * @param integer $length The byte length of this glyph
     */
    public function __construct(SetaPDF_Core_Font_TrueType_Table_GlyphData $glyphData, $offset, $length)
    {
        $this->_glyphData = $glyphData;
        $this->_offset = $offset;
        $this->_length = $length;
    }

    /**
     * Release memory.
     */
    public function cleanUp()
    {
        $this->_glyphData = null;
    }

    /**
     * Get the byte length of this glyph.
     *
     * @return int
     */
    public function getLength()
    {
        return $this->_length;
    }

    /**
     * Read a value for this glyph.
     *
     * @param integer $offset
     * @param string $method
     * @return integer|mixed
     */
    private function _read($offset, $method = 'readInt16')
    {
        $record = $this->_glyphData->getRecord();
        $reader = $record->getFile()->getReader();
        $offset = $record->getOffset() + $this->_offset + $offset;

        return $reader->$method($offset);
    }

    /**
     * Get the number of contours of this glyph.
     *
     * @return integer
     */
    public function getNumberOfContours()
    {
        return $this->_read(0);
    }

    /**
     * Get the minimum x for coordinate data.
     *
     * @return integer
     */
    public function getXMin()
    {
        return $this->_read(2);
    }

    /**
     * Get the minimum y for coordinate data.
     *
     * @return integer
     */
    public function getYMin()
    {
        return $this->_read(4);
    }

    /**
     * Get the maximum x for coordinate data.
     *
     * @return integer
     */
    public function getXMax()
    {
        return $this->_read(6);
    }

    /**
     * Get the maximum y for coordinate data.
     *
     * @return integer
     */
    public function getYMax()
    {
        return $this->_read(8);
    }
}