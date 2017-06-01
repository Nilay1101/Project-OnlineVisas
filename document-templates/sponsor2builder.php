<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext('CONTRACT FOR SPONSORSHIP', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('Between:', $fontR, $paraL) ;
	$section->writetext(getFieldLC('Sponsor_2_Name'), $fontR, $paraL) ;
	$section->writetext('And:', $fontR, $paraL) ;
	$section->writetext(getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('THE PARTIES HEREBY AGREE AS FOLLOWS:', $fontB, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('The <strong>Contract</strong> is from ' . getFieldLC('start_end_date_Sponsor_2'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('Sponsor_2_Name') . ' agrees to pay ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' ' . getFieldLC('sponsor_2_salary'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('By signing this agreement, ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' hereby agree to:', $fontR, $paraL);
	$section->writetext(getFieldLC('Ben_duties_Sponsor_2'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('By signing this agreement, ' . getFieldLC('Sponsor_1_Name') . ' hereby agree to:', $fontR, $paraL);
	$section->writetext(getFieldLC('sponsor_duties_ben_2'), $fontR, $paraL);
	addNewLine(2) ;
	
	$section->writetext('Signature:', $fontR, $paraL) ;
	$section->writetext(' ', $fontR, $paraL) ;
	$section->writetext(' ', $fontR, $paraL) ;
	$section->writetext('____________________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	
	$section->writetext(' ', $fontR, $paraL) ;
	$section->writetext(' ', $fontR, $paraL) ;
	$section->writetext('____________________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('Sponsor_2_Signator_Name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('Sponsor_2_Name'), $fontR, $paraL) ; 



?>