<?php
/**
 * This file is part of the SetaPDF-Core Component
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Reader
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: FilePath.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

/**
 * A simple class representing a file path.
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @category   SetaPDF
 * @package    SetaPDF_Core
 * @subpackage Reader
 * @license    http://www.setasign.com/ Commercial
 */
class SetaPDF_Core_Reader_FilePath
{
    /**
     * The file path
     *
     * @var string
     */
    protected $_path;

    /**
     * The constructor
     *
     * @param string $path
     */
    public function __construct($path)
    {
        $this->setPath($path);
    }

    /**
     * Set the path.
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->_path = (string)$path;
    }

    /**
     * Get the path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->_path;
    }
}