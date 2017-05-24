<?php
/**
 * This file is part of the SetaPDF-FormFiller Component
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_FormFiller
 * @subpackage Field
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: List.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A list field
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_FormFiller
 * @subpackage Field
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_FormFiller_Field_List
extends SetaPDF_FormFiller_Field_Choice_AbstractChoice
implements SetaPDF_FormFiller_Field_FieldInterface
{
    /**
     * Returns the default value(s) of the field.
     * 
     * This value is used if the form is reset
     * 
     * @param string $encoding The output encoding
     * @return null|array|string
     * @see SetaPDF_FormFiller_Field_FieldInterface::getDefaultValue()
     */
    public function getDefaultValue($encoding = 'UTF-8')
    {
        $dv = SetaPDF_Core_Type_Dictionary_Helper::resolveAttribute($this->_fieldDictionary, 'DV');
        if (!$dv) {
            return $this->isMultiSelect() ? array() : null;
        } 
        
        $defaultValues = $dv->getValue();
        
        if (is_string($defaultValues)) {
            $result = SetaPDF_Core_Encoding::convertPdfString($defaultValues, $encoding);
            return $this->isMultiSelect() ? array($result) : $result;
        }
        
        $result = array();
        foreach ($defaultValues AS $value) {
            $result[] = SetaPDF_Core_Encoding::convertPdfString($value->ensure()->getValue(), $encoding);
        }
        
        return $result;
    }

    /**
     * Set the default value.
     *
     * @param mixed $value
     * @param string $encoding
     */
    public function setDefaultValue($value, $encoding = 'UTF-8')
    {
        $this->_checkPermission(SetaPDF_Core_SecHandler::PERM_MODIFY);

        $originalValue = $value;
        $options = $this->getOptions($encoding);

        if (
            null === $value ||
            $this->isMultiSelect() && is_array($value) && count($value) === 0
        ) {
            $dict = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'DV');
            if ($dict) {
                $dict->offsetUnset('DV');
            }

            $this->_fields->forwardValueToRelated($value, $this, $encoding, 'setDefaultValue');
            return;
        }

        $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');

        // Multiselect
        if ($this->isMultiSelect()) {
            $values = !is_array($value) ? array($value) : $value;
            $finalValues = array();

            foreach ($values AS $value) {
                if (!is_string($value) && !is_int($value)) {
                    throw new InvalidArgumentException(
                        sprintf('Argument of type "%s" not allowed.', gettype($value))
                    );
                }

                // Check for an entry with this export value
                if (is_string($value)) {
                    foreach ($options AS $key => $option) {
                        if ($option['exportValue'] === $value) {
                            $value = $key;
                            break;
                        }
                    }
                }

                // Still string? Not possible for list fields...
                if (is_string($value)) {
                    throw new InvalidArgumentException(
                        sprintf('Unknown option (%s).', $value)
                    );
                }

                if (!array_key_exists($value, $options)) {
                    throw new InvalidArgumentException(
                        sprintf('Unknown option (%s).', $value)
                    );
                }

                $finalValues[$value] = $value;
            }

            $vEntry = new SetaPDF_Core_Type_Array();
            foreach ($finalValues AS $value) {
                $vEntry[] = new SetaPDF_Core_Type_String($this->_exportValues[$value]);
            }

            $tObject->offsetSet('DV', $vEntry);

            // Only one value
        } else {
            if (!is_string($value) && !is_int($value)) {
                throw new InvalidArgumentException(
                    'Argument of type ' . gettype($value) . ' not allowed.'
                );
            }

            // Check for an entry with this export value
            if (is_string($value)) {
                foreach ($options AS $key => $option) {
                    if ($option['exportValue'] === $value) {
                        $value = $key;
                        break;
                    }
                }
            }

            // Still string? Not possible for list fields...
            if (is_string($value)) {
                throw new InvalidArgumentException(
                    sprintf('Unknown option (%s).', $value)
                );
            }

            if (!array_key_exists($value, $options)) {
                throw new InvalidArgumentException(
                    sprintf('Unknown option (%s).', $value)
                );
            }

            $tObject->offsetSet('DV', new SetaPDF_Core_Type_String($this->_exportValues[$value]));
        }

        $this->_fields->forwardValueToRelated($originalValue, $this, $encoding, 'setDefaultValue');
    }
    
	/**
     * Get the current value(s).
     *
     * If the field is a multi select field, this method will return an array.
     * If not it will return a string
     * 
     * @param string $encoding The output encoding
     *
     * @return string|array|null If no option is selected and the {@link isMultiSelect() multi select flag} is not set
     *                           the method will return null. If the flag is set an empty array. Otherwise the active
     *                           value or the active values in an array.
     */
    public function getValue($encoding = 'UTF-8')
    {
        $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
        if (!$tObject->offsetExists('V')) {
            return $this->isMultiSelect() ? array() : null;
        }
        
        $values = $tObject->offsetGet('V')->ensure()->getValue();
        
        if (is_string($values)) {
            $result = SetaPDF_Core_Encoding::convertPdfString($values, $encoding);
            return $this->isMultiSelect() ? array($result) : $result;
        }
        
        $result = array();
        foreach ($values AS $value) {
            $result[] = SetaPDF_Core_Encoding::convertPdfString($value->ensure()->getValue(), $encoding);
        }
        
        return $result;
    }
    
    /**
     * Get the current visible value(s).
     *
     * If the field is a multi select field, this method will return an array.
     * If not it will return a string
     * 
     * @param string $encoding The output encoding
     * @return string|array
     */
    public function getVisibleValue($encoding = 'UTF-8')
    {
        $options = $this->getOptions($encoding);
        $result = array();
            
        // Resolve value through the I entry
        $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
        if ($tObject->offsetExists('I')) {
            $offset = $tObject->offsetGet('I')->ensure();
            
            foreach ($offset AS $value) {
                $tmpOffset = $value->ensure()->getValue();
                $result[] = $options[$tmpOffset]['visibleValue'];
            }
            
            // Return an array
            if ($this->isMultiSelect()) {
                return $result;
            }
            
            return empty($result) ? '' : current($result);
        }
        
        $value = $this->getValue($encoding);
        
        if (is_array($value)) {
            foreach ($options AS $option) {
                if (in_array($option['exportValue'], $value)) {
                    $result[] = $option['visibleValue'];
                }
            }
            
            // Return an array
            if ($this->isMultiSelect()) {
                return $result;
            }
            
            // Should catch corrupted documents
            return empty($result) ? '' : current($result);
            
        } else {
            // Mostly this code will be reached if the value is "null"
            // A missing I entry is very rare
            foreach ($options AS $option) {
                if ($option['exportValue'] == $value) {
                    return $option['visibleValue'];
                }
            }
        }
        
        return $value;
    } 

	/**
     * Set the fields value / Selects the options.
     * 
     * @param mixed $value The value could be an export value of an option or the numeric index
     *                     of an option, received by getOptions(). Also an array of this values
     *                     could be passed if the field is marked as a MultiSelect field
     * @param string $encoding The input encoding
     * @return void
     * @throws InvalidArgumentException
     */
    public function setValue($value, $encoding = 'UTF-8')
    {
        $this->_checkPermission();
        
        $originalValue = $value;
        $options = $this->getOptions($encoding);
        
        if (
            null === $value ||
            $this->isMultiSelect() && is_array($value) && count($value) === 0
        ) {
            $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
            $tObject->offsetUnset('V');
            $tObject->offsetUnset('I');
            $tObject->offsetUnset('TI');
            
        } else {
            // Multiselect
            if ($this->isMultiSelect()) {
                $values = !is_array($value) ? array($value) : $value;
                $finalValues = array();
                
                foreach ($values AS $value) {
                    if (!is_string($value) && !is_int($value)) {
                        throw new InvalidArgumentException(
                            sprintf('Argument of type "%s" not allowed.', gettype($value))
                        );
                    }
                    
                    // Check for an entry with this export value
                    if (is_string($value)) {
                        foreach ($options AS $key => $option) {
                            if ($option['exportValue'] === $value) {
                                $value = $key;
                                break;      
                            }
                        }
                    }
                    
                    // Still string? Not possible for list fields...
                    if (is_string($value)) {
                        throw new InvalidArgumentException(
                            sprintf('Unknown option (%s).', $value)
                        );
                    }

                    if (!array_key_exists($value, $options)) {
                        throw new InvalidArgumentException(
                            sprintf('Unknown option (%s).', $value)
                        );
                    }
                    
                    $finalValues[$value] = $value;
                }

                $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
                $iEntry = new SetaPDF_Core_Type_Array();
                $vEntry = new SetaPDF_Core_Type_Array();
                foreach ($finalValues AS $value) {
                    $iEntry[] = new SetaPDF_Core_Type_Numeric($value);
                    $vEntry[] = new SetaPDF_Core_Type_String($this->_exportValues[$value]);
                }
                $tObject->offsetSet('I', $iEntry);
                $tObject->offsetSet('V', $vEntry);
                                
            // Only one value
            } else {
                if (!is_string($value) && !is_int($value)) {
                    throw new InvalidArgumentException(
                        'Argument of type ' . gettype($value) . ' not allowed.'
                    );
                }
                
                // Check for an entry with this export value
                if (is_string($value)) {
                    foreach ($options AS $key => $option) {
                        if ($option['exportValue'] === $value) {
                            $value = $key;
                            break;
                        }
                    }
                }
                
                // Still string? Not possible for list fields...
                if (is_string($value)) {
                    throw new InvalidArgumentException(
                        sprintf('Unknown option (%s).', $value)
                    );
                }

                if (!array_key_exists($value, $options)) {
                    throw new InvalidArgumentException(
                        sprintf('Unknown option (%s).', $value)
                    );
                }
                
                $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
                $tObject->offsetSet('I',
                    new SetaPDF_Core_Type_Array(array(
                        new SetaPDF_Core_Type_Numeric($value))
                    )
                );
                
                $tObject->offsetSet('V', new SetaPDF_Core_Type_String($this->_exportValues[$value]));
            }
        }
        
        $this->recreateAppearance();
        
        $this->_fields->forwardValueToRelated($originalValue, $this, $encoding);
    }
    
    /**
     * Gets the indices of the currently selected options.
     * 
     * @see recreateAppearance()
     * @return array
     */
    protected function _getCurrentOptionIndices()
    {
        $indices = array();

        // Use the I Key to obtain the indices
        $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
        if ($tObject->offsetExists('I')) {
            $indices = $tObject->offsetGet('I')->ensure()->toPhp();
            
        // If no indices is found walk, through the options array
        // and compare the export values
        } else {
            $values = $this->getValue('UTF-16BE');
            if (!is_array($values))
                $values = array($values);
                
            $options = $this->getOptions('UTF-16BE');
            foreach ($options AS $index => $option) {
                if (in_array($option['visibleValue'], $values))
                    $indices[] = $index;
            }
        }
        
        return $indices;
    }

    /**
     * Recreate or creates the Appearance of the form field.
     * 
     * @see SetaPDF_FormFiller_Field_FieldInterface::recreateAppearance()
     * @return void
     */
    public function recreateAppearance()
    {
        $canvas = parent::_recreateAppearance();
        
        $annotation = $this->getAnnotation();
        $appearanceCharacteristics = $annotation->getAppearanceCharacteristics();
        $borderStyle = $annotation->getBorderStyle();

        $borderWidth = 0;
        $_borderStyle = SetaPDF_Core_Document_Page_Annotation_BorderStyle::SOLID;

        if ($borderStyle) {
            $_borderStyle = $borderStyle->getStyle();
            $borderWidth = $borderStyle->getWidth();
        }

        if ($borderWidth == 0 && $appearanceCharacteristics && $appearanceCharacteristics->getBorderColor() !== null) {
            $borderWidth = 1;
        }

        $borderDoubled = (
            $_borderStyle === SetaPDF_Core_Document_Page_Annotation_BorderStyle::BEVELED ||
            $_borderStyle === SetaPDF_Core_Document_Page_Annotation_BorderStyle::INSET
        );

        $offset = max(1, $borderWidth * ($borderDoubled ? 2 : 1));
        
        $width = $annotation->getWidth();
        $height = $annotation->getHeight();

        $font = $this->getAppearanceFont();

        $lineHeightFactor = $this->getLineHeightFactor();
        
        $options = $this->getOptions('UTF-16BE');

        $fontSize = $this->getAppearanceFontSize();
        if (0 == $fontSize) {
            $maxStringWidth = 0;
            foreach ($options AS $option) {
                $tmpWidth = $font->getGlyphsWidth($option['visibleValue'], 'UTF-16BE');
                $maxStringWidth = max($tmpWidth, $maxStringWidth);
            }
            $maxStringWidth /= 1000;
            
            $maxWidth = $width - $offset * 4;
                      
            $fontSize = $maxWidth / $maxStringWidth;
            $fontSize = max(4, $fontSize);
            $fontSize = min(12, $fontSize);
        }
        
        $leading = $fontSize * $lineHeightFactor;
        
        // Let's get the offset position and the visible options
        $value = $this->getVisibleValue('UTF-16BE');
        if ($value === null)
            $value = array();
            
        if (!is_array($value))
            $value = array($value);
        
        // Get the top index offset position
        $firstValue = reset($value);
        if ($firstValue === false) {
            $topIndex = 0;
        } else {
            $topIndex = null;
            for ($i = 0, $n = count($options); $i < $n && null === $topIndex; $i++) {
                if ($options[$i]['visibleValue'] == $firstValue)
                    $topIndex = $i;
            }
        }
        
        $optionsCount = count($options);
        $visibleLines = min(
            $optionsCount,
            floor(($height - $borderWidth * ($borderDoubled ? 4 : 2)) / $leading)
        );
        $topIndex = min($optionsCount - $visibleLines, $topIndex);
        
        $tObject = SetaPDF_Core_Type_Dictionary_Helper::resolveDictionaryByAttribute($this->_fieldDictionary, 'T');
        $tObject->offsetSet('TI', new SetaPDF_Core_Type_Numeric($topIndex));
        
        $currentIndices = $this->_getCurrentOptionIndices();
        
        $canvas->write(' /Tx BMC');
        $canvas->saveGraphicState();
        $canvas->path()->rect(
            $offset,
            $offset,
            $width - $offset * 2,
            $height - $offset * 2
        )->clip()->endPath();

        // Draw visible options. Add an additional option (if available) to fill
        // left visible space.
        for ($i = $topIndex; $i < $visibleLines + $topIndex + 1; $i++) {
            if (!isset($options[$i]))
                break;
                
            if (!in_array($i, $currentIndices)) {
                continue;
            }
            
            // Color used by Acrobat for selected options
            SetaPDF_Core_DataStructure_Color_Rgb::writePdfString($canvas, .6, 0.75686, 0.8549, false);
            $canvas->draw()->rect(
                $offset,
                $height - $offset - ($leading * ($i - $topIndex + 1)),
                $width - $offset * 2,
                $leading,
                SetaPDF_Core_Canvas_Draw::STYLE_FILL
            );
        }

        $canvas->text()
            ->begin()
            ->setFont($font, $fontSize);

        $top = $height - $offset - $leading
             - $fontSize * $font->getDescent() / 1000;
        $left = $offset * 2;
        
        $canvas->write(
            // Position
            sprintf(' %.4F %.4F Td', $left, $top) .
            // Leading
            sprintf(' %.4F TL', $leading)
        );
        
        for ($i = $topIndex; $i < $visibleLines + $topIndex + 1; $i++) {
        	if (!isset($options[$i]))
        		break;
        	
        	if (in_array($i, $currentIndices)) {
        	    $canvas->write(' 0 g');
        	} else {
                $this->getAppearanceTextColor()->draw($canvas, false);
        	}
        	
        	$charCodes = $font->getCharCodes($options[$i]['visibleValue']);
        	SetaPDF_Core_Type_String::writePdfString($canvas, join('', $charCodes));
        	$canvas->write(' Tj T*');
        }
        
        $canvas->text()->end();
        $canvas->restoreGraphicState();
        $canvas->write(' EMC');
    }
    
  /* Additional field flags */
    
    /**
     * Checks if the field is a multi select field.
     * 
     * @return boolean
     */
    public function isMultiSelect()
    {
        return $this->isFieldFlagSet(SetaPDF_FormFiller_Field_Flags::MULTI_SELECT);
    }
    
    /**
     * Sets if the field is a multi select field.
     *
     * @param boolean $multiSelect
     * @return void
     */
    public function setMultiSelect($multiSelect = true)
    {
        $currentMultiSelect = $this->isMultiSelect();
        
        // Nothing todo...
        if ($currentMultiSelect == $multiSelect) {
            return;
        }
        
        // rem current values
        if (false == $multiSelect) {
            $value = $this->getValue();
        }
        
        $this->setFieldFlags(SetaPDF_FormFiller_Field_Flags::MULTI_SELECT, $multiSelect);

        // reset the value to the first selected value
        if (false == $multiSelect && !empty($value)) {
            $this->setValue($value[0]);
        }
    }
}