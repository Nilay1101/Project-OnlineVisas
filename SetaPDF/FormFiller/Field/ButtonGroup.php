<?php
/**
 * This file is part of the SetaPDF-FormFiller Component
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_FormFiller
 * @subpackage Field
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: ButtonGroup.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A radio button group
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_FormFiller
 * @subpackage Field
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_FormFiller_Field_ButtonGroup implements SetaPDF_FormFiller_Field_FieldInterface
{
    /**
     * The buttons
     * 
     * @var SetaPDF_FormFiller_Field_Button[]
     */
    protected $_buttons = array();
    
    /**
     * The qualified name of the button group
     * 
     * @var string
     */
    protected $_qualifiedName;
    
    /**
     * A reference to the fields instance
     * 
     * @var SetaPDF_FormFiller_Fields
     */
    protected $_fields;
    
    /**
     * A flag indicating that a setValue call is active
     * 
     * @var boolean
     */
    protected $_setValueActive = false;
    
    /**
     * The main field dictionary
     * 
     * @var SetaPDF_Core_Type_Dictionary
     */
    protected $_fieldDictionary;
    
    /**
     * The constructor.
     *
     * @param SetaPDF_FormFiller_Fields $fields
     * @param string $qualifiedName
     * @param SetaPDF_Core_Type_IndirectReference|SetaPDF_Core_Type_IndirectObject $fieldObject
     */
    public function __construct(
        SetaPDF_FormFiller_Fields $fields,
        $qualifiedName,
        $fieldObject
    ) 
    {
        $this->_fields = $fields;
        $this->_qualifiedName = $qualifiedName;
        $this->_fieldDictionary = $fieldObject->ensure(true);
    }
    
    /**
     * Release cycled references and release memory.
     * 
     * @see SetaPDF_FormFiller_Field_FieldInterface::cleanUp()
     * @return void
     */
    public function cleanUp()
    {
        foreach ($this->_buttons AS $button) {
            $button->cleanUp();
        }
        
        $this->_buttons = array();
        $this->_fields = null;
        $this->_fieldDictionary = null;
    }

    /**
     * Get the fields instance.
     *
     * @return SetaPDF_FormFiller_Fields
     */
    public function getFields()
    {
        return $this->_fields;
    }

    /**
     * Returns the qualified name.
     * 
     * @return string
     */
    public function getQualifiedName()
    {
        return $this->_qualifiedName;
    }
    
    /**
     * Returns the original qualified name.
     *
     * (which is the same as the qualified name for button groups)
     * 
     * @return string
     */
    public function getOriginalQualifiedName()
    {
        return $this->_qualifiedName;
    }
    
    /**
     * Alias for getQualifiedName().
     * 
     * @see getQualifiedName()
     * @return string
     */
    public function getName()
    {
        return $this->getQualifiedName();
    }
    
    /**
     * Add a button to the group.
     *
     * @param SetaPDF_FormFiller_Field_Button $button
     * @return void
     */
    public function addButton(SetaPDF_FormFiller_Field_Button $button)
    {
        $this->_buttons[] = $button;
        $button->setButtonGroup($this);
    }
    
    /**
     * Get all buttons of the button group.
     * 
     * @return array
     */
    public function getButtons()
    {
        return $this->_buttons;
    }
    
    /**
     * Get the export value of the current active button.
     *
     * This method returns the export value of the first checked button.
     * 
     * @return string|mixed
     */
    public function getValue()
    {
        foreach ($this->_buttons AS $button) {
            if ($button->isChecked())
                return $button->getExportValue();
        }
        
        return null;
    }
    
    /**
     * Set the value / active button of the button group.
     * 
     * This method requires the button object, which should be activated as the parameter or an export value
     * which will be used to find the desired button.
     * 
     * @param SetaPDF_FormFiller_Field_Button|string $value The button instance or an export value
     * @return void
     * @throws InvalidArgumentException
     */
    public function setValue($value)
    {
        if (is_string($value)) {
            foreach ($this->_buttons AS $button) {
                if ($button->getExportValue() === $value) {
                    $value = $button;
                    break;
                }
            }
        }
        
        if (!($value instanceof SetaPDF_FormFiller_Field_Button) && $value !== null) {
            throw new InvalidArgumentException(
            	'Only values of type SetaPDF_FormFiller_Field_Button or a valid export value allowed.'
            );    
        }
        
        reset($this->_buttons);
        $tmpBtn = current($this->_buttons);
        $unison = $tmpBtn->isFieldFlagSet(1 << 25);
        
        $this->_setValueActive = true;
        
        // unset first, then reset the new value
        if (false === $unison) {
            foreach ($this->_buttons AS $button) {
                if ($value === null || $button !== $value)
                    $button->setValue(false);
            }
        } else {
            // If $unison is true, then all radio buttons with the same value should be checked
            $exportValue = $value !== null ? $value->getExportValue() : null;
            foreach ($this->_buttons AS $button) {
                if ($value === null || $value !== $button) {
                    $button->setValue($button->getExportValue() == $exportValue);
                }
            }
        }
        
        if ($value !== null) {
            $value->setValue(true);
        } else {
            $xfa = $this->_fields->getFormFiller()->getXfa();
            if ($xfa) {
                $xfa->setValue($this->getOriginalQualifiedName(), null);
            }
        }
        
        $this->_setValueActive = false;
    }
    
    /**
     * Returns the default value of the button group.
     * 
     * This value is used if the form is reset
     * 
     * @param string $encoding 
     * @return null|string
     * @see SetaPDF_FormFiller_Field_FieldInterface::getDefaultValue()
     */
    public function getDefaultValue($encoding = 'UTF-8')
    {
        $dv = SetaPDF_Core_Type_Dictionary_Helper::resolveAttribute($this->_fieldDictionary, 'DV');
        if (!$dv) {
            return null;
        } 
        
        $defaultValue = $dv->getValue();
        
        $opt = SetaPDF_Core_Type_Dictionary_Helper::resolveAttribute($this->_fieldDictionary, 'Opt');
        if (null !== $opt) {
            $value = $opt->offsetGet((int)$defaultValue)->getValue();
            return SetaPDF_Core_Encoding::convertPdfString($value, $encoding);
        }
        
        return SetaPDF_Core_Encoding::convertPdfString($defaultValue, $encoding);
    }

    /**
     * Set the default value of this button group.
     *
     * @param string|null $value
     * @param string $encoding
     */
    public function setDefaultValue($value, $encoding = 'UTF-8')
    {
        SetaPDF_Core_SecHandler::checkPermission(
            $this->_fields->getFormFiller()->getDocument(), SetaPDF_Core_SecHandler::PERM_MODIFY
        );

        if (is_string($value)) {
            foreach ($this->_buttons AS $button) {
                if ($button->getExportValue() === $value) {
                    $value = $button;
                    break;
                }
            }
        }

        if (!($value instanceof SetaPDF_FormFiller_Field_Button) && $value !== null) {
            throw new InvalidArgumentException(
                'Only values of type SetaPDF_FormFiller_Field_Button or a valid export value allowed.'
            );
        }

        $dict = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');

        if ($value === null) {
            $dict->offsetUnset('DV');
            return;
        }

        $dict->offsetSet('DV', new SetaPDF_Core_Type_Name($value->getOnStateName()));

        $xfa = $this->_fields->getFormFiller()->getXfa();
        if ($xfa) {
            $xfa->setDefaultValue($this->getOriginalQualifiedName(), $value->getExportValue());
        }
    }
    
    /**
     * Get the default checked button.
     * 
     * @return SetaPDF_FormFiller_Field_Button
     */
    public function getDefaultButton()
    {
        $dv = SetaPDF_Core_Type_Dictionary_Helper::resolveAttribute($this->_fieldDictionary, 'DV');
        if (!$dv) {
            return null;
        }
        
        $defaultValue = $dv->getValue();
        
        $opt = SetaPDF_Core_Type_Dictionary_Helper::resolveAttribute($this->_fieldDictionary, 'Opt');
        if (null !== $opt) {
            return $this->_buttons[(int)$defaultValue];
        }
        
        foreach ($this->_buttons as $button) {
        	if ($defaultValue == $button->getExportValue())
        	    return $button;
        }
        
        // should never be reached
        return null;
    }
    
    /**
     * Get the page number(s) on which the button group appears.
     * 
     * @return integer|array
     */
    public function getPageNumber()
    {
        $pages = array();
        foreach ($this->_buttons AS $button) {
            $pages[] = $button->getPageNumber();
        }
        
        $pages = array_unique($pages);
        
        return count($pages) > 1 ? $pages : $pages[0];
    }
    
    /**
     * Not needed for this field type.
     *
     * @internal
     */
    public function recreateAppearance()
    {
        /**
         * empty method body
         */ 
    }
    
    /**
     * Flatten the button group to the pages content stream.
     * 
     * @return void
     */
    public function flatten()
    {
        reset($this->_buttons);
        while (($button = current($this->_buttons)) !== false) {
            $button->flatten();
        }
    }
    
    /**
     * Delete the button group.
     * 
     * @return void
     */
    public function delete()
    {
        reset($this->_buttons);
        while (($button = current($this->_buttons)) !== false) {
            $button->delete();
        }
    }
    
    /**
     * Is called when a button in this group is deleted.
     * 
     * @param SetaPDF_FormFiller_Field_Button $button
     */
    public function onFieldDeleted($button)
    {
        $key = array_search($button, $this->_buttons, true);
        if ($key !== false) {
            $button->cleanUp();
            unset($this->_buttons[$key]);
        }
        
        if (0 === count($this->_buttons)) {
            $this->_fields->onFieldDeleted($this);
        }
    }
    
    /**
     * Checks if the button group is marked as read-only.
     * 
     * @return boolean|null
     */
    public function isReadOnly()
    {
        foreach ($this->_buttons AS $button) {
            return $button->isReadOnly();
        }

        return null;
    }
    
    /**
     * Sets the button group to read-only or not.
     * 
     * @param boolean $readOnly
     * @return void
     */
    public function setReadOnly($readOnly = true)
    {
        foreach ($this->_buttons AS $button) {
            $button->setReadOnly($readOnly);
        }
    }
    
    /**
     * Checks if the button group is marked as required.
     * 
     * @return boolean|null
     */
    public function isRequired()
    {
        foreach ($this->_buttons AS $button) {
            return $button->isRequired();
        }

        return null;
    }
    
    /**
     * Sets the button group to be required or not.
     *
     * @param boolean $required
     */
    public function setRequired($required = true)
    {
        foreach ($this->_buttons AS $button) {
            $button->setRequired($required);
        }
    }
    
    /**
     * Get the info, if the button group is marked as "no export".
     * 
     * This flag is not get- or settable with Acrobat!
     * 
     * @return boolean|null
     */
    public function getNoExport()
    {
        foreach ($this->_buttons AS $button) {
            return $button->getNoExport();
        }

        return null;
    }
    
    /**
     * Sets the "no export" flag.
     * 
     * This flag is not get- or settable with Acrobat!
     * 
     * If you remove this flag, the element could be still not exported due to a definition in a
     * FormSubmit actions Fields array.
     * 
     * @param boolean $noExport
     * @return void
     */
    public function setNoExport($noExport = true)
    {
        foreach ($this->_buttons AS $button) {
            $button->setNoExport($noExport);
        }
    }

    /**
     * Get the tooltip value.
     *
     * @param string $encoding
     * @return bool|string|null
     */
    public function getTooltip($encoding = 'UTF-8')
    {
        foreach ($this->_buttons AS $button) {
            return $button->getTooltip($encoding);
        }

        return null;
    }

    /**
     * Set the tooltip value.
     *
     * @param string|false $value
     * @param string $encoding
     */
    public function setTooltip($value, $encoding = 'UTF-8')
    {
        foreach ($this->_buttons AS $button) {
            $button->setTooltip($value, $encoding);
            return;
        }
    }

    /**
     * Checks if a setValue operation is active.
     * 
     * @return boolean
     */
    public function isSetValueActive()
    {
        return $this->_setValueActive;
    }
}