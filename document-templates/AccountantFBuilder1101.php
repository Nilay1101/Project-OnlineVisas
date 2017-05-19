<?php
	// showLogo('ov-logo.png') ;
	// writeSnippet('vlf_letterhead', 'right') ;
	// Leave space for company letterhead & address etc.
	addNewLine(6) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('US Department of Homeland Security', $fontR, $paraL) ;
	$section->writetext('UCIS', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Dear Immigration Officer:', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext('I handle the financial issues of ' . getFieldLC('l_int_company') . '. Please accept this letter to describe the company from my position', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext(getFieldLC('l_describe_intl_company'), $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('l_int_company') . ' and ' . getFieldLC('petitioner_company_name') . ' are ' . getFieldLC('companies_relationship') . ' with the following ownership interests:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('l_int_company'), $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('l_ic_ownership'), $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('l_usc_ownership'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Relevant documents indicate:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Revenues of ' . getFieldLC('l_int_company') . ' as follows:', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('l_ic_revenues'), $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('l_int_company') . ' has ' . getFieldLC('l_ic_assets') . ' and employs ' . getFieldLC('l_ic_employees') . ' workers.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Sincerely,', $fontR, $paraL);
	addNewLine(1);
	$section->writetext(getFieldLC('intl_accountant'), $fontR, $paraL);
	$section->writetext(getFieldLC('intl_accountant_firm'), $fontR, $paraL);
	
	
	
?>