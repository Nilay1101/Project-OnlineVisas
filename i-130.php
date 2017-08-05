<?php

	$inputFile = 'document-templates/i-130.pdf' ;
	$reader = new SetaPDF_Core_Reader_File($inputFile) ;
	$document = SetaPDF_Core_Document::load($reader, $writer) ;
	// Unlock security
	$secHandlerIn = $document->getSecHandlerIn() ;
	if ($secHandlerIn->auth('')) {
	    $ref = new ReflectionClass($secHandlerIn) ;
	    $prop = $ref->getProperty('_authMode') ;
	    $prop->setAccessible(true) ;
	    $prop->setValue($secHandlerIn, SetaPDF_Core_SecHandler::OWNER) ;
	} else {
	    $secHandlerIn->auth('owner password') ;
	}
	$document->setSecHandler(null) ;
	$document->getCatalog()->getPermissions()->removeUsageRights() ;
	$document->getCatalog()->getAcroForm()->removeXfaInformation() ;
	
	$formFiller = new SetaPDF_FormFiller($document) ;
	$PDFfields = $formFiller->getFields() ;
	
	// SET UP FIELD MAPPING
	// Goes here
	
	checkBox('g28_attach',
		array(
			'Yes' => 'form1[0].#subform[0].CheckBox1[0]'
		)
	) ;
	
	writeText('volag_no',  'form1[0].#subform[0].VolagNumber[0]') ;
	writeText('attorney_state_bar_number',  'form1[0].#subform[0].AttorneyStateBarNumber[0]') ;
	writeText('uscis_oan',  'form1[0].#subform[0].USCISOnlineAcctNumber[0]') ;
	
	//PART1 - START
	
	checkBox('petitioner_beneficiary_relation',
		array(
			'Spouse' => 'form1[0].#subform[0].Pt1Line1_Spouse[0]' ,
			'Parent' => 'form1[0].#subform[0].Pt1Line1_Parent[0]' ,
			'Brother/Sister' => 'form1[0].#subform[0].Pt1Line1_Siblings[0]' ,
			'Child' => 'form1[0].#subform[0].Pt1Line1_Child[0]'
		)
	) ;
	
	checkBox('child_parent_beneficiary_relation',
		array(
			"Child was born to parents who were married to each other at the time of the child's birth" => 'form1[0].#subform[0].Pt1Line2_InWedlock[0]',
			'Stepchild/Stepparent' => 'form1[0].#subform[0].Pt1Line2_Stepchild[0]' ,
			"Child was born to parents who were not married to each other at the time of the child's birth" => 'form1[0].#subform[0].Pt1Line2_OutOfWedlock[0]' ,
			'Child was adopted (not an Orphan or Hague Convention adoptee)' => 'form1[0].#subform[0].Pt1Line2_AdoptedChild[0]'
		)
	) ;
	
	checkBox('sibling_adoption_relation',
		array(
			'Yes' => 'form1[0].#subform[0].Pt1Line3_Yes[0]' ,
			'No' => 'form1[0].#subform[0].Pt1Line3_No[0]'
		)
	) ;
	
	checkBox('LPR_by_adoption',
		array(
			'Yes' => 'form1[0].#subform[0].Pt1Line4_Yes[0]' ,
			'No' => 'form1[0].#subform[0].Pt1Line4_No[0]'
		)
	) ;
	
	//PART1 - END 
	
	//PART2 - START
	
	writeText('petitioner_alien_number',  'form1[0].#subform[0].#area[4].Pt2Line1_AlienNumber[0]') ;
	writeText('petitioner_uscis_oan',  'form1[0].#subform[0].#area[5].Pt2Line2_USCISOnlineActNumber[0]') ;
	writeText('pettioner_uscis_ssn',  'form1[0].#subform[0].Pt2Line11_SSN[0]') ;
	
	writeText('petitioner_name_family',  'form1[0].#subform[0].Pt2Line4a_FamilyName[0]') ;
	writeText('petitioner_name_given',  'form1[0].#subform[0].Pt2Line4b_GivenName[0]') ;
	writeText('petitioner_name_middle',  'form1[0].#subform[0].Pt2Line4c_MiddleName[0]') ;
	
	writeText('petitioner_other_name_family_1',  'form1[0].#subform[1].Pt2Line5a_FamilyName[0]') ;
	writeText('petitioner_other_name_given_1',  'form1[0].#subform[1].Pt2Line5b_GivenName[0]') ;
	writeText('petitioner_other_name_middle_1',  'form1[0].#subform[1].Pt2Line5c_MiddleName[0]') ;
	
	writeText('petitioner_birth_city',  'form1[0].#subform[1].Pt2Line6_CityTownOfBirth[0]') ;
	writeText('petitioner_birth_country',  'form1[0].#subform[1].Pt2Line7_CountryofBirth[0]') ;
	writeText('petitioner_dob',  'form1[0].#subform[1].Pt2Line8_DateofBirth[0]') ;
	checkBox('petitioner_gender',
		array(
			'M' => 'form1[0].#subform[1].Pt2Line9_Male[0]' ,
			'F' => 'form1[0].#subform[1].Pt2Line9_Female[0]'
		)
	) ;
	
	writeText('petitioner_address_care_name',  'form1[0].#subform[1].Pt2Line10_InCareofName[0]') ;
	writeText('petitioner_address_street_number_name',  'form1[0].#subform[1].Pt2Line10_StreetNumberName[0]') ;
	checkBox('petitioner_address_o',
		array(
			'Apt' => 'form1[0].#subform[1].Pt2Line10_Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].Pt2Line10_Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].Pt2Line10_Unit[2]'
		)
	) ;
	writeText('petitioner_apt_ste_flr_number',  'form1[0].#subform[1].Pt2Line10_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_city',  'form1[0].#subform[1].Pt2Line10_CityOrTown[0]') ;
	writeText('petitioner_address_state',  'form1[0].#subform[1].Pt2Line10_State[0]') ;
	writeText('petitioner_address_zip_code',  'form1[0].#subform[1].Pt2Line10_ZipCode[0]') ;
	writeText('petitioner_address_province',  'form1[0].#subform[1].Pt2Line10_Province[0]') ;
	writeText('petitioner_address_postal_code',  'form1[0].#subform[1].Pt2Line10_PostalCode[0]') ;
	writeText('petitioner_address_country',  'form1[0].#subform[1].Pt2Line10_Country[0]') ;
	checkBox('petitioner_cms_pa',
		array(
			'Yes' => 'form1[0].#subform[1].Pt2Line11_Yes[0]' ,
			'No' => 'form1[0].#subform[1].Pt2Line11_No[0]' 
		)
	) ;
	
	writeText('petitioner_address_1_street_number_name',  'form1[0].#subform[1].Pt2Line12_StreetNumberName[0]') ;
	checkBox('petitioner_address_1_o',
		array(
			'Apt' => 'form1[0].#subform[1].Pt2Line12_Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].Pt2Line12_Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].Pt2Line12_Unit[2]'
		)
	) ;
	writeText('petitioner_address_1_apt_ste_flr_number',  'form1[0].#subform[1].Pt2Line12_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_1_city',  'form1[0].#subform[1].Pt2Line12_CityOrTown[0]') ;
	writeText('petitioner_address_1_state',  'form1[0].#subform[1].Pt2Line12_State[0]') ;
	writeText('petitioner_address_1_zip_code',  'form1[0].#subform[1].Pt2Line12_ZipCode[0]') ;
	writeText('petitioner_address_1_province',  'form1[0].#subform[1].Pt2Line12_Province[0]') ;
	writeText('petitioner_address_1_postal_code',  'form1[0].#subform[1].Pt2Line12_PostalCode[0]') ;
	writeText('petitioner_address_1_country',  'form1[0].#subform[1].Pt2Line12_Country[0]') ;
	writeText('petitioner_address_1_date_from',  'form1[0].#subform[1].Pt2Line13a_DateFrom[0]') ;
	writeText('petitioner_address_1_date_to',  'form1[0].#subform[1].Pt2Line13b_DateTo[0]') ;
	
	writeText('petitioner_address_2_street_number_name',  'form1[0].#subform[1].Pt2Line14_StreetNumberName[0]') ;
	checkBox('petitioner_address_2_o',
		array(
			'Apt' => 'form1[0].#subform[1].Pt2Line14_Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].Pt2Line14_Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].Pt2Line14_Unit[2]'
		)
	) ;
	writeText('petitioner_address_2_apt_ste_flr_number',  'form1[0].#subform[1].Pt2Line14_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_2_city',  'form1[0].#subform[1].Pt2Line14_CityOrTown[0]') ;
	writeText('petitioner_address_2_state',  'form1[0].#subform[1].Pt2Line14_State[0]') ;
	writeText('petitioner_address_2_zip_code',  'form1[0].#subform[1].Pt2Line14_ZipCode[0]') ;
	writeText('petitioner_address_2_province',  'form1[0].#subform[1].Pt2Line14_Province[0]') ;
	writeText('petitioner_address_2_postal_code',  'form1[0].#subform[1].Pt2Line14_PostalCode[0]') ;
	writeText('petitioner_address_2_country',  'form1[0].#subform[1].Pt2Line14_Country[0]') ;
	writeText('petitioner_address_2_date_from',  'form1[0].#subform[1].Pt2Line15a_DateFrom[0]') ;
	writeText('petitioner_address_2_date_to',  'form1[0].#subform[1].Pt2Line15b_DateTo[0]') ;
	
	writeText('petitioner_marriage_number',  'form1[0].#subform[1].Pt2Line16_NumberofMarriages[0]') ;
	checkBox('petitioner_maritial_status',
		array(
			'Single' => 'form1[0].#subform[1].Pt2Line17_Single[0]' ,
			'Married' => 'form1[0].#subform[1].Pt2Line17_Married[0]' ,
			'Divorced' => 'form1[0].#subform[1].Pt2Line17_Divorced[0]' ,
			'Widowed' => 'form1[0].#subform[1].Pt2Line17_Widowed[0]' ,
			'Separated' => 'form1[0].#subform[1].Pt2Line17_Separated[0]' ,
			'Annuled' => 'form1[0].#subform[1].Pt2Line17_Annulled[0]' 
			
		)
	) ;
	writeText('petitioner_spouse_current_date_marriage',  'form1[0].#subform[2].Pt2Line18_DateOfMarriage[0]') ;
	
	writeText('petitioner_spouse_current_marriage_city',  'form1[0].#subform[2].Pt2Line19a_CityTown[0]') ;
	writeText('petitioner_spouse_current_marriage_state',  'form1[0].#subform[2].Pt2Line19b_State[0]') ;
	writeText('petitioner_spouse_current_marriage_province',  'form1[0].#subform[2].Pt2Line19c_Province[0]') ;
	writeText('petitioner_spouse_current_marriage_country',  'form1[0].#subform[2].Pt2Line19d_Country[0]') ;
	
	writeText('petitioner_spouse_previous_name_family',  'form1[0].#subform[2].PtLine20a_FamilyName[0]') ;
	writeText('petitioner_spouse_previous_name_given',  'form1[0].#subform[2].Pt2Line20b_GivenName[0]') ;
	writeText('petitioner_spouse_previous_name_middle',  'form1[0].#subform[2].Pt2Line20c_MiddleName[0]') ;
	writeText('petitioner_spouse_previous_date_divorce',  'form1[0].#subform[2].Pt2Line21_DateMarriageEnded[0]') ;
	writeText('petitioner_spouse_previous_2_name_family',  'form1[0].#subform[2].Pt2Line22a_FamilyName[0]') ;
	writeText('petitioner_spouse_previous_2_name_given',  'form1[0].#subform[2].Pt2Line22b_GivenName[0]') ;
	writeText('petitioner_spouse_previous_2_name_middle',  'form1[0].#subform[2].Pt2Line22c_MiddleName[0]') ;
	writeText('petitioner_spouse_previous_2_date_divorce',  'form1[0].#subform[2].Pt2Line23_DateMarriageEnded[0]') ;
	
	writeText('petitioner_parent_1_name_family',  'form1[0].#subform[2].Pt2Line24_FamilyName[0]') ;
	writeText('petitioner_parent_1_name_given',  'form1[0].#subform[2].Pt2Line24_GivenName[0]') ;
	writeText('petitioner_parent_1_name_middle',  'form1[0].#subform[2].Pt2Line24_MiddleName[0]') ;
	writeText('petitioner_parent_1_dob',  'form1[0].#subform[2].Pt2Line25_DateofBirth[0]') ;
	checkBox('petitioner_parent_1_gender',
		array(
			'M' => 'form1[0].#subform[2].Pt2Line26_Male[0]' ,
			'F' => 'form1[0].#subform[2].Pt2Line26_Female[0]' 
		)
	) ;
	writeText('petitioner_parent_1_birth_country',  'form1[0].#subform[2].Pt2Line27_CountryofBirth[0]') ;
	writeText('petitioner_parent_1_residence_city',  'form1[0].#subform[2].Pt2Line28_CityTownOrVillageOfResidence[0]') ;
	writeText('petitioner_parent_1_residence_country',  'form1[0].#subform[2].Pt2Line29_CountryOfResidence[0]') ;
	writeText('petitioner_parent_2_name_family',  'form1[0].#subform[2].Pt2Line30a_FamilyName[0]') ;
	writeText('petitioner_parent_2_name_given',  'form1[0].#subform[2].Pt2Line30b_GivenName[0]') ;
	writeText('petitioner_parent_2_name_middle',  'form1[0].#subform[2].Pt2Line30c_MiddleName[0]') ;
	writeText('petitioner_parent_2_dob',  'form1[0].#subform[2].Pt2Line31_DateofBirth[0]') ;
	checkBox('petitioner_parent_2_gender',
		array(
			'M' => 'form1[0].#subform[2].Pt2Line32_Male[0]' ,
			'F' => 'form1[0].#subform[2].Pt2Line32_Female[0]' 
		)
	) ;
	writeText('petitioner_parent_2_birth_country',  'form1[0].#subform[2].Pt2Line33_CountryofBirth[0]') ;
	writeText('petitioner_parent_2_residence_city',  'form1[0].#subform[2].Pt2Line34_CityTownOrVillageOfResidence[0]') ;
	writeText('petitioner_parent_2_residence_country',  'form1[0].#subform[2].Pt2Line35_CountryOfResidence[0]') ;
	
	checkBox('petitioner_citizen_type',
		array(
			'U.S. Citizen' => 'form1[0].#subform[2].Pt2Line36_USCitizen[0]' ,
			'Lawful Permanent Resident' => 'form1[0].#subform[2].Pt2Line36_LPR[0]' 
		)
	) ;
	checkBox('petitioner_citizenship',
		array(
			'Birth in the United States' => 'form1[0].#subform[2].Pt2Line23a_checkbox[0]' ,
			'Naturalization' => 'form1[0].#subform[2].Pt2Line23b_checkbox[0]' ,
			'Parents' => 'form1[0].#subform[2].Pt2Line23c_checkbox[0]' 
		)
	) ;
	checkBox('petitioner_citizenship_certificate',
		array(
			'Yes' => 'form1[0].#subform[2].Pt2Line36_Yes[0]' ,
			'No' => 'form1[0].#subform[2].Pt2Line36_No[0]' 
		)
	) ;
	writeText('petitioner_citizenship_certificate_number',  'form1[0].#subform[2].Pt2Line37a_CertificateNumber[0]') ;
	writeText('petitioner_citizenship_certificate_issue_place',  'form1[0].#subform[2].Pt2Line37b_PlaceOfIssuance[0]') ;
	writeText('petitioner_citizenship_certificate_issue_date',  'form1[0].#subform[2].Pt2Line37c_DateOfIssuance[0]') ;
	writeText('petitioner_lpr_admission_class',  'form1[0].#subform[3].Pt2Line40a_ClassOfAdmission[0]') ;
	writeText('petitioner_lpr_admission_date',  'form1[0].#subform[3].Pt2Line40b_DateOfAdmission[0]') ;
	writeText('petitioner_lpr_admission_place',  'form1[0].#subform[3].Pt2Line40d_CityOrTown[0]') ;
	writeText('petitioner_lpr_admission_state',  'form1[0].#subform[3].Pt2Line40e_State[0]') ;
	checkBox('petitioner_lpr_marriage_to_uscitizen_lpr',
		array(
			'Yes' => 'form1[0].#subform[3].Pt2Line41_Yes[0]' ,
			'No' => 'form1[0].#subform[3].Pt2Line41_No[0]' 
		)
	) ;
	
	writeText('petitioner_employer_1_name',  'form1[0].#subform[3].Pt2Line40_EmployerOrCompName[0]') ;
	writeText('petitioner_employer_1_street_number_name',  'form1[0].#subform[3].Pt2Line41_StreetNumberName[0]') ;
	checkBox('petitioner_employer_1_o',
		array(
			'Apt' => 'form1[0].#subform[3].Pt2Line41_Unit[0]' ,
			'Ste' => 'form1[0].#subform[3].Pt2Line41_Unit[1]' ,
			'Flr' => 'form1[0].#subform[3].Pt2Line41_Unit[2]'
		)
	) ;
	writeText('petitioner_employer_1_apt_ste_flr_number',  'form1[0].#subform[3].Pt2Line41_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_1_city',  'form1[0].#subform[3].Pt2Line41_CityOrTown[0]') ;
	writeText('petitioner_employer_1_state',  'form1[0].#subform[3].Pt2Line41_State[0]') ;
	writeText('petitioner_employer_1_zip_code',  'form1[0].#subform[3].Pt2Line41_ZipCode[0]') ;
	writeText('petitioner_employer_1_province',  'form1[0].#subform[3].Pt2Line41_Province[0]') ;
	writeText('petitioner_employer_1_postal_code',  'form1[0].#subform[3].Pt2Line41_PostalCode[0]') ;
	writeText('petitioner_employer_1_country',  'form1[0].#subform[3].Pt2Line41_Country[0]') ;
	writeText('petitioner_employer_1_occupaton',  'form1[0].#subform[3].Pt2Line42_Occupation[0]') ;
	writeText('petitioner_employer_1_date_from',  'form1[0].#subform[3].Pt2Line43a_DateFrom[0]') ;
	writeText('petitioner_employer_1_date_to',  'form1[0].#subform[3].Pt2Line43b_DateTo[0]') ;
	
	writeText('petitioner_employer_2_name',  'form1[0].#subform[3].Pt2Line44_EmployerOrOrgName[0]') ;
	writeText('petitioner_employer_2_street_number_name',  'form1[0].#subform[3].Pt2Line45_StreetNumberName[0]') ;
	checkBox('petitioner_employer_2_o',
		array(
			'Apt' => 'form1[0].#subform[3].Pt2Line45_Unit[0]' ,
			'Ste' => 'form1[0].#subform[3].Pt2Line45_Unit[1]' ,
			'Flr' => 'form1[0].#subform[3].Pt2Line45_Unit[2]'
		)
	) ;
	writeText('petitioner_employer_2_apt_ste_flr_number',  'form1[0].#subform[3].Pt2Line45_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_2_city',  'form1[0].#subform[3].Pt2Line45_CityOrTown[0]') ;
	writeText('petitioner_employer_2_state',  'form1[0].#subform[3].Pt2Line45_State[0]') ;
	writeText('petitioner_employer_2_zip_code',  'form1[0].#subform[3].Pt2Line45_ZipCode[0]') ;
	writeText('petitioner_employer_2_province',  'form1[0].#subform[3].Pt2Line45_Province[0]') ;
	writeText('petitioner_employer_2_postal_code',  'form1[0].#subform[3].Pt2Line45_PostalCode[0]') ;
	writeText('petitioner_employer_2_country',  'form1[0].#subform[3].Pt2Line45_Country[0]') ;
	writeText('petitioner_employer_2_occupation',  'form1[0].#subform[3].Pt2Line46_Occupation[0]') ;
	writeText('petitioner_employer_2_date_from',  'form1[0].#subform[3].Pt2Line47a_DateFrom[0]') ;
	writeText('petitioner_employer_2_date_to',  'form1[0].#subform[3].Pt2Line47b_DateTo[0]') ;
	
	//PART2 - END 
	
	//PART3 - START
	
	checkBox('petitioner_ethnicity',
		array(
			'Hispanic or Latino' => 'form1[0].#subform[3].Pt3Line1_Ethnicity[1]' ,
			'Not Hispanic or Latino' => 'form1[0].#subform[3].Pt3Line1_Ethnicity[0]'
		)
	) ;
	
	checkBoxMulti('petitioner_race',
		array(
			'White' => 'form1[0].#subform[3].Pt3Line2_Race_White[0]' ,
			'Asian' => 'form1[0].#subform[3].Pt3Line2_Race_Asian[0]' ,
			'Black or African American' => 'form1[0].#subform[3].Pt3Line2_Race_Black[0]' ,
			'American Indian or Alaska Native' => 'form1[0].#subform[3].Pt3Line2_Race_AmericanIndianAlaskaNative[0]' ,
			'Native Hawaiian or Other Pacific Islander' => 'form1[0].#subform[3].Pt3Line2_Race_NativeHawaiianOtherPacificIslander[0]'
		)
	) ; 
	
	writeText('petitioner_height_feet',  'form1[0].#subform[3].Pt3Line3_HeightFeet[0]') ;
	writeText('petitioner_height_inches',  'form1[0].#subform[3].Pt3Line3_HeightInches[0]') ;

	$weight = getFieldLC(petitioner_weight) ;
	$efs['form1[0].#subform[3].Pt3Line4_Pound1[0]'] = ucfirst(substr( $weight, -3,-2 )) ;
	$efs['form1[0].#subform[3].Pt3Line4_Pound2[0]'] = ucfirst(substr( $weight, -2,-1 )) ;
	$efs['form1[0].#subform[3].Pt3Line4_Pound3[0]'] = ucfirst(substr( $weight, -1 )) ;

	checkBox('petitioner_eyecolor',
		array(
			'Blue' => 'form1[0].#subform[3].Pt3Line5_EyeColor[0]' ,
			'Brown' => 'form1[0].#subform[3].Pt3Line5_EyeColor[1]' ,
			'Hazel' => 'form1[0].#subform[3].Pt3Line5_EyeColor[2]' ,
			'Pink' => 'form1[0].#subform[3].Pt3Line5_EyeColor[3]' ,
			'Maroon' => 'form1[0].#subform[3].Pt3Line5_EyeColor[4]' ,
			'Green' => 'form1[0].#subform[3].Pt3Line5_EyeColor[5]' ,
			'Gray' => 'form1[0].#subform[3].Pt3Line5_EyeColor[6]' ,
			'Black' => 'form1[0].#subform[3].Pt3Line5_EyeColor[7]' ,
			'Unknown/Other' => 'form1[0].#subform[3].Pt3Line5_EyeColor[8]'
		)
	) ;
	
	checkBox('petitioner_haircolor',
		array(
			'Bald (No Hair)' => 'form1[0].#subform[4].Pt3Line6_HairColor[0]' ,
			'Black' => 'form1[0].#subform[4].Pt3Line6_HairColor[1]' ,
			'Blond' => 'form1[0].#subform[4].Pt3Line6_HairColor[2]' ,
			'Brown' => 'form1[0].#subform[4].Pt3Line6_HairColor[3]' ,
			'Grey' => 'form1[0].#subform[4].Pt3Line6_HairColor[4]' ,
			'Red' => 'form1[0].#subform[4].Pt3Line6_HairColor[5]' ,
			'Sandy' => 'form1[0].#subform[4].Pt3Line6_HairColor[6]' ,
			'White' => 'form1[0].#subform[4].Pt3Line6_HairColor[7]' ,
			'Unknown/Other' => 'form1[0].#subform[4].Pt3Line6_HairColor[8]'
		)
	) ;
	
	//PART3 - END  
	
	//PART4 - START
	
	writeText('beneficiary_alien_number',  'form1[0].#subform[4].#area[6].Pt4Line1_AlienNumber[0]') ;
	writeText('beneficiary_uscis_oan',  'form1[0].#subform[4].#area[7].Pt4Line2_USCISOnlineActNumber[0]') ;
	writeText('beneficiary_uscis_ssn',  'form1[0].#subform[4].Pt4Line3_SSN[0]') ;
	
	writeText('beneficiary_name_family',  'form1[0].#subform[4].Pt4Line4a_FamilyName[0]') ;
	writeText('beneficiary_name_given',  'form1[0].#subform[4].Pt4Line4b_GivenName[0]') ;
	writeText('beneficiary_name_middle',  'form1[0].#subform[4].Pt4Line4c_MiddleName[0]') ;
	
	writeText('beneficiaty_other_name_family_1',  'form1[0].#subform[4].P4Line5a_FamilyName[0]') ;
	writeText('beneficiary_other_name_given_1',  'form1[0].#subform[4].Pt4Line5b_GivenName[0]') ;
	writeText('beneficiary_other_name_middle_1',  'form1[0].#subform[4].Pt4Line5c_MiddleName[0]') ;
	
	writeText('beneficiary_birth_city',  'form1[0].#subform[4].Pt4Line7_CityTownOfBirth[0]') ;
	writeText('beneficiary_birth_country',  'form1[0].#subform[4].Pt4Line8_CountryOfBirth[0]') ;
	writeText('beneficiary_dob',  'form1[0].#subform[4].Pt4Line9_DateOfBirth[0]') ;
		checkBox('beneficiary_gender',
		array(
			'M' => 'form1[0].#subform[4].Pt4Line9_Male[0]' ,
			'F' => 'form1[0].#subform[4].Pt4Line9_Female[0]'
		)
	) ;
		checkBox('beneficiary_past_petition',
		array(
			'Yes' => 'form1[0].#subform[4].Pt4Line10_Yes[0]' ,
			'No' => 'form1[0].#subform[4].Pt4Line10_No[0]' ,
			'Unknown' => 'form1[0].#subform[4].Pt4Line10_Unknown[0]'
		)
	) ;
	
	
	writeText('beneficiary_address_street_number_name',  'form1[0].#subform[4].Pt4Line11_StreetNumberName[0]') ;
	checkBox('beneficiary_address_o',
		array(
			'Apt' => 'form1[0].#subform[4].Pt4Line11_Unit[0]' ,
			'Ste' => 'form1[0].#subform[4].Pt4Line11_Unit[1]' ,
			'Flr' => 'form1[0].#subform[4].Pt4Line11_Unit[2]'
		)
	) ;
	writeText('beneficiary_address_apt_ste_flr_number',  'form1[0].#subform[4].Pt4Line11_AptSteFlrNumber[0]') ;
	writeText('beneficiary_address_city',  'form1[0].#subform[4].Pt4Line11_CityOrTown[0]') ;
	writeText('beneficiary_address_state',  'form1[0].#subform[4].Pt4Line11_State[0]') ;
	writeText('beneficiary_address_zip_code',  'form1[0].#subform[4].Pt4Line11_ZipCode[0]') ;
	writeText('beneficiary_address_province',  'form1[0].#subform[4].Pt4Line11_Province[0]') ;
	writeText('beneficiary_address_postal_code',  'form1[0].#subform[4].Pt4Line11_PostalCode[0]') ;
	writeText('beneficiary_address_country',  'form1[0].#subform[4].Pt4Line11_Country[0]') ;
	
	writeText('beneficiary_address_1_street_number_name',  'form1[0].#subform[4].Pt4Line12a_StreetNumberName[0]') ;
	checkBox('beneficiary_address_1_o',
		array(
			'Apt' => 'form1[0].#subform[4].Pt4Line12b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[4].Pt4Line12b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[4].Pt4Line12b_Unit[2]'
		)
	) ;
	writeText('beneficiary_address_1_apt_ste_flr_number',  'form1[0].#subform[4].Pt4Line12b_AptSteFlrNumber[0]') ;
	writeText('beneficiary_address_1_city',  'form1[0].#subform[4].Pt4Line12c_CityOrTown[0]') ;
	writeText('beneficiary_address_1_state',  'form1[0].#subform[4].Pt4Line12d_State[0]') ;
	writeText('beneficiary_address_1_zip_code',  'form1[0].#subform[4].Pt4Line12e_ZipCode[0]') ;
	
	writeText('beneficiary_address_2_street_number_name',  'form1[0].#subform[4].Pt4Line13_StreetNumberName[0]') ;
	checkBox('beneficiary_address_2_o',
		array(
			'Apt' => 'form1[0].#subform[4].Pt4Line13_Unit[0]' ,
			'Ste' => 'form1[0].#subform[4].Pt4Line13_Unit[1]' ,
			'Flr' => 'form1[0].#subform[4].Pt4Line13_Unit[2]'
		)
	) ;
	writeText('beneficiary_address_2_apt_ste_flr_number',  'form1[0].#subform[4].Pt4Line13_AptSteFlrNumber[0]') ;
	writeText('beneficiary_address_2_city',  'form1[0].#subform[4].Pt4Line13_CityOrTown[0]') ;
	writeText('beneficiary_address_2_province',  'form1[0].#subform[4].Pt4Line13_Province[0]') ;
	writeText('beneficiary_address_2_postal_code',  'form1[0].#subform[4].Pt4Line13_PostalCode[0]') ;
	writeText('beneficiary_address_2_country',  'form1[0].#subform[4].Pt4Line13_Country[0]') ;
	
	writeText('beneficiary_contact_phone',  'form1[0].#subform[4].Pt4Line14_DaytimePhoneNumber[0]') ;
	writeText('beneficiary_contact_mobile',  'form1[0].#subform[5].Pt4Line15_MobilePhoneNumber[0]') ;
	writeText('beneficiary_contact_email',  'form1[0].#subform[5].Pt4Line16_EmailAddress[0]') ;
	
	writeText('beneficiary_marriage_number',  'form1[0].#subform[5].Pt4Line17_NumberofMarriages[0]') ;
	checkBox('beneficiary_maritial_status',
		array(
			'Widowed' => 'form1[0].#subform[5].Pt4Line18_MaritalStatus[0]' ,
			'Annulled' => 'form1[0].#subform[5].Pt4Line18_MaritalStatus[1]' ,
			'Separated' => 'form1[0].#subform[5].Pt4Line18_MaritalStatus[2]' ,
			'Single' => 'form1[0].#subform[5].Pt4Line18_MaritalStatus[3]' ,
			'Married' => 'form1[0].#subform[5].Pt4Line18_MaritalStatus[4]' ,
			'Divorced' => 'form1[0].#subform[5].Pt4Line18_MaritalStatus[5]' 
		)
	) ;
	writeText('beneficiary_spouse_current_date_marriage',  'form1[0].#subform[5].Pt4Line19_DateOfMarriage[0]') ;
	
	writeText('beneficiary_spouse_current_city',  'form1[0].#subform[5].Pt4Line20a_CityTown[0]') ;
	writeText('beneficiary_spouse_current_state',  'form1[0].#subform[5].Pt4Line20b_State[0]') ;
	writeText('beneficiary_spouse_current_province',  'form1[0].#subform[5].Pt4Line20c_Province[0]') ;
	writeText('beneficiary_spouse_current_country',  'form1[0].#subform[5].Pt4Line20d_Country[0]') ;
	
	writeText('beneficiary_spouse_1_name_family',  'form1[0].#subform[5].Pt4Line16a_FamilyName[0]') ;
	writeText('beneficiary_spouse_1_name_given',  'form1[0].#subform[5].Pt4Line16b_GivenName[0]') ;
	writeText('beneficiary_spouse_1_name_middle',  'form1[0].#subform[5].Pt4Line16c_MiddleName[0]') ;
	writeText('beneficiary_spouse_1_date_divorce',  'form1[0].#subform[5].Pt4Line17_DateMarriageEnded[0]') ;
	
	writeText('beneficiary_spouse_2_name_family',  'form1[0].#subform[5].Pt4Line18a_FamilyName[0]') ;
	writeText('beneficiary_spouse_2_name_given',  'form1[0].#subform[5].Pt4Line18b_GivenName[0]') ;
	writeText('beneficiary_spouse_2_name_middle',  'form1[0].#subform[5].Pt4Line18c_MiddleName[0]') ;
	writeText('beneficiary_spouse_2_date_divorce',  'form1[0].#subform[5].Pt4Line17_DateMarriageEnded[1]') ;
	
	writeText('beneficiary_family_1_name_family',  'form1[0].#subform[5].Pt4Line30a_FamilyName[0]') ;
	writeText('beneficiary_family_1_name_given',  'form1[0].#subform[5].Pt4Line30b_GivenName[0]') ;
	writeText('beneficiary_family_1_name_middle',  'form1[0].#subform[5].Pt4Line30c_MiddleName[0]') ;
	writeText('beneficiary_family_1_relationship',  'form1[0].#subform[5].Pt4Line31_Relationship[0]') ;
	writeText('beneficiary_family_1_dob',  'form1[0].#subform[5].Pt4Line32_DateOfBirth[0]') ;
	writeText('beneficiary_family_1_birth_country',  'form1[0].#subform[5].Pt4Line49_CountryOfBirth[0]') ;
	
	writeText('beneficiary_family_2_name_family',  'form1[0].#subform[5].Pt4Line34a_FamilyName[0]') ;
	writeText('beneficiary_family_2_name_given',  'form1[0].#subform[5].Pt4Line34b_GivenName[0]') ;
	writeText('beneficiary_family_2_name_middle',  'form1[0].#subform[5].Pt4Line34c_MiddleName[0]') ;
	writeText('beneficiary_family_2_relationship',  'form1[0].#subform[5].Pt4Line35_Relationship[0]') ;
	writeText('beneficiary_family_2_dob',  'form1[0].#subform[5].Pt4Line36_DateOfBirth[0]') ;
	writeText('beneficiary_family_2_birth_country',  'form1[0].#subform[5].Pt4Line37_CountryOfBirth[0]') ;
	
	writeText('beneficiary_family_3_name_family',  'form1[0].#subform[5].Pt4Line38a_FamilyName[0]') ;
	writeText('beneficiary_family_3_name_given',  'form1[0].#subform[5].Pt4Line38b_GivenName[0]') ;
	writeText('beneficiary_family_3_name_middle',  'form1[0].#subform[5].Pt4Line38c_MiddleName[0]') ;
	writeText('beneficiary_family_3_relationship',  'form1[0].#subform[5].Pt4Line39_Relationship[0]') ;
	writeText('beneficiary_family_3_dob',  'form1[0].#subform[5].Pt4Line40_DateOfBirth[0]') ;
	writeText('beneficiary_family_3_birth_country',  'form1[0].#subform[5].Pt4Line41_CountryOfBirth[0]') ;
	
	writeText('beneficiary_family_4_name_family',  'form1[0].#subform[6].Pt4Line42a_FamilyName[0]') ;
	writeText('beneficiary_family_4_name_given',  'form1[0].#subform[6].Pt4Line42b_GivenName[0]') ;
	writeText('beneficiary_family_4_name_middle',  'form1[0].#subform[6].Pt4Line42c_MiddleName[0]') ;
	writeText('beneficiary_family_4_relationship',  'form1[0].#subform[6].Pt4Line43_Relationship[0]') ;
	writeText('beneficiary_family_4_dob',  'form1[0].#subform[6].Pt4Line44_DateOfBirth[0]') ;
	writeText('beneficiary_family_4_birth_country',  'form1[0].#subform[6].Pt4Line45_CountryOfBirth[0]') ;
	
	writeText('beneficiary_family_5_name_family',  'form1[0].#subform[6].Pt4Line46a_FamilyName[0]') ;
	writeText('beneficiary_family_5_name_given',  'form1[0].#subform[6].Pt4Line46b_GivenName[0]') ;
	writeText('beneficiary_family_5_name_middle',  'form1[0].#subform[6].Pt4Line46c_MiddleName[0]') ;
	writeText('beneficiary_family_5_relationship',  'form1[0].#subform[6].Pt4Line47_Relationship[0]') ;
	writeText('beneficiary_family_5_dob',  'form1[0].#subform[6].Pt4Line48_DateOfBirth[0]') ;
	writeText('beneficiary_family_5_birth_country',  'form1[0].#subform[6].Pt4Line49_CountryOfBirth[1]') ;
	
	checkBox('beneficiary_in_us',
		array(
			'Yes' => 'form1[0].#subform[6].Pt4Line20_Yes[0]' ,
			'No' => 'form1[0].#subform[6].Pt4Line20_No[0]'
		)
	) ;
