<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Writer
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: WriterInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * The writer interface
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Writer
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Writer_WriterInterface
    extends SetaPDF_Core_WriteInterface
{
    /**
     * Method called when the writing process starts.
     *
     * This method could send for example headers.
     */
    public function start();

    /**
     * This method is called when the writing process is finished.
     *
     * It could close a file handle for example or send headers and flush a buffer.
     */
    public function finish();

    /**
     * Get the current writer status.
     *
     * @see SetaPDF_Core_Writer
     * @return integer
     */
    public function getStatus();

    /**
     * Gets the current position/offset.
     *
     * @return integer
     */
    public function getPos();

    /**
     * Method called if a documents cleanUp-method is called.
     */
    public function cleanUp();
}