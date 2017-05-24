<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Encoding
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: EncodingInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Interface for encoding tables
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Encoding
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Encoding_EncodingInterface
{
    /**
     * Returns the encoding table array.
     *
     * Keys are the unicode values while the values are the code
     * points in the specific encoding.
     *
     * @return array
     */
    static public function getTable();
}