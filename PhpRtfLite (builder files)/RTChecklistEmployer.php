<?php

	$border = new PHPRtfLite_Border(
    $rtf,                                       
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000'), 
    new PHPRtfLite_Border_Format(1, '#000000')  
);

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	//$section->writetext(getFieldLC('LAW_FIRM_LOGO'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	showDate();
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_address'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_phone_daytime'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('PERM RECRUITMENT TRACKING WORKSHEET FOR EMPLOYER', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext('Applicant', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext('Date Interviewed', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext('Letter Sent', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 4) ;
	$cellBF1->writetext('Reason for Disqualification', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(2, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(3, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(4, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(5, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(6, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(7, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(8, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(8, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(8, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(8, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(9, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(9, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(9, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(9, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(10, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(10, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(10, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(10, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(11, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(11, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(11, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(11, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(12, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(12, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(12, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(12, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(13, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(13, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(13, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(13, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(4,3,3,6)) ;
	
	$cellBF1 = $BFTable->getCell(14, 1) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(14, 2) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(14, 3) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(14, 4) ;
	$cellBF1->writetext('', $fontB, $paraT) ;
	$cellBF1->setBorder($border);

	////////////////////////////
?>