<?php

	$border = new PHPRtfLite_Border(
    $rtf,                                       
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000')  
);

	$rtf->setLandscape();

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraT) ;
	addNewLine(1) ;
	$section->writetext('DAILY SCHEDULE', $fontB, $paraT) ;
	addNewLine(2) ;
	
	
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext('TIME', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext('MONDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext('TUESDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 4) ;
	$cellBF1->writetext('WEDNESDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 5) ;
	$cellBF1->writetext('THRUSDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 6) ;
	$cellBF1->writetext('FRIDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 7) ;
	$cellBF1->writetext('SATURDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 8) ;
	$cellBF1->writetext('SUNDAY', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(2, 1) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 2) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 3) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 4) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 5) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 6) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 7) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 8) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(3, 1) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 2) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 3) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 4) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 5) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 6) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 7) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 8) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(4, 1) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 2) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 3) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 4) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 5) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 6) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 7) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 8) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(5, 1) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 2) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 3) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 4) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 5) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 6) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 7) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 8) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(6, 1) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 2) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 3) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 4) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 5) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 6) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 7) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 8) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(2,3,3,3,3,3,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(7, 1) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 2) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 3) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 4) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 5) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 6) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 7) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 8) ;
	$cellBF1->writetext(' ', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	addNewLine(1) ;
	$section->writetext('*Daily schedule is subject to change depending on tournament dates.', $fontR, $paraL) ;

	

?>