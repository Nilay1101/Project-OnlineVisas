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
	$section->writetext('Re: ' . $getFieldLCarray['visa_type'] . ' Petition of ' . $getFieldLCarray['beneficiary_name_first'] . ' ' . $getFieldLCarray['beneficiary_name-last'], $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Dear Immigration Officer:', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext($getFieldLCarray['petitioner_company_name'] . ' and ' . $getFieldLCarray['L_Int_Company'] . ' are ' . $getFieldLCarray['Companies_Relationship'],$fontR, $paraL);
	addNewLine(2) ;
	
	
	$section->writetext('Information on the US Company is as follows:', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('Description:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_Describe_US_Company'], $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('State established:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_State_Incorp_USC'], $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('Date established:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_Date_Incorp_USC'], $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company is owned by the following:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_USC_Ownership'], $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company has the following employees:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_USC_Employees'], $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company Annual revenues:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_USC_Revenue'], $fontR, $paraL);
	addNewLine(1);
	
	$section->writetext('US Company Assets, if any:', $fontR, $paraL);
	$section->writetext($getFieldLCarray['L_USC_Assets'], $fontR, $paraL);
	addNewLine(2);
	
	$section->writetext('Sincerely,', $fontR, $paraL);
	addNewLine(2);
	$section->writetext($getFieldLCarray['US_accountant'], $fontR, $paraL);
	$section->writetext($getFieldLCarray['US_accountant_firm'], $fontR, $paraL);
	
?>