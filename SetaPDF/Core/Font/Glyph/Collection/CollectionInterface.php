<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: CollectionInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * An interface for glyph collections
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Font_Glyph_Collection_CollectionInterface
{
    /**
     * Get the glyph width of a single character.
     *
     * @param string $char The character
     * @param string $encoding The encoding of the character
     */
    public function getGlyphWidth($char, $encoding = 'UTF-16BE');

    /**
     * Get the glyphs width of a string.
     *
     * @param string $chars The string
     * @param string $encoding The encoding of the characters
     */
    public function getGlyphsWidth($chars, $encoding = 'UTF-16BE');
}