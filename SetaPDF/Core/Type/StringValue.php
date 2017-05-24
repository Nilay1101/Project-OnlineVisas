<?php 
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Type
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: StringValue.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Interface for string values
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Type
 * @license    http://www.setasign.com/ Commercial
 * @see SetaPDF_Core_Type_String, SetaPDF_Core_Type_HexString
 */
interface SetaPDF_Core_Type_StringValue
{
    
  /* We cannot defined the methods here because they are already declared to be abstract
   * in SetaPDF_Core_Type_AbstractType.
   */
    
    /**
     * Get the string value
     * 
     * @return string
     */
    // public function getValue();
    
    /**
     * Set the string value
     * 
     * @param string $value
     */
    // public function setValue($value);
}