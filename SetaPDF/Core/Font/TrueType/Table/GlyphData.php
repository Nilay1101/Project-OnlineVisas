<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: GlyphData.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A class representing the Glyf Data Table (glyf) in a TrueType file.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Font_TrueType_Table_GlyphData extends SetaPDF_Core_Font_TrueType_Table
{
    /**
     * The tag name of this class
     *
     * @var string
     */
    const TAG = SetaPDF_Core_Font_TrueType_Table_Tags::GLYF;

    /**
     * Get a single glyph instance.
     *
     * @param $glyphId
     * @return bool|SetaPDF_Core_Font_TrueType_Table_GlyphData_Glyph
     */
    public function getGlyph($glyphId)
    {
        /**
         * @var SetaPDF_Core_Font_TrueType_Table_MaximumProfile $maxpTable
         */
        $maxpTable = $this->_record->getFile()->getTable(SetaPDF_Core_Font_TrueType_Table_Tags::MAXIMUM_PROFILE);
        $numGlyphs = $maxpTable->getNumGlyphs();

        if ($glyphId >= $numGlyphs) {
            throw new OutOfRangeException('Glyph id (' . $glyphId . ') out of range (max: ' . ($numGlyphs - 1) . ')');
        }

        /**
         * @var SetaPDF_Core_Font_TrueType_Table_IndexToLocation $locaTable
         */
        $locaTable = $this->_record->getFile()->getTable(SetaPDF_Core_Font_TrueType_Table_Tags::LOCA);

        $locationData = $locaTable->getLocations([$glyphId, $glyphId + 1]);
        $length = $locationData[$glyphId + 1] - $locationData[$glyphId];

        if ($length > 0) {
            return new SetaPDF_Core_Font_TrueType_Table_GlyphData_Glyph($this, $locationData[$glyphId], $length);
        } else {
            return false;
        }
    }
}