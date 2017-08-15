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
	
	$section->writetext('MEMO TO EMPLOYERS OUTLINING REQUIRED DOCUMENTATION OF 
ABILITY TO PAY PROFFERED WAGE', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('Re: Required Documentation of Ability to Pay Proffered Wages', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Dear: ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('U.S. Citizenship and Immigration Services regulations require that any employment-based immigrant peti-tion that involves an offer of employment must be accompanied by evidence that the prospective U.S. em-ployer has the ability to pay the proffered wage. ', $fontR, $paraL) ;
	
	$section->writetext('Acceptable documentation consists of the following:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('1. <strong>If the Company Employs 100 Workers or More</strong>: A statement from the financial officer that establishes the employer’s ability to pay the proffered wages. (If this applies, we will assist you in drafting this statement.)', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('2. <strong>If the Company Employs Fewer Than 100 Workers</strong>: You must submit one of the following items:', $fontR, $paraL) ;
	$section->writetext('(A) Annual Report;', $fontR, $paraL) ;
	$section->writetext('(B) Federal Tax Return; or', $fontR, $paraL) ;
	$section->writetext('(C) Audited Financial Statement.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('(Smaller companies usually find that submitting a copy of their federal tax return is the easiest way to meet the “ability to pay” requirement.)', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('3. In appropriate cases, the following additional evidence may be submitted:', $fontR, $paraL) ;
	$section->writetext('(A) Profit/Loss Statements;', $fontR, $paraL) ;
	$section->writetext('(B) Bank Account Records; or', $fontR, $paraL) ;
	$section->writetext('(C) Personnel Records.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Employment-based petitions cannot be approved without “ability to pay” documentation. These documents must show that the employer’s revenue is sufficient to pay the employee’s salary. This documentation is not needed until we notify you. However, if you employ less than 100 employees, it would be helpful if you would forward the appropriate documentation to our office at your earliest convenience.', $fontR, $paraL) ;
	
	$section->writetext('Should you have any questions regarding the foregoing or think you may have difficulty in submitting ac-ceptable documentation, please contact our office as soon as possible.', $fontR, $paraL) ;



?>