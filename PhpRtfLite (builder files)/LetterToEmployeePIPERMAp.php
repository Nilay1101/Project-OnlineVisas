<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext(getFieldLC('LAW_FIRM_LOGO'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	showDate();
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_address'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_phone_daytime'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('LETTER TO EMPLOYER: PROCESS AND INSTRUCTIONS FOR PERM APPLICATION', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('Dear: ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('PERM applications for labor certification are submitted on a new form, the ETA-9089, Application for Permanent Employment Certification. It is filed electronically with U.S. Department of Labor (DOL), which has told us to expect to receive an approval within 45 to 60 days if there is no audit. (This may not be a currently accurate estimate.)', $fontR, $paraL) ;
	
	$section->writetext('The ETA 9089 is essentially an attestation that requires "yes" or "no" responses to a series of questions, and requires a description of the job duties, education, and experience/skills, or other requirements. ', $fontR, $paraL) ;
	
	$section->writetext('Supporting documentation is not submitted with the ETA 9089, but, as it must be made available, should the Certifying Officer request it, the employer should maintain the documentation in proper order. The standards for approval of PERM applications remain the same as under the old labor certification process:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('1. Has the employer met the procedural requirements of the regulations?', $fontR, $paraL) ;
	$section->writetext('2. Are there no U.S. workers who are able, willing, qualified, and available? and', $fontR, $paraL) ;
	$section->writetext('3. Will the employment of the foreign national have an adverse effect on the wages and working conditions of U.S. workers similarly employed?', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('DOL will audit certain PERM applications according to criteria internally developed to identify problematic applications and will also conduct random audits. DOL will also provide the employer 30 days to respond with its requested information and/or documentation.', $fontR, $paraL) ;
	
	$section->writetext('Should DOL determine that an application does not meet the standards for certification, the application will be denied and the employer notified. If denied, DOL’s Final Determination will state the reasons for de-termination and outline the procedures available for review of the decision.', $fontR, $paraL) ;
	
	$section->writetext('Once DOL certifies a PERM application, the employer will be notified online. The employer must then sign the ETA 9089 which can then be submitted to the Department of Homeland Security in support of an I-140 immigrant visa petition', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('PERM Process:', $fontB, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Preparation for filing Form ETA 9089 online:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<bullet> Company initiates preparation of PERM application by notifying Attorney;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney sends questionnaire to employer/hiring manager for completion and return, with copies of any current in-house, Internet, and newspaper recruitment/advertising in place for the position to be certified;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney sends questionnaire to the employee for completion and return with educational docu-ments and verification of prior experience related to the labor certification position;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Employer and employee return completed questionnaires (with required support documents) to At-torney;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> If changes to drafts do not require follow-up, based on employer-approved job description and minimum requirement drafts, Attorney submits Prevailing Wage Requests to SWA (State Work-force Agency) for prevailing wage determination (PWD);', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Upon receipt of acceptable PWD, Attorney prepares any necessary draft advertisements, job post-ings, and recruitment instructions, and employer begins recruitment process. Mandatory recruitment steps must be conducted at least 30 days, but no more than 180 days before the filing of the PERM application. (See enclosed Recruitment Instruction/Requirements Sheet);', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney will place a job order for the position with the local SWA for a period of 30 days;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney reviews and verifies that the employees meet the minimum education and experience re-quirements submitted by the employer and, if necessary, will follow-up with employer/employee regarding requirements and collection of support documents;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney drafts job description and minimum requirements (ETA 9089, Sections G & H), and em-ployee qualifications (ETA 9089, Section K) from information provided in the questionnaires and submits to human resources and/or hiring manager and employee for final review;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Employer reviews, makes required changes, finalizes job description and minimum requirements, and returns to Attorney;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Employee reviews qualifications draft, makes required changes, and submits to Attorney for final-izing;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney will collect documentation of recruitment efforts from newspapers and employer;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> Attorney will prepare a recruitment report, including documentation of advertising or other recruit-ment efforts, and written evaluations from HR and hiring manager explaining work-related reasons for elimination of candidates for the position;', $fontR, $paraL) ;
	
	$section->writetext('<bullet> When collection of all required information from the employer and employee is verified, Attorney will submit Form ETA 9089 to DOL.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraR) ;
	$section->writetext('[Attorney]', $fontB, $paraR) ;
	
	



?>