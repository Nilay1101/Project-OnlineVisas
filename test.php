<?php
require_once 'PHPRtfLite/PHPRtfLite.php';

// registers PHPRtfLite autoloader (spl)
PHPRtfLite::registerAutoloader();
// rtf document instance
$rtf = new PHPRtfLite();
// add section
$sect = $rtf->addSection();
// write text
$sect->writeText('Hello world!', new PHPRtfLite_Font(), new PHPRtfLite_ParFormat());

// save rtf document to hello_world.rtf
$rtf->save('hello_world.rtf');
?>