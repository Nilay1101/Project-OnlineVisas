<?php  $section->writetext('', $fontR, $paraL) ;
	// showLogo('ov-logo.png') ;
	// writeSnippet('vlf_letterhead', 'right') ;
	// Leave space for company letterhead & address etc.
	addNewLine(6) ;
	
	showDate();
	addNewLine(2) ;
	$section->writetext('UCIS', $fontR, $paraL) ;
	addNewLine(2) ;
	$section->writetext('Re: L-1A Visa Petition of ' . getFieldLC('petitioner_company_name') . ' on behalf of ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL );
	addNewLine(2) ;
	
	$section->writetext('Dear Immigration Officer:', $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext('My name is ' . getFieldLC('Intl_employment_letter_signator') . '. I hold the position of ' . getFieldLC('Title_Intl_employment_letter_signator') . ' for ' . getFieldLC('L_Int_Company') . '.', $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext(getFieldLC('L_Int_Company') . ' is a company based in ' . getFieldLC('L_Place_Incorp_IC') . ' and ' . getFieldLC('petitioner_company_name') . ' is a '. getFieldLC('L_State_Incorp_USC') . ' entity.', $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' held the ' . getFieldLC('L_Beneficiary_IC_Position') . ' position at ' . getFieldLC('L_Int_Company') . ' since ' . getFieldLC('L_Beneficiary_Start_Date_IC') . '. The job was located at ' . getFieldLC('L_Beneficiary_work_venue_IC') . '.', $fontR, $paraL) ;
	addNewLine(2);
	
	$section->writetext(getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . "’s duties for the " . getFieldLC('L_Beneficiary_IC_Position') . ' position included:', $fontR, $paraL );
	addNewLine(1);
	$section->writetext(getFieldLC('L_Category_Duty_IC_1'), $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext(getFieldLC('L_Category_Duty_IC_2'), $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext(getFieldLC('L_Category_Duty_IC_3'), $fontR, $paraL) ;
	addNewLine(2);
	
	$section->writetext('Sincerely,', $fontR, $paraL);
	addNewLine(1);
	$section->writetext(getFieldLC('Intl_employment_letter_signator'), $fontR, $paraL);
	$section->writetext(getFieldLC('Title_Intl_employment_letter_signator'), $fontR, $paraL);
	$section->writetext(getFieldLC('L_Int_Company'), $fontR, $paraL);
	
	
	
	
?>