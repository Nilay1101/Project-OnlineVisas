<?php
	// showLogo('ov-logo.png') ;
	// writeSnippet('vlf_letterhead', 'right') ;
	// Leave space for company letterhead & address etc.
	addNewLine(10) ;

	showDate() ;
	// writeSnippet('vlf_uscis_center_address') ;
	
	//$uscis_addr = getDefaultValue($case_id, 'vlf_uscis_center_address') ;
	$uscis_addr = 'Somewhere In USA' ;
	if ($uscis_addr) $section->writetext($uscis_addr, $fontR, $paraL) ;
	
	addNewLine(2) ;

	$section->writetext('H-1B visa on behalf of ' . $petCo, $fontB, $paraC) ;
	addNewLine(2) ;

	$section->writetext('Re: ' . $petCo . ' H-1b visa on behalf of ' . $benFull, $fontR, $paraL) ;
	addNewLine(2) ;

	$section->writetext('Dear USCIS Officer:', $fontR, $paraL) ;

	$para1 = 'We submit this letter in support of our petition on behalf of ' . $benFull ;
	$para1 .= ' to obtain an H-1B Nonimmigrant Visa as a ' . $jobTitle ;
	$section->writetext($para1, $fontR, $paraL) ;	

	$para2='';
	$para2 .= 'We wish to employ ' . $benShort . ' as an H-1B specialized nonimmigrant worker visa for a period of ' ;
	$para2 .= 'three years to commence ' . '17 May 2017' . ' and end on ' . '17 May 2018' . '.' ;

	$section->writetext($para2, $fontR, $paraL) ;

	$section->writetext('In support of this application, we provide the following information.', $fontR, $paraL) ;
	addNewLine(1) ;

	// About Petitioner
	$section->writetext(strtoupper('ABOUT ' . $petCo), $fontT, $paraT) ;
	$section->writetext('Petitioner Description', $fontR, $paraL) ;
	addNewLine(1) ;

	// Position
	$section->writetext(strtoupper('The Position'), $fontT, $paraT) ;
	$section->writetext('Position Overview', $fontR, $paraL) ;
	addNewLine(1) ;

	// Education & Experience
	$beneficiaryDegree = ' Beneficiary Degree' ;
	$section->writetext('Education & Experience Requirements', $fontB, $paraL) ;
	$paraDegree = 'This position requires the minimum of a university bachelor\'s degree in ' ;
	$paraDegree .= $beneficiaryDegree ;
    $paraDegree .= ' to be equivalent to a U.S. bachelor\'s degree will be accepted.' ;
    // $paraDegree .= getFieldLC('beneficiary_how_degree_applies') ; // Will add this to paragraph, if set.
	$section->writetext($paraDegree, $fontR, $paraL) ;
	addNewLine(1) ;

	// Job Duties (multiple)
	$section->writetext(strtoupper('Job Duties / Job Description'), $fontT, $paraT) ;
	$positionDuties = 'Some Duties' ;
	//foreach ($positionDuties as $pduty) {
		$section->writetext($positionDuties, $fontR, $paraL) ;
	//}
	addNewLine(1) ;

	// Work Experience
	$section->writetext('Work Experience', $fontB, $paraL) ;
	$workExperience = 'Some Work History ' ;
	//foreach ($workExperience as $wexp) {
		$section->writetext($workExperience, $fontR, $paraL) ;
	//}
	addNewLine(1) ;

	// Education History
	$section->writetext('Education & Qualifications', $fontB, $paraL) ;
	$edHistory = 'Some Education History' ;
	//foreach ($edHistory as $edn) {
		$section->writetext($edHistory, $fontR, $paraL) ;
	//}
	addNewLine(1) ;

	// Conclusion
	$section->writetext(strtoupper('Conclusion'), $fontT, $paraT) ;

	$paraConc1 = 'The ' . $jobTitle. ' job description is included in this letter. ' ;
	$paraConc1 .= 'The description clearly indicates that the individual must have obtained a {{bachelor of science degree}} in ' . $beneficiaryDegree ;
	$paraConc1 .= ' or related field to be considered for the position.' ;
	$section->writetext($paraConc1, $fontR, $paraL) ;

	$paraConc2 = '' ;
	$hourlyRate = 'position_hourly_pay' ;
	if ($hourlyRate) $paraConc2 .= $benShort . ' will be compensated at an hourly rate of ' . $hourlyRate . '. ' ;
	$paraConc2 .= 'In accordance with H-1B regulations as revised pursuant to the Immigration Act of 1990, we will provide for the reasonable costs of return transportation of ' . $benShort . '\'s last place of residence abroad, if ' ;
	$paraConc2 .=  $genderSubject . ' ' . $genderIsAre ;
	$paraConc2 .= ' dismissed from employment before the end of the period of authorized admission.' ;
	$section->writetext($paraConc2, $fontR, $paraL) ;

	$paraConc3 = 'We request approval in a timely manner due to the important role ' . $benShort . ' will play with our institution. Thank you for your time and attention to this matter.' ;
	$section->writetext($paraConc3, $fontR, $paraL) ;
	addNewLine(2) ;
	$section->writetext('Sincerely,', $fontR, $paraL) ;

	addNewLine(3) ;
	$section->writetext('Petitioner Position', $fontR, $paraL) ;
	$section->writetext($petCo, $fontR, $paraL) ;

	// addFooter('VLF_footer', 'center') ;
?>