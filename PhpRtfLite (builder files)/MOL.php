<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('<b>Employment Offer Letter</b>', $fontR, $paraC) ;
	addNewLine(1) ;
	
	$section->writetext('Date: ', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Dear: ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('We are extremely pleased to offer you a position as a ' . getFieldLC('position_job_title') . ' . This offer is contingent upon Application for and receipt of a visa that will enable you to work in the United States of America (If applicable), completion of all employment paperwork and finalization of the position with our client. The terms of employment with ' . getFieldLC('petitioner_company_name') . ' effective your date of joining and are enumerated below.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<b>Compensation</b>', $fontR, $paraL) ;
	$section->writetext('The company agrees to pay you an Annual Gross Salary of $        . Your salary is payable monthly through direct deposit as per the normal policies and schedule of the Company.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<b>Paid Holiday</b>', $fontR, $paraL) ;
	$section->writetext('Employees in their first year of employment are eligible to receive up to 120hrs of PTO, which is accrued at the rate of 4.61 hours bi-weekly, and is prorated from the date of hire. The Company provides of 8 specific paid Public holidays (8 hours each) a year if the holiday falls on work day and client location is closed. These holidays for the current year are: New Year’s Day, President’s Day, Memorial Day, Independence Day, Labor Day, Thanksgiving Day, Day after Thanksgiving, and Christmas Day.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<b>Health Insurance</b>', $fontR, $paraL) ;
	$section->writetext('We currently offer a Group Medical Insurance program through United Health Care. For the current plan year, the Company pays 60% of the employee portion of premium. Your insurance will become effective on the first of the month following the completion of your first 30days of employment provided you have turned in all required documentation by the deadline for participation.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<b>ShortTerm Disability</b>', $fontR, $paraL) ;
	$section->writetext('We currently offer a Group Short Term Disability policy. For the current plan year the company pays 100% of the premium. Currently, the STD policy covers 50% of your base salary if you become disabled as a result of an injury or sickness for a temporary period. STD benefits begin on the 8th day of accident or sickness and can continue for 12 weeks. You will automatically be enrolled in the Group STD insurance policy effective on the first of the month following the completion of your first 30 days of employment.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<b>Life Insurance</b>', $fontR, $paraL) ;
	$section->writetext('We currently offer a $50,000 Group Life Insurance Policy and a $50,000 Group Accidental Death and Disability Insurance Policy through Reliance Standard. For the current plan year the Company pays 100% of the premium. These policies provide payments to your designated beneficiary due to death. It also will make payments to you in the event of certain accidental dismemberments. You will automatically be enrolled in our Group Policy effective on the first of the month following the completion of your first 30 days of employment.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('On behalf of ' . getFieldLC('petitioner_company_name') . ', I am extremely pleased to welcome you to the company. We believe your knowledge and experience will play an important role in ' . getFieldLC('petitioner_company_name') . ' future growth and I look forward to receiving your signed and dated acceptance of this offer.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	
	$section->writetext('Sincerely, <br><br><br>', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Accepted as of            (date)<br>', $fontR, $paraL) ;
	$section->writetext('[Full Name]', $fontR, $paraL) ;

?>