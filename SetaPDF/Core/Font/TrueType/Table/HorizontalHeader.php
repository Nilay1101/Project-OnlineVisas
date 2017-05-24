<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: HorizontalHeader.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A class representing the Horizontal Header Table (hhea) in a TrueType file.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Font_TrueType_Table_HorizontalHeader extends SetaPDF_Core_Font_TrueType_Table
{
    /**
     * The tag name of this class
     *
     * @var string
     */
    const TAG = SetaPDF_Core_Font_TrueType_Table_Tags::HORIZONTAL_HEADER;

    /**
     * The entries of this table.
     *
     * @var array
     */
    protected $_entries = [
        'majorVersion' => [0, SetaPDF_Core_BitConverter::USHORT],
        'minorVersion' => [2, SetaPDF_Core_BitConverter::USHORT],
        'Ascender' => [4, SetaPDF_Core_BitConverter::SHORT], // FWORD == SHORT in FUnits
        'Descender' => [6, SetaPDF_Core_BitConverter::SHORT], // FWORD
        'LineGap' => [8, SetaPDF_Core_BitConverter::SHORT], // FWORD
        'advanceWidthMax' => [10, SetaPDF_Core_BitConverter::USHORT], // UFWORD == USHORT in FUnits
        'minLeftSideBearing' => [12, SetaPDF_Core_BitConverter::SHORT], // FWORD
        'minRightSideBearing' => [14, SetaPDF_Core_BitConverter::SHORT], // FWORD
        'xMaxExtent' => [16, SetaPDF_Core_BitConverter::SHORT], // FWORD
        'caretSlopeRise' => [18, SetaPDF_Core_BitConverter::SHORT],
        'caretSlopeRun' => [20, SetaPDF_Core_BitConverter::SHORT],
        'caretOffset' => [22, SetaPDF_Core_BitConverter::SHORT],
        'metricDataFormat' => [32, SetaPDF_Core_BitConverter::SHORT],
        'numberOfHMetrics' => [34, SetaPDF_Core_BitConverter::USHORT],
    ];

    // TODO: Byte 24-31 need to be set to 0 (reserved)

    // TODO: 'hhea' Table and OpenType Font Variations -> https://www.microsoft.com/typography/otspec/hhea.htm

    /**
     * Get the major version number of this table.
     *
     * @return integer
     */
    public function getMajorVersion()
    {
        return $this->_get('majorVersion');
    }

    /**
     * Get the minor version number of this table.
     *
     * @return integer
     */
    public function getMinorVersion()
    {
        return $this->_get('minorVersion');
    }

    /**
     * Get the typographic ascent.
     *
     * @return integer
     */
    public function getAscender()
    {
        return $this->_get('Ascender');
    }

    /**
     * Get the typographic descent.
     *
     * @return integer
     */
    public function getDescender()
    {
        return $this->_get('Descender');
    }

    /**
     * Get the typographic line gap.
     *
     * @return integer
     */
    public function getLineGap()
    {
        return $this->_get('LineGap');
    }

    /**
     * Get the maximum advance width value in 'hmtx' table.
     *
     * @return integer
     */
    public function getAdvanceWidthMax()
    {
        return $this->_get('advanceWidthMax');
    }

    /**
     * Get the minimum left sidebearing value in 'hmtx' table.
     *
     * @return integer
     */
    public function getMinLeftSideBearing()
    {
        return $this->_get('minLeftSideBearing');
    }

    /**
     * Get the minimum right sidebearing value.
     *
     * @return integer
     */
    public function getMinRightSideBearing()
    {
        return $this->_get('minRightSideBearing');
    }

    /**
     * Get the maximum right sidebearing value.
     *
     * @return integer
     */
    public function getXMaxExtent()
    {
        return $this->_get('xMaxExtent');
    }

    /**
     * Get the caret slope rise value.
     *
     * @return integer
     */
    public function getCaretSlopeRise()
    {
        return $this->_get('caretSlopeRise');
    }

    /**
     * Get the caret slope run value.
     *
     * @return integer
     */
    public function getCaretSlopeRun()
    {
        return $this->_get('caretSlopeRun');
    }

    /**
     * Get the amount by which a slanted highlight on a glyph needs to be shifted to produce the best appearance.
     *
     * @return integer
     */
    public function getCaretOffset()
    {
        return $this->_get('caretOffset');
    }

    /**
     * Get the metric format.
     *
     * @return integer
     */
    public function getMetricDataFormat()
    {
        return $this->_get('metricDataFormat');
    }

    /**
     * Get the number of hMetric entries in 'hmtx' table.
     *
     * @return integer
     */
    public function getNumberOfHMetrics()
    {
        return $this->_get('numberOfHMetrics');
    }
}