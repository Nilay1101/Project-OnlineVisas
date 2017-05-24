<?php
/**
 * This file is part of the SetaPDF package
 *
 * @copyright  Copyright (c) 2017 Setasign - Jan Slabon (http://www.setasign.com)
 * @package    SetaPDF
 * @license    http://www.setasign.com/ Commercial
 * @version    $Id: Autoload.php 1031 2017-03-17 07:06:12Z timo.scholz $
 */

spl_autoload_register(function($class)
{
    static $path = null;

    if (strpos($class, 'SetaPDF_') === 0) {
        if (null === $path) {
            $path = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . '..');
        }

        $filename = str_replace('_', '/', $class) . '.php';
        $fullpath = $path . DIRECTORY_SEPARATOR . $filename;

        if (file_exists($fullpath)) {
            /** @noinspection PhpIncludeInspection */
            require_once $fullpath;
        }
    }
});