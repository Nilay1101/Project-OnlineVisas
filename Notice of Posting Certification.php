<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('NOTICE OF POSTING CERTIFICATION ', $fontB, $paraT) ;
	addNewLine(2) ;

	$section->writetext('This is to certify that we posted a notice for ', $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('position_job_title'), $fontR, $paraL) ;
	$section->writetext('Posted From: _______________', $fontR, $paraL) ;
	$section->writetext('Posted To: _______________', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('The job notice was unobstructed during the full period in a conspicuous place on the employees’ bulletin board.', $fontR, $paraL) ;
	$section->writetext('We also certify that there is no union or bargaining representative involved in the above-mentioned posi-tion.', $fontR, $paraL) ;
	$section->writetext('Our company    <bullet> does (complete blank below)    <bullet> does not have in-house media (electronic or print-ed) that is used to distribute notice of the job opportunity in accordance with the procedures we use for similar positions within the organization.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Type of Publication: _______________', $fontR, $paraL) ;
	$section->writetext('Published From: _______________', $fontR, $paraL) ;
	$section->writetext('Published To: _______________', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('_______________', $fontR, $paraL) ;
	$section->writetext('Signature of Employer	', $fontR, $paraL) ;
	
	$section->writetext('_______________', $fontR, $paraL) ;
	$section->writetext('Date', $fontR, $paraL) ;
	
	$section->writetext('_______________', $fontR, $paraL) ;
	$section->writetext('Print Name of Signatory and Title', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Attach copy of posted notice and of all other notices published in-house.</em>', $fontR, $paraL) ;
	
	
	
	

?>