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
	
	$section->writetext('PERM RECRUITMENT CHECKLIST', $fontB, $paraT) ;
	addNewLine(2) ;

	$section->writetext('Dear: ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Mandatory:', $fontB, $paraL) ;
	
	/////////////////////////////
	
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext('Mode of Advertisement', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext('Date[s]', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext('Documented?', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(2, 1) ;
	$cellBF1->writetext('Sunday newspaper Advertisement*', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(3, 1) ;
	$cellBF1->writetext('Sunday newspaper Advertisement*', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(4, 1) ;
	$cellBF1->writetext('Professional Journal Ad* (can replace one Sunday newspaper ad advertisement)', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(5, 1) ;
	$cellBF1->writetext('Notice [provided] posted at place of employment <em>and</em> in any in-house media for 10 business days', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(6, 1) ;
	$cellBF1->writetext('30-day job order with state workforce agency', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	/////////////////////////
	
	$section->writetext('*Ad must contain: ', $fontR, $paraL) ;
	$section->writetext('1. Name of employer;', $fontR, $paraL) ;
	$section->writetext('2. Job Title[s] and any necessary details;', $fontR, $paraL) ;
	$section->writetext('3. Job location [or “travel or relocation required”];', $fontR, $paraL) ;
	$section->writetext('4. Contact Information', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Choose any three:', $fontB, $paraL) ;
	
	/////////////////////////////
	
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext('Other Recruitment Methods', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext('Date[s]', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext('Documented?', $fontB, $paraT) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(2, 1) ;
	$cellBF1->writetext('Job opportunity placed on company website', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(2, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(3, 1) ;
	$cellBF1->writetext('On-campus recruitment', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(3, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(4, 1) ;
	$cellBF1->writetext('Notice posted at Campus Placement Office*', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(4, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(5, 1) ;
	$cellBF1->writetext('Job search website', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(5, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	///////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(6, 1) ;
	$cellBF1->writetext('Job fair', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 2) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(6, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	/////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(7, 1) ;
	$cellBF1->writetext('Employee referral incentive program', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 2) ;
	$cellBF1->writetext('  <bullet> Yes <bullet> No', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(7, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	/////////////////////////
	
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,3,3)) ;
	
	$cellBF1 = $BFTable->getCell(8, 1) ;
	$cellBF1->writetext('Private recruitment firm used', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(8, 2) ;
	$cellBF1->writetext('  <bullet> Yes <bullet> No', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	$cellBF1 = $BFTable->getCell(8, 3) ;
	$cellBF1->writetext('', $fontR, $paraL) ;
	$cellBF1->setBorder($border);
	
	/////////////////////////
	
	$section->writetext('*Only when no experience required', $fontR, $paraL) ;
	
	
	


?>