<?php
/**
 * This file is part of the SetaPDF-Core Component
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Geometry
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Point.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * Class representing a point
 * 
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Geometry
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Geometry_Point
{
    /**
     * The x coordinate value
     * 
     * @var float
     */
    protected $_x = 0.0;
    
    /**
     * The y coordinate value
     * 
     * @var float
     */
    protected $_y = 0.0;
    
    /**
     * The constructor.
     * 
     * @param float $x The x coordinate
     * @param float $y The y coordinate
     */
    public function __construct($x, $y)
    {
        $this->_x = (float)$x;
        $this->_y = (float)$y;
    }
    
    /**
     * Get the x coordinate value.
     * 
     * @return float
     */
    public function getX()
    {
        return $this->_x;
    }
    
    /**
     * Set the x coordinate value.
     *
     * @param float $x The new x coordinate
     */
    public function setX($x)
    {
        $this->_x = (float)$x;
    }
    
    /**
     * Get the y coordinate value.
     *
     * @return float
     */
    public function getY()
    {
        return $this->_y;
    }
    
    /**
     * Set the y coordinate value.
     *
     * @param float $y The new y coordinate
     */
    public function setY($y)
    {
    	$this->_y = (float)$y;
    }
    
    /**
     * Compares a point against this one.
     * 
     * @param SetaPDF_Core_Geometry_Point $point Compare point
     * @return boolean
     */
    public function isEqual(SetaPDF_Core_Geometry_Point $point)
    {
    	return (
    	    (abs($this->_x - $point->getX()) < SetaPDF_Core::FLOAT_COMPARISON_PRECISION) &&
			(abs($this->_y - $point->getY()) < SetaPDF_Core::FLOAT_COMPARISON_PRECISION)
    	);
    }
    
    
    /* TODO: implement further methods:
     * 
    public function inRect(SetaPDF_Core_Geometry_Rect $rect)
    {
    
    }
    
    */
}