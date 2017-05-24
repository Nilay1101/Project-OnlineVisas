<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: ContainerInterface.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * An interface for objects which contains a canvas object.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Canvas
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Canvas_ContainerInterface
{
    /**
     * Get the indirect object of the container.
     *
     * This could be an object holding a dictionary or a stream.
     *
     * @return SetaPDF_Core_Type_IndirectObject
     */
    public function getObject();

    /**
     * Get the stream proxy object.
     *
     * @return SetaPDF_Core_Canvas_StreamProxyInterface
     */
    public function getStreamProxy();

    /**
     * Get the width for the canvas.
     *
     * @return float
     */
    public function getWidth();

    /**
     * Get the height for the canvas.
     *
     * @return float
     */
    public function getHeight();
}