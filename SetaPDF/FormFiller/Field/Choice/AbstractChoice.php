<?php
/**
 * This file is part of the SetaPDF-FormFiller Component
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_FormFiller
 * @subpackage Field
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: AbstractChoice.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Abstract class for choice fields
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_FormFiller
 * @subpackage Field
 * @license    http://www.setasign.com/ Commercial
 */
abstract class SetaPDF_FormFiller_Field_Choice_AbstractChoice
extends SetaPDF_FormFiller_Field_AbstractField
{
    /**
     * The option values and export values
     * 
     * @var array
     */
    private $_options;
    
    /**
     * The plain export values in the original encoding
     * 
     * @var array
     */
    protected $_exportValues = array();

    /**
     * @var SetaPDF_FormFiller_Field_AdditionalActions
     */
    protected $_additionalActions;

    /**
     * Release cycled references and release memory.
     *
     * @return void
     */
    public function cleanUp()
    {
        parent::cleanUp();
        if (null !== $this->_additionalActions) {
            $this->_additionalActions->cleanUp();
            $this->_additionalActions = null;
        }
    }

    /**
     * Get the options and the export values.
     *
     * @param string $encoding The output encoding
     * @return array An array of arrays with following keys: visibleValue and exportValue
     */
    public function getOptions($encoding = 'UTF-8')
    {
        if (!isset($this->_options[$encoding])) {
            $this->_options[$encoding] = array();
            
            $opt = SetaPDF_Core_Type_Dictionary_Helper::resolveAttribute($this->_fieldDictionary, 'Opt');
            if (!$opt || !($opt instanceof SetaPDF_Core_Type_Array)) 
                return $this->_options[$encoding];
                
            foreach ($opt AS $option) {
                if ($option instanceof SetaPDF_Core_Type_Array) {
                    $exportValue = $option->offsetGet(0)->ensure()->getValue();
                    $value = $option->offsetGet(1)->ensure()->getValue();
                    
                } else {
                    $exportValue = $value = $option->ensure()->getValue();
                }
                
                $this->_exportValues[] = $exportValue;
                $this->_options[$encoding][] = array(
                    'visibleValue' =>  SetaPDF_Core_Encoding::convertPdfString($value, $encoding),
                    'exportValue' => SetaPDF_Core_Encoding::convertPdfString($exportValue, $encoding)
                );
            }
        }
        
        return $this->_options[$encoding];
    }

    /**
     * Gets the additional actions object instance for this field.
     *
     * @return SetaPDF_FormFiller_Field_AdditionalActions
     */
    public function getAdditionalActions()
    {
        if (null === $this->_additionalActions) {
            $this->_additionalActions = new SetaPDF_FormFiller_Field_AdditionalActions($this);
        }

        return $this->_additionalActions;
    }
}