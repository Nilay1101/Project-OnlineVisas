<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: StreamProxyInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Interface of a StreamProxy
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Canvas_StreamProxyInterface
    extends SetaPDF_Core_WriteInterface
{
    /**
     * Clears the complete canvas content.
     */
    public function clear();

    /**
     * Get the whole byte stream of the canvas.
     *
     * @return string
     */
    public function getStream();
}