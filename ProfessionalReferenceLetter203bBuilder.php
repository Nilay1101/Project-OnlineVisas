<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('PROFESSIONAL REFERENCE LETTER FOR APPLICANT UNDER §203(b)', $fontB, $paraT) ;
	addNewLine(2) ;

	showDate();
	addNewLine(1) ;
	
	$section->writetext('U.S. Citizenship and Immigration Services', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Re: ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Dear Sir or Madam:', $fontR, $paraL) ;
	
	$section->writetext('My name is ' . getFieldLC('signator_name_reference_1') . '. I hold or have held the position of ' . getFieldLC('title_signator_reference_1') . ' with ' . getFieldLC('company_reference_1') . '. My background is as follows: ' . getFieldLC('Bio_signator_reference_1') . '.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('My understanding of ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' at ' . getFieldLC('company_name') . ' is as follows:', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('Ben_experience_reference_1'), $fontR, $paraL) ;
	
	$section->writetext('If I can provide you with any further information, please feel free to contact me.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraR) ;
	$section->writetext(getFieldLC('signator_name_reference_1'), $fontR, $paraR) ;
	
	addNewLine(1) ;
	
	$section->writetext('<em><strong>Note</strong>: This letter is offered as a guide only. Changes can and must be made in order to make it more accu-rate.</em>', $fontR, $paraL) ;
	

?>