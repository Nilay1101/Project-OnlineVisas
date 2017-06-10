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
	
	$section->writetext('LETTER TO EMPLOYER REGARDING ONLINE PERM REGISTRATION — ACCOUNT INSTRUCTIONS', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('Re: Registration for Online Completion of PERM Forms for Electronic Filing', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Dear: ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('I am writing this letter to provide you with instructions for completing online registration and creating an account to file alien labor certification applications electronically under the PERM program. The PERM regulations prohibit attorneys and other representatives from creating the online account because the U.S. Department of Labor wants employers to personally appoint attorneys as their representatives and to certify that the employer has a legitimate job opening.  Accordingly, the employer must complete the online regis-tration and create a sub-account for the attorney.', $fontR, $paraL) ;

	$section->writetext('In order to complete the online registration and create a PERM account, the employer will need the follow-ing information:', $fontR, $paraL) ;
	
	$section->writetext('Once you have compiled the information required above, please go to the following website to complete the online registration and establish the account:<em> http://www.plc.doleta.gov/eta_start.cfm?actiontype=register</em>', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('1. Federal Tax Identification Number;', $fontR, $paraL) ;
	$section->writetext('2. Year of incorporation or year business was started;', $fontR, $paraL) ;
	$section->writetext('3. NAICS Code, if known or the nature of the business if the NAICS Code is not known;', $fontR, $paraL) ;
	$section->writetext('4. Names and e-mail addresses for attorneys to be registered <strong>[name and e-mail of attorney]</strong>;', $fontR, $paraL) ;
	$section->writetext('5. Street address for the employer—a P.O. Box is not acceptable; ', $fontR, $paraL) ;
	$section->writetext('6. Contact information, including names, addresses, e-mail addresses and telephone numbers for <em>employer contact</em> who will prepare applications, employer representative who will sign forms; and;', $fontR, $paraL) ;
	$section->writetext('7. Contact information for attorney <strong>[name and address of attorney]</strong>', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('You will be asked to input some of the information listed above. Once you complete the fields, the system will process the account. In a day or so, it will e-mail you a temporary password and ask you to create your own. Your new password must include a letter, numbers and an asterisk (*) or other special character. If you fail to create an acceptable password, the system will kick you out after three failed attempts. If this happens during working hours, you will be asked to provide your e-mail address, and the system will rein-state you in about 20 minutes. If this happens after working hours, then you must wait until the next busi-ness day to be reinstated.', $fontR, $paraL) ;
	
	$section->writetext('After setting up your account and password, you will need to provide me with access to the account. You can give me access by clicking on “User Accounts” and adding me as a user. Once you have completed registration, please provide me with the account login. ', $fontR, $paraL) ;
	
	$section->writetext('Let me know if you have any problems with this. If you have any questions, please do not hesitate to con-tact me.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraR) ;
	$section->writetext('[Attorney]', $fontB, $paraR) ;

?>