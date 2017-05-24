<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: IndexToLocation.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A class representing the Index to Location (loca) in a TrueType file.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Font_TrueType_Table_IndexToLocation extends SetaPDF_Core_Font_TrueType_Table
{
    /**
     * The tag name of this class
     *
     * @var string
     */
    const TAG = SetaPDF_Core_Font_TrueType_Table_Tags::LOCA;

    /**
     * Get the offset location of a single glyph.
     *
     * @param integer $glyphId
     * @return integer
     */
    public function getLocation($glyphId)
    {
        $result = $this->getLocations([$glyphId]);
        return $result[$glyphId];
    }

    /**
     * Get offset locations of glyphs.
     *
     * @param integer[] $glyphIds
     * @return integer[]
     */
    public function getLocations(array $glyphIds)
    {
        /**
         * @var SetaPDF_Core_Font_TrueType_Table_Header $headTable
         */
        $headTable = $this->_record->getFile()->getTable(SetaPDF_Core_Font_TrueType_Table_Tags::HEADER);
        $indexToLocFormat = $headTable->getIndexToLocFormat(); // 0 for short offsets, 1 for long.

        $record = $this->_record;
        $reader = $record->getFile()->getReader();
        $offset = $record->getOffset();

        $result = [];
        if ($indexToLocFormat === 0) {
            foreach ($glyphIds AS $glyphId) {
                $result[$glyphId] = $reader->readUInt16($offset + $glyphId * 2) * 2;
            }
        } else {
            foreach ($glyphIds AS $glyphId) {
                $result[$glyphId] = $reader->readUInt32($offset + $glyphId * 4);
            }
        }

        return $result;
    }
}