/*	writeText('beneficiary_admission_class',  'form1[0].#subform[6].Pt4Line21a_ClassOfAdmission[0]') ; */        //Class of Admission DD @ PART 4 - 46.a
	writeText('beneficiary_AD_record_number',  'form1[0].#subform[6].#area[8].Pt4Line21b_ArrivalDeparture[0]') ; 
	writeText('beneficiary_arrival_date',  'form1[0].#subform[6].Pt4Line21c_DateOfArrival[0]') ;
	writeText('beneficiary_stay_expire',  'form1[0].#subform[6].Pt4Line21d_DateExpired[0]') ;
	writeText('beneficiary_passport_number',  'form1[0].#subform[6].Pt4Line22_PassportNumber[0]') ;
	writeText('beneficiary_travel_document_number',  'form1[0].#subform[6].Pt4Line23_TravelDocNumber[0]') ;
	writeText('beneficiaty_PTD_issue_country',  'form1[0].#subform[6].Pt4Line24_CountryOfIssuance[0]') ;
	writeText('beneficiary_PTD_expire_date',  'form1[0].#subform[6].Pt4Line25_ExpDate[0]') ;
	
	writeText('beneficiary_employer_name',  'form1[0].#subform[6].Pt4Line26_NameOfCompany[0]') ;
	writeText('beneficiary_employer_street_number_name',  'form1[0].#subform[6].Pt4Line26_StreetNumberName[0]') ;
	checkBox('beneficiary_employer_o',
		array(
			'Apt' => 'form1[0].#subform[6].Pt4Line26_Unit[0]' ,
			'Ste' => 'form1[0].#subform[6].Pt4Line26_Unit[1]' ,
			'Flr' => 'form1[0].#subform[6].Pt4Line26_Unit[2]'
		)
	) ;
	writeText('beneficiary_employer_apt_ste_flr_number',  'form1[0].#subform[6].Pt4Line26_AptSteFlrNumber[0]') ;
	writeText('beneficiary_employer_city',  'form1[0].#subform[6].Pt4Line26_CityOrTown[0]') ;
	writeText('beneficiary_employer_state',  'form1[0].#subform[6].Pt4Line26_State[0]') ;
	writeText('beneficiary_employer_zip_code',  'form1[0].#subform[6].Pt4Line26_ZipCode[0]') ;
	writeText('beneficiary_employer_province',  'form1[0].#subform[6].Pt4Line26_Province[0]') ;
	writeText('beneficiary_employer_postal_code',  'form1[0].#subform[6].Pt4Line26_PostalCode[0]') ;
	writeText('beneficiary_employer_country',  'form1[0].#subform[6].Pt4Line26_Country[0]') ;
	writeText('beneficiary_employer_date_from',  'form1[0].#subform[6].Pt4Line27_DateEmploymentBegan[0]') ;
	
	checkBox('beneficiary_immigration_proceeding',
		array(
			'Yes' => 'form1[0].#subform[6].Pt4Line28_Yes[0]' ,
			'No' => 'form1[0].#subform[6].Pt4Line28_No[0]'
		)
	) ;
	checkBox('beneficiary_immigration_proceeding_type',
		array(
			'Removal' => 'form1[0].#subform[6].Pt4Line54_Removal[0]' ,
			'Exclusion/Deportation' => 'form1[0].#subform[6].Pt4Line54_Exclusion[0]' ,
			'Rescission' => 'form1[0].#subform[6].Pt4Line54_Rescission[0]' ,
			'Other Judicial Proceedings' => 'form1[0].#subform[6].Pt4Line54_JudicialProceedings[0]' 
		)
	) ;
	writeText('beneficiary_immigration_proceeding_city',  'form1[0].#subform[6].Pt4Line55a_CityOrTown[0]') ;
	writeText('beneficiary_immigration_proceeding_state',  'form1[0].#subform[6].Pt4Line55b_State[0]') ; 
	writeText('beneficiary_immigration_proceeding_date',  'form1[0].#subform[6].Pt4Line56_Date[0]') ;
	
	writeText('beneficiary_native_name_family',  'form1[0].#subform[7].Pt4Line55a_FamilyName[0]') ;
	writeText('beneficiary_native_name_given',  'form1[0].#subform[7].Pt4Line55b_GivenName[0]') ;
	writeText('beneficiary_native_name_middle',  'form1[0].#subform[7].Pt4Line55c_MiddleName[0]') ;
	writeText('beneficiary_native_address_street_number_name',  'form1[0].#subform[7].Pt4Line56_StreetNumberName[0]') ;
	checkBox('beneficiary_native_o',
		array(
			'Apt' => 'form1[0].#subform[7].Pt4Line56_Unit[0]' ,
			'Ste' => 'form1[0].#subform[7].Pt4Line56_Unit[1]' ,
			'Flr' => 'form1[0].#subform[7].Pt4Line56_Unit[2]'
		)
	) ;
	writeText('beneficiary_native_apt_ste_flr_number',  'form1[0].#subform[7].Pt4Line56_AptSteFlrNumber[0]') ;
	writeText('beneficiary_native_city',  'form1[0].#subform[7].Pt4Line56_CityOrTown[0]') ;
	writeText('beneficiary_native_province',  'form1[0].#subform[7].Pt4Line56_Province[0]') ;
	writeText('beneficiary_native_postal_code',  'form1[0].#subform[7].Pt4Line56_PostalCode[0]') ;
	writeText('beneficiary_native_country',  'form1[0].#subform[7].Pt4Line56_Country[0]') ;
	
	writeText('beneficiary_spouse_street_number_name',  'form1[0].#subform[7].Pt4Line57_StreetNumberName[0]') ;
	checkBox('beneficiary_spouse_o',
		array(
			'Apt' => 'form1[0].#subform[7].Pt4Line57_Unit[0]' ,
			'Ste' => 'form1[0].#subform[7].Pt4Line57_Unit[1]' ,
			'Flr' => 'form1[0].#subform[7].Pt4Line57_Unit[2]'
		)
	) ;
	writeText('beneficiary_spouse_apt_ste_flr_number',  'form1[0].#subform[7].Pt4Line57_AptSteFlrNumber[0]') ;
	writeText('beneficiary_spouse_city',  'form1[0].#subform[7].Pt4Line57_CityOrTown[0]') ;
	writeText('beneficiary_spouse_state',  'form1[0].#subform[7].Pt4Line57_State[0]') ;
	writeText('beneficiary_spouse_zip_code',  'form1[0].#subform[7].Pt4Line57_ZipCode[0]') ;
	writeText('beneficiary_spouse_province',  'form1[0].#subform[7].Pt4Line57_Province[0]') ;
	writeText('beneficiary_spouse_postal_code',  'form1[0].#subform[7].Pt4Line57_PostalCode[0]') ;
	writeText('beneficiary_spouse_country',  'form1[0].#subform[7].Pt4Line57_Country[0]') ;
	writeText('beneficiary_spouse_date_from',  'form1[0].#subform[7].Pt4Line58a_DateFrom[0]') ;
	writeText('beneficiary_spouse_date_to',  'form1[0].#subform[7].Pt4Line58b_DateTo[0]') ;

	
	writeText('beneficiary_apply_IMV_city',  'form1[0].#subform[7].Pt4Line61a_CityOrTown[0]') ;
	writeText('beneficiary_apply_IMV_province',  'form1[0].#subform[7].Pt4Line61b_Province[0]') ;
	
	writeText('beneficiary_apply_IMV_city',  'form1[0].#subform[7].Pt4Line61a_CityOrTown[0]') ;
	writeText('beneficiary_apply_IMV_province',  'form1[0].#subform[7].Pt4Line61b_Province[0]') ;
	writeText('beneficiary_apply_IMV_country',  'form1[0].#subform[7].Pt4Line61c_Country[0]') ; 
	
	//PART4 - END 
	
	//PART5 - START
	
	checkBox('beneficiary_petition_filed',
		array(
			'Yes' => 'form1[0].#subform[7].Part4Line1_Yes[0]' ,
			'No' => 'form1[0].#subform[7].Part4Line1_No[0]'
 		)
	) ;
	
	writeText('beneficiary_petition_name_first', 'form1[0].#subform[7].Pt5Line2a_FamilyName[0]') ;
	writeText('beneficiary_petition_name_given', 'form1[0].#subform[7].Pt5Line2b_GivenName[0]') ;
	writeText('beneficiary_petition_name_middle', 'form1[0].#subform[7].Pt5Line2c_MiddleName[0]') ;
	writeText('beneficiary_petition_name_city', 'form1[0].#subform[7].Pt5Line3a_CityOrTown[0]') ;
	writeText('beneficiary_petition_name_state', 'form1[0].#subform[7].Pt5Line3b_State[0]') ;
	writeText('beneficiary_petition_date', 'form1[0].#subform[7].Pt5Line4_DateFiled[0]') ;
	writeText('beneficiary_petition_result', 'form1[0].#subform[7].Pt5Line5_Result[0]') ;
	writeText('beneficiary_relative_1_name_first', 'form1[0].#subform[7].Pt4Line6a_FamilyName[0]') ;
	writeText('beneficiary_relative_1_name_given', 'form1[0].#subform[7].Pt4Line6b_GivenName[0]') ;
	writeText('beneficiary_relative_1_name_middle ', 'form1[0].#subform[7].Pt4Line6c_MiddleName[0]') ;
	writeText('beneficiary_relative_1_relationship', 'form1[0].#subform[7].Pt4Line7_Relationship[0]') ;
	writeText('beneficiary_relative_2_name_first', 'form1[0].#subform[8].Pt4Line8a_FamilyName[0]') ;
	writeText('beneficiary_relative_2_name_given', 'form1[0].#subform[8].Pt4Line8b_GivenName[0]') ;
	writeText('beneficiary_relative_2_name_middle ', 'form1[0].#subform[8].Pt4Line8c_MiddleName[0]') ;
	writeText('beneficiary_relative_2_relationship', 'form1[0].#subform[8].Pt4Line9_Relationship[0]') ;
	
	//PART5 - END
	
	//PART6 - START
	
	checkBox('petitioner_statement_1',
		array(
			'Yes' => 'form1[0].#subform[8].Pt6Line1Checkbox[0]'
		)
	) ;
	
	checkBox('petitioner_statement_2',
		array(
			'Yes' => 'form1[0].#subform[8].Pt6Line1Checkbox[1]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_statement_2'))
	{
			
		case 'Yes' :
			writeText('petitioner_language', 'form1[0].#subform[8].Pt6Line1b_Language[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_statement_3',
		array(
			'Yes' => 'form1[0].#subform[8].Pt6Line2_Checkbox[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_statement_3'))
	{
			
		case 'Yes' :
			writeText('petitioner_preparer_name',  'form1[0].#subform[8].Pt6Line2_RepresentativeName[0]') ;
			break ;
		
	}
	
	writeText('petitioner_contact_phone',  'form1[0].#subform[8].Pt6Line3_DaytimePhoneNumber[0]') ;
	writeText('petitioner_contact_mobile',  'form1[0].#subform[8].Pt6Line4_MobileNumber[0]') ;
	writeText('petitioner_contact_email',  'form1[0].#subform[8].Pt6Line5_Email[0]') ;
	
	//PART6 - END 
	
	//PART7 - START
	
	writeText('interpreter_name_family',  'form1[0].#subform[9].Pt7Line1a_InterpreterFamilyName[0]') ;
	writeText('interpreter_name_given',  'form1[0].#subform[9].Pt7Line1b_InterpreterGivenName[0]') ;
	writeText('interpreter_organisation',  'form1[0].#subform[9].Pt7Line2_InterpreterBusinessorOrg[0]') ;
	writeText('interpreter_address_street_number_name',  'form1[0].#subform[9].Pt7Line3_StreetNumberName[0]') ;
	
	checkBox('interpreter_address_o',
		array(
			'Apt' => 'form1[0].#subform[9].Pt7Line3_Unit[0]' ,
			'Ste' => 'form1[0].#subform[9].Pt7Line3_Unit[1]' ,
			'Flr' => 'form1[0].#subform[9].Pt7Line3_Unit[2]'
			
		)
	) ;
	
	writeText('interpreter_address_apt_ste_flr_number',  'form1[0].#subform[9].Pt7Line3_AptSteFlrNumber[0]') ;
	writeText('interpreter_address_city',  'form1[0].#subform[9].Pt7Line3_CityOrTown[0]') ;
	writeText('interpreter_address_state',  'form1[0].#subform[9].Pt7Line3_State[0]') ;
	writeText('interpreter_address_zip_code',  'form1[0].#subform[9].Pt7Line3_ZipCode[0]') ;
	writeText('interpreter_address_province',  'form1[0].#subform[9].Pt7Line3_Province[0]') ;
	writeText('interpreter_address_postal_code',  'form1[0].#subform[9].Pt7Line3_PostalCode[0]') ;
	writeText('interpreter_address_country',  'form1[0].#subform[9].Pt7Line3_Country[0]') ;
	writeText('interpreter_contact_phone',  'form1[0].#subform[9].Pt7Line4_InterpreterDaytimeTelephone[0]') ;
	writeText('interpreter_contact_mobile',  'form1[0].#subform[9].Pt4Line53_DaytimePhoneNumber[0]') ;
	writeText('interpreter_contact_email',  'form1[0].#subform[9].Pt7Line5_Email[0]') ;
	writeText('interpreter_language',  'form1[0].#subform[9].Pt7_NameofLanguage[0]') ;
	
	//PART7 - END 
	
	//PART8 - START
	
	writeText('preparer_name_family',  'form1[0].#subform[9].Pt8Line1a_PreparerFamilyName[0]') ;
	writeText('preparer_name_given',  'form1[0].#subform[9].Pt8Line1b_PreparerGivenName[0]') ;
	writeText('preparer_name_business',  'form1[0].#subform[9].Pt8Line2_BusinessName[0]') ;
	writeText('preparer_address_street_number_name',  'form1[0].#subform[9].Pt8Line3_StreetNumberName[0]') ;
	
	checkBox('preparer_address_o',
		array(
			'Apt' => 'form1[0].#subform[9].Pt8Line3_Unit[0]' ,
			'Ste' => 'form1[0].#subform[9].Pt8Line3_Unit[1]' ,
			'Flr' => 'form1[0].#subform[9].Pt8Line3_Unit[2]'
			
		)
	) ;
	
	writeText('preparer_address_apt_ste_flr_number',  'form1[0].#subform[9].Pt8Line3_AptSteFlrNumber[0]') ;
	writeText('preparer_address_city',  'form1[0].#subform[9].Pt8Line3_CityOrTown[0]') ;
	writeText('preparer_address_state',  'form1[0].#subform[9].Pt8Line3_State[0]') ;
	writeText('preparer_address_zip_code',  'form1[0].#subform[9].Pt8Line3_ZipCode[0]') ;
	writeText('preparer_address_province',  'form1[0].#subform[9].Pt8Line3_Province[0]') ;
	writeText('preparer_address_postal_code',  'form1[0].#subform[9].Pt8Line3_PostalCode[0]') ;
	writeText('preparer_address_country',  'form1[0].#subform[9].Pt8Line3_Country[0]') ;
	writeText('preparer_address_phone',  'form1[0].#subform[10].Pt8Line4_DaytimePhoneNumber[0]') ;
	writeText('preparer_address_mobile',  'form1[0].#subform[10].Pt8Line5_PreparerFaxNumber[0]') ;
	writeText('preparer_address_email',  'form1[0].#subform[10].Pt8Line6_Email[0]') ;
	
	checkBox('preparer_statement_1',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line7_Checkbox[0]'
			
		)
	) ;
	
	checkBox('preparer_statement_2',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line7_Checkbox[1]'
			
		)
	) ;
	
	switch (getFieldLC('preparer_statement_2'))
	{
			
		case 'Yes' :
			checkBox('preparer_statement_2_extend',
				array(
				'Extend' => 'form1[0].#subform[10].Pt8Line7b_Checkbox[0]',
				'Not Extend' => 'form1[0].#subform[10].Pt8Line7b_Checkbox[1]'
			
			)
		) ;
			
			break ;
		
	}
	
	//PART8 - END
	
	//PART9 - START
	
	writeText('petitioner_additional_name_family',  'form1[0].#subform[11].Pt2Line4a_FamilyName[1]') ;
	writeText('petitioner_additional_name_given',  'form1[0].#subform[11].Pt2Line4b_GivenName[1]') ;
	writeText('petitioner_additional_name_middle',  'form1[0].#subform[11].Pt2Line4c_MiddleName[1]') ;
	writeText('petitioner_additional_alien_number',  'form1[0].#subform[11].Pt2Line1_AlienNumber[1]') ;
	writeText('petitioner_additional_1_page_number',  'form1[0].#subform[11].Pt9Line3a_PageNumber[0]') ;
	writeText('petitioner_additional_1_part_number',  'form1[0].#subform[11].Pt9Line3b_PartNumber[0]') ;
	writeText('petitioner_additional_1_item_number',  'form1[0].#subform[11].Pt9Line3c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_1',  'form1[0].#subform[11].Pt9Line3d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_2_page_number',  'form1[0].#subform[11].Pt9Line4a_PageNumber[0]') ;
	writeText('petitioner_additional_2_part_number',  'form1[0].#subform[11].Pt9Line4b_PartNumber[0]') ;
	writeText('petitioner_additional_2_item_number',  'form1[0].#subform[11].Pt9Line4c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_2',  'form1[0].#subform[11].Pt9Line4d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_3_page_number',  'form1[0].#subform[11].Pt9Line5a_PageNumber[0]') ;
	writeText('petitioner_additional_3_part_number',  'form1[0].#subform[11].Pt9Line5b_PartNumber[0]') ;
	writeText('petitioner_additional_3_item_number',  'form1[0].#subform[11].Pt9Line5c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_3',  'form1[0].#subform[11].Pt9Line5d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_4_page_number',  'form1[0].#subform[11].Pt9Line6a_PageNumber[0]') ;
	writeText('petitioner_additional_4_part_number',  'form1[0].#subform[11].Pt9Line6b_PartNumber[0]') ;
	writeText('petitioner_additional_4_item_number',  'form1[0].#subform[11].Pt9Line6c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_4',  'form1[0].#subform[11].Pt9Line6d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_5_page_number',  'form1[0].#subform[11].Pt9Line9a_PageNumber[0]') ;
	writeText('petitioner_additional_5_part_number',  'form1[0].#subform[11].Pt9Line7b_PartNumber[0]') ;
	writeText('petitioner_additional_5_item_number',  'form1[0].#subform[11].Pt9Line7c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_5',  'form1[0].#subform[11].Pt9Line7d_AdditionalInfo[0]') ;
	
	//PART9 - END   
	
	
	
	if (!$efs)
	{
		echo 'Error: No I-130 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}


?>