<?php

	$inputFile = 'document-templates/i-485.pdf' ;
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
	
	writeText('alien_number_pg_1',  'form1[0].#subform[0].Pt1Line10_AlienNumber[0]') ;
	
	//PART1 - START
	
	writeText('petitioner_name_family',  'form1[0].#subform[0].Pt1Line1a_FamilyName[0]') ;
	writeText('petitioner_name_given',  'form1[0].#subform[0].Pt1Line1b_GivenName[0]') ;
	writeText('petitioner_name_middle',  'form1[0].#subform[0].Pt1Line1c_MiddleName[0]') ;
	
	writeText('petitioner_other_name_family_1',  'form1[0].#subform[0].Pt1Line2a_FamilyName[0]') ;
	writeText('petitioner_other_name_given_1',  'form1[0].#subform[0].Pt1Line2b_GivenName[0]') ;
	writeText('petitioner_other_name_middle_1',  'form1[0].#subform[0].Pt1Line2c_MiddleName[0]') ;
	
	writeText('petitioner_other_name_family_2',  'form1[0].#subform[0].Pt1Line3a_FamilyName[0]') ;
	writeText('petitioner_other_name_given_2',  'form1[0].#subform[0].Pt1Line3b_GivenName[0]') ;
	writeText('petitioner_other_name_middle_2',  'form1[0].#subform[0].Pt1Line3c_MiddleName[0]') ;
	
	writeText('petitioner_other_name_family_3',  'form1[0].#subform[0].Pt1Line4a_FamilyName[0]') ;
	writeText('petitioner_other_name_given_3',  'form1[0].#subform[0].Pt1Line4b_GivenName[0]') ;
	writeText('petitioner_other_name_middle_3',  'form1[0].#subform[0].Pt1Line4c_MiddleName[0]') ;
	
	writeText('petitioner_dob',  'form1[0].#subform[0].Pt1Line5_DateofBirth[0]') ;
	
	checkBox('petitioner_gender',
		array(
			'F' => 'form1[0].#subform[0].Pt1Line6_Gender[0]' ,
			'M' => 'form1[0].#subform[0].Pt1Line6_Gender[1]'
		)
	) ;
	
	writeText('petitioner_birth_city',  'form1[0].#subform[0].Pt1Line6_CityOrTown[0]') ;
	writeText('petitioner_birth_country',  'form1[0].#subform[1].Pt1Line8_CountryofBirth[0]') ;
	writeText('petitioner_citizenship_country',  'form1[0].#subform[1].Pt1Line9_CountryofCitizenship[0]') ;
	writeText('petitioner_alien_number',  'form1[0].#subform[1].Pt1Line10_AlienNumber[2]') ;
	writeText('petitioner_uscis_oan',  'form1[0].#subform[1].Pt1Line11_USCISELISAcctNumber[0]') ;
	writeText('petitioner_uscis_ssn',  'form1[0].#subform[1].Pt1Line12_SSN[0]') ;
	
	writeText('petitioner_address_care_name',  'form1[0].#subform[1].Pt1Line13_InCareofName[0]') ;
	writeText('petitioner_address_street_number_name',  'form1[0].#subform[1].Pt1Line13_StreetNumberName[0]') ;
	
	checkBox('petitioner_address_o',
		array(
			'Flr' => 'form1[0].#subform[1].Pt1Line13_Unit[0]' ,
			'Apt' => 'form1[0].#subform[1].Pt1Line13_Unit[1]' ,
			'Ste' => 'form1[0].#subform[1].Pt1Line13_Unit[2]' ,
			
		)
	) ;
	
	writeText('petitioner_address_apt_ste_flr_number',  'form1[0].#subform[1].Pt1Line13_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_city',  'form1[0].#subform[1].Pt1Line13_CityOrTown[0]') ;
	writeText('petitioner_address_state',  'form1[0].#subform[1].Pt1Line13_State[0]') ;
	writeText('petitioner_address_zip_code',  'form1[0].#subform[1].Pt1Line13_ZipCode[0]') ;
	
	writeText('petitioner_alt_address_care_name',  'form1[0].#subform[1].Pt1Line14_InCareofName[0]') ;
	writeText('petitioner_alt_address_street_number_name',  'form1[0].#subform[1].Pt1Line14_StreetNumberName[0]') ;
	
	checkBox('petitioner_alt_address_o',
		array(
			'Flr' => 'form1[0].#subform[1].Pt1Line14_Unit[0]' ,
			'Apt' => 'form1[0].#subform[1].Pt1Line14_Unit[1]' ,
			'Ste' => 'form1[0].#subform[1].Pt1Line14_Unit[2]' ,
			
		)
	) ;
	
	writeText('petitioner_alt_address_apt_ste_flr_number',  'form1[0].#subform[1].Pt1Line14_AptSteFlrNumber[0]') ;
	writeText('petitioner_apt_address_city',  'form1[0].#subform[1].Pt1Line14_CityOrTown[0]') ;
	writeText('petitioner_apt_address_state',  'form1[0].#subform[1].Pt1Line14_State[0]') ;
	writeText('petitioner_apt_address_zip_code',  'form1[0].#subform[1].Pt1Line14_ZipCode[0]') ;
	
	writeText('petitioner_passport_number_last_arrival',  'form1[0].#subform[1].Pt1Line15_PassportNum[0]') ;
	writeText('petitioner_travel_document_number_last_arrival',  'form1[0].#subform[1].Pt5Line16_TravelDoc[0]') ;
	writeText('petitioner_passport_travel_document_expiry_date',  'form1[0].#subform[1].Pt1Line17_ExpDate[0]') ;
	writeText('petitioner_passport_country',  'form1[0].#subform[1].Pt1Line18_Passport[0]') ;
	writeText('petitioner_nonimmigrant_visa_number',  'form1[0].#subform[1].Pt1Line19_VisaNum[0]') ;
	writeText('petitioner_city_last_arrival',  'form1[0].#subform[1].Pt1Line20a_CityTown[0]') ;
	writeText('petitioner_state_last_arrival',  'form1[0].#subform[1].Pt1Line20b_State[0]') ;
	writeText('petitioner_date_last_arrival',  'form1[0].#subform[1].Pt1Line21_Date[0]') ;
	
	checkBox('petitioner_arrival_1',
		array(
			'Yes' => 'form1[0].#subform[1].Pt1Line22a_CB[0]'
			
		)
	) ;
	
	switch (getFieldLC('petitioner_arrival_1'))
	{
			
		case 'Yes' :
			writeText('petitioner_arrival_1_text',  'form1[0].#subform[1].Pt1Line22a_AdmissionEntry[0]') ;
			break ;
		
	}
	
	
	checkBox('petitioner_arrival_2',
		array(
			'Yes' => 'form1[0].#subform[1].Pt1Line22b_CB[0]'
			
		)
	) ;
	
	switch (getFieldLC('petitioner_arrival_2'))
	{
			
		case 'Yes' :
			writeText('petitioner_arrival_2_text',  'form1[0].#subform[1].Pt1Line22b_ParoleEntrance[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_arrival_3',
		array(
			'Yes' => 'form1[0].#subform[1].Pt1Line22c_CB[0]'
			
		)
	) ;
	
	checkBox('petitioner_arrival_4',
		array(
			'Yes' => 'form1[0].#subform[1].Pt1Line22d_CB[0]'
			
		)
	) ;
	
	switch (getFieldLC('petitioner_arrival_4'))
	{
			
		case 'Yes' :
			writeText('petitioner_arrival_4_text',  'form1[0].#subform[1].Pt2Line22d_other[0]') ;
			break ;
		
	}
	
	writeText('petitioner_i94_ad_record_number',  'form1[0].#subform[1].P2Line23a_I94[0]') ;
	writeText('petitioner_i94_stay_expire',  'form1[0].#subform[1].Pt1Line23b_Date[0]') ;
	writeText('petitioner_i94_status',  'form1[0].#subform[1].Pt1Line23c_Status[0]') ;
	writeText('petitioner_current_immigration_status',  'form1[0].#subform[2].Pt1Line24_Status[0]') ;
	
	writeText('petitioner_i94_name_family',  'form1[0].#subform[2].Pt1Line25a_FamilyName[0]') ;
	writeText('petitioner_i94_name_given',  'form1[0].#subform[2].Pt1Line25b_GivenName[0]') ;
	writeText('petitioner_i94_name_middle',  'form1[0].#subform[2].Pt1Line25c_MiddleName[0]') ;
	
	//PART1 - END
	
	//PART2 - START
	
	checkBox('petitioner_family_based',
		array(
			'Immediate relative of a U.S. citizen, Form I-130' => 'form1[0].#subform[2].Pt2Line1_CB[0]' ,
			'Other relative of a U.S. citizen or relative of a lawful permanent resident under the family-based preference categories, Form I-130' => 'form1[0].#subform[2].Pt2Line1_CB[1]' ,
			'Person admitted to the United States as a fiancé(e) or child of a fiancé(e) of a U.S. citizen, Form I-129F (K-1/K-2 Nonimmigrant)' => 'form1[0].#subform[2].Pt2Line1_CB[2]' ,
			'Widow or widower of a U.S. citizen, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[3]' ,
			'VAWA self-petitioner, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[4]'
			
		)
	) ;
	
	checkBox('petitioner_employment_based',
		array(
			'Alien entrepreneur, Form I-526' => 'form1[0].#subform[2].Pt2Line1_CB[5]' , 
			'Alien worker, Form I-140' => 'form1[0].#subform[2].Pt2Line1_CB[6]'
			
		)
	) ;
	
	checkBox('petitioner_special_immigrant',
		array(
			'Religious worker, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[7]' ,
			'Certain Afghan or Iraqi national, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[8]' ,
			'Special immigrant juvenile, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[9]' ,
			'Certain G-4 international organization or family member or NATO-6 employee or family member, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[10]' ,
			'Certain international broadcaster, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[11]'
			
		)
	) ;
	
	checkBox('petitioner_asylee',
		array(
			'Refugee status (INA section 207), Form I-590 or Form I-730' => 'form1[0].#subform[2].Pt2Line1_CB[12]' ,
			'Asylum status (INA section 208), Form I-589 or Form I-730' => 'form1[0].#subform[2].Pt2Line1_CB[13]'
			
		)
	) ;
	
	checkBox('petitioner_victim_trafficking_crime',
		array(
			'Human trafficking victim (T Nonimmigrant), Form I-914 or derivative family member, Form I-914A' => 'form1[0].#subform[2].Pt2Line1_CB[14]' ,
			'Crime victim (U Nonimmigrant), Form I-918, derivative family member, Form I-918A, or qualifying family member, Form I-929' => 'form1[0].#subform[2].Pt2Line1_CB[15]'
			
		)
	) ;
	
	checkBox('petitioner_public_laws_programs',
		array(
			'Dependent status under the Haitian Refugee Immigrant Fairness Act' => 'form1[0].#subform[2].Pt2Line1_CB[16]' , /*     */
			'Lautenberg Parolees' => 'form1[0].#subform[2].Pt2Line1_CB[17]' ,
			'Diplomats or high ranking officials unable to return home (Section 13 of the Act of September 11, 1957)' => 'form1[0].#subform[2].Pt2Line1_CB[18]' ,
			'Dependent status under the Haitian Refugee Immigrant Fairness Act for battered spouses and children' => 'form1[0].#subform[2].Pt2Line1_CB[19]' ,
			'Indochinese Parole Adjustment Act of 2000' => 'form1[0].#subform[2].Pt2Line1_CB[20]' ,
			'The Cuban Adjustment Act' => 'form1[0].#subform[2].Pt2Line1_CB[21]' ,
			'The Cuban Adjustment Act for battered spouses and children' => 'form1[0].#subform[2].Pt2Line1_CB[22]'
			
		)
	) ;
	
	checkBox('petitioner_additional_options',
		array(
			'Continuous residence in the United States since before January 1, 1972 ("Registry")' => 'form1[0].#subform[2].Pt2Line1_CB[23]' ,
			'Individual born in the United States under diplomatic status' => 'form1[0].#subform[2].Pt2Line1_CB[24]' ,
			'Diversity Visa program' => 'form1[0].#subform[2].Pt2Line1_CB[25]' ,
			'Other eligibility' => 'form1[0].#subform[2].Pt2Line1_CB[26]'
			
		)
	) ;
	
	switch (getFieldLC('petitioner_additional_options'))
	{
			
		case 'Other eligibility' :
			writeText('petitioner_additional_options_text',  'form1[0].#subform[2].Pt2Line1g_OtherEligibility[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_ina_apply',
		array(
			'Yes' => 'form1[0].#subform[2].Pt2Line2_CB[0]' ,
			'No' => 'form1[0].#subform[2].Pt2Line2_CB[1]' 
			
		)
	) ;
	
	writeText('principal_receipt_petition_1',  'form1[0].#subform[3].Pt2Line3_Receipt[0]') ;
	writeText('principal_priority_date_petition_1',  'form1[0].#subform[3].Pt2Line4_Date[0]') ;
	
	writeText('principal_priority_date_petition_1',  'form1[0].#subform[3].Pt2Line5a_FamilyName[0]') ;
	writeText('principal_name_given',  'form1[0].#subform[3].Pt2Line5b_GivenName[0]') ;
	writeText('principal_name_middle',  'form1[0].#subform[3].Pt2Line5c_MiddleName[0]') ;
	writeText('principal_alien_number',  'form1[0].#subform[3].Pt1Line8_AlienNumber[0]') ;
	writeText('principal_dob',  'form1[0].#subform[3].Pt2Line7_Date[0]') ;
	writeText('principal_receipt_petition_2',  'form1[0].#subform[3].Pt2Line8_ReceiptNumber[0]') ;
	writeText('principal_priority_date_petition_2',  'form1[0].#subform[3].Pt2Line9_Date[0]') ;
	
	//PART2 - END
	
	//PART3 - START
	
	checkBox('petitioner_immigrant_visa_apply',
		array(
			'No' => 'form1[0].#subform[3].Pt3Line1_YN[0]' ,
			'Yes' => 'form1[0].#subform[3].Pt3Line1_YN[0]' 
			
		)
	) ;
	
	writeText('petitioner_immigrant_visa_city',  'form1[0].#subform[3].Pt3Line2a_City[0]') ;
	writeText('petitioner_immigrant_visa_country',  'form1[0].#subform[3].Pt3Line2b_Country[0]') ;
	writeText('petitioner_immigrant_visa_decision',  'form1[0].#subform[3].Pt3Line3_Decision[0]') ;
	writeText('petitioner_immigrant_visa_decision_date',  'form1[0].#subform[3].Pt3Line4_Date[0]') ;
	
	writeText('petitioner_address_1_street_number_name',  'form1[0].#subform[3].Pt3Line5_StreetNumberName[0]') ;
	checkBox('petitioner_address_1_o',
		array(
			'Flr' => 'form1[0].#subform[3].Pt3Line5_Unit[0]' ,
			'Apt' => 'form1[0].#subform[3].Pt3Line5_Unit[1]' ,
			'Ste' => 'form1[0].#subform[3].Pt3Line5_Unit[2]' 
			
		)
	) ;
	writeText('petitioner_address_1_apt_ste_flr_number',  'form1[0].#subform[3].Pt3Line5_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_1_city',  'form1[0].#subform[3].Pt3Line5_CityOrTown[0]') ;
	writeText('petitioner_address_1_state',  'form1[0].#subform[3].Pt3Line5_State[0]') ;
	writeText('petitioner_address_1_zip_code',  'form1[0].#subform[3].Pt3Line5_ZipCode[0]') ;
	writeText('petitioner_address_1_province',  'form1[0].#subform[3].Pt3Line5_Province[0]') ;
	writeText('petitioner_address_1_postal_code',  'form1[0].#subform[3].Pt3Line5_PostalCode[0]') ;
	writeText('petitioner_address_1_country',  'form1[0].#subform[3].Pt3Line5_Country[0]') ;
	writeText('petitioner_address_1_date_from',  'form1[0].#subform[3].Pt3Line6a_Date[0]') ;
	writeText('petitioner_address_1_date_to',  'form1[0].#subform[3].Pt3Line6b_Date[0]') ;
	
	writeText('petitioner_address_2_street_number_name',  'form1[0].#subform[3].Pt3Line7_StreetNumberName[0]') ;
	checkBox('petitioner_address_2_o',
		array(
			'Flr' => 'form1[0].#subform[3].Pt3Line7_Unit[0]' ,
			'Apt' => 'form1[0].#subform[3].Pt3Line7_Unit[1]' ,
			'Ste' => 'form1[0].#subform[3].Pt3Line7_Unit[2]' 
			
		)
	) ;
	writeText('petitioner_address_2_apt_ste_flr_number',  'form1[0].#subform[3].Pt3Line7_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_2_city',  'form1[0].#subform[3].Pt3Line7_CityOrTown[0]') ;
	writeText('petitioner_address_2_state',  'form1[0].#subform[3].Pt3Line7_State[0]') ;
	writeText('petitioner_address_2_zip_code',  'form1[0].#subform[3].Pt3Line7_ZipCode[0]') ;
	writeText('petitioner_address_2_province',  'form1[0].#subform[3].Pt3Line7_Province[0]') ;
	writeText('petitioner_address_2_postal_code',  'form1[0].#subform[3].Pt3Line7_PostalCode[0]') ;
	writeText('petitioner_address_2_country',  'form1[0].#subform[3].Pt3Line7_Country[0]') ;
	writeText('petitioner_address_2_date_from',  'form1[0].#subform[4].Pt3Line8a_DateFrom[0]') ;
	writeText('petitioner_address_2_date_to',  'form1[0].#subform[4].Pt3Line8b_DateTo[0]') ;
	
	writeText('petitioner_address_3_street_number_name',  'form1[0].#subform[4].Pt3Line9_StreetNumberName[0]') ;
	checkBox('petitioner_address_3_o',
		array(
			'Flr' => 'form1[0].#subform[4].Pt3Line9_Unit[0]' ,
			'Apt' => 'form1[0].#subform[4].Pt3Line9_Unit[1]' ,
			'Ste' => 'form1[0].#subform[4].Pt3Line9_Unit[2]' 
			
		)
	) ;
	writeText('petitioner_address_3_apt_ste_flr_number',  'form1[0].#subform[4].Pt3Line9_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_3_city',  'form1[0].#subform[4].Pt3Line9_CityOrTown[0]') ;
	writeText('petitioner_address_3_state',  'form1[0].#subform[4].Pt3Line9_State[0]') ;
	writeText('petitioner_address_3_zip_code',  'form1[0].#subform[4].Pt3Line9_ZipCode[0]') ;
	writeText('petitioner_address_3_province',  'form1[0].#subform[4].Pt3Line9_Province[0]') ;
	writeText('petitioner_address_3_postal_code',  'form1[0].#subform[4].Pt3Line9_PostalCode[0]') ;
	writeText('petitioner_address_3_country',  'form1[0].#subform[4].Pt3Line9_Country[0]') ;
	writeText('petitioner_address_3_date_from',  'form1[0].#subform[4].Pt3Line10a_DateFrom[0]') ;
	writeText('petitioner_address_3_date_to',  'form1[0].#subform[4].Pt3Line10a_DateTo[0]') ;
	
	writeText('petitioner_employer_1_name',  'form1[0].#subform[4].Pt3Line11_EmployerName[0]') ;
	writeText('petitioner_employer_1_street_number_name',  'form1[0].#subform[4].Pt3Line12_StreetNumberName[0]') ;
	checkBox('petitioner_employer_1_o',
		array(
			'Flr' => 'form1[0].#subform[4].Pt3Line12_Unit[0]' ,
			'Apt' => 'form1[0].#subform[4].Pt3Line12_Unit[1]' ,
			'Ste' => 'form1[0].#subform[4].Pt3Line12_Unit[2]' 
			
		)
	) ;
	writeText('petitioner_employer_1_apt_ste_flr_number',  'form1[0].#subform[4].Pt3Line12_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_1_city',  'form1[0].#subform[4].Pt3Line12_CityOrTown[0]') ;
	writeText('petitioner_employer_1_state',  'form1[0].#subform[4].Pt3Line12_State[0]') ;
	writeText('petitioner_employer_1_zip_code',  'form1[0].#subform[4].Pt3Line12_ZipCode[0]') ;
	writeText('petitioner_employer_1_province',  'form1[0].#subform[4].Pt3Line12_Province[0]') ;
	writeText('petitioner_employer_1_postal_code',  'form1[0].#subform[4].Pt3Line12_PostalCode[0]') ;
	writeText('petitioner_employer_1_country',  'form1[0].#subform[4].Pt3Line12_Country[0]') ;
	writeText('petitioner_employer_1_occupation',  'form1[0].#subform[4].Pt3Line13_EmployerName[0]') ;
	writeText('petitioner_employer_1_date_from',  'form1[0].#subform[4].Pt3Line14a_DateFrom[0]') ;
	writeText('petitioner_employer_1_date_to',  'form1[0].#subform[4].Pt3Line14b_DateTo[0]') ;
	
	writeText('petitioner_employer_2_name',  'form1[0].#subform[4].Pt3Line4a_EmployerName[0]') ;
	writeText('petitioner_employer_2_street_number_name',  'form1[0].#subform[4].Pt3Line16_StreetNumberName[0]') ;
	checkBox('petitioner_employer_2_o',
		array(
			'Flr' => 'form1[0].#subform[4].Pt3Line16_Unit[0]' ,
			'Apt' => 'form1[0].#subform[4].Pt3Line16_Unit[1]' ,
			'Ste' => 'form1[0].#subform[4].Pt3Line16_Unit[2]' 
			
		)
	) ;
	writeText('petitioner_employer_2_apt_ste_flr_number',  'form1[0].#subform[4].Pt3Line16_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_2_city',  'form1[0].#subform[4].Pt3Line16_CityOrTown[0]') ;
	writeText('petitioner_employer_2_state',  'form1[0].#subform[4].Pt3Line16_State[0]') ;
	writeText('petitioner_employer_2_zip_code',  'form1[0].#subform[4].Pt3Line16_ZipCode[0]') ;
	writeText('petitioner_employer_2_province',  'form1[0].#subform[4].Pt3Line16_Province[0]') ;
	writeText('petitioner_employer_2_postal_code',  'form1[0].#subform[4].Pt3Line16_PostalCode[0]') ;
	writeText('petitioner_employer_2_country',  'form1[0].#subform[4].Pt3Line16_Country[0]') ;
	writeText('petitioner_employer_2_occupation',  'form1[0].#subform[4].Pt3Line17_EmployerName[0]') ;
	writeText('petitioner_employer_2_date_from',  'form1[0].#subform[4].Pt3Line18a_DateFrom[0]') ;
	writeText('petitioner_employer_2_date_to',  'form1[0].#subform[4].Pt3Line18a_DateTo[0]') ;
	
	writeText('petitioner_employer_3_name',  'form1[0].#subform[5].Pt3Line19_EmployerName[0]') ;
	writeText('petitioner_employer_3__street_number_name',  'form1[0].#subform[5].Pt3Line20_StreetNumberName[0]') ;
	checkBox('petitioner_employer_3_o',
		array(
			'Flr' => 'form1[0].#subform[5].Pt3Line20_Unit[0]' ,
			'Apt' => 'form1[0].#subform[5].Pt3Line20_Unit[1]' ,
			'Ste' => 'form1[0].#subform[5].Pt3Line20_Unit[2]' 
			
		)
	) ;
	writeText('petitioner_employer_3_apt_ste_flr_number',  'form1[0].#subform[5].Pt3Line20_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_3_city',  'form1[0].#subform[5].Pt3Line20_CityOrTown[0]') ;
	writeText('petitioner_employer_3_state',  'form1[0].#subform[5].Pt3Line20_State[0]') ;
	writeText('petitioner_employer_3_zip_code',  'form1[0].#subform[5].Pt3Line20_ZipCode[0]') ;
	writeText('petitioner_employer_3_province',  'form1[0].#subform[5].Pt3Line20_Province[0]') ;
	writeText('petitioner_employer_3_postal_code',  'form1[0].#subform[5].Pt3Line20_PostalCode[0]') ;
	writeText('petitioner_employer_3_country',  'form1[0].#subform[5].Pt3Line20_Country[0]') ;
	writeText('petitioner_employer_3_occupation',  'form1[0].#subform[5].Pt3Line20_EmployerName[0]') ;
	writeText('petitioner_employer_3_date_from',  'form1[0].#subform[5].Pt3Line22a_DateFrom[0]') ;
	writeText('petitioner_employer_3_date_to',  'form1[0].#subform[5].Pt3Line22a_DateTo[0]') ;
	
	//PART3 - END
	
	//PART4 - START
	
	writeText('petitioner_parent_1_legal_name_family',  'form1[0].#subform[5].Pt4Line1a_FamilyName[0]') ;
	writeText('petitioner_parent_1_legal_name_given',  'form1[0].#subform[5].Pt4Line1b_GivenName[0]') ;
	writeText('petitioner_parent_1_legal_name_middle',  'form1[0].#subform[5].Pt4Line1c_MiddleName[0]') ;
	writeText('petitioner_parent_1_birth_name_family',  'form1[0].#subform[5].Pt4Line2a_FamilyName[0]') ;
	writeText('petitioner_parent_1_birth_name_given',  'form1[0].#subform[5].Pt4Line2b_GivenName[0]') ;
	writeText('petitioner_parent_1_birth_name_middle',  'form1[0].#subform[5].Pt4Line2c_MiddleName[0]') ;
	writeText('petitioner_parent_1_dob',  'form1[0].#subform[5].Pt4Line3_DateofBirth[0]') ;
	
	checkBox('petitioner_parent_1_gender',
		array(
			'F' => 'form1[0].#subform[5].Pt4Line4_Gender[0]' ,
			'M' => 'form1[0].#subform[5].Pt4Line4_Gender[1]'
		)
	) ;
	
	writeText('petitioner_parent_1_birth_city',  'form1[0].#subform[5].Pt4Line5_CityTown[0]') ;
	writeText('petitioner_parent_1_birth_country',  'form1[0].#subform[5].Pt4Line6_Country[0]') ;
	writeText('petitioner_parent_1_current_city',  'form1[0].#subform[5].Pt4Line7_CityTown[0]') ;
	writeText('petitioner_parent_1_current_country',  'form1[0].#subform[5].Pt4Line8_Country[0]') ;
	writeText('petitioner_parent_2_legal_name_family',  'form1[0].#subform[5].Pt4Line9a_FamilyName[0]') ;
	writeText('petitioner_parent_2_legal_name_given',  'form1[0].#subform[5].Pt4Line9b_GivenName[0]') ;
	writeText('petitioner_parent_2_legal_name_middle',  'form1[0].#subform[5].Pt4Line9c_MiddleName[0]') ;
	writeText('petitioner_parent_2_birth_name_family',  'form1[0].#subform[5].Pt4Line10a_FamilyName[0]') ;
	writeText('petitioner_parent_2_birth_name_given',  'form1[0].#subform[5].Pt4Line10b_GivenName[0]') ;
	writeText('petitioner_parent_2_birth_name_middle',  'form1[0].#subform[5].Pt4Line10c_MiddleName[0]') ;
	writeText('petitioner_parent_2_dob',  'form1[0].#subform[5].Pt4Line11_DateofBirth[0]') ;
	
	checkBox('petitioner_parent_2_gender',
		array(
			'F' => 'form1[0].#subform[5].Pt4Line12_Gender[0]' ,
			'M' => 'form1[0].#subform[5].Pt4Line12_Gender[1]'
		)
	) ;
	
	writeText('petitioner_parent_2_birth_city',  'form1[0].#subform[5].Pt4Line13_CityTown[0]') ;
	writeText('petitioner_parent_2_birth_country',  'form1[0].#subform[5].Pt4Line14_Country[0]') ;
	writeText('petitioner_parent_2_current_city',  'form1[0].#subform[5].Pt4Line15_CityTown[0]') ;
	writeText('petitioner_parent_2_current_country',  'form1[0].#subform[5].Pt4Line16_Country[0]') ;
	
	//PART4 - END
	
	//PART5 - START
	
	checkBox('petitioner_maritial_status',
		array(
			'Divorced' => 'form1[0].#subform[6].Pt5Line1_MaritalStatus[0]' ,
			'Single, Never Married' => 'form1[0].#subform[6].Pt5Line1_MaritalStatus[1]' ,
			'Widowed' => 'form1[0].#subform[6].Pt5Line1_MaritalStatus[2]' ,
			'Married' => 'form1[0].#subform[6].Pt5Line1_MaritalStatus[3]' ,
			'Marriage Annulled' => 'form1[0].#subform[6].Pt5Line1_MaritalStatus[4]' ,
			'Legally Separated' => 'form1[0].#subform[6].Pt5Line1_MaritalStatus[5]'
		)
	) ;
	
	checkBox('petitioner_spouse_us_forces_coast_guard',
		array(
			'No' => 'form1[0].#subform[6].Pt5Line2_YNNA[0]' ,
			'Yes' => 'form1[0].#subform[6].Pt5Line2_YNNA[1]' ,
			'N/A' => 'form1[0].#subform[6].Pt5Line2_YNNA[2]'
		)
	) ;
	
	writeText('petitioner_marriage_number',  'form1[0].#subform[6].Pt5Line3_TimesMarried[0]') ;
	
	writeText('petitioner_spouse_current_name_family',  'form1[0].#subform[6].Pt5Line4a_FamilyName[0]') ;
	writeText('petitioner_spouse_current_name_given',  'form1[0].#subform[6].Pt5Line4b_GivenName[0]') ;
	writeText('petitioner_spouse_current_name_middle',  'form1[0].#subform[6].Pt5Line4c_MiddleName[0]') ;
	writeText('petitioner_spouse_current_alien_number',  'form1[0].#subform[6].Pt5Line5_AlienNumber[0]') ;
	writeText('petitioner_spouse_current_dob',  'form1[0].#subform[6].Pt5Line6_DateofBirth[0]') ;
	writeText('petitioner_spouse_current_date_marriage',  'form1[0].#subform[6].Pt5Line7_Date[0]') ;
	writeText('petitioner_spouse_current_birth_city',  'form1[0].#subform[6].Pt5Line8a_CityTown[0]') ;
	writeText('petitioner_spouse_current_birth_state',  'form1[0].#subform[6].Pt5Line8b_State[0]') ;
	writeText('petitioner_spouse_current_birth_country',  'form1[0].#subform[6].Pt5Line8c_Country[0]') ;
	writeText('petitioner_spouse_current_marriage_city',  'form1[0].#subform[6].Pt5Line9a_CityTown[0]') ;
	writeText('petitioner_spouse_current_marriage_state',  'form1[0].#subform[6].Pt5Line9b_State[0]') ;
	writeText('petitioner_spouse_current_marriage_country',  'form1[0].#subform[6].Pt5Line9c_Country[0]') ;
	
	checkBox('petitioner_spouse_current_apply',
		array(
			'No' => 'form1[0].#subform[6].Pt5Line10_YN[0]' ,
			'Yes' => 'form1[0].#subform[6].Pt5Line10_YN[1]'
		)
	) ;
	
	writeText('petitioner_spouse_previous_name_family',  'form1[0].#subform[6].Pt511a_FamilyName[0]') ;
	writeText('petitioner_spouse_previous_name_given',  'form1[0].#subform[6].Pt5Line11b_GivenName[0]') ;
	writeText('petitioner_spouse_previous_name_middle',  'form1[0].#subform[6].Pt5Line11c_MiddleName[0]') ;
	writeText('petitioner_spouse_previous_dob',  'form1[0].#subform[6].Pt5Line12_DateofBirth[0]') ;
	writeText('petitioner_spouse_previous_date_marriage',  'form1[0].#subform[6].Pt5Line13_Date[0]') ;
	writeText('petitioner_spouse_previous_marriage_city',  'form1[0].#subform[6].Pt5Line14a_CityTown[0]') ;
	writeText('petitioner_spouse_previous_marriage_state',  'form1[0].#subform[6].Pt5Line14b_State[0]') ;
	writeText('petitioner_spouse_previous_marriage_country',  'form1[0].#subform[6].Pt5Line14c_Country[0]') ;
	writeText('petitioner_spouse_previous_date_divorce',  'form1[0].#subform[6].Pt5Line15_Date[0]') ;
	writeText('petitioner_spouse_previous_divorce_city',  'form1[0].#subform[7].Pt5Line16a_CityTown[0]') ;
	writeText('petitioner_spouse_previous_divorce_state',  'form1[0].#subform[7].Pt5Line16b_State[0]') ;
	writeText('petitioner_spouse_previous_divorce_country',  'form1[0].#subform[7].Pt5Line16c_Country[0]') ;
	
	//PART5 - END
	
	//PART6 - START
	
	writeText('petitioner_child_number',  'form1[0].#subform[7].Pt6Line1_TotalChildren[0]') ;
	
	writeText('petitioner_child_1_legal_name_family',  'form1[0].#subform[7].Pt6Line2a_FamilyName[0]') ;
	writeText('petitioner_child_1_legal_name_given',  'form1[0].#subform[7].Pt6Line2b_GivenName[0]') ;
	writeText('petitioner_child_1_legal_name_middle',  'form1[0].#subform[7].Pt6Line2c_MiddleName[0]') ;
	writeText('petitioner_child_1_alien_number',  'form1[0].#subform[7].Pt6Line3_AlienNumber[0]') ;
	writeText('petitioner_child_1_dob',  'form1[0].#subform[7].Pt6Line4_DateofBirth[0]') ;
	writeText('petitioner_child_1_birth_country',  'form1[0].#subform[7].Pt6Line6_Country[0]') ;
	
	checkBox('petitioner_child_1_apply',
		array(
			'Yes' => 'form1[0].#subform[7].Pt6Line6_YesNo[0]' ,
			'No' => 'form1[0].#subform[7].Pt6Line6_YesNo[1]'
		)
	) ;
	
	writeText('petitioner_child_2_legal_name_family',  'form1[0].#subform[7].Pt6Line7a_FamilyName[0]') ;
	writeText('petitioner_child_2_legal_name_given',  'form1[0].#subform[7].Pt6Line7b_GivenName[0]') ;
	writeText('petitioner_child_2_legal_name_middle',  'form1[0].#subform[7].Pt6Line7c_MiddleName[0]') ;
	writeText('petitioner_child_2_alien_number',  'form1[0].#subform[7].Pt6Line8_AlienNumber[0]') ;
	writeText('petitioner_child_2_dob',  'form1[0].#subform[7].Pt6Line9_DateofBirth[0]') ;
	writeText('petitioner_child_2_birth_country',  'form1[0].#subform[7].Pt6Line10_Country[0]') ;
	
	checkBox('petitioner_child_2_apply',
		array(
			'Yes' => 'form1[0].#subform[7].Pt6Line11_YesNo[0]' ,
			'No' => 'form1[0].#subform[7].Pt6Line11_YesNo[1]'
		)
	) ;
	
	writeText('petitioner_child_3_legal_name_family',  'form1[0].#subform[7].Pt6Line12a_FamilyName[0]') ;
	writeText('petitioner_child_3_legal_name_given',  'form1[0].#subform[7].Pt6Line12b_GivenName[0]') ;
	writeText('petitioner_child_3_legal_name_middle',  'form1[0].#subform[7].Pt6Line12c_MiddleName[0]') ;
	writeText('petitioner_child_3_alien_number',  'form1[0].#subform[7].Pt6Line13_AlienNumber[0]') ;
	writeText('petitioner_child_3_dob',  'form1[0].#subform[7].Pt6Line14_DateofBirth[0]') ;
	writeText('petitioner_child_3_birth_country',  'form1[0].#subform[7].Pt6Line15_Country[0]') ;
	
	checkBox('petitioner_child_3_apply',
		array(
			'Yes' => 'form1[0].#subform[7].Pt6Line16_YesNo[0]' ,
			'No' => 'form1[0].#subform[7].Pt6Line16_YesNo[1]'
		)
	) ;
	
	//PART6 - END
	
	//PART7 - START
	
	checkBox('petitioner_ethnicity',
		array(
			'Hispanic or Latino' => 'form1[0].#subform[7].Pt7Line1_Ethnicity[0]' ,
			'Not Hispanic or Latino' => 'form1[0].#subform[7].Pt7Line1_Ethnicity[1]'
		)
	) ;
	
	checkBoxMulti('petitioner_race',
		array(
			'White' => 'form1[0].#subform[7].Pt7Line2_Race[0]' ,
			'Asian' => 'form1[0].#subform[7].Pt7Line2_Race[1]' ,
			'Black or African American' => 'form1[0].#subform[7].Pt7Line2_Race[2]' ,
			'American Indian or Alaska Native' => 'form1[0].#subform[7].Pt7Line2_Race[3]' ,
			'Native Hawaiian or Other Pacific Islander' => 'form1[0].#subform[7].Pt7Line2_Race[4]'
		)
	) ;
	
	writeText('petitioner_height_feet',  'form1[0].#subform[8].Pt7Line3_HeightFeet[0]') ;
	writeText('petitioner_height_inches',  'form1[0].#subform[8].Pt7Line3_HeightInches[0]') ;


	writeText('petitioner_weight_1',  'form1[0].#subform[8].Pt7Line4_Weight1[0]') ;
	writeText('petitioner_weight_2',  'form1[0].#subform[8].Pt7Line4_Weight2[0]') ;
	writeText('petitioner_weight_3',  'form1[0].#subform[8].Pt7Line4_Weight3[0]') ;
	
	checkBox('petitoner_eyecolor',
		array(
			'Black' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[0]' ,
			'Blue' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[1]' ,
			'Brown' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[2]' ,
			'Grey' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[3]' ,
			'Green' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[4]' ,
			'Hazel' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[5]' ,
			'Maroon' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[6]' ,
			'Pink' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[7]' ,
			'Unknown/Other' => 'form1[0].#subform[8].Pt7Line5_Eyecolor[8]'
		)
	) ;
	
	checkBox('petitioner_haircolor',
		array(
			'Bald (No Hair)' => 'form1[0].#subform[8].Pt7Line6_Haircolor[0]' ,
			'Black' => 'form1[0].#subform[8].Pt7Line6_Haircolor[1]' ,
			'Blond' => 'form1[0].#subform[8].Pt7Line6_Haircolor[2]' ,
			'Brown' => 'form1[0].#subform[8].Pt7Line6_Haircolor[3]' ,
			'Grey' => 'form1[0].#subform[8].Pt7Line6_Haircolor[4]' ,
			'Red' => 'form1[0].#subform[8].Pt7Line6_Haircolor[5]' ,
			'Sandy' => 'form1[0].#subform[8].Pt7Line6_Haircolor[6]' ,
			'White' => 'form1[0].#subform[8].Pt7Line6_Haircolor[7]' ,
			'Unknown/Other' => 'form1[0].#subform[8].Pt7Line6_Haircolor[8]'
		)
	) ;
	
	//PART7 - END
	
	//PART8 - START
	
	checkBox('petitioner_involvement_in_us',
		array(
			'No' => 'form1[0].#subform[8].Pt8Line1_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[8].Pt8Line1_YesNo[1]'
		)
	) ;
	
	writeText('petitioner_org_1_name',  'form1[0].#subform[8].Pt8Line2_OrgName[0]') ;
	writeText('petitioner_org_1_city',  'form1[0].#subform[8].Pt8Line3a_CityTown[0]') ;
	writeText('petitioner_org_1_state',  'form1[0].#subform[8].Pt8Line3b_State[0]') ;
	writeText('petitioner_org_1_country',  'form1[0].#subform[8].Pt8Line3c_Country[0]') ;
	writeText('petitioner_org_1_nature_group',  'form1[0].#subform[8].Pt8Line4_Group[0]') ;
	writeText('petitioner_org_1_date_from',  'form1[0].#subform[8].Pt8Line5a_DateFrom[0]') ;
	writeText('petitioner_org_1_date_to',  'form1[0].#subform[8].Pt8Line5b_DateTo[0]') ;
	writeText('petitioner_org_2_name',  'form1[0].#subform[8].Pt8Line6_OrgName[0]') ;
	writeText('petitioner_org_2_city',  'form1[0].#subform[8].Pt8Line7c_Country[0]') ;
	writeText('petitioner_org_2_state',  'form1[0].#subform[8].Pt8Line7b_State[0]') ;
	writeText('petitioner_org_2_country',  'form1[0].#subform[8].Pt8Line8a_CityTown[0]') ;
	writeText('petitioner_org_2_nature_group',  'form1[0].#subform[8].Pt8Line8_Group[0]') ;
	writeText('petitioner_org_2_date_from',  'form1[0].#subform[8].Pt8Line9a_DateFrom[0]') ;
	writeText('petitioner_org_2_date_to',  'form1[0].#subform[8].Pt8Line9b_DateTo[0]') ;
	writeText('petitioner_org_3_name',  'form1[0].#subform[8].Pt8Line10_OrgName[0]') ;
	writeText('petitioner_org_3_city',  'form1[0].#subform[8].Pt8Line11a_CityTown[0]') ;
	writeText('petitioner_org_3_state',  'form1[0].#subform[8].Pt8Line11b_State[0]') ;
	writeText('petitioner_org_3_country',  'form1[0].#subform[8].Pt8Line11c_Country[0]') ;
	writeText('petitioner_org_3_nature_group',  'form1[0].#subform[8].Pt8Line12_Group[0]') ;
	writeText('petitioner_org_3_date_from',  'form1[0].#subform[8].Pt8Line13a_DateFrom[0]') ;
	writeText('petitioner_org_3_date_to',  'form1[0].#subform[8].Pt8Line13b_DateTo[0]') ;
	
	//14
	
	checkBox('petitioner_admission_denial',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line14_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line14_YesNo[1]'
		)
	) ;
	
	//15
	
	checkBox('petitioner_visa_denial',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line15_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line15_YesNo[1]'
		)
	) ;
	
	//16
	
	checkBox('petitioner_work_without_authorization',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line16_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line16_YesNo[1]'
		)
	) ;
	
	//17
	
	checkBox('petitioner_nonimmigration_violation',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line17_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line17_YesNo[1]'
		)
	) ;
	
	//18
	
	checkBox('petitioner_deportation_preceedings',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line18_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line18_YesNo[1]'
		)
	) ;
	
	//19
	
	checkBox('petitioner_deportation_final_order',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line19_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line19_YesNo[1]'
		)
	) ;
	
	//20
	
	checkBox('petitioner_deportation_prior_final_order',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line20_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line20_YesNo[1]'
		)
	) ;
	
	//21
	
	checkBox('petitioner_permanent_status_recinded',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line21_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line21_YesNo[1]'
		)
	) ;
	
	//22
	
	checkBox('petitioner_voluntary_departure_failed',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line22_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line22_YesNo[1]'
		)
	) ;
	
	//23
	
	checkBox('petitioner_deportation_relief',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line23_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line23_YesNo[1]'
		)
	) ;
	
	//24.a
	
	checkBox('petitioner_j_nonimmigrant_residence_requirement',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line24a_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line24a_YesNo[1]'
		)
	) ;
	
	//24.b
	
	checkBox('petitioner_residence_requirement_compiled',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line24b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line24b_YesNo[1]'
		)
	) ;
	
	//24.c
	
	checkBox('petitioner_j_nonimmigrant_waiver',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line24c_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line24c_YesNo[1]'
		)
	) ;
	
	//25
	
	checkBox('petitioner_arrest_for_crime',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line25_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line25_YesNo[1]'
		)
	) ;
	
	//26
	
	checkBox('petitioner_not_arrest_for_crime',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line26_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line26_YesNo[1]'
		)
	) ;
	
	//27
	
	checkBox('petitioner_pled_guilty_for_crime',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line27_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line27_YesNo[1]'
		)
	) ;
	
	//28
	
	checkBox('petitioner_liberty_restrained',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line28_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line28_YesNo[1]'
		)
	) ;
	
	//29
	
	checkBox('petitioner_defendant_in_criminal_proceeding',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line29_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line29_YesNo[1]'
		)
	) ;
	
	//30
	
	checkBox('petitioner_violated_control_substance_law',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line30_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line30_YesNo[1]'
		)
	) ;
	
	//31
	
	checkBox('petitioner_more_offence_statements',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line31_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line31_YesNo[1]'
		)
	) ;
	
	//32
	
	checkBox('petitioner_traffick_controlled_substance',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line32_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line32_YesNo[1]'
		)
	) ;
	
	//33
	
	checkBox('petitioner_aided_traffick',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line33_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line33_YesNo[1]'
		)
	) ;
	
	//34
	
	checkBox('petitioner_spouse_son_daughter_traffick_1',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line34_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line34_YesNo[1]'
		)
	) ;
	
	//35
	
	checkBox('petitioner_in_prostitution',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line35_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line35_YesNo[1]'
		)
	) ;
	
	//36
	
	checkBox('petitioner_imported_prostitutues',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line36_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line36_YesNo[1]'
		)
	) ;
	
	//37
	
	checkBox('petitioner_proceeds_money_prostitution',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line37_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line37_YesNo[1]'
		)
	) ;
	
	//38
	
	checkBox('petitioner_engage_in_vice',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line38_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line38_YesNo[1]'
		)
	) ;
	
	//39
	
	checkBox('petitioner_ecercised_immunity',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line39_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line39_YesNo[1]'
		)
	) ;
	
	//40
	
	checkBox('petitioner_violate_religious_freedom',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line40_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line40_YesNo[1]'
		)
	) ;
	
	//41
	
	checkBox('petitioner_forced_traffick_sex_acts',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line41_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line41_YesNo[1]'
		)
	) ;
	
	//42
	
	checkBox('petitioner_trafficked_person',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line42_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line42_YesNo[1]'
		)
	) ;
	
	//43
	
	checkBox('petitioner_aided_traffick_sex_acts',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line43_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line43_YesNo[1]'
		)
	) ;
	
	//44
	
	checkBox('petitioner_spouse_son_daughter_traffick_2',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line44_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line44_YesNo[1]'
		)
	) ;
	
	//45
	
	checkBox('petitioner_money_laundering',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line45_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line45_YesNo[1]'
		)
	) ;
	
	//46.a
	
	checkBox('petitioner_espionage_law_violation',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line46a_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line46a_YesNo[1]'
		)
	) ;
	
	//46.b
	
	checkBox('petitioner_export_law_violation',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line46b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line46b_YesNo[1]'
		)
	) ;
	
	//46.c
	
	checkBox('petitioner_overthrow_government_activity',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line46c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line46c_YesNo[1]'
		)
	) ;
	
	//46.d
	
	checkBox('petitioner_security_endanger_activity',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line46d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line46d_YesNo[1]'
		)
	) ;
	
	//46.e
	
	checkBox('petitioner_unlawful_activity',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line46e_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line46e_YesNo[1]'
		)
	) ;
	
	//47
	
	checkBox('petitioner_adverse_foreign_policy',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line47_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line47_YesNo[1]'
		)
	) ;
	
	//48.a
	
	checkBox('petitioner_harm_individual',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line48a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line48a_YesNo[1]'
		)
	) ;
	
	//48.b
	
	checkBox('petitioner_harm_individual_group',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line48b_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line48b_YesNo[1]'
		)
	) ;
	
	//48.c
	
	checkBox('petitioner_harm_individual_recruit',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line48c_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line48c_YesNo[1]'
		)
	) ;
	
	//48.d
	
	checkBox('petitioner_harm_individual_money',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line48d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line48d_YesNo[1]'
		)
	) ;
	
	//48.e
	
	checkBox('petitioner_harm_individual_money_group',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line48e_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line48e_YesNo[1]'
		)
	) ;
	
	//49
	
	checkBox('petitioner_weapon_training',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line49_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line49_YesNo[1]'
		)
	) ;
	
	//50
	
	checkBox('petitioner_engage_harm_individual',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line50_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line50_YesNo[1]'
		)
	) ;
	
	//51.a
	
	checkBox('petitioner_harm_individual_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51a_YesNo[1]'
		)
	) ;
	
	//51.b
	
	checkBox('petitioner_harm_individual_group_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51b_YesNo[1]'
		)
	) ;
	
	//51.c
	
	checkBox('petitioner_harm_individual_recruit_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51c_YesNo[1]'
		)
	) ;
	
	//51.d
	
	checkBox('petitioner_harm_individual_money_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51d_YesNo[1]'
		)
	) ;
	
	//51.e
	
	checkBox('petitioner_harm_individual_money_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51e_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51e_YesNo[1]'
		)
	) ;
	
	//51.f
	
	checkBox('petitioner_weapon_training_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51f_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51f_YesNo[1]'
		)
	) ;
	
	//52
	
	checkBox('petitoner_provide_weapons',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line52_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line52_YesNo[1]'
		)
	) ;
	
	//53
	
	checkBox('petitioner_served_jail',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line53_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line53_YesNo[1]'
		)
	) ;
	
	//54
	
	checkBox('petitoner_provide_weapons_group',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line54_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line54_YesNo[1]'
		)
	) ;
	
	//55
	
	checkBox('petitioner_served_armed_group',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line55_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line55_YesNo[1]'
		)
	) ;
	
	//56
	
	checkBox('petitioner_communist_party_member',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line56_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line56_YesNo[1]'
		)
	) ;
	
	//57
	
	checkBox('petitioner_nazi_persecution',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line57_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line57_YesNo[1]'
		)
	) ;
	
	//58.a
	
	checkBox('petitioner_torture',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line58a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line58a_YesNo[1]'
		)
	) ;
	
	//58.b
	
	checkBox('petitioner_killing',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line58b_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line58b_YesNo[1]'
		)
	) ;
	
	//58.c
	
	checkBox('petitioner_injured_person',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line58c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line58c_YesNo[1]'
		)
	) ;
	
	//58.d
	
	checkBox('petitioner_forced_sexual_contact',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line58d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line58d_YesNo[1]'
		)
	) ;
	
	//58.e
	
	checkBox('petitioner_denied_religious_beliefs',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line58e_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line58e_YesNo[1]'
		)
	) ;
	
	//59
	
	checkBox('petitioner_recruit_below15_armed_group',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line59_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line59_YesNo[1]'
		)
	) ;
	
	//60
	
	checkBox('petitioner_recruit_below15_hostilities',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line60_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line60_YesNo[1]'
		)
	) ;
	
	//61
	
	checkBox('petitioner_public_assistance',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line61_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line61_YesNo[1]'
		)
	) ;
	
	//62
	
	checkBox('petitioner_likely_to_public_assistance',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line62_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line62_YesNo[1]'
		)
	) ;
	
	//63.a
	
	checkBox('petitioner_absent_removal_proceeding',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line63_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line63_YesNo[1]'
		)
	) ;
	
	//63.b
	
	checkBox('petitioner_abstent_reasonable_cause',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line63b_YesNo[1]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line63b_YesNo[0]'
		)
	) ;
	
	//64
	
	checkBox('petitioner_fraud_document',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line64_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line64_YesNo[1]'
		)
	) ;
	
	//65
	
	checkBox('petitioner_lied_information',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line65_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line65_YesNo[1]'
		)
	) ;
	
	//66
	
	checkBox('petitioner_false_us_citizen_claim',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line66_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line66_YesNo[1]'
		)
	) ;
	
	//67
	
	checkBox('petitioner_stowaway',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line67_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line67_YesNo[1]'
		)
	) ;
	
	//68
	
	checkBox('petitioner_aided_illegal_entry',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line68_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line68_YesNo[1]'
		)
	) ;
	
	//69
	
	checkBox('petitioner_final_order_civic_penalty',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line69_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line69_YesNo[1]'
		)
	) ;
	
	//70
	
	checkBox('petitioner_deported',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line70_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line70_YesNo[1]'
		)
	) ;
	
	
	//71
	
	checkBox('petitioner_entered_without_parole',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line71_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line71_YesNo[1]'
		)
	) ;
	
	//72.a
	
	checkBox('petitioner_unlawfully_present_days',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line72a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line72a_YesNo[1]'
		)
	) ;
	
	//72.b
	
	checkBox('petitioner_unlawfully_present_years',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line72b_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line72b_YesNo[1]'
		)
	) ;
	
	//73.a
	
	checkBox('petitioner_unlawfully_present_years_2',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line73a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line73a_YesNo[1]'
		)
	) ;
	
	//73.b
	
	checkBox('petitioner_deported_2',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line73b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line73b_YesNo[1]'
		)
	) ;
	
	//74
	
	checkBox('petitioner_polygamy',
		array(
			'Yes' => 'form1[0].#subform[13].Pt8Line74_YesNo[0]' ,
			'No' => 'form1[0].#subform[13].Pt8Line74_YesNo[1]'
		)
	) ;
	
	//75
	
	checkBox('petitoner_accompanied_sick_national',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line75_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line75_YesNo[1]'
		)
	) ;
	
	//76
	
	checkBox('petitioner_custody_child',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line76_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line76_YesNo[1]'
		)
	) ;
	
	//77
	
	checkBox('petitioner_vote_in_law_regulation',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line77_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line77_YesNo[1]'
		)
	) ;
	
	//78
	
	checkBox('petitioner_renounce_citizenship',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line78_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line78_YesNo[1]'
		)
	) ;
	
	//79.a
	
	checkBox('petitioner_armed_forces_discharge_apply',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line79a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line79a_YesNo[1]'
		)
	) ;
	
	//79.b
	
	checkBox('petitioner_armed_forced_discharged',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line79b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line79b_YesNo[1]'
		)
	) ;
	
	//79.c
	
	checkBox('petitioner_armed_forces_desertion',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line79c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line79c_YesNo[1]'
		)
	) ;
	
	//80.a
	
	checkBox('petitioner_force_training_avoid',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line80a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line80a_YesNo[1]'
		)
	) ;
	
	//80.b
	
	writeText('petitioner_force_training_avoid_status',  'form1[0].#subform[13].Pt8Line80b_Natoinality[0]') ;
	
	
	//PART8 - END
	
	//PART9 - START
	
	checkBox('petitioner_accomodation_request',
		array(
			'No' => 'form1[0].#subform[13].Pt9Line1_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt9Line1_YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_deaf',
		array(
			'Yes' => 'form1[0].#subform[13].Pt9Line2a_Deaf[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_deaf'))
	{
			
		case 'Yes' :
			writeText('petitioner_sign_language',  'form1[0].#subform[13].Pt9Line2a_Accommodation[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_blind',
		array(
			'Yes' => 'form1[0].#subform[13].Pt9Line2b_Blind[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_blind'))
	{
			
		case 'Yes' :
			writeText('petitioner_blind_accomodation',  'form1[0].#subform[13].Pt9Line2b_Accommodation[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_other_disability',
		array(
			'Yes' => 'form1[0].#subform[13].Pt9Line2c_Other[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_other_disability'))
	{
			
		case 'Yes' :
			writeText('petitioner_other_disability_describe',  'form1[0].#subform[13].Pt9Line2c_Accommodation[0]') ;
			break ;
		
	}
	
	//PART9 - END
	
	//PART10 - START
	
	checkBox('applicant_statement_1',
		array(
			'Yes' => 'form1[0].#subform[14].Pt10Line1_English[1]'
		)
	) ;
	
	checkBox('applicant_statement_2',
		array(
			'Yes' => 'form1[0].#subform[14].Pt10Line1_English[0]'
		)
	) ;
	
	
	switch (getFieldLC('applicant_statement_2'))
	{
			
		case 'Yes' :
			writeText('applicant_language',  'form1[0].#subform[14].Pt10Line1b_Language[0]') ;
			break ;
		
	}
	
	checkBox('applicant_statement_3',
		array(
			'Yes' => 'form1[0].#subform[14].Pt10Line2_PreparerCB[0]'
		)
	) ;
	
	
	switch (getFieldLC('applicant_statement_3'))
	{
			
		case 'Yes' :
			writeText('applicant_preparer_name',  'form1[0].#subform[14].Pt10Line2_Preparer[0]') ;
			break ;
		
	}
	
	writeText('applicant_contact_phone',  'form1[0].#subform[14].Pt10Line3_DaytimePhone[0]') ;
	writeText('applicant_contact_mobile',  'form1[0].#subform[14].Pt10Line4_MobilePhone[0]') ;
	writeText('applicant_contact_email',  'form1[0].#subform[14].Pt10Line5_Email[0]') ;

	//PART10 - END
	
	//PART11 - START
	
	writeText('interpreter_name_family',  'form1[0].#subform[14].Pt11Line1a_FamilyName[0]') ;
	writeText('interpreter_name_given',  'form1[0].#subform[14].Pt11Line1b_GivenName[0]') ;
	writeText('interpreter_name_organisation',  'form1[0].#subform[14].Pt11Line2_OrgName[0]') ;
	writeText('interpreter_name_street_name_name',  'form1[0].#subform[15].Pt11Line3_StreetNumberName[0]') ;
	
	checkBox('interpreter_address_o',
		array(
			'Flr' => 'form1[0].#subform[15].Pt11Line3_Unit[0]' ,
			'Apt' => 'form1[0].#subform[15].Pt11Line3_Unit[1]' ,
			'Ste' => 'form1[0].#subform[15].Pt11Line3_Unit[2]'
			
		)
	) ;
	
	writeText('interpreter_address_apt_ste_flr_number',  'form1[0].#subform[15].Pt11Line3_AptSteFlrNumber[0]') ;
	writeText('interpreter_address_city',  'form1[0].#subform[15].Pt11Line3_CityOrTown[0]') ;
	writeText('interpreter_address_state',  'form1[0].#subform[15].Pt11Line3_State[0]') ;
	writeText('interpreter_address_zip_code',  'form1[0].#subform[15].Pt11Line3_ZipCode[0]') ;
	writeText('interpreter_address_province',  'form1[0].#subform[15].Pt11Line3_Province[0]') ;
	writeText('interpreter_address_postal_code',  'form1[0].#subform[15].Pt11Line3_PostalCode[0]') ;
	writeText('interpreter_address_country',  'form1[0].#subform[15].Pt11Line3_Country[0]') ;
	writeText('interpreter_contact_phone',  'form1[0].#subform[15].Pt11Line4_DayPhone[0]') ;
	writeText('interpreter_contact_mobile',  'form1[0].#subform[15].Pt11Line5_MobilePhone[0]') ;
	writeText('interpreter_contact_email',  'form1[0].#subform[15].Pt11Line6_Email[0]') ;
	writeText('interpreter_language',  'form1[0].#subform[15].Part5_NameofLanguage[0]') ;
	
	//PART11 - END
	
	//PART12 - START
	
	writeText('preparer_name_family',  'form1[0].#subform[15].Pt12Line1a_PreparerFamilyName[0]') ;
	writeText('preparer_name_given',  'form1[0].#subform[15].Pt12Line1b_PreparerGivenName[0]') ;
	writeText('prepaprer_name_business',  'form1[0].#subform[15].Pt12Line2_BusinessName[0]') ;
	writeText('preparer_address_street_number_name',  'form1[0].#subform[15].Pt12Line3_StreetNumberName[0]') ;
	
	checkBox('preparer_address_o',
		array(
			'Flr' => 'form1[0].#subform[15].Pt12Line3_Unit[0]' ,
			'Apt' => 'form1[0].#subform[15].Pt12Line3_Unit[1]' ,
			'Ste' => 'form1[0].#subform[15].Pt12Line3_Unit[2]'
			
		)
	) ;
	
	writeText('preparer_address_apt_ste_flr_number',  'form1[0].#subform[15].Pt12Line3_AptSteFlrNumber[0]') ;
	writeText('preparer_address_city',  'form1[0].#subform[15].Pt12Line3_CityOrTown[0]') ;
	writeText('preparer_address_state',  'form1[0].#subform[15].Pt12Line3_State[0]') ;
	writeText('preparer_address_zip_code',  'form1[0].#subform[15].Pt12Line3_ZipCode[0]') ;
	writeText('preparer_address_province',  'form1[0].#subform[15].Pt12Line3_Province[0]') ;
	writeText('preparer_address_postal_code',  'form1[0].#subform[15].Pt12Line3_PostalCode[0]') ;
	writeText('preparer_address_country',  'form1[0].#subform[15].Pt12Line3_Country[0]') ;
	writeText('preparer_address_phone',  'form1[0].#subform[15].Pt12Line4_DaytimePhoneNumber1[0]') ;
	writeText('preparer_address_mobile',  'form1[0].#subform[15].Pt12Line5_MobileNumber[0]') ;
	writeText('preparer_address_email',  'form1[0].#subform[15].Pt12Line6_Email[0]') ;
	
	checkBox('preparer_statement_1',
		array(
			'Yes' => 'form1[0].#subform[16].Part12Line7_Checkbox[0]'
			
		)
	) ;
	
	checkBox('preparer_statement_2',
		array(
			'Yes' => 'form1[0].#subform[16].Part12Line7_Checkbox[1]'
			
		)
	) ;
	
	switch (getFieldLC('preparer_statement_2'))
	{
			
		case 'Yes' :
			
			checkBox('preparer_statement_2_extend',
				array(
				'Extend' => 'form1[0].#subform[16].Part12Line7b_Extend[0]',
				'Not Extend' => 'form1[0].#subform[16].Part12Line7b_NotExtend[0]'
			
			)
		) ;
			
			break ;
		
	}
	
	//PART12 - END
	
	//PART13 - START
	
	writeText('petitioner_uscis_officer_name',  'form1[0].#subform[16].Pt13_USCISOfficer[0]') ;
	writeText('petitioner_correction_1',  'form1[0].#subform[16].Pt13_Corrections1[0]') ;
	writeText('petitioner_correction_2',  'form1[0].#subform[16].Pt13_Corrections2[0]') ;
	writeText('petitioner_pages_1',  'form1[0].#subform[16].Pt13_Pages1[0]') ;
	writeText('petitioner_pages_2',  'form1[0].#subform[16].Pt13_Pages2[0]') ;
	
	//PART3 - END
	
	//PART14 - START
	
	writeText('petitioner_additional_name_family',  'form1[0].#subform[17].Pt1Line1a_FamilyName[1]') ;
	writeText('petitioner_additional_name_given',  'form1[0].#subform[17].Pt1Line1b_GivenName[1]') ;
	writeText('petitioner_additional_name_middle',  'form1[0].#subform[17].Pt1Line1c_MiddleName[1]') ;
	writeText('petitioner_additional_alien_number',  'form1[0].#subform[17].Pt1Line10_AlienNumber[18]') ;
	writeText('petitioner_additional_1_page_number',  'form1[0].#subform[17].Pt14Line3a_PageNumber[0]') ;
	writeText('petitioner_additional_1_part_number',  'form1[0].#subform[17].Pt14Line3b_PartNumber[0]') ;
	writeText('petitioner_additional_1_item_number',  'form1[0].#subform[17].Pt12Line3c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_1',  'form1[0].#subform[17].Pt12Line3d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_2_page_number',  'form1[0].#subform[17].Pt14Line4a_PageNumber[0]') ;
	writeText('petitioner_additional_2_part_number',  'form1[0].#subform[17].Pt14Line4b_PartNumber[0]') ;
	writeText('petitioner_additional_2_item_number',  'form1[0].#subform[17].Pt12Line4c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_2',  'form1[0].#subform[17].Pt12Line4d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_3_page_number',  'form1[0].#subform[17].Pt14Line5a_PageNumber[0]') ;
	writeText('petitioner_additional_3_part_number',  'form1[0].#subform[17].Pt12Line5b_PartNumber[0]') ;
	writeText('petitioner_additional_3_item_number',  'form1[0].#subform[17].Pt12Line5c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_3',  'form1[0].#subform[17].Pt12Line5d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_4_page_number',  'form1[0].#subform[17].Pt14Line6a_PageNumber[0]') ;
	writeText('petitioner_additional_4_part_number',  'form1[0].#subform[17].Pt12Line6b_PartNumber[0]') ;
	writeText('petitioner_additional_4_item_number',  'form1[0].#subform[17].Pt12Line6c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_4',  'form1[0].#subform[17].Pt12Line6d_AdditionalInfo[0]') ;
	writeText('petitioner_additional_5_page_number',  'form1[0].#subform[17].Pt12Line7a_PageNumber[0]') ;
	writeText('petitioner_additional_5_part_number',  'form1[0].#subform[17].Pt12Line7b_PartNumber[0]') ;
	writeText('petitioner_additional_5_item_number',  'form1[0].#subform[17].Pt12Line7c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_5',  'form1[0].#subform[17].Pt12Line7d_AdditionalInfo[0]') ;
	
	//PART14 - END
	
	/*
	
	writeText('alien_number_pg_2',  'form1[0].#subform[0].Pt1Line10_AlienNumber[1]') ;
	writeText('alien_number_pg_3',  'form1[0].#subform[0].Pt1Line10_AlienNumber[3]') ;
	writeText('alien_number_pg_4',  'form1[0].#subform[0].Pt1Line10_AlienNumber[4]') ;
	writeText('alien_number_pg_5',  'form1[0].#subform[0].Pt1Line10_AlienNumber[5]') ;
	writeText('alien_number_pg_6',  'form1[0].#subform[0].Pt1Line10_AlienNumber[6]') ;
	writeText('alien_number_pg_7',  'form1[0].#subform[0].Pt1Line10_AlienNumber[7]') ;
	writeText('alien_number_pg_8',  'form1[0].#subform[0].Pt1Line10_AlienNumber[8]') ;
	writeText('alien_number_pg_9',  'form1[0].#subform[0].Pt1Line10_AlienNumber[9]') ;
	writeText('alien_number_pg_10',  'form1[0].#subform[0].Pt1Line10_AlienNumber[10]') ;
	writeText('alien_number_pg_11',  'form1[0].#subform[0].Pt1Line10_AlienNumber[11]') ;
	writeText('alien_number_pg_12',  'form1[0].#subform[0].Pt1Line10_AlienNumber[12]') ;
	writeText('alien_number_pg_13',  'form1[0].#subform[0].Pt1Line10_AlienNumber[13]') ;
	writeText('alien_number_pg_14',  'form1[0].#subform[0].Pt1Line10_AlienNumber[14]') ;
	writeText('alien_number_pg_15',  'form1[0].#subform[0].Pt1Line10_AlienNumber[15]') ;
	writeText('alien_number_pg_16',  'form1[0].#subform[0].Pt1Line10_AlienNumber[16]') ;
	writeText('alien_number_pg_17',  'form1[0].#subform[0].Pt1Line10_AlienNumber[17]') ;
	writeText('alien_number_pg_18',  'form1[0].#subform[0].Pt1Line10_AlienNumber[19]') ; 
	
	*/
	
	if (!$efs)
	{
		echo 'Error: No I-485 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}

?>