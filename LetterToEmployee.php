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
	
	$section->writetext('PERM LETTER TO EMPLOYER', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('Re: Permanent Employment Application on behalf of [Employee] for the Position of Senior Consultant, Risk Management IT ', $fontB, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Dear: ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('This letter seeks to inform you of the procedures to be followed by employers who file an application for permanent labor certification under the Program Electronic Review Management (PERM) program. As this is an employment-based petition, it requires the complete participation and cooperation of the employer. The failure to participate and cooperate in this entire process may result in the employer being audited or the PERM application being denied. ', $fontR, $paraL) ;

	$section->writetext('On December 27, 2004, the procedures for employers to sponsor foreign nationals for employment-based immigration changed as the U.S. Department of Labor (DOL) published the final regulation for the PERM program. The new procedure, which took effect on March 28, 2005, includes, in addition to extensive recruitment requirements, a document retention requirement. Under the regulations at 20 CFR §656.10(f) and 69 Fed. Reg. 77,326, 77,390 (Dec. 27, 2004), an employer must keep copies of the labor certification application and all supporting documents for a period of five years from the date that the PERM application is filed. In this regard, the employer must retain copies of the following documents: the labor certification application; the recruitment report; all tearsheets and internet and internal postings confirming the completion of the recruitment effort; all resumes received and assessment reports completed in response to the recruitment effort; and the prevailing wage determination. ', $fontR, $paraL) ;
	
	$section->writetext('Although the recruitment report is an internal document, an employer must prepare a report in the event that the PERM application is selected for an audit or for supervised recruitment. Audits may be triggered randomly or based on the employer’s answers to certain questions on the PERM application. Problematic applications will be identified through a computerized system that scans the applications for discrepancies. Other applications will be randomly selected by a computer for an audit, regardless of the results of the computerized analysis. If an application is selected for an audit, the employer will receive an audit letter from the Certifying Officer (CO), asking the employer to provide certain documentation and specifying a reply date, thirty days from the date of the audit letter. ', $fontR, $paraL) ;
	
	$section->writetext('If the reply date is not met or if the CO does not provide the employer with an extension, then the applica-tion will be denied.', $fontR, $paraL) ;
	
	$section->writetext('The CO can also require supervised recruitment, which may also be triggered randomly or based on the employer’s answers to certain questions on the PERM application. Supervised Recruitment may be required for the pending application or for future applications filed by the employer. Under supervised recruitment, the employer must place an advertisement, approved by the CO, in a newspaper of general circulation for three consecutive days, one of which is a Sunday edition, or in two consecutive editions of a professional, trade or ethnic publication. At the end of the supervised recruitment period, the employer will be required to provide a detailed recruitment report to the CO regarding the results of the recruitment effort.', $fontR, $paraL) ;
	
	
?>