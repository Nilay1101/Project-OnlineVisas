<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(1) ;
	
	$section->writetext('United States Department of Homeland Security', $fontR, $paraL) ;
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Re : I-129 ' . getFieldLC('petitioner_company_name') . getFieldLC('beneficiary_name_first') . getFieldLC('beneficiary_name_last') . getFieldLC('position_job_title'), $fontR, $paraL);
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('beneficiary_citizenship_country') . getFieldLC('position_job_title'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('ATTACHMENTS', $fontB, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext('<bullet>', $fontR, $paraL) ;
	$section->writetext('<bullet>', $fontR, $paraL) ;
	$section->writetext('<bullet>', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('EXHIBITS', $fontB, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('Exhibit 1' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$section->writetext('Exhibit 2' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext('Exhibit 3', $fontR, $paraL) ;
	$section->writetext('Exhibit 4' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('Direct_employer_names'), $fontR, $paraL) ;
	$section->writetext('Exhibit 5' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$section->writetext('Exhibit 6' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$section->writetext('Exhibit 7' . getFieldLC('Consultation_Letter_Author'), $fontR, $paraL) ;
	$section->writetext('Exhibit 8', $fontR, $paraL) ;
	$section->writetext('Exhibit 9', $fontR, $paraL) ;
	$section->writetext('Exhibit 10', $fontR, $paraL) ;
	$section->writetext('Exhibit 11', $fontR, $paraL) ;
	$section->writetext('Exhibit 12', $fontR, $paraL) ;
	$section->writetext('Exhibit 13', $fontR, $paraL) ;
	$section->writetext('Exhibit 14', $fontR, $paraL) ;
	$section->writetext('Exhibit 15', $fontR, $paraL) ;
	$section->writetext('Exhibit 16', $fontR, $paraL) ;
	$section->writetext('Exhibit 17', $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('BENEFICIARY', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('beneficiary_bio'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('PETITIONER', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('P_1_Petitioners_Bio'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('position_job_title'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('Direct_employer_names') . getFieldLC('petitioner_company_name') . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('position_job_title'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('EMPLOYMENT', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('', $fontR, $paraL) ;
	
	$section->writetext('', $fontR, $paraL) ;
	
	$section->writetext('', $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . getFieldLC('position_job_title') . getFieldLC('Direct_employer_names') . getFieldLC('position_job_title') . getFieldLC('position_job_title'), $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('CRITERIA', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	$section->writetext('', $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('LEGAL DISCUSSION AND RECITATION OF AUTHORITIES', $fontT, $paraL) ;
	addNewLine(1) ;
	
	
	
	
	$section->writetext('CONCLUSION', $fontB, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('', $fontR, $paraL) ;
	
	$section->writetext('', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Respectfully Submitted', $fontR, $paraL) ;
	addNewLine(3) ;
	
	$section->writetext('Jon Velie', $fontR, $paraL) ;
	$section->writetext('Attorney for Beneficiary', $fontR, $paraL) ;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	






?>