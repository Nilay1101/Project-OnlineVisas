<?php
	// showLogo('ov-logo.png') ;
	// writeSnippet('vlf_letterhead', 'right') ;
	// Leave space for company letterhead & address etc.
	addNewLine(10) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('US Department of Homeland Security', $fontR, $paraL) ;
	$section->writetext('UCIS', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Re: ' . getFieldLC('visa_type') . ' Petition of ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Dear Immigration Officer:', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('petitioner_company_name') . ' and ' . getFieldLC('L_Int_Company') . ' are ' . getFieldLC('Companies_Relationship'),$fontR, $paraL);
	addNewLine(2) ;
	
	
	$section->writetext('Information on the US Company is as follows:', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('Description:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_Describe_US_Company'), $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('State established:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_State_Incorp_USC'), $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('Date established:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_Date_Incorp_USC'), $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company is owned by the following:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_USC_Ownership'), $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company has the following employees:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_USC_Employees'), $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company Annual revenues:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_USC_Revenue'), $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company Assets, if any:', $fontR, $paraL);
	$section->writetext(getFieldLC('L_USC_Assets'), $fontR, $paraL);
	addNewLine(2);
	
	$section->writetext('Sincerely,', $fontR, $paraL);
	addNewLine(2);
	$section->writetext(getFieldLC('US_accountant'), $fontR, $paraL);
	$section->writetext(getFieldLC('US_accountant_firm'), $fontR, $paraL);
	
?>