<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: DescriptorInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Interface for fonts with a font descriptor.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Font
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Font_DescriptorInterface
{
    /**
     * Get the font descriptor object of this font.
     *
     * @return SetaPDF_Core_Font_Descriptor
     */
    public function getFontDescriptor();
}