<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('EMPLOYER RECRUITMENT MEMORANDUM FOR PERM AUDIT', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('TO: PERM FILE FOR ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$section->writetext('FROM ' . getFieldLC('petitioner_primary_contact') . ' ' . getFieldLC('petitioner_contact_position') . ' ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext('RE: RECRUITMENT RESULTS FOR THE PERMANENT EMPLOYMENT APPLICATION FILED ON BEHALF OF ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	showDate();
	addNewLine(1) ;
	
	$section->writetext('This memorandum is written to confirm the recruitment effort completed by ' . getFieldLC('petitioner_company_name') . ' for the position of ' . getFieldLC('position_job_title') . '. As discussed below, despite our advertising efforts for this position, we have not been able to find a qualified and available U.S. worker to perform all of the duties that are required for the ' . getFieldLC('position_job_title') . '.', $fontR, $paraL) ;
	
	$section->writetext('We are filing this PERM Application for the position of ' . getFieldLC('position_job_title') . '. The ' . getFieldLC('position_job_title') . ' will be responsible for the performance of the following duties:', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('job_duty_title_description_1') . '. ' . getFieldLC('job_duty_specific_description_1') . '. ' . getFieldLC('job_duty_title_description_2') . '. ' . getFieldLC('job_duty_specific_description_2') . '. ' . getFieldLC('job_duty_min_reqs_1') . '. ' . getFieldLC('job_duty_min_reqs_2') . '.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('We obtained the required Prevailing Wage Determination (PWD) for this position of ' . getFieldLC('prev_wage') . ' per annum pursuant to ' . getFieldLC('prev_wage_source') . '.', $fontR, $paraL) ;
	
	$section->writetext('Despite our advertising efforts, we were unable to find a qualified and available U.S. worker who pos-sessed the requisite education and employment experience necessary to perform the duties of the ' . getFieldLC('position_job_title') . ' position. We conducted recruitment efforts that complied with the PERM requirements for a professional position. Specifically, we ran advertisements for the position of ' . getFieldLC('position_job_title') . ' in the ' . getFieldLC('Name_Newspaper') . ' New York Post on the Sundays of ' . getFieldLC('dates_newspaper') . '. These advertisements satisfied the two Sunday advertisements required by the PERM regulations', $fontR, $paraL) ;
	
	$section->writetext('We also satisfied the three additional recruitment steps by placing advertisements for the ' . getFieldLC('position_job_title') . ' on ' . getFieldLC('additional_recruiting') . '.', $fontR, $paraL) ;
	
	$section->writetext('We also placed a job order for the position of ' . getFieldLC('position_job_title') . ' with the ' . getFieldLC('name_swa') . ' for the required 30-day period, from ' . getFieldLC('swa_dates') . '.', $fontR, $paraL) ;
	
	$section->writetext('Finally, we posted the job vacancy for the position of ' . getFieldLC('position_job_title') . ' internally at our place of business from ' . getFieldLC('internal_posting_dates') . ', in satisfaction of the notice of filing requirements of 20 CFR §656.10(d).', $fontR, $paraL) ;
	
	$section->writetext('In response to our recruitment efforts. ' . getFieldLC('recruitment_report_info'), $fontR, $paraL) ;
	
	$section->writetext('In contrast, ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' is exceptionally well-qualified for the position of ' . getFieldLC('position_job_title') . ' with ' . getFieldLC('petitioner_company_name') . '. ', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' possesses the required qualifications as follows:', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('Ben_degrees') . '. ' . getFieldLC('job_duty_ben_qual_1') . '. ' . getFieldLC('job_duty_ben_qual_2') . '. ' . getFieldLC('Ben_experience_reference_1') . '. ' , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Based on the lack of qualified and available U.S. workers for the position of Senior Consultant, Risk Man-agement IT, as well as our continuing need for the services of a Senior Consultant, Risk Management IT, we wish to offer the permanent position of ' . getFieldLC('position_job_title') . ' to ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' and file this PERM Application.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('____________________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	
	
	
	
	
	
	
	




?>