<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext(getFieldLC('Sponsor_1_Name') . ' ' . 'Agreement', $fontB, $paraT) ;
	addNewLine(2) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('Definitions:', $fontB, $paraL) ;
	$section->writetext('Company is ' . getFieldLC('Sponsor_1_Name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('Position_job_title') . ' is ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Term', $fontB, $paraL);
	$section->writetext('The Term of this contract is from ' . getFieldLC('start_end_date_Sponsor_1'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('Sponsor_1_Name') . ' agrees to pay ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' ' . getFieldLC('sponsor_1_salary'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('By signing this agreement, ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' hereby agree to the following:', $fontR, $paraL);
	$section->writetext(getFieldLC('Ben_duties_Sponsor_1'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('By signing this agreement, ' . getFieldLC('Sponsor_1_Name') . ' hereby agree to the following:', $fontR, $paraL);
	$section->writetext(getFieldLC('sponsor_duties_ben_1'), $fontR, $paraL);
	
	addNewLine(2) ;
	
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(10,10)) ;
	
	$cellBFL = $BFTable->getCell(1, 1) ;

	$cellBFL->writetext('Signed:', $fontR, $paraL) ;
	$cellBFL->writetext(' ', $fontR, $paraL) ;
	$cellBFL->writetext(' ', $fontR, $paraL) ;
	$cellBFL->writetext('____________________', $fontR, $paraL) ;
	$cellBFL->writetext(getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	
	$cellBFR = $BFTable->getCell(1, 2) ;
	
	$cellBFR->writetext('Signed:', $fontR, $paraL) ;
	$cellBFR->writetext(' ', $fontR, $paraL) ;
	$cellBFR->writetext(' ', $fontR, $paraL) ;
	$cellBFR->writetext('____________________', $fontR, $paraL) ;
	$cellBFR->writetext(getFieldLC('Sponsor_1_Signator_Name'), $fontR, $paraL) ;
	$cellBFR->writetext(getFieldLC('Sponsor_1_Name'), $fontR, $paraL) ; 
	


?>