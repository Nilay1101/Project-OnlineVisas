<?php 
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Iterator.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Optional content iterator
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Document
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Document_OptionalContent_Iterator extends RecursiveIteratorIterator
{
    /**
     * Return the current value as an SetaPDF_Core_Document_OptionalContent_Group object if possible.
     * 
     * @return SetaPDF_Core_Type_AbstractType|SetaPDF_Core_Document_OptionalContent_Group
     * @see RecursiveIteratorIterator::current()
     */
    public function current()
    {
        $current = parent::current();
        
        if ($current->ensure() instanceof SetaPDF_Core_Type_Dictionary) {
            return new SetaPDF_Core_Document_OptionalContent_Group($current);
        }
        
        return $current;
    }
}