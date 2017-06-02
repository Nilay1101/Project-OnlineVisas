<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	$section->writetext('Department of Homeland Security', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('RE: '  . getFieldLC('Visa_Type') . ' on behalf of ' . getFieldLC('Beneficiary_Title')  . ' ' . getFieldLC('Beneficiary_Name'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('To Whom It May Concern:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('My name is ' . getFieldLC('P_1_peer') . ' and I hold the position of ' . getFieldLC('p_1_official_title') . ' with the ' . getFieldLC('p_1_peer_group') . ' . After reviewing the accomplishments of ' . getFieldLC('Beneficiary_Title')  . ' ' . getFieldLC('Beneficiary_Name') . ' , I have no objection to this ' . getFieldLC('Visa_Type') . ' visa application to train and compete in ' . getFieldLC('p_1_sport') . ' competitions in the USA', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('P_1_peer'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('p_1_official_title'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('p_1_peer_group'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('p_1_official_contact'), $fontR, $paraL) ;
	
	
	
	

?>