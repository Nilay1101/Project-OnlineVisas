<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_address'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_phone_daytime'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Re: ' . getFieldLC('position_job_title'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('PERM JOB DESCRIPTION', $fontR, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('Dear ' . getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	
	$section->writetext('The following is the proposed text of your company’s advertisement for its PERM labor certification application. If the ad is acceptable, please sign and date your approval at the spaces provided below.', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . ' - ' . getFieldLC('position_job_title') . ' (' . getFieldLC('full_time') . '; ' .  getFieldLC('multiple_positions') . ')', $fontB, $paraL) ;
	
	$section->writetext(getFieldLC('position_job_title') . ' needed to work in ' . getFieldLC('Work_sites') . ' ' . getFieldLC('various_work_sites') . '. ' . getFieldLC('job_duty_title_description_1') . '. ' . getFieldLC('job_duty_specific_description_1') . '. ' . getFieldLC('job_duty_title_description_2') . '. ' . getFieldLC('job_duty_specific_description_2') . '. ' . getFieldLC('job_duty_min_reqs_1') . ', ' . getFieldLC('job_duty_min_reqs_2') . '. All experience may be acquired concurrently. ' . getFieldLC('travel_required') . '. Will accept any suitable combination of education, training and/or experience. Equal Oppurtunity Employer M/F/D/V. Please apply online at: ' . getFieldLC('beneficiary_contact_email') . '.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Approved by:_______________', $fontR, $paraL) ;
	$section->writetext('Approved by Signature:_______________', $fontR, $paraL) ;
	$section->writetext('Date:_______________', $fontR, $paraL) ;
	
	

?>