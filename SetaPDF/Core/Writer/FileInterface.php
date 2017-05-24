<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Writer
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: FileInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * An interface for file writer classes.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Writer
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Writer_FileInterface
{
    /**
     * Get the path of the file.
     *
     * @return string
     */
    public function getPath();
}