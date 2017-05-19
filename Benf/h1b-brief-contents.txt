<?php

	addFooter('VLF_footer', 'center', 'small') ;
	// Set desired image widths in centimeters
	$outputImageWidth = 5 ;

	// Header
	$OVheader = $section->addHeader() ;
	$HdrTable = $OVheader->addTable() ;
	$HdrTable->addRows(1) ;
	$HdrTable->addColumnsList(array(10.6,4.13)) ;
	$OVheader->writeText(' ');

	$cellL = $HdrTable->getCell(1, 1) ;
	$OVlogo = $cellL->addImage('ov-logo.png') ;
	$OVlogo->setWidth(5) ;
	$OVlogo->setHeight(0.96) ;
	
	$cellR = $HdrTable->getCell(1, 2) ;
	$cellR->setTextAlignment(TEXT_ALIGN_RIGHT);
	$VPlogo = $cellR->addImage('visa-petition-text.png') ;
	$VPlogo->setWidth(4.13) ;
	$VPlogo->setHeight(0.96) ;

	addNewLine(3) ;

	$section->writetext('TABLE OF CONTENTS', $fontT2, $paraT) ;

	addNewLine(2) ;

	// First paragraphs

	$p1 = 'Enclosed please find the following forms and documents to support positive adjudication of this petition:' ;
	$section->writetext($p1, $fontR, $paraL) ;

	$p2 = 'Pursuant to INA Section, 101(a)(15)(E)(iii), please find the following enclosed requisite forms and documents submitted herewith on behalf of our client, ' ;
	$p2 .= $petCo ;
	$p2 .= ', on behalf of ' . $benFull ;
	$p2 .= ', a Citizen and National of ' . $benCitizen . '. The Beneficiary seeks an H-1B visa in the specialty occupation of ';
	$p2 .= $jobTitle . '. ' ;
	$p2 .= $petCo . ' is a ' . getFieldLC('petitioner_type_of_company') . '. ' ;
	$p2 .= $benShort . ' holds the U.S. equivalent of a Bachelor’s Degree in ' . getFieldLC('beneficiary_degree') . '.' ;
	$section->writetext($p2, $fontR, $paraL) ;

	$p3 = 'The submitted petition is supported by substantial evidence contained with this Visa Petition. Each piece of evidence is numerically labeled "Exhibit 1-5".' ;
	$section->writetext($p3, $fontR, $paraL) ;

	// Attachments
	addNewLine(1) ;
	$section->writetext('ATTACHMENTS', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext('<bullet> G-28, Notice of Appearance with checks for $ payable to USCIS for I-129 filing fee, antifraud fee and ACWIA fee', $fontR, $paraI) ;
	$section->writetext('<bullet> I-129, Petition for a Nonimmigrant Worker with H Classification Supplement and H-1B Data Collection, in duplicate', $fontR, $paraI) ;
	$section->writetext('<bullet> Certified ETA-9035 Labor Condition Application', $fontR, $paraI) ;
	$section->writetext('<bullet> Prevailing wage determination', $fontR, $paraI) ;
	$section->writetext('<bullet> Passport, Visa, I-94 of Beneficiary', $fontR, $paraI) ;

	// Exhibits
	addNewLine(1) ;
	$section->writetext('EXHIBITS', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext('[1] Letter of Support from ' . $petCo . ' stating the job description and requirement of university degree', $fontR, $paraI) ;
	$section->writetext('[2] O*NET online description for Position', $fontR, $paraI) ;
	$section->writetext('[3] Organizational Chart of ' . $petCo . ' with comparable jobs, names and degrees', $fontR, $paraI) ;
	$section->writetext('[4] Want ads for position from ' . $petCo, $fontR, $paraI) ;
	$section->writetext('[5] Want ads for similar positions from other companies.', $fontR, $paraI) ;
	$section->writetext('[6] Copy of ' . $benShort . '’s Diploma and Transcript of Academic Record from (University);', $fontR, $paraI) ;
	$section->writetext('[7] Copy of professional resume from ' . $benShort . ' describing ' . $genderPossessive . ' education and professional experience', $fontR, $paraI) ;
	$section->writetext('[8] Degree evaluation if from a foreign country', $fontR, $paraI) ;

	$section->insertPageBreak() ;

	// Beneficiary Section
	addNewLine(1) ;
	$section->writetext('Beneficiary: ' . $benFull, $fontT, $paraT) ;
	addNewLine(1) ;

	$BFTable = $section->addTable() ;
	$BFTable->addRows(1) ;


	$BeneficiaryPhotos = getFileForLinkCode($case_id, 'beneficiary_photo') ;

	// If no photos found, don't show an empty column.
	if (False !== $BeneficiaryPhotos && mysqli_num_rows($BeneficiaryPhotos) > 0)
	{
		$BFTable->addColumnsList(array(15-$outputImageWidth, $outputImageWidth)) ;
		// Cell 2
		$cellBFR = $BFTable->getCell(1, 2) ;

		while ($bPhoto = $BeneficiaryPhotos->fetch_assoc() ) {
			$fileName = $bPhoto['file_path'] ;
			$remoteFile = $uploads_dir . '/' . $fileName ;
			$localFile = 'temp/' . $fileName ;
			$data = file_get_contents($remoteFile) ;
			$handle = fopen($localFile, "w") ;
			fwrite($handle, $data) ;
			fclose($handle) ;
			$imageSizeInfo = getimagesize($localFile) ;
			$isWidth = $imageSizeInfo[0] ;
			$isHeight = $imageSizeInfo[1] ;
			$outputHeight = $isHeight / $isWidth * $outputImageWidth ;
			$BFpic = $cellBFR->addImage($localFile) ;
			$BFpic->setWidth($outputImageWidth) ;
			$BFpic->setHeight($outputHeight) ;
			$cellBFR->writeText('<br> <br>') ;
			unlink($localFile) ;
		}
	}
	else
	{
		// No photos, add a single column
		$BFTable->addColumnsList(array(15)) ;
	}


	// Cell 1
	$cellBFL = $BFTable->getCell(1, 1) ;

	// + Description
	$cellBFL->writetext(getFieldLC('beneficiary_description'), $fontR, $paraL) ;
	$cellBFL->writetext('Work Experience', $fontT, $paraL) ;
	$workExperience = getFieldLC('beneficiary_work_history', True) ;
	foreach ($workExperience as $wexp) {
		$cellBFL->writetext($wexp, $fontR, $paraL) ;
	}

	// + Education History
	$cellBFL->writetext('Education & Qualifications', $fontT, $paraL) ;
	$edHistory = getFieldLC('beneficiary_education_history', True) ;
	foreach ($edHistory as $edn) {
		$cellBFL->writetext($edn, $fontR, $paraL) ;
	}

	$section->insertPageBreak() ;

	// Petitioner Section
	addNewLine(1) ;
	$section->writetext('Petitioner: ' . $petCo, $fontT, $paraT) ;
	addNewLine(1) ;

	$PTable = $section->addTable() ;
	$PTable->addRows(1) ;
	

	// Petitioner Logo and Photos
	$PetitionerLogos = getFileForLinkCode($case_id, 'petitioner_logo') ;
	$PetitionerPhotos = getFileForLinkCode($case_id, 'petitioner_photo') ;

	if (mysqli_num_rows($PetitionerLogos) + mysqli_num_rows($PetitionerPhotos) > 0)
	{
		$PTable->addColumnsList(array(15-$outputImageWidth, $outputImageWidth)) ;
		// Cell 2
		$cellPR = $PTable->getCell(1, 2) ;

		$PetitionerLogo = $PetitionerLogos->fetch_assoc() ;
		if ($PetitionerLogo)
		{
			$fileName = $PetitionerLogo['file_path'] ;
			$remoteFile = $uploads_dir . '/' . $fileName ;
			$localFile = 'temp/' . $fileName ;
			$data = file_get_contents($remoteFile) ;
			$handle = fopen($localFile, "w") ;
			fwrite($handle, $data) ;
			fclose($handle) ;
			$imageSizeInfo = getimagesize($localFile) ;
			$isWidth = $imageSizeInfo[0] ;
			$isHeight = $imageSizeInfo[1] ;
			$outputHeight = $isHeight / $isWidth * $outputImageWidth ;
			$PetLogo = $cellPR->addImage($localFile) ;
			$PetLogo->setWidth($outputImageWidth) ;
			$PetLogo->setHeight($outputHeight) ;
			unlink($localFile) ;
		}

		// Plus any other Petitioner Photos
		$PetitionerPhotos = getFileForLinkCode($case_id, 'petitioner_photo') ;
		while ($pPhoto = $PetitionerPhotos->fetch_assoc() ) {
			$fileName = $pPhoto['file_path'] ;
			$remoteFile = $uploads_dir . '/' . $fileName ;
			$localFile = 'temp/' . $fileName ;
			$data = file_get_contents($remoteFile) ;
			$handle = fopen($localFile, "w") ;
			fwrite($handle, $data) ;
			fclose($handle) ;
			$imageSizeInfo = getimagesize($localFile) ;
			$isWidth = $imageSizeInfo[0] ;
			$isHeight = $imageSizeInfo[1] ;
			$outputHeight = $isHeight / $isWidth * $outputImageWidth ;
			$Ppic = $cellPR->addImage($localFile) ;
			$Ppic->setWidth($outputImageWidth) ;
			$Ppic->setHeight($outputHeight) ;
			$cellPR->writeText('<br> <br>') ;
			unlink($localFile) ;
		}
	}
	else
	{
		// Single cell only.
		$PTable->addColumnsList(array(15)) ;
	}

	// Cell 1
	$cellPL = $PTable->getCell(1, 1) ;
	$cellPL->writetext(getFieldLC('petitioner_description'), $fontR, $paraL) ;

	$section->insertPageBreak() ;


	// Position

	addNewLine(1) ;
	$section->writetext('Position: ' . $jobTitle, $fontT, $paraT) ;
	addNewLine(1) ;

	$PosTable = $section->addTable() ;
	$PosTable->addRows(1) ;
	$PositionLogos = getFileForLinkCode($case_id, 'position_photo') ;

	if (mysqli_num_rows($PositionLogos) > 0)
	{
		// Create 2 columns
		$PosTable->addColumnsList(array(15-$outputImageWidth, $outputImageWidth)) ;
		$cellPosR = $PosTable->getCell(1, 2) ;

		$PositionLogo = $PositionLogos->fetch_assoc() ;
		$fileName = $PositionLogo['file_path'] ;
		$remoteFile = $uploads_dir . '/' . $fileName ;
		$localFile = 'temp/' . $fileName ;
		$data = file_get_contents($remoteFile) ;
		$handle = fopen($localFile, "w") ;
		fwrite($handle, $data) ;
		fclose($handle) ;
		$imageSizeInfo = getimagesize($localFile) ;
		$isWidth = $imageSizeInfo[0] ;
		$isHeight = $imageSizeInfo[1] ;
		$outputHeight = $isHeight / $isWidth * $outputImageWidth ;
		$PosImage = $cellPosR->addImage($localFile) ;
		$PosImage->setWidth($outputImageWidth) ;
		$PosImage->setHeight($outputHeight) ;
		unlink($localFile) ;
	}
	else
	{
		// Single column only
		$PosTable->addColumnsList(array(15)) ;
	}

	$cellPosL = $PosTable->getCell(1, 1) ;
	$cellPosL->writetext('The ' . $petCo . '’s Employment letter for the ' . $jobTitle . ' states, in pertinent part:', $fontR, $paraL) ;
	$cellPosL->writetext($jobTitle, $fontB, $paraL) ;
	$cellPosL->writetext(getFieldLC('position_overview'), $fontR, $paraL) ;


	$section->writetext('O*NET Summary Report for the following position is similar to the position in the present visa petition:', $fontB, $paraL) ;
	$section->writetext(getFieldLC('position_similar_onet'), $fontI, $paraBQ) ;

	$benDegree = getFieldLC('beneficiary_degree') ;

	$p = $benShort . ' has the following Degree:<i> ' . $benDegree . '</i>.' ;
	$section->writetext($p, $fontR, $paraL) ;

	$degEquiv = getFieldLC('beneficiary_degree_equivalent') ;
	if ($degEquiv) $section->writetext($degEquiv, $fontR, $paraL) ;

	$p = $benFull . '’s coursework in the Degree provided the knowledge required to perform the duties of ' . $jobTitle . '.' ;
	$section->writetext(getFieldLC('beneficiary_how_degree_applies'), $fontR, $paraL) ;

	$p = 'The Company has a history of hiring personnel with a degree that is the same or similar to the beneficiary:' ;
	$section->writetext($p, $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_hiring_history'), $fontR, $paraL) ;
	
	$p = 'The industry requires the same or similar degree to that of the beneficiary to perform similar positions, as indicated by the following:' ;
	$section->writetext($p, $fontR, $paraL) ;
	$section->writetext(getFieldLC('position_industry_requirement'), $fontR, $paraL) ;

	$p = 'The Position will pay ' . getFieldLC('position_hourly_pay') . '.' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = 'The Prevailing wage for the position as indicated at www.flcdatacenter.com is:' ;
	$section->writetext($p, $fontR, $paraL) ;
	$section->writetext(getFieldLC('position_prevailing_wage'), $fontR, $paraL) ;


$section->insertPageBreak() ;


	$section->writetext('LEGAL ANALYSIS', $fontT, $paraC) ;

	$p = 'I. THE SKILLS ' . $benFull . ' LEARNED IN OBTAINING A DEGREE IN ' . $benDegree . ' MEETS THE DUTIES OF THE JOB.' ;
	$section->writetext(strtoupper($p), $fontB, $paraL) ;

	$p = $petCo . ' employment letter details the name of the position, the duties, how each duty requires the knowledge obtained in the degree or similar degree to that of the beneficiary or how particular coursework or modules learned at the institution provided the knowledge required to perform the position. It also details the percentage of time each duty comprises, as follows.' ;
	$section->writetext($p, $fontR, $paraL) ;
	
	$positionDuties = getFieldLC('position_duties', True) ;

	foreach ($positionDuties as $pduty) {
		$section->writetext($pduty . '.', $fontR, $paraL) ;
	}

	$section->writetext('II. WHETHER POSITION IS A SPECIALTY OCCUPATION', $fontB, $paraL) ;
	
	$p = 'The responsibilities of the position are similar to the 1991 Federal District Court for Colorado Case, see Arctic Catering, Inc., on Behalf of MacMillan v. Thornburgh 769 F.Supp. 1167 D.Colo., 1991 (which will be discussed at length further in this brief). In the case the Court and the AAU ruled a general manager position was a member of the professions because of the position’s unique and complex nature. The Court and the AAU ruled that the general manager position required a professional because it called for “extensive knowledge of management, marketing, corporate finance, applied science and technology.” It further found that the position involved extensive management and financial responsibilities and also required the performance of a broad scope of complex activities. (emphasis added) The instant case involves a similarly broad and complex set of activities to be executed by the beneficiary who is the final discretionary authority in the chain of command for the company.' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = 'The ' . $petCo . ' position meets the job description of the specialty occupation defined by Summary Report of a similar position described in O*NET, as discussed in the Position section of this brief.' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = 'Pursuant to 8 CFR 214.2 (h)(4)(iii)(A) one of the following standards for specialty occupation position must be met. The standards are: ' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = '1.	A baccalaureate or higher degree or its equivalent is normally the minimum requirement for entry into the particular position;' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = '2.	The degree requirement is common to the industry in parallel positions among similar organizations or, in the alternative, an employer may show that its particular position is so complex or unique that it can be performed only by an individual with a degree;' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = '3.	The employer normally requires a degree or its equivalent for the position; or' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = '4.	The natures of the specific duties are so specialized and complex that knowledge required to perform the duties is usually associated with the attainment of a baccalaureate or higher degree. ' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = 'The description of the position and background needed for it as outlined in the ' . $petCo . ' letter and further described in the Position section of this brief meets the criteria of paragraph 4, as interpreted by Arctic Catering, Inc., on Behalf of MacMillan v. Thornburgh as  described above.' ;
	$section->writetext($p, $fontR, $paraL) ;

	$section->writetext('CASE LAW', $fontT, $paraC) ;

	$p = 'The Administrative Appeals Unit and the United States District Court have determined over several years of precedent that the duties involved in the occupation in question control in the determination of the professional nature of occupation more than the simple title of the occupation. In numerous cases that will be discussed and cited in this discussion the courts have repeatedly looked to the complexity of the duties involved in the occupation in question.

For example in Matter of Shin Decided by District Director January 16, 1966, the Service decided that “profession” is a term that is constantly expanding, consistent with the greater knowledge and specialized training that such a society demands. The Court established the following, 

“…. in addition to the foregoing, a guideline to what constitutes a "profession" within the meaning of the Act is found in a characteristic common to each of the vocations named in the subsection under reference. That common denominator is the fact that all require specialized training that is normally attained through high education of a type for which at least a bachelor’s degree can be obtained, or through equivalent specialized instruction and experience in lieu thereof. An example of the latter lies in the field of law wherein many members of that profession have obtained their knowledge through the medium of intensive work, instruction and study in that activity under the direction and guidance of members of that profession.

To summarize, the vocations included in the term "profession" in our modern highly industrialized society are constantly expanding, consistent with the greater knowledge and specialized training that such a society demands. These could well include, in addition to various scientific fields, highly specialized activities business administration, finance, journalism and the like provided that the particular activity required at least a baccalaureate level of special knowledge, not merely skill.”

In Matter of Minnesota Mining and manufacturing Co. (3M), A27 228 517 (AAU October 24, 1989 the Service established that the duties of the position determine the professional nature of the position. The AAU first determined the definition of profession is the following:

“Matter of Shin, 11 I&N Dec. 686 (Dist. Dir. 1966), for example, held that the term "profession," as used in INA §101(a)(32), contemplates knowledge or learning, not merely skill, of an advanced type in a given field, gained by a prolonged course of specialized instruction at least at the baccalaureate level, which is a prerequisite to entry into the particular field of endeavor.  

The AAU further determined that the position of business manager of a documents systems division for the petitioner to be a professional position based on the complexity of the duties involved in the position. The AAU ruled the following:

"In view of the broad scope of the complex duties of the position," the AAU held, "the large operating budget of the division, and the number of individuals supervised, it is concluded the proffered position is one which normally requires the services of an individual with a baccalaureate degree in a specialized area." The AAU thus approved the petition.”

In a similar case the AAU ruled in Matter of Michael Hertz Associates, Decided by Commissioner February 19, 1988 that an industrial designer was a member of the professions. The Court once again ruled that that the position was professional due to the complexity of the duties involved in its execution. The Court began by explaining the constantly changing nature of the definition of the term professional which can be determined by labor practices, educational developments, particular needs of the particular position. The common thread to be determined by the Service is whether the duties involved in the position are so complex and specialized as to require a baccalaureate degree in a field closely related to the position.

“Eligibility in this proceeding hinges on the definition of a profession, as that term is used in section 101(a)(32) of the Act. Section 101(a)(32) states that ’[t]he term ’profession’ shall include but not be limited to architects, engineers, lawyers, physicians, surgeons, and teachers in elementary or secondary schools, colleges, academies, or seminaries.’ (emphasis added) The occupations included in the professions are not limited to these few groups, and, in fact, the overall number and specific occupations which fall within this definition are constantly changing due to technological advances and due to changes in labor practices. The professions normally require, within the context of common practice in the United States, a minimum of a bachelor’s degree in a specific field of study.”

The Service further ruled in this important case:

“Consideration of a claim to such eligibility first focuses on the tasks, demands, duties, and actual requirements of the position in question. An analysis of such includes not only the actual requirements specified by the petitioner but also those required by the specific industry in question, to determine, in part, the validity of the petitioner’s requirements.”

In 1991 the Federal Distinct Court for Colorado  made a precedent setting ruling in the case Arctic Catering, Inc., on Behalf of MacMillan v. Thornburgh 769 F.Supp. 1167 D.Colo.,1991. In the case the Court and the AAU ruled a general manager position was a member of the professions because of the position’s unique and complex nature. The Court and the AAU ruled that the general manager position required a professional because it called for “extensive knowledge of management, marketing, corporate finance, applied science and technology.” It further found that the position involved extensive management and financial responsibilities and also required the performance of a broad scope of complex activities.

The AAU pointed out that for a position to be considered a profession the degree requirement should either be an industry standard, or the employer must show that the uniqueness of the duties require a member of the professions with abilities beyond the industry standard.

The AAU found that the complexity of both the duties and the nature of Arctic’s business required its general manager to have extensive knowledge of business.  The AAU concluded that based on the beneficiary -  Mr. MacMillan’s education, specialized training and many years of experience, he was a member of the professions. Consequently the AAU withdrew its prior orders and granted the visa petition.

Finally in Augat, Inc. v. Tabor 719 F.Supp. 1158 D.Mass.,1989. April 12, 1989. The federal District Court for Massachusetts determined that a General Manger and Consulting Vice-President was a member of the professions due to the complexity of his job duties. The Court first examined the Service definition of professional

“Section 1153(a)(3) provides for a preference for "qualified immigrants who are members of the professions ... and whose services in the professions ... are sought by an employer in the United States." The term "profession" is defined to "include but not be limited to architects, engineers, lawyers, physicians, surgeons, and teachers in elementary or secondary schools." 8 U.S.C. § 1101(a)(32). In order to qualify for a third preference on this basis, the position to be filled must be a professional one, and the alien must be classifiable as a "member of the professions" in the field of intended employment. See, e.g., Globenet, Inc. v. Attorney General, No. 88-1261 (D.D.C. January 10, 1989). The list of professions in the statute does not purport to be exhaustive, and the INS has developed guidelines for identifying professions other than those enumerated. The agency considers the educational prerequisites of the field as a factor of prime significance. For a field to constitute a profession, the applicant must show there is a general requirement of a prolonged period of specialized instruction or study as a realistic prerequisite to entry. See, e.g., Occidental Engineering Co. v. INS, 753 F.2d 766, 767 (9th Cir.1985). The INS has accordingly evolved a standard that a professional position is one which realistically requires the attainment of an education equivalent at least to a baccalaureate degree in the United States. See, e.g., Matter of Portugues do Atlantico Information Bureau, Inc., I.D. # 2982 (Comm.1984); Matter of Bienkowski, 12 I. & N.Dec. 17 (Comm.1966).”

 The Court further determined that the position was a professional specialty occupation even though the Service had initially not determined it to be. The court stated 

“occupations enumerated in the statute as being professions represent a broad spectrum of positions with varying educational requirements, and therefore the text did not support the agency’s assumption that only occupations with degree requirements could be professions. It is not the case that only occupations with absolute degree requirements can be considered professions, within the meaning of the Act. See, e.g., Globenet, Inc. v. Attorney General, No. 88-1261 (D.D.C. January 10, 1989); Hong Kong T.V. Video Program, Inc. v. Ilchert, 685 F.Supp. 712, 716 (N.D.Cal.1988). While a specific degree requirement is an important factor in determining whether an occupation not enumerated in the statute is a "profession," to use it as an absolute test is erroneous, both under the Act itself, and under the INS’s own precedents.”

The Court and the Service in practice look to whether the occupation is a profession through the duties involved in the position and “the general requirement for specialized study coupled with whether the position has complex and discretionary duties normally associated with professional posts.” See, e.g., Matter of Perez, 12 I. & N.Dec. 701, 702 (1968); Mindsey v. Ilchert, No. C-84-6199-SC (N.D.Cal. December 11, 1987) and Matter of Sun, 12 I. & N.Dec. 535 (1967), cases finding journalism, fashion design and hotel management to be professions.

The Court further discussed the nature of professional occupation to be found in the complexities of the duties involved in the job in discussing the previous precedent setting decision Matter of Sun, 12 I. & N.Dec. 535 (1967). The Court ruled:

In Sun, supra, there was no suggestion that a degree was a prerequisite to a position as hotel manager. Nevertheless, in that case the occupation was found to be a professional position because of the complexity of the duties involved. These precedents impelled the finding in Hong Kong Video that the position of company president was a professional one. "The president of a multi-million dollar corporation, such as the plaintiff, performs all the duties performed by the hotel manager in Sun, and numerous other duties including determining legal strategies and evaluating technical data. Therefore, like the hotel manager, the position of company president may be considered a profession based on the complexity of the duties alone." Hong Kong Video, supra, 685 F.Supp. 712, 716. The same considerations as were present in Hong Kong Video direct a finding that the position of Augat’s Vice-President for International Operations is a professional one.

The Court further established the method for deterring whether a position is a professional specialty occupation in its rationale, 

“There is substantial evidence in the record that Vice President for International Operations in a concern of Augat’s size is a professional position, and that it has a general educational requirement of at least a baccalaureate degree or its equivalent. The complexity and demands of the duties and responsibilities involved are at least as great as those for positions which have been determined to be "professions". See, e.g., Hong Kong T.V. Video Program, Inc., supra; 

Matter of Sun, supra.

The Federal case law and Service precedent clearly establish that the nature of the position determines whether the position is a specialty occupation – member of the professions for approval of the H-1B temporary visa. In many of the cases above mentioned the duties of the position are very similar to the position in question in the subject petition. In the instant case the petitioner has shown both that the a degree is required in comparable jobs in the industry and related industry– and that the uniqueness of the duties involved in the position at question, including the traditional professional position of engineer and areas such as management, administration, and, client counseling require as an absolute minimum for entry into the position a university degree in Engineering or a closely related field.' ;

	$section->writetext($p, $fontR, $paraL) ;

	$issues = getFieldLC('beneficiary_application_issue', True) ;
	if ($issues)
	{
		$section->writetext('ADDITIONAL ISSUES', $fontT, $paraC) ;	
		foreach ($issues as $issue) {
			$section->writetext($issue, $fontR, $paraL) ;
		}
	}


	$section->writetext('CONCLUSION', $fontT, $paraC) ;
	$p = $petCo . '’s position of ' . $jobTitle . ' is similar the O*NET position described herein. ' . $benFull . ' has a ' . $benDegree . '.' ;
	$p .= $petCo . '’s employment letter describes in detail how the duties of the position require a degree and experience and how ' . $benShort . '’s background meets the requirements. Based upon these factors ' . $petCo . ' urges to find that both Beneficiary and the Company have met and exceeded the burden of proof necessary to establish that they satisfy the regulations set out in 8 CFR (h)(iii)(B) both regarding industry standards and educational requirements. For these reasons the Petitioner requests approval of the H-1B Petition. ' ;
	$section->writetext($p, $fontR, $paraL) ;

	$p = 'Respectfully Submitted,' ;
	$section->writetext($p, $fontR, $paraL) ;

	addNewLine(5) ;

	$p = getAttorneyNames() ;
	$section->writetext($p, $fontR, $paraL) ;


/*
	$p = '' ;
	$section->writetext($p, $fontR, $paraL) ;

*/


