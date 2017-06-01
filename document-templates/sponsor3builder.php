<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext('SPONSORSHIP AGREEMENT', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('THIS AGREEMENT is made and entered into between '. getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') .' and ' . getFieldLC('Sponsor_3_Name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Term:', $fontB, $paraL);
	$section->writetext('The term period of employment hereunder is from ' . getFieldLC('start_end_date_Sponsor_3'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('Sponsor_3_Name') . ' agrees to pay ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' ' . getFieldLC('sponsor_3_salary'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('By signing this agreement, ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' hereby agree to perform the following:', $fontR, $paraL);
	$section->writetext(getFieldLC('Ben_duties_Sponsor_3'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('By signing this agreement, ' . getFieldLC('Sponsor_3_Name') . ' hereby agrees to perform the following:', $fontR, $paraL);
	$section->writetext(getFieldLC('sponsor_duties_ben_3'), $fontR, $paraL);
	addNewLine(2) ;
	
	$section->writetext('IN WITNESS WHEREOF, the parties have hereunto set their hands as of the date and year first indicated above.', $fontR, $paraL) ;
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
	$cellBFR->writetext(getFieldLC('Sponsor_3_Signator_Name'), $fontR, $paraL) ;
	$cellBFR->writetext(getFieldLC('Sponsor_3_Name'), $fontR, $paraL) ; 



?>