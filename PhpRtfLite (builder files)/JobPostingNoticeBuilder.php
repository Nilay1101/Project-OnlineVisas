<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('JOB POSTING NOTICE', $fontR, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('THIS NOTICE IS BEING PROVIDED AS A RESULT OF, AND IN CONNECTION WITH, THE FILING OF A PERMANENT ALIEN LABOR CERTIFICATION APPLICATION FOR THE JOB OPPORTUNITY IDENTIFIED BELOW. ANY PERSON MAY PROVIDE DOCUMENTARY EVIDENCE BEARING ON THE APPLICATION TO THE CERTIFYING OFFICER OF THE DEPARTMENT OF LABOR.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('U.S. Department of Labor', $fontR, $paraL) ;
	$section->writetext('Employment and Training Administration', $fontR, $paraL) ;
	$section->writetext('Chicago National Processing Center', $fontR, $paraL) ;
	$section->writetext('Railroad Retirement Board Building', $fontR, $paraL) ;
	$section->writetext('844 N Rush Street, 12th Floor', $fontR, $paraL) ;
	$section->writetext('Chicago, IL  60611', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('OR', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('U.S. Department of Labor', $fontR, $paraL) ;
	$section->writetext('Employment and Training Administration', $fontR, $paraL) ;
	$section->writetext('Harris Tower', $fontR, $paraL) ;
	$section->writetext('233 Peachtree Street, Suite 410', $fontR, $paraL) ;
	$section->writetext('Atlanta, GA 30303', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('position_job_title') . ' needed to work in ' . getFieldLC('Work_sites') . ' ' . getFieldLC('various_work_sites') . '. ' . getFieldLC('job_duty_title_description_1') . '. ' . getFieldLC('job_duty_specific_description_1') . '. ' . getFieldLC('job_duty_title_description_2') . '. ' . getFieldLC('job_duty_specific_description_2') . '. ' . getFieldLC('job_duty_min_reqs_1') . ', ' . getFieldLC('job_duty_min_reqs_2') . '. All experience may be acquired concurrently. ' . getFieldLC('travel_required') . '. Will accept any suitable combination of education, training and/or experience.' . getFieldLC('base_salary') . '.' ,$fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('CONTACT:', $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_address'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_phone_daytime'), $fontR, $paraL) ;
	
	
	



?>