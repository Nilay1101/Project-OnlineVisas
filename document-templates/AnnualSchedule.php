<?php

	$border = new PHPRtfLite_Border(
    $rtf,                                       
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000')  
);

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraT) ;
	addNewLine(1) ;
	$section->writetext('ANNUAL TOURNAMENT SCHEDULE', $fontB, $paraT) ;
	addNewLine(2) ;
	
	
	$section->writetext('Year 1 (20__)', $fontR, $paraT) ;
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(5,5,5)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext('[Insert Date of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext('[Insert Name of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext('[Insert Place of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(5,5,5)) ;
	
	$cellBF1 = $BFTable->getCell(2, 1) ;
	$cellBF1->writetext('[Insert Date of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 2) ;
	$cellBF1->writetext('[Insert Name of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 3) ;
	$cellBF1->writetext('[Insert Place of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	//////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(5,5,5)) ;
	
	$cellBF1 = $BFTable->getCell(3, 1) ;
	$cellBF1->writetext('[Insert Date of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 2) ;
	$cellBF1->writetext('[Insert Name of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 3) ;
	$cellBF1->writetext('[Insert Place of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	/////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(5,5,5)) ;
	
	$cellBF1 = $BFTable->getCell(4, 1) ;
	$cellBF1->writetext('[Insert Date of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 2) ;
	$cellBF1->writetext('[Insert Name of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 3) ;
	$cellBF1->writetext('[Insert Place of Event]', $fontR, $paraT) ;
	$cellBF1->setBorder($border);
	
	addNewLine(1) ;
	$section->writetext('***This is a prospective schedule that is subject to change due to future tournament dates and results.', $fontR, $paraL) ;
	
?>