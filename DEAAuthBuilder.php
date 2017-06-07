<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	$section->writetext('Department of Homeland Security', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Immigration Official:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . ' hereby authorizes ' . getFieldLC('agency_name') . ' to represent ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' in agent based petition for a P-1 visa. ' . getFieldLC('petitioner_company_name') . ' will be the direct sponsor of ' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . ' for the duration of the visa unless terminated by either party.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_contact_phone_daytime'), $fontR, $paraL) ;
	addNewLine(1) ;

?>