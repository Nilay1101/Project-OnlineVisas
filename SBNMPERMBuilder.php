<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('SUPPLEMENTAL BUSINESS NECESSITY MEMORANDUM FOR PERM AUDIT FILE', $fontB, $paraT) ;
	addNewLine(2) ;
	
	showDate();
	
	$section->writetext('TO: PERM FILE', $fontR, $paraL) ;
	
	$section->writetext('FROM: ' . getFieldLC('petitioner_primary_contact') . ' ' . getFieldLC('petitioner_contact_position') . ' ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	
	$section->writetext('TOPIC: JUSTIFICATION OF JOB REQUIREMENTS ON THE BASIS OF BUSINESS NECESSITY', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext('<hr>', $fontR, $paraL) ;
	
	$section->writetext('This memorandum is written as a supplement to the Application for Permanent Employment Certifica-tion file. ' . getFieldLC('petitioner_company_name') . ' seeks to hire someone for the permanent position of ' . getFieldLC('position_job_title') . '.', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('position_job_title') . ' will:', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('position_job_title') . ' needed to work in ' . getFieldLC('Work_sites') . ' ' . getFieldLC('various_work_sites') . '. ' . getFieldLC('job_duty_title_description_1') . '. ' . getFieldLC('job_duty_specific_description_1') . '. ' . getFieldLC('job_duty_title_description_2') . '. ' . getFieldLC('job_duty_specific_description_2') . '.', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . ' has determined that the qualified applicant for this position must possess:', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('job_duty_min_reqs_1') . '. ' . getFieldLC('job_duty_min_reqs_2') . '.', $fontR, $paraL) ;
	
	$section->writetext('This document assesses the educational and experiential requirements for this position. As discussed below, it is our position that the advertised education and experience requirements for the position are slightly higher than those normally required for this occupation and therefore must be justified by business necessity. Specifically, we believe that the duties involved in this position most closely resemble those attached to the occupational title of "' . getFieldLC('ONET_name') . '" (SOC/O*NET Code ' . getFieldLC('soc_onet_code') . '). According to the Occupa-tional Information Network (O*NET), occupations that fall within this particular O*NET Code are assigned a job_zone. The Department of Labor has therefore determined that the Specific Vocational Preparation (SVP) level for this occupational title is ' . getFieldLC('SVP_level') . '. The SVP (specific vocational preparation) training time permitted for an occupation.  DOL has determined the SVP for each occupation, employers may not set higher requirements the SVP, without documentation of business necessity. In light of the assigned O*NET Job and Education Zones and the SVP levels, our requirements justified by the following business necessity:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('job_duty_business_necessity_1') . '.', $fontR, $paraL) ;
	$section->writetext(getFieldLC('job_duty_business_necessity_2') . '.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('"Business Necessity" is defined in <em>Matter of Information Industries</em>, 88-INA-92 (BALCA Feb. 9, 1989) and codified in 20 CFR §656.17(h), which states: “To establish a business necessity, an employer must demonstrate the duties and requirements bear a reasonable relationship to the occupation in the context of the employer’s business and are essential to perform the job in a reasonable manner.” Under the first prong of Information Industries, both duties and requirements must be linked to the employer’s specific business operations to determine whether they are reasonable in that context. Under the second prong, the duties and requirements must be related to one another, and reasonably suited, in the context of the employer’s busi-ness operations.', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . ' meets the first and second prongs discussed above.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('The following provides a review of these O*NET descriptions:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('ONET_position_description'), $fontR, $paraL) ;
	
	$section->writetext('We respectfully request that based upon the information above, you agree that ' . getFieldLC('petitioner_company_name') . '’s position_job_title required the additional requirements because of business necessity. ', $fontR, $paraL) ;
	addNewLine(3) ;
	
	$section->writetext('_______________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('[Date]', $fontR, $paraL) ;
	
	

?>