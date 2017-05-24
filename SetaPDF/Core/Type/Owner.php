<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Type
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Owner.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Interface representing an owner object which encapsulates other data.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Type
 * @license    http://www.setasign.com/ Commercial
 */
interface SetaPDF_Core_Type_Owner
extends SplObserver
{
    /**
     * Returns the owner document.
     *
     * Currently deactivated because of incompatibility with PHP 5.2
     *
     * @return SetaPDF_Core_Document|null
     */
    //public function getOwnerPdfDocument();
}