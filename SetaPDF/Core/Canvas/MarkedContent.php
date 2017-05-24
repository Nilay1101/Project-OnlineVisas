<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: MarkedContent.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A canvas helper class for marked content operators
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Canvas
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Canvas_MarkedContent extends SetaPDF_Core_Canvas_Operators
{
    /**
     * Begin a marked content sequence.
     * 
     * @param string $tag
     * @param SetaPDF_Core_Resource $properties
     * @return SetaPDF_Core_Canvas_MarkedContent
     */
    public function begin($tag, SetaPDF_Core_Resource $properties = null)
    {
        SetaPDF_Core_Type_Name::writePdfString($this->_canvas, $tag);
        if (null === $properties) {
            $this->_canvas->write(" BMC\n");
        } else {
            $name = $this->_canvas->addResource($properties);
            SetaPDF_Core_Type_Name::writePdfString($this->_canvas, $name);
            $this->_canvas->write(" BDC\n");
        }
        
        return $this;
    }
    
    /**
     * End a marked content stream.
     * 
     * @return SetaPDF_Core_Canvas_MarkedContent
     */
    public function end()
    {
        $this->_canvas->write("\nEMC\n");
        
        return $this;
    }

    // TODO: MP and DP
}