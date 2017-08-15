<?php
	
	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('International Sports and Entertainment Agency, dba Velie Law Firm, PLLC', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Dear USCIS Official:', $fontR, $paraL) ;
	$section->writetext('International Sports and Entertainment Agency-ISEA, a dba of Velie Law Firm, PLLC, seeks to obtain a P-1 visa as agent on behalf of ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' , in the field of ' . getFieldLC('p_1_sport') . ' as a ' . getFieldLC('position_job_title') . ' . ', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('International Recognition of Exceptional Ability', $fontB, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' is a ' . getFieldLC('beneficiary_bio') , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Sponsorship', $fontB, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('ISEA has entered into an agreement for ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' to be professionally active in the United States during the following time period: ' . getFieldLC('visa_duration') . ' . ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' will ' . getFieldLC('ben_activities'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Jon Velie', $fontR, $paraL) ;
	$section->writetext('President of ', $fontR, $paraL) ;
	$section->writetext('Velie Law Firm, PLLC', $fontR, $paraL) ;
	
	
	





?>