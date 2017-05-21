<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext('United States Department of Homeland Security', $fontB, $paraL) ;
	$section->writetext('United States Citizenship and Immigration Services', $fontB, $paraL) ;
	$section->writetext(getFieldLC('Service_Center_Address'), $fontB, $paraL);
	addNewLine(1) ;
	$section->writetext('Re : I-129 ' . getFieldLC('Visa_Type') . ' Visa Petition for Intra Company Transfree in the Executive Position of ' . getFieldLC('position_title') . '.', $fontB, $paraL);
	addNewLine(1) ;
	$section->writetext('Petitioner : ' . getFieldLC('petitioner_company_name'), $fontB, $paraL);
	addNewLine(1) ;
	$section->writetext('Beneficiary : ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ', a Citizen and National of ' . getFieldLC('beneficiary_citizenship_country'), $fontB, $paraL);
	
	addNewLine(3) ;
	
	showDate();
	addNewLine(2) ;
	$section->writetext('Dear USCIS Examiner : ', $fontR, $paraL);
	addNewLine(2) ;
	$section->writetext('Persuant to Section 101(a)(15)(L) of the Immigration and Nationality Act of 1952, 8 USC 1101 (a)(15)(L), 137 Cong. Rec. part 2 S18247 (Nov 16, 1981), 8 CFR 214.2 (l), 22 CFR 41.54, please find the following enclosed requisite forms and documents submitted herewith, in duplicate, on behalf of our client ' . getFieldLC('petitioner_company_name') . ' one behalf of ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ', a Citizen and National of ' . getFieldLC('beneficiary_citizenship_country') . '. The Beneficiary is in the executive position of ' . getFieldLC('position_title') . ' of ' . getFieldLC('L_Int_Company') . ' and seeking an ' . getFieldLC('Visa_Type') . ' to hold the position of ' . getFieldLC('L_Beneficiary_US_Position') . ' in the US for ' . getFieldLC('petitioner_company_name') . '.', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('The submitted petition is supported by substantial evidence contained in an enclosed evidence book. Each piece of evidence is numerically labelled "Exhibit 1 -". Included is evidence attesting to qualifications of the Petitioner and the Beneficiary, proving that ' . getFieldLC('petitioner_company_name') . ' is a United States company and has requisite relationship of ' . getFieldLC('Companies_Relationship') . ' with ' . getFieldLC('L_Int_Company') . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ' held his executive position for more than one year for last three years, satisfying the criteria defining him as an Intra-Company Transfree as defined by the criteria of INA 101 (a)(15)(L), and 8 CFR 214.2(l).' , $fontR, $paraL);
	
	
	$section->insertPageBreak() ;
	
	$section->writetext('Enclosed please find the following forms and documents to support positive adjudication of this petition:', $fontB, $paraL);
	addNewLine(1) ;
	$section->writetext('<bullet> Attorneys checks for I-129 $.00, $.00 attached to Form G-28 Notice of Appearance for ' . getFieldLC('petitioner_company_name') . '.', $fontR, $paraL);
	$section->writetext('<bullet> Form I-129 Petition for Nonimmigrant Worker', $fontR, $paraL);
	$section->writetext('<bullet> Form I-129 L Classification Supplement', $fontR, $paraL);
	$section->writetext('<bullet> Copy of ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ' Passport', $fontR, $paraL);
	$section->writetext('<bullet> Brief and Document checklist detailing legal authorities supporting approval of this Petition', $fontR, $paraL);
	addNewLine(1) ;
	
	
	
	$section->writetext('EVIDENCE', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('petitioner_company_name') . ' Documents', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext('Exhibit 1 - Articles of Organization or Articles of Incorporation of ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 2 - Operating Agreement or By-Laws US holding company of ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 3 - Federal Identification Number (FEIN);', $fontR, $paraL);
	$section->writetext('Exhibit 4 - Dunn and Bradstreet certification and number US holding company of ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 5 - Business Licenses, Occupancy permits, insurance policy for facility or equipment;', $fontR, $paraL);
	$section->writetext('Exhibit 6 - List of Owners of ' . getFieldLC('petitioner_company_name') . ' and what percentage they own;', $fontR, $paraL);
	$section->writetext('Exhibit 7 - Stock certificates or proof of ownership;', $fontR, $paraL);
	$section->writetext('Exhibit 8 - Board Meeting Minutes regarding formation of ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 9 - Letter from Accountant or other financial person for ' . getFieldLC('petitioner_company_name') . ' indicating the relationship between the US Company and the Foreign Company, any other entity and shareholders, the amount of monies invested and by whom, verification of the Profit and Loss numbers and Balance Sheet numbers and the ability of the Company to pay the salary of the Employee;' , $fontR, $paraL);
	$section->writetext('Exhibit 10 - Signed and dated Lease or Deed of ' . getFieldLC('petitioner_company_name') . ' facility;', $fontR, $paraL);
	$section->writetext('Exhibit 11 - If leased, Letter from owner of building on letterhead with telephone number, indicating confirming the ' . getFieldLC('petitioner_company_name') . ' is occupying the space verifying total square footage of the premises and total number of work stations/ people that the space will accommodate;', $fontR, $paraL);
	$section->writetext('Exhibit 12 - Floor plan of ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 13 - ' . getFieldLC('petitioner_company_name') . ' Bank Statements for last 12 months;', $fontR, $paraL);
	$section->writetext('Exhibit 14 - ' . getFieldLC('petitioner_company_name')  . ' taxes for last three years or inception if less than three years;', $fontR, $paraL);
	$section->writetext('Exhibit 15 - Profit and Loss Statement since start of the year;', $fontR, $paraL);
	$section->writetext('Exhibit 16 - ' . getFieldLC('petitioner_company_name') . ' Annual Report;', $fontR, $paraL);
	$section->writetext('Exhibit 17 - Client invoices sampling;', $fontR, $paraL);
	$section->writetext('Exhibit 18 - Vendor invoices sampling;', $fontR, $paraL);
	$section->writetext('Exhibit 19 - Marketing materials;', $fontR, $paraL);
	$section->writetext('Exhibit 20 - ' . getFieldLC('petitioner_company_name')  . ' website;', $fontR, $paraL);
	$section->writetext('Exhibit 21 - Photographs of ' . getFieldLC('petitioner_company_name')  . ' including employees and logos, emblems or signs;', $fontR, $paraL);
	$section->writetext('Exhibit 22 - Addresses, direction and telephone numbers for each facility;', $fontR, $paraL);
	$section->writetext('Exhibit 23 - ' . getFieldLC('petitioner_company_name')  . ' Organizational Chart;', $fontR, $paraL);
	$section->writetext('Exhibit 24 - List of ' . getFieldLC('petitioner_company_name') . 'employees by name, title, duties with wage or salary paid to each;', $fontR, $paraL);
	$section->writetext('Exhibit 25 - Payroll Records for ' . getFieldLC('petitioner_company_name') . ' for past 12 months; ', $fontR, $paraL);
	$section->writetext('Exhibit 26 - Business Plan with five year financial projections.', $fontR, $paraL);
	addNewLine(2) ;
	
	
	
	$section->writetext(getFieldLC('L_Int_Company') . ' Documents', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext('Exhibit 1 - Certificate of  Incorporation or other organizational certificate for Foreign Company that directly employed Employee and all Holding Company or other entity above it;', $fontR, $paraL);
	$section->writetext('Exhibit 2 - Dunn and Bradstreet certification number;', $fontR, $paraL);
	$section->writetext('Exhibit 3 - Relevant Business Licenses for ' . getFieldLC('L_Int_Company') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 4 - Corporate minutes referring to establishment of branch company;', $fontR, $paraL);
	$section->writetext('Exhibit 5 - ' . getFieldLC('L_Int_Company') . ' Organizational Chart;', $fontR, $paraL);
	$section->writetext('Exhibit 6 - ' . getFieldLC('L_Int_Company') . ' Taxes for last three years;', $fontR, $paraL);
	$section->writetext('Exhibit 7 - Profit and Loss  Statement and Balance Sheet for last three years; ', $fontR, $paraL);
	$section->writetext('Exhibit 8 - ' . getFieldLC('L_Int_Company') . ' website;', $fontR, $paraL);
	$section->writetext('Exhibit 9 - Marketing Materials;', $fontR, $paraL);
	$section->writetext('Exhibit 10 - Photographs of ' . getFieldLC('L_Int_Company') . ' including employees and logos, emblems or signs;', $fontR, $paraL);
	$section->writetext('Exhibit 11 -' . getFieldLC('L_Int_Company') . ' vendor invoices (sampling of ten);', $fontR, $paraL);
	$section->writetext('Exhibit 12 -' . getFieldLC('L_Int_Company') . ' client invoices (sampling of ten);', $fontR, $paraL);
	$section->writetext('Exhibit 13 -' . getFieldLC('L_Int_Company') . ' Bank Statements for last twelve months;', $fontR, $paraL);
	$section->writetext('Exhibit 14 -' . getFieldLC('L_Int_Company') . ' payroll records for last twelve months;', $fontR, $paraL);
	$section->writetext('Exhibit 15 - Lease  or Deed for business premises; ', $fontR, $paraL);
	$section->writetext('Exhibit 16 - Address and telephone numbers for each facility;', $fontR, $paraL);
	$section->writetext('Exhibit 17 - Chart of Businesses indicating the relationship between the ' . getFieldLC('L_Int_Company') . ', the ' . getFieldLC('petitioner_company_name') . ' Holding Companies or other entities with significant interest therein;', $fontR, $paraL);
	$section->writetext('Exhibit 18 - Stock certificates and other indicators of ownership of the ' . getFieldLC('L_Int_Company') . ' that employed Employee and any other entity that held a significant interest in it;', $fontR, $paraL);
	$section->writetext('Exhibit 19 - Organizational Chart of ' . getFieldLC('L_Int_Company') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 20 - Letter from' . getFieldLC('L_Int_Company') . ' detailing the position of ' . getFieldLC('L_Beneficiary_IC_Position') . ', the duties of the position and the term of the position; ', $fontR, $paraL);
	$section->writetext('Exhibit 21 - Letter from ' . getFieldLC('petitioner_company_name') . ' detailing the position of ' . getFieldLC('L_Beneficiary_US_Position') . ' in the US, the duties, the salary and the term of the stint with the ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 22 - Payroll records from ' . getFieldLC('L_Int_Company') . ' for past 12 months;', $fontR, $paraL);
	$section->writetext('Exhibit 23 - Personal Tax Returns for last three years;', $fontR, $paraL);
	$section->writetext('Exhibit 24 - Governmental tax form indicating employment with ' . getFieldLC('L_Int_Company') . ' for one full year within last three years;', $fontR, $paraL);
	$section->writetext('Exhibit 25 - Employment contract between ' . getFieldLC('petitioner_company_name') . ' and ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 26 -Employment contract between ' . getFieldLC('L_Int_Company') . ' and ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ';', $fontR, $paraL);
	
	$section->insertPageBreak() ;
	
	$section->writetext('CRITERIA', $fontT, $paraL) ;
	addNewLine(2) ;
	$section->writetext('L Visas. 101  (a)(15)(L), 8 USC  1101 (a)(15)(L), 8 CFR  214.2 (l), 22 CFR  41.54.', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('Issuance of an L-1 A Visa, Intra-Company Transferee, relevant to this petition, requires:', $fontR, $paraL);
	$section->writetext('Pursuant to INA 101 (a)(15)(L), 8 CFR  214.2 (l)(1)(i) ', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext('(A) an alien who within three years preceding the subject petition has been employed abroad for one continuous year by a qualifying organization *(see definition of qualifying organization supra);', $fontR, $paraL) ;
	$section->writetext('(B) may be admitted temporarily to the United States, OI  214.2 (l)(5)(ii)(B)', $fontR, $paraL) ;
	$section->writetext('(C) to be employed by a parent, branch, affiliate or subsidiary of the qualifying organization', $fontR, $paraL) ;
	$section->writetext('(D) to continue work in a full-time capacity that is managerial, executive or involves specialized knowledge by beneficiary for a parent, branch, subsidiary of the United States employer to continue work in a executive or executive capacity. I.A. 90  206(a).', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('(1) QUALIFYING ORGANIZATION', $fontB, $paraL);
	addNewLine(1) ;
	$section->writetext('Qualifying Organization means a United States or foreign firm, corporation, or other legal entity which: 8 CFR 214.2 (l)(1)(ii)(G)', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('(A) Meets exactly one of the qualifying relationships specified in the definitions of a parent, branch, affiliate, or subsidiary specified in paragraph (l)(1)(ii) of this section', $fontR, $paraL);
	$section->writetext('(B) Is or will be doing business as an employer in the United States and in at least one other country directly or through a parent, branch, affiliate, or subsidiary for the duration of the alien’s stay in the United States as an intra-company transferee; and ', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('Otherwise meets the requirements of Section 101 (a)(15)(L) of the Act.', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('(C) Parent means a firm, corporation, or other legal entity which has subsidiaries. 8 CFR 214.2 (l)(1)(ii)(I)', $fontR, $paraL);
	$section->writetext('(D) Subsidiary means a firm, corporation, or other legal entity of which a parent owns, directly, more than half of the entity and controls the entity 8 CFR 214.2 (l)(1)(ii)(k).', $fontR, $paraL);
	
	addNewLine(2) ;
	$section->writetext('(2) EXECUTIVE CAPACITY', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('The term "executive capacity" means an assignment within an organization in which the employee primarily', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('(A) Directs the management of the organization or a major component or function of the organization;', $fontR, $paraL);
	$section->writetext('(B) Establishes the goals and policies of the organization, component, or function;', $fontR, $paraL);
	$section->writetext('(C) Exercises wide latitude in discretionary decision-making; and', $fontR, $paraL);
	$section->writetext('(D) Receives only general supervision or direction from higher level executives, the board of directors, or stockholders of the organization.. 8 CFR  214.2 (l)(1)(ii)(C)', $fontR, $paraL);
	
	$section->insertPageBreak() ;
	
	// START : BENEFICIARY
	
	$section->writetext('BENEFICIARY', $fontT, $paraL) ;
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

	$cellBFL->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ', a Citizen and National of ' . getFieldLC('beneficiary_citizenship_country'), $fontR, $paraL) ;
	$cellBFL->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ', worked as ' . getFieldLC('L_Beneficiary_IC_Position') . ' at  ' . getFieldLC('L_Int_Company') . "'s " .  getFieldLC('L_Beneficiary_work_venue_IC') . ' location since ' . getFieldLC('L_Beneficiary_Start_Date_IC'). '.', $fontR, $paraL) ;
	
	// Starting paragraphs
	
	$section->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') .' handled the following duties for ' . getFieldLC('L_Int_Company'), $fontR, $fontL);
	$section->writetext(getFieldLC('L_Category_Duty_IC_1'), $fontR, $fontL);
	$section->writetext(getFieldLC('L_Category_Duty_IC_2'), $fontR, $fontL);
	$section->writetext(getFieldLC('L_Category_Duty_IC_3'), $fontR, $fontL);
	addNewLine(1);
	
	$section->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') .' will conduct the following dutis for  ' . getFieldLC('petitioner_company_name'), $fontR, $fontL);
	$section->writetext(getFieldLC('L_Category_Duty_USC_1'), $fontR, $fontL);
	$section->writetext(getFieldLC('L_Category_Duty_USC_2'), $fontR, $fontL);
	$section->writetext(getFieldLC('L_Category_Duty_USC_3'), $fontR, $fontL);
	addNewLine(1);
	
	$section->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . 'term of employment is ' . getFieldLC('L_Beneficiary_term_employment') . ', with a salary of ' . getFieldLC('L_Beneficiary_Salary') . '.', $fontR, $fontL);
	
	
	// END : BENEFICIARY
	
	$section->insertPageBreak() ;
	
	// START : PETITIONER COMPANIES
	
		$section->writetext('INDUSTRY', $fontT, $paraL) ;
	addNewLine(1) ;

	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ;  


	$BeneficiaryPhotos = getFileForLinkCode($case_id, 'company_photo') ;   
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
	
	$cellBFL->writetext(getFieldLC('L_Int_Company') . ' is ' . getFieldLC('L_Describe_Intl_Company') . '.' . getFieldLC('L_Int_Company') . ' was established in ' . getFieldLC('L_Place_Incorp_IC') . ' on ' . getFieldLC('L_IC_Date_Incorp') . '.' . getFieldLC('L_Int_Company') . ' is owned by ' . getFieldLC('L_IC_Ownership') . '. It currently has ' . getFieldLC('L_IC_Employees') .  ' and generated ' . getFieldLC('L_IC_Revenues'). '.' . getFieldLC('L_Int_Company') . ' has ' . getFieldLC('L_IC_Assets') . ' in assets.', $fontR, $paraL) ;
	
	$cellBFL->writetext(getFieldLC('petitioner_company_name') . ' is ' . getFieldLC('L_Describe_US_Company') . ' ' . getFieldLC('petitioner_company_name') . ' was established in ' . getFieldLC('L_State_Incorp_USC') . ' on ' . getFieldLC('L_Date_Incorp_USC') . '. S2 ' . getFieldLC('petitioner_company_name') . ' is owned by (S6)' . getFieldLC('L_USC_Ownership') . 'It currently has ' . getFieldLC('L_USC_Employees') . ' and generated ' . getFieldLC('L_USC_Revenues')  . 'in revenues. ' . getFieldLC('petitioner_company_name') . ' has (S9)' . getFieldLC('L_USC_Assets') . ' in assets.', $fontR, $paraL) ;
	
	$cellBFL->writetext('The Companies have the requisite ' . getFieldLC('Companies_Relationship') . ' relationship under Immigration regulations.', $fontR, $paraL) ;
	
	// END : PETITIONER COMPANIES
	
	$section->insertPageBreak() ;
	
	// START : INDUSTRY
	
	$section->writetext('INDUSTRY', $fontT, $paraL) ;
	addNewLine(1) ;

	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ;  


	$BeneficiaryPhotos = getFileForLinkCode($case_id, 'industry_photo') ;   
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

	$cellBFL->writetext(getFieldLC('Target_Market'), $fontR, $paraL) ;
	
	// END : INDUSTRY
	
	
	$section->writetext('LEGAL DISCUSSION AND RECITATION OF AUTHORITIES', $fontT, $paraL) ;
	addNewLine(2) ;
	$section->writetext('Employment Abroad for continuous period of one year', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ' meets the criteria of the regulation to the right for the following reasons. ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_last_name') . ' has been employed by ' . getFieldLC('L_Int_Company') . ' as ' . getFieldLC('L_Beneficiary_IC_Position') . ' for more than one year within the last three years. ', $fontR, $paraL);
	$section->writetext('This meets the criteria of paragraph <strong>a) as an alien who within the three years preceding the subject petition has been employed abroad for one continuous year by a qualifying organization</strong>', $fontR, $paraL);
	addNewLine(2) ;
	
	
	
	$section->writetext('Qualifying Organization and Relationship of the overseas and U.S. company', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('L_Int_Company') . ' meets the criteria of a qualifying organization with a relationship to the U.S. company pursuant to the regulations.', $fontR, $paraL);
	$section->writetext(getFieldLC('L_Int_Company') . 'has following ownership', $fontR, $paraL);
	$section->writetext(getFieldLC('L_IC_Ownership'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext(getFieldLC('petitioner_company_name') . ' has following ownership', $fontR, $paraL);
	$section->writetext(getFieldLC('L_USC_Ownership'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('Therefore the companies have a ' . getFieldLC('Companies_Relationship') . ' relationship. ', $fontR, $paraL);
	$section->writetext(getFieldLC('L_Int_Company')  . ' was founded in ' . getFieldLC('L_IC_Date_Incorp') . '.The ' . getFieldLC('petitioner_company_name') . ' was established in '. getFieldLC('L_Place_Incorp_IC') . ' in' . getFieldLC('L_IC_Date_Incorp'), $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('The Exhibits attached meet the regulation which state, "Meets exactly one of the qualifying relationships specified in the definitions of a parent, branch affiliate, or subsidiary for the duration of the alien’s stay in the United States as an intra-company transferee." ', $fontR, $paraL);
	$section->writetext('The following exhibits establish the qualifying relationship as discussed above:', $fontR, $paraL);
	addNewLine(1) ;
	
	
	$section->writetext('Exhibit 1 - Articles of Organization or Articles of Incorporation ' . getFieldLC('petitioner_company_name') . ' of ' . getFieldLC('petitioner_company_name') . ' and any other entity above it;', $fontR, $paraL);
	$section->writetext('Exhibit 2 - Certificate of  Incorporation or other organizational certificate for ' . getFieldLC('L_Int_Company') . ' that directly employed ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 3 - Operating Agreement or By-Laws of ' . getFieldLC('L_USC_Ownership') . ' of ' . getFieldLC('petitioner_company_name') . ' and any ' . getFieldLC('L_USC_Ownership'), $fontR, $paraL);
	$section->writetext('Exhibit 4 - Dunn and Bradstreet certification and number ' . getFieldLC('L_USC_Ownership') . ' and any ' . getFieldLC('L_USC_Ownership') . ' with a major interest in it;', $fontR, $paraL);
	$section->writetext('Exhibit 5 - Dunn and Bradstreet certification and number of ' . getFieldLC('L_Int_Company') . 'and any ' . getFieldLC('L_Holding_Company_Description') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 6 - List of Owners of ' . getFieldLC('petitioner_company_name') . ' and what percentage they own', $fontR, $paraL);
	$section->writetext('Exhibit 7 - Stock certificates or proof of ownership;', $fontR, $paraL);
	$section->writetext('Exhibit 8 - Board Meeting Minutes regarding formation of ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 9 - Letter from Accountant or other financial person for ' . getFieldLC('petitioner_company_name') . ';', $fontR, $paraL);
	$section->writetext('Exhibit 10 - Letter from Accountant or other financial person for ' . getFieldLC('L_Int_Company') . '.', $fontR, $paraL);
	addNewLine(2) ;
	
	
	
	$section->writetext('Evidence that ' . getFieldLC('petitioner_company_name') .' is or will be doing business in the U.S', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext('Exhibit 1 - Signed and dated Lease or Deed of ' . getFieldLC('petitioner_company_name') . "'s facility", $fontR, $paraL);
	$section->writetext('Exhibit 2 - If leased, Letter from owner of building on letterhead with telephone number, indicating confirming ' . getFieldLC('petitioner_company_name') . ' is occupying the space verifying total square footage of the premises and total number of work stations/ people that the space will accommodate.', $fontR, $paraL);
	$section->writetext('Exhibit 3 - Floor plan of ' . getFieldLC('petitioner_company_name'), $fontR, $paraL);
	$section->writetext('Exhibit 4 - ' . getFieldLC('petitioner_company_name') . ' Bank Statements for last 12 months', $fontR, $paraL);
	$section->writetext('Exhibit 5 - ' . getFieldLC('petitioner_company_name') . ' taxes for last three years or inception if less than three years', $fontR, $paraL);
	$section->writetext('Exhibit 6 - Profit and Loss Statement since start of the year', $fontR, $paraL);
	$section->writetext('Exhibit 7 - ' . getFieldLC('petitioner_company_name') . ' Annual Report', $fontR, $paraL);
	$section->writetext('Exhibit 8 - Client invoices sampling', $fontR, $paraL);
	$section->writetext('Exhibit 9 - Business Licenses, Occupancy permits, insurance policy for facility or equipment', $fontR, $paraL);
	$section->writetext('Exhibit 10 - Federal Identification Number (FEIN)', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('The evidence above meets the requirement that ' . getFieldLC('petitioner_company_name') . '"is or will be doing business as an employer in the United States and in at least one other country directly or through a parent, branch, affiliate, or subsidiary for the duration of the alien’s stay in the United States as an intra-company transferee."', $fontR, $paraL);
	$section->writetext('The Exhibits listed below meet the regulation to the right which states, "Meets exactly one of the qualifying relationships specified in the definitions of a parent, branch affiliate, or subsidiary for the duration of the alien’s stay in the United States as an intra-company transferee"', $fontR, $paraL);
	$section->writetext('The regulation to the right defines parent as a firm, corporation, or other legal entity which has subsidiaries', $fontR, $paraL);
	$section->writetext('The regulation to the right defines subsidiary as a firm, corporation, or other legal entity of which a parent owns, directly, more than half of the entity and controls the entity.', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('The following exhibits establish the qualifying relationship as discussed above:', $fontR, $paraL);
	addNewLine(2) ;
	
	
	
	$section->writetext(getFieldLC('L_Int_Company') . ' Documents ', $fontT, $paraT);
	addNewLine(1) ;
	$section->writetext('Exhibit 1 - Relevant Business Licenses for ' . getFieldLC('L_Int_Company'), $fontR, $paraL);
	$section->writetext('Exhibit 2 - Letter from ' . getFieldLC('L_Int_Company') . ' Accountant, auditor or appropriate government official.', $fontR, $paraL);
	$section->writetext('Exhibit 3 - Corporate minutes referring to establishment of branch company ', $fontR, $paraL);
	$section->writetext('Exhibit 4 - ' . getFieldLC('L_Int_Company') . ' Business Plan if different from ' . getFieldLC('petitioner_company_name') . ', including five year financial projections', $fontR, $paraL);
	$section->writetext('Exhibit 5 - ' . getFieldLC('L_Int_Company') . ' Organizational Chart', $fontR, $paraL);
	$section->writetext('Exhibit 6 - ' . getFieldLC('L_Int_Company') . ' Audited Financial Reports for last three years', $fontR, $paraL);
	$section->writetext('Exhibit 7 - ' . getFieldLC('L_Int_Company') . ' Taxes for last three years', $fontR, $paraL);
	$section->writetext('Exhibit 8 - Profit and Loss Statement and Balance Sheet for last three years', $fontR, $paraL);
	$section->writetext('Exhibit 9 - ' . getFieldLC('L_Int_Company') . ' website', $fontR, $paraL);
	$section->writetext('Exhibit 10 - Marketing Materials', $fontR, $paraL);
	$section->writetext('Exhibit 11 - Photographs of ' . getFieldLC('L_Int_Company') . ' including employees and logos, emblems or signs', $fontR, $paraL);
	$section->writetext('Exhibit 12 - ' . getFieldLC('L_Int_Company') . ' vendor invoices sampling of ten', $fontR, $paraL);
	$section->writetext('Exhibit 13 - ' . getFieldLC('L_Int_Company') . ' client invoices sampling of ten', $fontR, $paraL);
	$section->writetext('Exhibit 14 - ' . getFieldLC('L_Int_Company') . 'Bank Statements for last twelve months', $fontR, $paraL);
	$section->writetext('Exhibit 15 - ' . getFieldLC('L_Int_Company') . ' payroll records for last twelve months', $fontR, $paraL);
	$section->writetext('Exhibit 16 - Lease  or Deed for business premises ', $fontR, $paraL);
	$section->writetext('Exhibit 17 - Address and telephone numbers for each facility', $fontR, $paraL);
	$section->writetext('Exhibit 18 - Chart of Businesses indicating the relationship between the ' . getFieldLC('L_Int_Company') . ' , the ' . getFieldLC('petitioner_company_name') . ', ' . getFieldLC('L_Holding_Company_Description') . ' or other entities with 	significant interest therein.', $fontR, $paraL);
	$section->writetext('Exhibit 19 - Stock certificates and other indicators of ownership of the ' . getFieldLC('L_Int_Company') . ' that employed Employee and any other entity that held a significant interest in it. ', $fontR, $paraL);
	$section->writetext('Exhibit 20 - Organizational Chart of Foreign Company', $fontR, $paraL);
	addNewLine(2) ;
	
	$section->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') .' Executive/Managerial Capacity', $fontT, $paraT) ;
	addNewLine(1) ;
	$section->writetext('Exhibit 1 - Employer Support Letter from ' . getFieldLC('petitioner_company_name') , $fontR, $paraL);
	$section->writetext('Exhibit 2 - Expert Letter from Certified Accountant from '. getFieldLC('petitioner_company_name') , $fontR, $paraL);
	$section->writetext('Exhibit 3 - Employment (service) contract' , $fontR, $paraL);
	$section->writetext('Exhibit 4 - Previous employment letter from ' . getFieldLC('L_Int_Company') , $fontR, $paraL);
	$section->writetext('Exhibit 5 - Expert Letter from Certified Accountant from ' . getFieldLC('L_Int_Company') , $fontR, $paraL);
	$section->writetext('Exhibit 6 - Organizational Chart' , $fontR, $paraL);
	$section->writetext('Exhibit 7 - Pay records indicating employment with ' . getFieldLC('L_Int_Company') , $fontR, $paraL);
	$section->writetext('Exhibit 8 - Personal Tax Returns;' , $fontR, $paraL);
	$section->writetext('Exhibit 9 - Payroll records indicating employment with ' . getFieldLC('L_Int_Company') , $fontR, $paraL);
	$section->writetext('Exhibit 10 - Press articles ' , $fontR, $paraL);
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . "'s meets of the criteria permitting entry temporarily to the United States to be employed by " . getFieldLC('petitioner_company_name') . ', the ' . getFieldLC('Companies_Relationship') . ' of ' . getFieldLC('L_Int_Company') . ', a qualifying organization, to continue work in a full time capacity. The position must be executive, managerial or involve specialized knowledge by beneficiary for a parent, branch, subsidiary of the United States employer to continue work in a executive capacity under the regulation to the right. ' , $fontR, $paraL);
	
	addNewLine(1) ;
	$section->writetext('(Select one of the following :)', $fontR, $paraL);
	addNewLine(2) ;
	$section->writetext('(1)Pursuant to the regulations, the term "executive capacity" means an assignment within an organization in which the employee primarily', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('(A) Directs the management of the organization or a major component or function of the organization;', $fontR, $paraL);
	$section->writetext('(B) Establishes the goals and policies of the organization, component, or function;', $fontR, $paraL);
	$section->writetext('(C) Exercises wide latitude in discretionary decision-making; and', $fontR, $paraL);
	$section->writetext('(D) Receives only general supervision or direction from higher level executives, the board of directors, or stockholders of the organization.', $fontR, $paraL);
	addNewLine(2) ;
	$section->writetext('(2) The term "managerial capacity" means an assignment with the organization in which the employee personally:', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('(A) Manages the organization, department, subdivision, function or component; ', $fontR, $paraL);
	$section->writetext('(B) Supervises and controls the work of other supervisory, professional or managerial employees or manages an essential function within the organization or subdivision of the organization;', $fontR, $paraL);
	$section->writetext('(C) Has the authority to hire and fire or recommend personnel actions (if another directly supervises employees), or if no direct supervision, functions at a senior level, and ', $fontR, $paraL);
	$section->writetext('(D) Exercises discretion over day-to-day operations of the activity or function', $fontR, $paraL);
	addNewLine(2) ;
	
	$section->writetext('Exhibit is the Employment Letter from ' . getFieldLC('petitioner_primary_contact') . ' which states as follows:', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('Exhibit meets the criteria to the right as it clearly establishes ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . "'s employment as " . getFieldLC('L_Beneficiary_US_Position') . ' is a qualifying position by meeting the following criteria the criteria above:', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('Exhibit  is the  employment agreement between ' . getFieldLC('petitioner_company_name') . ' and ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_last_name')  . ' which also meets the criteria discussed above. ', $fontR, $paraL);
	
	
	$section->insertPageBreak() ;
	
	
	$section->writetext('CONCLUSION', $fontT, $paraT);
	addNewLine(1) ;
	$section->writetext('Based upon the evidence submitted by ' . getFieldLC('petitioner_company_name') . ', the ' . getFieldLC('Companies_Relationship') . ' of ' . getFieldLC('L_Int_Company') . ', a company organized under the laws of ' . getFieldLC('L_State_Incorp_USC') . 'that qualifies as a multinational organization seeks an L-1A visa for ' . getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ', who meets the criteria of a multinational executive or manager.' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_last_name') . ' worked for more than one continuous year abroad before seeking transference  to ' . getFieldLC('petitioner_company_name') . ' pursuant to the L-1A category. ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_last_name') . "'s transfer to the United States company is for full time employment in a executive/mangrial capacity.  Pursuant to the governing regulations for the L-1 intra-company transferee," . getFieldLC('petitioner_company_name') . ' requests that an L-1A visa  be issued for ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_last_name') . '.', $fontR, $paraL);
	addNewLine(1) ;
	$section->writetext('Respectfully Submitted,', $fontR, $paraL);
	addNewLine(2) ;
	$section->writetext('Jon Velie', $fontR, $paraL);
	$section->writetext('Attorney for Petitioner', $fontR, $paraL);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 ?>