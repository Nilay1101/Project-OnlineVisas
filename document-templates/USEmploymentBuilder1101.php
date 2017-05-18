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
	
	$section->writetext('Dear Immigration Officer:', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext('My name is' . ' ' . $getFieldLCarray['US_employment_letter_signator'] . '. I am' . ' ' . $getFieldLCarray['Title_US_employment_letter_signator'] . ' of the ' . $getFieldLCarray['petitioner_company_name'] . '.',$fontR, $paraL);
	addNewLine(1) ;
	
	
	$section->writetext($getFieldLCarray['petitioner_company_name'] . ' is ' . $getFieldLCarray['L_Describe_US_Company'], $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('We deek to employ ' . $getFieldLCarray['beneficiary_name_first'] . ' ' . $getFieldLCarray['beneficiary_name_last'] . ' in the position of ' . $getFieldLCarray["L_Beneficiary's_US_Position"] . '.', $fontR, $paraL);
	addNewLine(2);
	
	$section->writetext('The position meets the L-1A requirement of an executive or managerial position based upon the following duties:', $fontR, $paraL);
	addNewLine(1);
	$section->writetext($getFieldLCarray['L_Category_Duty_USC_1'], $fontR, $paraL);
	addNewLine(1);
	$section->writetext($getFieldLCarray['L_Category_Duty_USC_2'], $fontR, $paraL);
	addNewLine(1);
	$section->writetext($getFieldLCarray['L_Category_Duty_USC_3'], $fontR, $paraL);
	addNewLine(2);
	
	$section->writetext($getFieldLCarray['beneficiary_title'] . ' ' . $getFieldLCarray['beneficiary_name_last'] . ' will be employed for the term of ' . $getFieldLCarray["L_Beneficiary's_term_employment"] . '. The salary will be ' . $getFieldLCarray["L_Beneficiary's_Salary"] . '.', $fontR, $paraL);
	addNewLine(2);
	
	$section->writetext('Sincerely,', $fontR, $paraL);
	addNewLine(2);
	$section->writetext($getFieldLCarray['US_employment_letter_signator'], $fontR, $paraL);
	$section->writetext($getFieldLCarray['Title_US_employment_letter_signator'] . ', ' . $getFieldLCarray['petitioner_company_name'] , $fontR, $paraL);
	
?>