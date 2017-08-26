<?php

	$inputFile = 'document-templates/i-526.pdf' ;
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

	writeText('uscis_oan',  'form1[0].#subform[0].#area[3].USCISELISAcctNumber[0]') ;
	
	//PART1 - START
	
	writeText('petitioner_alien_number',  'form1[0].#subform[0].#area[1].P1_Line1_AlienNumber[0]') ;
	writeText('petitioner_uscis_oan',  'form1[0].#subform[0].#area[0].P1_Line2_AcctIdentifier[0]') ;
	writeText('petitioner_uscis_ssn',  'form1[0].#subform[0].#area[2].P1_Line16_SSN[0]') ;
	
	writeText('petitioner_name_family',  'form1[0].#subform[0].P1_Line3a_FamilyName[0]') ;
	writeText('petitioner_name_given',  'form1[0].#subform[0].P1_Line3b_GivenName[0]') ;
	writeText('petitioner_name_middle',  'form1[0].#subform[0].P1_Line3c_MiddleName[0]') ;
	
	writeText('petitioner_other_name_family_1',  'form1[0].#subform[0].P1_Line5a_FamilyName[0]') ;
	writeText('petitioner_other_name_given_1',  'form1[0].#subform[0].P1_Line5b_GivenName[0]') ;
	writeText('petitioner_other_name_middle_1',  'form1[0].#subform[0].P1_Line5c_MiddleName[0]') ;
	
	writeText('petitioner_other_name_family_2',  'form1[0].#subform[0].P1_Line6a_FamilyName[0]') ;
	writeText('petitioner_other_name_given_2',  'form1[0].#subform[0].P1_Line6b_GivenName[0]') ;
	writeText('petitioner_other_name_middle_2',  'form1[0].#subform[0].P1_Line6c_MiddleName[0]') ;
	
	writeText('petitioner_address_care_name',  'form1[0].#subform[0].P1_Line7_InCareofName[0]') ;
	writeText('petitioner_address_street_number_name',  'form1[0].#subform[0].P1_Line7_StreetNumberName[0]') ;
	
	checkBox('petitioner_address_o',
		array(
			'Apt' => 'form1[0].#subform[0].P1_Line7_Unit[0]' ,
			'Ste' => 'form1[0].#subform[0].P1_Line7_Unit[1]' ,
			'Flr' => 'form1[0].#subform[0].P1_Line7_Unit[2]'
		)
	) ;
	
	writeText('petitioner_apt_ste_flr_number',  'form1[0].#subform[0].P1_Line7_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_city',  'form1[0].#subform[0].P1_Line7_CityOrTown[0]') ;
	writeText('petitioner_address_state',  'form1[0].#subform[0].P1_Line7_State[0]') ;
	writeText('petitioner_address_zip_code',  'form1[0].#subform[0].P1_Line7_ZipCode[0]') ;
	writeText('petitioner_address_province',  'form1[0].#subform[0].P1_Line7_Province[0]') ;
	writeText('petitioner_address_postal_code',  'form1[0].#subform[0].P1_Line7_PostalCode[0]') ;
	writeText('petitioner_address_country',  'form1[0].#subform[0].P1_Line7_Country[0]') ;
	
	checkBox('petitioner_cms_pa',
		array(
			'Yes' => 'form1[0].#subform[1].pt1Line8_YesNo[0]' , 
			'No' => 'form1[0].#subform[1].pt1Line8_YesNo[1]'
		)
	) ;
	
	writeText('petitioner_address_1_street_number_name',  'form1[0].#subform[1].p1Line9StreetNumberName[0]') ;
	
	checkBox('petitioner_address_1_o',
		array(
			'Apt' => 'form1[0].#subform[1].p1Line9Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].p1Line9Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].p1Line9Unit[2]'
		)
	) ;
	
	writeText('petitioner_address_1_apt_ste_flr_number',  'form1[0].#subform[1].p1Line9AptSteFlrNumber[0]') ;
	writeText('petitioner_address_1_city',  'form1[0].#subform[1].p1Line9CityOrTown[0]') ;
	writeText('petitioner_address_1_state',  'form1[0].#subform[1].p1Line9State[0]') ;
	writeText('petitioner_address_1_zip_code',  'form1[0].#subform[1].p1Line9ZipCode[0]') ;
	writeText('petitioner_address_1_province',  'form1[0].#subform[1].p1Line9Province[0]') ;
	writeText('petitioner_address_1_postal_code',  'form1[0].#subform[1].p1Line9PostalCode[0]') ;
	writeText('petitioner_address_1_country',  'form1[0].#subform[1].p1Line9Country[0]') ;
	writeText('petitioner_address_1_date_from',  'form1[0].#subform[1].pt1Line9DateFrom[0]') ;
	
	
	writeText('petitioner_address_2_street_number_name',  'form1[0].#subform[1].p1Line10StreetNumberName[0]') ;
	
	checkBox('petitioner_address_2_o',
		array(
			'Apt' => 'form1[0].#subform[1].p1Line10Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].p1Line10Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].p1Line10Unit[2]'
		)
	) ;
	
	writeText('petitioner_address_2_apt_ste_flr_number',  'form1[0].#subform[1].p1Line10AptSteFlrNumber[0]') ;
	writeText('petitioner_address_2_city',  'form1[0].#subform[1].p1Line10CityOrTown[0]') ;
	writeText('petitioner_address_2_state',  'form1[0].#subform[1].p1Line10State[0]') ;
	writeText('petitioner_address_2_zip_code',  'form1[0].#subform[1].p1Line10ZipCode[0]') ;
	writeText('petitioner_address_2_province',  'form1[0].#subform[1].p1Line10Province[0]') ;
	writeText('petitioner_address_2_postal_code',  'form1[0].#subform[1].p1Line10PostalCode[0]') ;
	writeText('petitioner_address_2_country',  'form1[0].#subform[1].p1Line10Country[0]') ;
	writeText('petitioner_address_2_date_from',  'form1[0].#subform[1].p1Line10DateFrom[0]') ;
	writeText('petitioner_address_2_date_to',  'form1[0].#subform[1].p1Line10DateTo[0]') ;
	
	writeText('petitioner_address_3_street_number_name',  'form1[0].#subform[1].p1Line11StreetNumberName[0]') ;
	
	checkBox('petitioner_address_3_o',
		array(
			'Apt' => 'form1[0].#subform[1].p1Line11Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].p1Line11Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].p1Line11Unit[2]'
		)
	) ;
	
	writeText('petitioner_address_3_apt_ste_flr_number',  'form1[0].#subform[1].p1Line11AptSteFlrNumber[0]') ;
	writeText('petitioner_address_3_city',  'form1[0].#subform[1].p1Line11CityOrTown[0]') ;
	writeText('petitioner_address_3_state',  'form1[0].#subform[1].p1Line11State[0]') ;
	writeText('petitioner_address_3_zip_code',  'form1[0].#subform[1].p1Line11ZipCode[0]') ;
	writeText('petitioner_address_3_province',  'form1[0].#subform[1].p1Line11Province[0]') ;
	writeText('petitioner_address_3_postal_code',  'form1[0].#subform[1].p1Line11PostalCode[0]') ;
	writeText('petitioner_address_3_country',  'form1[0].#subform[1].p1Line11Country[0]') ;
	writeText('petitioner_address_3_date_from',  'form1[0].#subform[1].p1Line11DateFrom[0]') ;
	writeText('petitioner_address_3_date_to',  'form1[0].#subform[1].p1Line11DateTo[0]') ;
	
	writeText('petitioner_address_4_street_number_name',  'form1[0].#subform[1].p1Line12StreetNumberName[0]') ;
	
	checkBox('petitioner_address_4_o',
		array(
			'Apt' => 'form1[0].#subform[1].p1Line12Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].p1Line12Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].p1Line12Unit[2]'
		)
	) ;
	
	writeText('petitioner_address_4_apt_ste_flr_number',  'form1[0].#subform[1].p1Line12AptSteFlrNumber[0]') ;
	writeText('petitioner_address_4_city',  'form1[0].#subform[1].p1Line12CityOrTown[0]') ;
	writeText('petitioner_address_4_state',  'form1[0].#subform[1].p1Line12State[0]') ;
	writeText('petitioner_address_4_zip_code',  'form1[0].#subform[1].p1Line12ZipCode[0]') ;
	writeText('petitioner_address_4_province',  'form1[0].#subform[1].p1Line12Province[0]') ;
	writeText('petitioner_address_4_postal_code',  'form1[0].#subform[1].p1Line12PostalCode[0]') ;
	writeText('petitioner_address_4_country',  'form1[0].#subform[1].p1Line12Country[0]') ;
	writeText('petitioner_address_4_date_from',  'form1[0].#subform[1].p1Line12DateFrom[0]') ;
	writeText('petitioner_address_4_date_to',  'form1[0].#subform[1].p1Line12DateTo[0]') ;
	
	writeText('petitioner_address_5_street_number_name',  'form1[0].#subform[1].P1_Line13a_StreetNumberName[0]') ;
	
	checkBox('petitioner_address_5_o',
		array(
			'Apt' => 'form1[0].#subform[1].P1_checkbox13b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[1].P1_checkbox13b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[1].P1_checkbox13b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_address_5_apt_ste_flr_number',  'form1[0].#subform[1].P1_Line13b_AptSteFlrNumber[0]') ;
	writeText('petitioner_address_5_city',  'form1[0].#subform[1].P1_Line13c_CityOrTown[0]') ;
	writeText('petitioner_address_5_state',  'form1[0].#subform[1].P1_Line13d_State[0]') ;
	writeText('petitioner_address_5_zip_code',  'form1[0].#subform[1].P1_Line13e_ZipCode[0]') ;
	writeText('petitioner_address_5_province',  'form1[0].#subform[1].P1_Line13f_Province[0]') ;
	writeText('petitioner_address_5_postal_code',  'form1[0].#subform[1].P1_Line13g_PostalCode[0]') ;
	writeText('petitioner_address_5_country',  'form1[0].#subform[1].P1_Line13h_Country[0]') ;
	writeText('petitioner_address_5_date_from',  'form1[0].#subform[1].Line13_from[0]') ;
	writeText('petitioner_address_5_date_to',  'form1[0].#subform[1].Line13_to[0]') ; 
	
	writeText('petitioner_employer_1_name',  'form1[0].#subform[2].P1_14a_EmployerName[0]') ;
	writeText('petitioner_employer_1_street_number_name',  'form1[0].#subform[2].P1_Line14b_StreetNumberName[0]') ;
	
	checkBox('petitioner_employer_1_o',
		array(
			'Apt' => 'form1[0].#subform[2].P1_checkbox14b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[2].P1_checkbox14b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[2].P1_checkbox14b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_employer_1_apt_ste_flr_number',  'form1[0].#subform[2].P1_Line14b_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_1_city',  'form1[0].#subform[2].P1_Line14c_CityOrTown[0]') ;
	writeText('petitioner_employer_1_state',  'form1[0].#subform[2].P1_Line14d_State[0]') ;
	writeText('petitioner_employer_1_zip_code',  'form1[0].#subform[2].P1_Line14e_ZipCode[0]') ;
	writeText('petitioner_employer_1_province',  'form1[0].#subform[2].P1_Line14f_Province[0]') ;
	writeText('petitioner_employer_1_postal_code',  'form1[0].#subform[2].P1_Line14g_PostalCode[0]') ;
	writeText('petitioner_employer_1_country',  'form1[0].#subform[2].P1_Line14h_Country[0]') ;
	writeText('petitioner_employer_1_occupation',  'form1[0].#subform[2].P1_14j_jobTitle[0]') ;
	writeText('petitioner_employer_1_date_from',  'form1[0].#subform[2].P1_14k_from[0]') ;
	writeText('petitioner_employer_1_date_to',  'form1[0].#subform[2].P1_14k_To[0]') ;
	
	writeText('petitioner_employer_2_name',  'form1[0].#subform[2].P1_15a_employerName[0]') ;
	writeText('petitioner_employer_2_street_number_name',  'form1[0].#subform[2].P1_Line15a_StreetNumberName[0]') ;
	
	checkBox('petitioner_employer_2_o',
		array(
			'Apt' => 'form1[0].#subform[2].P1_checkbox15b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[2].P1_checkbox15b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[2].P1_checkbox15b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_employer_2_apt_ste_flr_number',  'form1[0].#subform[2].P1_Line15b_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_2_city',  'form1[0].#subform[2].P1_Line15c_CityOrTown[0]') ;
	writeText('petitioner_employer_2_state',  'form1[0].#subform[2].P1_Line15d_State[0]') ;
	writeText('petitioner_employer_2_zip_code',  'form1[0].#subform[2].P1_Line15e_ZipCode[0]') ;
	writeText('petitioner_employer_2_province',  'form1[0].#subform[2].P1_Line15f_Province[0]') ;
	writeText('petitioner_employer_2_postal_code',  'form1[0].#subform[2].P1_Line15g_PostalCode[0]') ;
	writeText('petitioner_employer_2_country',  'form1[0].#subform[2].P1_Line15h_Country[0]') ;
	writeText('petitioner_employer_2_occupation',  'form1[0].#subform[2].P1_15j_jobTitle[0]') ;
	writeText('petitioner_employer_2_date_from',  'form1[0].#subform[2].P1_15k_from[0]') ;
	writeText('petitioner_employer_2_date_to',  'form1[0].#subform[2].P1_15i_to[0]') ;
	
	writeText('petitioner_employer_3_name',  'form1[0].#subform[2].P1_16a_employerName[0]') ;
	writeText('petitioner_employer_3_street_number_name',  'form1[0].#subform[2].P1_Line16a_StreetNumberName[0]') ;
	
	checkBox('petitioner_employer_3_o',
		array(
			'Apt' => 'form1[0].#subform[2].P1_checkbox16b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[2].P1_checkbox16b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[2].P1_checkbox16b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_employer_3_apt_ste_flr_number',  'form1[0].#subform[2].P1_Line16b_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_3_city',  'form1[0].#subform[2].P1_Line16c_CityOrTown[0]') ;
	writeText('petitioner_employer_3_state',  'form1[0].#subform[2].P1_Line16d_State[0]') ;
	writeText('petitioner_employer_3_zip_code',  'form1[0].#subform[2].P1_Line16e_ZipCode[0]') ;
	writeText('petitioner_employer_3_province',  'form1[0].#subform[2].P1_Line16f_Province[0]') ;
	writeText('petitioner_employer_3_postal_code',  'form1[0].#subform[2].P1_Line16g_PostalCode[0]') ;
	writeText('petitioner_employer_3_country',  'form1[0].#subform[2].P1_Line16h_Country[0]') ;
	writeText('petitioner_employer_3_occupation',  'form1[0].#subform[2].P1_16j_jobTitle[0]') ;
	writeText('petitioner_employer_3_date_from',  'form1[0].#subform[2].P1_16k_from[0]') ;
	writeText('petitioner_employer_3_date_to',  'form1[0].#subform[2].P1_16i_to[0]') ;
	
	writeText('petitioner_employer_4_name',  'form1[0].#subform[2].P1_17a_employerName[0]') ;
	writeText('petitioner_employer_4_street_number_name',  'form1[0].#subform[2].P1_Line17a_StreetNumberName[0]') ;
	
	checkBox('petitioner_employer_4_o',
		array(
			'Apt' => 'form1[0].#subform[2].P1_checkbox17b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[2].P1_checkbox17b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[2].P1_checkbox17b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_employer_4_apt_ste_flr_number',  'form1[0].#subform[2].P1_Line7b_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_4_city',  'form1[0].#subform[2].P1_Line17c_CityOrTown[0]') ;
	writeText('petitioner_employer_4_state',  'form1[0].#subform[2].P1_Line17d_State[0]') ;
	writeText('petitioner_employer_4_zip_code',  'form1[0].#subform[2].P1_Line17e_ZipCode[0]') ;
	writeText('petitioner_employer_4_province',  'form1[0].#subform[2].P1_Line17f_Province[0]') ;
	writeText('petitioner_employer_4_postal_code',  'form1[0].#subform[2].P1_Line17g_PostalCode[0]') ;
	writeText('petitioner_employer_4_country',  'form1[0].#subform[2].P1_Line17h_Country[0]') ;
	writeText('petitioner_employer_4_occupaion',  'form1[0].#subform[2].P1_17i_jobTitle[0]') ;
	writeText('petitioner_employer_4_date_from',  'form1[0].#subform[2].P1_17k_from[0]') ;
	writeText('petitioner_employer_4_date_to',  'form1[0].#subform[2].P1_17i_to[0]') ;
	
	writeText('petitioner_employer_5_name',  'form1[0].#subform[3].P1_18a_employerName[0]') ;
	writeText('petitioner_employer_5_street_number_name',  'form1[0].#subform[3].P1_Line18b_StreetNumberName[0]') ;
	
	checkBox('petitioner_employer_5_o',
		array(
			'Apt' => 'form1[0].#subform[3].P1_checkbox18b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[3].P1_checkbox18b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[3].P1_checkbox18b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_employer_5_apt_ste_flr_number',  'form1[0].#subform[3].P1_Line18b_AptSteFlrNumber[0]') ;
	writeText('petitioner_employer_5_city',  'form1[0].#subform[3].P1_Line18c_CityOrTown[0]') ;
	writeText('petitioner_employer_5_state',  'form1[0].#subform[3].P1_Line18d_State[0]') ;
	writeText('petitioner_employer_5_zip_code',  'form1[0].#subform[3].P1_Line18e_ZipCode[0]') ;
	writeText('petitioner_employer_5_province',  'form1[0].#subform[3].P1_Line18f_Province[0]') ;
	writeText('petitioner_employer_5_postal_code',  'form1[0].#subform[3].P1_Line18g_PostalCode[0]') ;
	writeText('petitioner_employer_5_country',  'form1[0].#subform[3].P1_Line18h_Country[0]') ;
	writeText('petitioner_employer_5_occupation',  'form1[0].#subform[3].P1_18j_jobTitle[0]') ;
	writeText('petitioner_employer_5_date_from',  'form1[0].#subform[3].P1_18k_from[0]') ;
	writeText('petitioner_employer_5_date_to',  'form1[0].#subform[3].P1_181_to[0]') ;
	
	writeText('petitioner_dob',  'form1[0].#subform[3].P1_Line19_DateOfBirth[0]') ;
	
	checkBox('petitioner_gender',
		array(
			'M' => 'form1[0].#subform[3].P1_Line20_Sex[0]' ,
			'F' => 'form1[0].#subform[3].P1_Line20_Sex[0]'
		)
	) ;
	
	writeText('petitioner_birth_city',  'form1[0].#subform[3].P1_Line21_CityTownOfBirth[0]') ;
	writeText('petitioner_birth_state',  'form1[0].#subform[3].P1_Line22_CountryofBirth[0]') ;
	writeText('petitioner_birth_country',  'form1[0].#subform[3].P1_Line23CountryofBirth[0]') ;
	writeText('petitioner_citizenship_country',  'form1[0].#subform[3].P1_Line24_CountryofBirth[0]') ;
	writeText('petitioner_last_foreign_residence',  'form1[0].#subform[3].P1_Line25_CountryofLast[0]') ;
	writeText('petitioner_date_last_arrival',  'form1[0].#subform[3].P1_Line26_DateOfarrival[0]') ;
	writeText('petitioner_city_last_arrival',  'form1[0].#subform[3].P1_Line27a_CityOrTown[0]') ;
	writeText('petitioner_state_last_arrival',  'form1[0].#subform[3].P1_Line27b_State[0]') ;
	writeText('petitioner_i94_ad_record_number',  'form1[0].#subform[3].Line28a_ArrivalDeparture[0]') ;
	writeText('petitioner_i94_stay_expire',  'form1[0].#subform[3].P1_Line228b_DateOfPeriod[0]') ;
	writeText('petitioner_passport_number_last_arrival',  'form1[0].#subform[3].Line28c_Passport[0]') ;
	writeText('petitioner_travel_document_number_last_arrival',  'form1[0].#subform[3].Line28d_TravelDoc[0]') ;
	writeText('petitioner_passport_travel_document_country',  'form1[0].#subform[3].P1_Line28e_Country[0]') ;
	writeText('petitioner_passport_travel_document_expiry_date',  'form1[0].#subform[3].P1_Line28f_DateOfpassport[0]') ;
	writeText('petitioner_nonimmigrant_status',  'form1[0].#subform[3].P1_Line28g_NonimmigrantStatus[0]') ;
	writeText('petitioner_nonimmigrant_status_expire_date',  'form1[0].#subform[3].P1_Line28h_DateOfAdmission[0]') ;

	
	//PART1 - END 
	
	//PART2 - START
	
	checkBox('RC_investment',
		array(
			'Yes' => 'form1[0].#subform[3].P2_Line1[1]' ,
			'No' => 'form1[0].#subform[3].P2_Line1[0]'
		)
	) ;
	
	writeText('RC_name',  'form1[0].#subform[3].P2_Line2_regCtrName[0]') ;
	writeText('RC_identification_number',  'form1[0].#subform[3].P2_Line3_regCtrID[0]') ;
	writeText('RC_application_receipt_number',  'form1[0].#subform[3].P2_Line4_receiptNo[0]') ;
	writeText('NCE_identification_number',  'form1[0].#subform[3].P2_Line4_IDNo[0]') ;
	
	checkBox('petition_type_investment',
		array(
			'Targeted Employment Area (TEA)' => 'form1[0].#subform[4].Pt2_petitionType[0]' ,
			'Upward Adjustment Area' => 'form1[0].#subform[4].Pt2_petitionType[1]' ,
			'Non-TEA/Non-Upward Adjustment Area' => 'form1[0].#subform[4].Pt2_petitionType[2]'
		)
	) ;
	
	checkBox('NCE_business_TEA',
		array(
			'Yes' => 'form1[0].#subform[4].p2Line6aYesNo[1]' ,
			'No' => 'form1[0].#subform[4].p2Line6aYesNo[0]'
		)
	) ;
	
	checkBox('NCE_business_area_rural',
		array(
			'Yes' => 'form1[0].#subform[4].p2Line6bYesNo[1]' ,
			'No' => 'form1[0].#subform[4].p2Line6bYesNo[0]'
		)
	) ;
	
	checkBox('NCE_business_area_unemployment',
		array(
			'Yes' => 'form1[0].#subform[4].p2Line6cYesNo[1]' ,
			'No' => 'form1[0].#subform[4].p2Line6cYesNo[0]'
		)
	) ;
	
	writeText('NCE_business_street_number_name',  'form1[0].#subform[4].Pt2_6e_StreetNumberName[0]') ;
	
	checkBox('NCE_business_o',
		array(
			'Apt' => 'form1[0].#subform[4].p2Line6dAptSteFlr[0]' ,
			'Ste' => 'form1[0].#subform[4].p2Line6dAptSteFlr[1]' ,
			'Flr' => 'form1[0].#subform[4].p2Line6dAptSteFlr[2]'
		)
	) ;
	
	writeText('NCE_business_apt_ste_flr_number',  'form1[0].#subform[4].Pt2_6e_AptSteFlrNumber[0]') ;
	writeText('NCE_business_city',  'form1[0].#subform[4].Pt2_line6d_CityOrTown[0]') ;
	writeText('NCE_business_country',  'form1[0].#subform[4].Pt2_line6d_County[0]') ;
	writeText('NCE_business_state',  'form1[0].#subform[4].Pt2_line6d_State[0]') ;
	writeText('NCE_business_zip_code',  'form1[0].#subform[4].Pt2_line6d_ZipCode[0]') ;
	
	checkBox('JCE_business_TEA',
		array(
			'Yes' => 'form1[0].#subform[4].p2Line6eYesNo[1]' ,
			'No' => 'form1[0].#subform[4].p2Line6eYesNo[0]'
		)
	) ;
	
	checkBox('JCE_business_area_rural',
		array(
			'Yes' => 'form1[0].#subform[4].p2Line6fYesNo[1]' ,
			'No' => 'form1[0].#subform[4].p2Line6fYesNo[0]'
		)
	) ;
	
	checkBox('JCE_business_area_unemployment',
		array(
			'Yes' => 'form1[0].#subform[4].p2Line6gYesNo[1]' ,
			'No' => 'form1[0].#subform[4].p2Line6gYesNo[0]'
		)
	) ;
	
	writeText('JCE_business_street_number_name',  'form1[0].#subform[4].Pt2_line6i_StreetNumberName[0]') ;
	
	checkBox('JCE_business_o',
		array(
			'Apt' => 'form1[0].#subform[4].Pt2_6i_UNT[0]' ,
			'Ste' => 'form1[0].#subform[4].Pt2_6i_UNT[1]' ,
			'Flr' => 'form1[0].#subform[4].Pt2_6i_UNT[2]'
		)
	) ;
	
	writeText('JCE_business_apt_ste_flr_number',  'form1[0].#subform[4].Pt2_6i_AptSteFlrNumber[0]') ;
	writeText('JCE_business_city',  'form1[0].#subform[4].Pt2_line6i_CityOrTown[0]') ;
	writeText('JCE_business_country',  'form1[0].#subform[4].Pt2_line6i_County[0]') ;
	writeText('JCE_business_state',  'form1[0].#subform[4].Pt2_line6i_State[0]') ;
	writeText('JCE_business_zip_code',  'form1[0].#subform[4].Pt2_line6i_ZipCode[0]') ;
	
	writeText('investment_amount_deposited',  'form1[0].#subform[4].Pt2_line9[0]') ;
	writeText('investment_assets_purchased',  'form1[0].#subform[4].Pt2_line10[0]') ;
	writeText('investment_property_transferred',  'form1[0].#subform[4].Pt2_line11[0]') ;
	writeText('investment_debt_financing',  'form1[0].#subform[4].Pt2_line12[0]') ;
	writeText('investment_total_stock',  'form1[0].#subform[4].Pt2_line13[0]') ;
	writeText('investment_other_capital',  'form1[0].#subform[4].Pt2_line14[0]') ;
	writeText('investment_gross_income',  'form1[0].#subform[4].Pt2_line15[0]') ;
	writeText('investment_net_income',  'form1[0].#subform[4].Pt2_line16[0]') ;
	writeText('current_gross_income',  'form1[0].#subform[4].Pt2_line17[0]') ;
	writeText('current_net_income',  'form1[0].#subform[4].Pt2_line18[0]') ;
	writeText('investment_net_worth',  'form1[0].#subform[4].Pt2_line19[0]') ;
	//writeText('current_net_worth',  'form1[0].#subform[5].P2_line21f_sourcesInvestment[0]') ;
	
	checkBox('investment_capital_source_1',
		array(
			'Yes' => 'form1[0].#subform[5].P2_line21a_sourcesInvestment[0]'
		)
	) ;
	
	checkBox('investment_capital_source_2',
		array(
			'Yes' => 'form1[0].#subform[5].P2_line21b_sourcesInvestment[0]'
		)
	) ;
	
	checkBox('investment_capital_source_3',
		array(
			'Yes' => 'form1[0].#subform[5].P2_line21c_sourcesInvestment[0]'
		)
	) ;
	
	checkBox('investment_capital_source_4',
		array(
			'Yes' => 'form1[0].#subform[5].P2_line21d_sourcesInvestment[0]'
		)
	) ;
	
	checkBox('investment_capital_source_5',
		array(
			'Yes' => 'form1[0].#subform[5].P2_line21e_sourcesInvestment[0]'
		)
	) ;
	
	writeText('investment_capital_documentation',  'form1[0].#subform[5].P2_line21f_AdditionalInfo[0]') ;
	
	//PART2 -END
	
	//PART3 - START
	
	checkBox('NCE_type',
		array(
			'NCE formed after November 29, 1990' => 'form1[0].#subform[5].P3_typeofNCE[0]' ,
			'NCE resulting from the purchase of a business formed on or before November 29, 1990 that is restructured or reorganized' => 'form1[0].#subform[5].P3_typeofNCE[1]' ,
			'NCE resulting from a capital investment in and substantial expansion of a business formed on or before November 29, 1990.' => 'form1[0].#subform[5].P3_typeofNCE[1]'
		)
	) ;
	
	writeText('NCE_name',  'form1[0].#subform[5].Pt3Line2_NameofNCE[0]') ;
	
	writeText('NCE_address_street_number_name',  'form1[0].#subform[5].P3_Line3a_StreetNumberName[0]') ;
	
	checkBox('NCE_address_o',
		array(
			'Apt' => 'form1[0].#subform[5].P3_checkbox3b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[5].P3_checkbox3b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[5].P3_checkbox3b_Unit[2]'
		)
	) ;
	
	writeText('NCE_apt_ste_flr_number',  'form1[0].#subform[5].P3_checkbox3b_AptSteFlrNumber[0]') ;
	writeText('NCE_address_city',  'form1[0].#subform[5].P3_line3c_CityOrTown[0]') ;
	writeText('NCE_address_country',  'form1[0].#subform[5].P3_line3d_CityOrTown[0]') ;
	writeText('NCE_address_state',  'form1[0].#subform[5].P3_line3e_State[0]') ;
	writeText('NCE_address_zip_code',  'form1[0].#subform[5].P3_line3f_ZipCode[0]') ;
	writeText('NCE_telephone',  'form1[0].#subform[5].P3_line4[0]') ;
	writeText('NCE_entity_type',  'form1[0].#subform[5].P3_line5[0]') ;
	writeText('NCE_activity_type',  'form1[0].#subform[5].P3_line6a[0]') ;
	writeText('NCE_included_industries',  'form1[0].#subform[5].P3_line6b[0]') ;
	
	checkBox('NCE_troubled_business_investment',
		array(
			'Yes' => 'form1[0].#subform[5].P3_line7[1]' ,
			'No' => 'form1[0].#subform[5].P3_line7[0]'
		)
	) ;
	
	
	writeText('NCE_date_business_establishment',  'form1[0].#subform[5].P3_line8[0]') ;
	writeText('NCE_FEIN',  'form1[0].#subform[5].P3_line9[0]') ;
	writeText('NCE_date_entrepreneur_initial_investment',  'form1[0].#subform[5].P3_line10[0]') ;
	writeText('NCE_amount_entrepreneur_initial_investment',  'form1[0].#subform[5].P3_line11[0]') ;
	writeText('NCE_total_investement',  'form1[0].#subform[5].P3_line12[0]') ;
	writeText('NCE_ownership',  'form1[0].#subform[5].P3_line13[0]') ;
	
	writeText('NCE_name_party_1',  'form1[0].#subform[6].P3_line14a[0]') ;
	writeText('NCE_ownership_1',  'form1[0].#subform[6].P3_line14b[0]') ;
	checkBox('NCE_alien_entrepreneur_1',
		array(
			'Yes' => 'form1[0].#subform[6].P3_line14c[1]' ,
			'No' => 'form1[0].#subform[6].P3_line14c[0]'
		)
	) ;
	
	writeText('NCE_name_party_2',  'form1[0].#subform[6].P3_line15a[0]') ;
	writeText('NCE_ownership_2',  'form1[0].#subform[6].P3_line15b[0]') ;
	checkBox('NCE_alien_entrepreneur_2',
		array(
			'Yes' => 'form1[0].#subform[6].P3_line15c[1]' ,
			'No' => 'form1[0].#subform[6].P3_line15c[0]'
		)
	) ;
	
	writeText('NCE_name_party_3',  'form1[0].#subform[6].P1_Line11_CountryofBirth[0]') ;
	writeText('NCE_ownership_3',  'form1[0].#subform[6].P3_line16b[0]') ;
	checkBox('NCE_alien_entrepreneur_3',
		array(
			'Yes' => 'form1[0].#subform[6].P3_line16c[0]' ,
			'No' => 'form1[0].#subform[6].P3_line16c[1]'
		)
	) ;
	
	//PART3 - END
	
	//PART4 - START
	
	checkBox('JCE_NCE_difference',
		array(
			'Yes' => 'form1[0].#subform[6].P4_line1[1]' , 
			'No' => 'form1[0].#subform[6].P4_line1[0]'
		)
	) ;
	
	writeText('JCE_1_name',  'form1[0].#subform[6].P4_line2[0]') ;
	writeText('JCE_1_address_street_number_name',  'form1[0].#subform[6].P4_line3a_StreetNumberName[0]') ;
	
	checkBox('JCE_1_address_o',
		array(
			'Apt' => 'form1[0].#subform[6].P4_checkbox3b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[6].P4_checkbox3b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[6].P4_checkbox3b_Unit[2]'
		)
	) ;
	
	writeText('JCE_1_apt_ste_flr_number',  'form1[0].#subform[6].P4_line3b_AptSteFlrNumber[0]') ;
	writeText('JCE_1_address_city',  'form1[0].#subform[6].P4_line3c_CityOrTown[0]') ;
	writeText('JCE_1_country',  'form1[0].#subform[6].P4_line3d_County[0]') ;
	writeText('JCE_1_address_state',  'form1[0].#subform[6].P4_line3e_State[0]') ;
	writeText('JCE_1_address_zip_code',  'form1[0].#subform[6].P4_line3f_ZipCode[0]') ;
	writeText('JCE_1_phone',  'form1[0].#subform[6].P4_line4_DaytimePhoneNumber[0]') ;
	writeText('JCE_1_entity_type',  'form1[0].#subform[6].P4_line5[0]') ;
	writeText('JCE_1_activity_nature',  'form1[0].#subform[6].P4_line6[0]') ;
	writeText('JCE_1_included_industries',  'form1[0].#subform[6].P4_line7[0]') ;
	
	writeText('JCE_2_name',  'form1[0].#subform[6].P4_line8[0]') ;
	writeText('JCE_2_address_street_number_name',  'form1[0].#subform[6].P4_line9a_StreetNumberName[0]') ;
	
	checkBox('JCE_2_address_o',
		array(
			'Apt' => 'form1[0].#subform[6].P4_checkbox9b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[6].P4_checkbox9b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[6].P4_checkbox9b_Unit[2]'
		)
	) ;
	
	writeText('JCE_2_apt_ste_flr_number',  'form1[0].#subform[6].P4_Line9b_AptSteFlrNumber[0]') ;
	writeText('JCE_2_address_city',  'form1[0].#subform[6].P4_Line9c_CityOrTown[0]') ;
	writeText('JCE_2_address_country',  'form1[0].#subform[6].P4_Line9d_County[0]') ;
	writeText('JCE_2_address_state',  'form1[0].#subform[6].P4_Line9e_State[0]') ;
	writeText('JCE_2_address_zip_code',  'form1[0].#subform[6].P4_Line9f_ZipCode[0]') ;
	writeText('JCE_2_phone',  'form1[0].#subform[6].P4_Line10_DaytimePhoneNumber[0]') ;
	writeText('JCE_2_entity_type',  'form1[0].#subform[6].P4_Line11[0]') ;
	writeText('JCE_2_activity_type',  'form1[0].#subform[6].P4_Line12a[0]') ;
	writeText('JCE_2_included_industries',  'form1[0].#subform[6].P4_Line12b[0]') ;
	
	//PART4 - END
	
	//PART5 - START
	
	writeText('petitioner_NCE_occupation',  'form1[0].#subform[7].P5_Line1[0]') ;
	writeText('petitioner_NCE_duties',  'form1[0].#subform[7].P5_Line2[0]') ;
	writeText('petitioner_NCE_salary',  'form1[0].#subform[7].P5_Line3[0]') ;
	writeText('petitioner_NCE_cost_benefits',  'form1[0].#subform[7].P5_Line4[0]') ;
	writeText('NCE_employees_number_initial_investment',  'form1[0].#subform[7].Line8_Wages[0]') ;
	writeText('NCE_employees_number_filing_petition',  'form1[0].#subform[7].P5_Line6[0]') ;
	writeText('NCE_employees_difference',  'form1[0].#subform[7].P5_Line7[0]') ;
	writeText('NCE_job_creation_expected_time',  'form1[0].#subform[7].P5_Line8[0]') ;
	
	checkBox('petition_indirect_job_creation',
		array(
			'Yes' => 'form1[0].#subform[7].P5_Line9[1]' , 
			'No' => 'form1[0].#subform[7].P5_Line9[0]'
		)
	) ;
	
	writeText('NCE_amount_capital_JCE_available',  'form1[0].#subform[7].P5_Line10[0]') ;
	writeText('NCE_amount_capital_AE',  'form1[0].#subform[7].P5_Line11[0]') ;
	
	//PART5 - END
	
	//PART6 - START
	
	checkBox('petitioner_IVP',
		array(
			'Yes' => 'form1[0].#subform[7].Pt6Line1a_IVP[0]'
		)
	) ;
	
	switch (getFieldLC('petitioner_IVP'))
	{
			
		case 'Yes' :
			writeText('petitioner_citizenship_country',  'form1[0].#subform[7].Pt6Line1b_CountryofBirth[0]') ;
			writeText('petitioner_current_residence_country',  'form1[0].#subform[7].Pt6Line1c_CountryofResidence[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_AFAOS',
		array(
			'Yes' => 'form1[0].#subform[7].Pt6Line2a_AFAOS[0]'
		)
	) ;
	
	switch (getFieldLC('petitioner_AFAOS'))
	{
			
		case 'Yes' :
			writeText('petitioner_last_permanent_residence_abroad',  'form1[0].#subform[7].Pt6Line2b_CountryofResidence[0]') ;
			break ;
		
	}
	
	writeText('petitioner_abroad_street_number_name',  'form1[0].#subform[7].P6_Line3a_StreetNumberName[0]') ;
	
	checkBox('petitioner_abroad_o',
		array(
			'Apt' => 'form1[0].#subform[7].P6_Line3b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[7].P6_Line3b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[7].P6_Line3b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_abroad_apt_ste_flr_number',  'form1[0].#subform[7].Pt6Line3_AptSteFlrNumber[0]') ;
	writeText('petitioner_abroad_city',  'form1[0].#subform[7].P6_Line3c_CityOrTown[0]') ;
	writeText('petitioner_abroad_province',  'form1[0].#subform[7].P6_Line3d_Province[0]') ;
	writeText('petitioner_abroad_postal_code',  'form1[0].#subform[7].P6_Line3e_PostalCode[0]') ;
	writeText('petitioner_abroad_country',  'form1[0].#subform[7].P6_Line3f_Country[0]') ;
	writeText('petitioner_abroad_phone',  'form1[0].#subform[7].P6_Line4_DaytimePhoneNumber[0]') ;
	
	writeText('petitioner_native_street_number_name',  'form1[0].#subform[7].P6_Line5a_StreetNumberName[0]') ;
	
	checkBox('petitioner_native_o',
		array(
			'Apt' => 'form1[0].#subform[7].P6_Line5b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[7].P6_Line5b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[7].P6_Line5b_Unit[2]'
		)
	) ;
	
	writeText('petitioner_native_apt_ste_flr_number',  'form1[0].#subform[7].P6_Line5b_AptSteFlrNumber[0]') ;
	writeText('petitioner_native_city',  'form1[0].#subform[7].P6_Line5c_CityOrTown[0]') ;
	writeText('petitioner_native_province',  'form1[0].#subform[7].P6_Line5d_Province[0]') ;
	writeText('petitioner_native_postal_code',  'form1[0].#subform[7].P6_Line5e_PostalCode[0]') ;
	writeText('petitioner_native_country',  'form1[0].#subform[7].P6_Line5f_Country[0]') ;
	
	checkBox('petitioner_immigration_proceeding',
		array(
			'Yes' => 'form1[0].#subform[8].P6_Line6[1]' ,
			'No' => 'form1[0].#subform[8].P6_Line6[0]' 
		)
	) ;
	
	checkBox('petitioner_immigration_proceeding_type',
		array(
			'Exclusion' => 'form1[0].#subform[8].P6_Line7[0]' ,
			'Deportation' => 'form1[0].#subform[8].P6_Line7[1]' ,
			'Removal' => 'form1[0].#subform[8].P6_Line7[2]'
		)
	) ;
	
	writeText('petitioner_immigration_proceeding_city',  'form1[0].#subform[8].P6_Line8[0]') ;
	writeText('petitioner_immigration_proceeding_state',  'form1[0].#subform[8].P6_Line8b_State[0]') ;
	
	checkBox('petitioner_immigration_proceeding_order',
		array(
			'Yes' => 'form1[0].#subform[8].P6_Line9[1]' ,
			'No' => 'form1[0].#subform[8].P6_Line9[0]' 
		)
	) ;
	
	checkBox('petitioner_us_employment_permission',
		array(
			'Yes' => 'form1[0].#subform[8].P6_Line10[1]' ,
			'No' => 'form1[0].#subform[8].P6_Line10[0]' 
		)
	) ;
	
	switch (getFieldLC('petitioner_us_employment_permission'))
	{
			
		case 'Yes' :
			writeText('petitioner_us_employement_explain',  'form1[0].#subform[8].P6_Line11_AdditionalInfo[0]') ;
			break ;
		
	}
	
	//PART6 - END
	
	//PART7 - START
	
	//Family Member 1
	
	writeText('petitioner_family_1_name_family',  'form1[0].#subform[8].P7_Line1a_FamilyName[0]') ;
	writeText('petitioner_family_1_name_given',  'form1[0].#subform[8].P7_Line1b_GivenName[0]') ;
	writeText('petitioner_family_1_name_middle',  'form1[0].#subform[8].P7_Line1c_MiddleName[0]') ;
	writeText('petitioner_family_1_dob',  'form1[0].#subform[8].P7_Line2_DateOfBirth2[0]') ;
	writeText('petitioner_family_1_birth_country',  'form1[0].#subform[8].P7_Line3_Country[0]') ;
	writeText('petitioner_family_1_relationship',  'form1[0].#subform[8].P7_Line4_Country[0]') ;
	
	checkBox('petitioner_family_1_status_adjustment',
		array(
			'Yes' => 'form1[0].#subform[8].P7_Line5[1]' ,
			'No' => 'form1[0].#subform[8].P7_Line5[0]' 
		)
	) ;
	
	checkBox('petitioner_family_1_visa_abroad',
		array(
			'Yes' => 'form1[0].#subform[8].P7_Line6[1]' ,
			'No' => 'form1[0].#subform[8].P7_Line6[0]' 
		)
	) ;
	
	//Family Member 2
	
	writeText('petitioner_family_2_name_family',  'form1[0].#subform[8].P7_Line7a_FamilyName[0]') ;
	writeText('petitioner_family_2_name_given',  'form1[0].#subform[8].P7_Line7b_GivenName[0]') ;
	writeText('petitioner_family_2_name_middle',  'form1[0].#subform[8].P7_Line7c_MiddleName[0]') ;
	writeText('petitioner_family_2_dob',  'form1[0].#subform[8].P7_Line8_DateOfBirth2[0]') ;
	writeText('petitioner_family_2_birth_country',  'form1[0].#subform[8].P7_Line9_Country[0]') ;
	writeText('petitioner_family_2_relationship',  'form1[0].#subform[8].P7_Line10[0]') ;
	
	checkBox('petitioner_family_2_status_adjustment',
		array(
			'Yes' => 'form1[0].#subform[8].P7_Line11[1]' ,
			'No' => 'form1[0].#subform[8].P7_Line11[0]' 
		)
	) ;
	
	checkBox('petitioner_family_2_visa_abroad',
		array(
			'Yes' => 'form1[0].#subform[8].P7_Line12[1]' ,
			'No' => 'form1[0].#subform[8].P7_Line12[0]' 
		)
	) ;
	
	//Family Member 3
	
	writeText('petitioner_family_3_name_family',  'form1[0].#subform[8].P7_Line13a_FamilyName[0]') ;
	writeText('petitioner_family_3_name_given',  'form1[0].#subform[8].P7_Line13b_GivenName[0]') ;
	writeText('petitioner_family_3_name_middle',  'form1[0].#subform[8].P7_Line13c_MiddleName[0]') ;
	writeText('petitioner_family_3_dob',  'form1[0].#subform[9].P7_Line14_DateOfBirth2[0]') ;
	writeText('petitioner_family_3_birth_country',  'form1[0].#subform[9].P7_Line15_Country[0]') ;
	writeText('petitioner_family_3_relationship',  'form1[0].#subform[9].P7_Line16[0]') ;
	
	checkBox('petitioner_family_3_status_adjustment',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line17[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line17[0]' 
		)
	) ;
	
	checkBox('petitioner_family_3_visa_abroad',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line18[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line18[0]' 
		)
	) ;
	
	//Family Member 4
	
	writeText('petitioner_family_4_name_family',  'form1[0].#subform[9].P7_Line19a_FamilyName[0]') ;
	writeText('petitioner_family_4_name_given',  'form1[0].#subform[9].P7_Line19b_GivenName[0]') ;
	writeText('petitioner_family_4_name_middle',  'form1[0].#subform[9].P7_Line19c_MiddleName[0]') ;
	writeText('petitioner_family_4_dob',  'form1[0].#subform[9].P7_Line20_DateOfBirth[0]') ;
	writeText('petitioner_family_4_birth_country',  'form1[0].#subform[9].P7_Line20_Country[0]') ;
	writeText('petitioner_family_4_relationship',  'form1[0].#subform[9].P7_Line22[0]') ;
	
	checkBox('petitioner_family_4_status_adjustment',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line23[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line23[0]' 
		)
	) ;
	
	checkBox('petitioner_family_4_visa_abroad',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line24[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line24[0]' 
		)
	) ;
	
	//Family Member 5
	
	writeText('petitioner_family_5_name_family',  'form1[0].#subform[9].P7_Line25a_FamilyName[0]') ;
	writeText('petitioner_family_5_name_given',  'form1[0].#subform[9].P7_Line25b_GivenName[0]') ;
	writeText('petitioner_family_5_name_middle',  'form1[0].#subform[9].P7_Line25c_MiddleName[0]') ;
	writeText('petitioner_family_5_dob',  'form1[0].#subform[9].P7_Line26_DateOfBirth[0]') ;
	writeText('petitioner_family_5_birth_country',  'form1[0].#subform[9].P7_Line27_Country[0]') ;
	writeText('petitioner_family_5_relationship',  'form1[0].#subform[9].P7_Line28_Country[0]') ;
	
	checkBox('petitioner_family_5_status_adjustment',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line29[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line29[0]' 
		)
	) ;
	
	checkBox('petitioner_family_5_visa_abroad',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line30[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line30[0]' 
		)
	) ;
	
	//Family Member 6
	
	writeText('petitioner_family_6_name_family',  'form1[0].#subform[9].P7_Line31a_FamilyName[0]') ;
	writeText('petitioner_family_6_name_given',  'form1[0].#subform[9].P7_Line31b_GivenName[0]') ;
	writeText('petitioner_family_6_name_middle',  'form1[0].#subform[9].P7_Line31c_MiddleName[0]') ;
	writeText('petitioner_family_6_dob',  'form1[0].#subform[9].P7_Line32_DateOfBirth[0]') ;
	writeText('petitioner_family_6_birth_country',  'form1[0].#subform[9].P7_Line33_Country[0]') ;
	writeText('petitioner_family_6_relationship',  'form1[0].#subform[9].P7_Line34_Country[0]') ;
	
	checkBox('petitioner_family_6_status_adjustment',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line35[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line35[0]' 
		)
	) ;
	
	checkBox('petitioner_family_6_visa_abroad',
		array(
			'Yes' => 'form1[0].#subform[9].P7_Line36[1]' ,
			'No' => 'form1[0].#subform[9].P7_Line36[0]' 
		)
	) ;
	
	//PART7 - END
	
	//PART8 - START
	
	checkBox('petitioner_statement_1',
		array(
			'Yes' => 'form1[0].#subform[9].P8_Checkbox1[0]'
		)
	) ;
	
	checkBox('petitioner_statement_2',
		array(
			'Yes' => 'form1[0].#subform[9].P8_Checkbox1[1]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_statement_2'))
	{
			
		case 'Yes' :
			writeText('petitioner_language',  'form1[0].#subform[9].P8_line1b[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_statement_3',
		array(
			'Yes' => 'form1[0].#subform[9].P8_Checkbox2[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_statement_3'))
	{
			
		case 'Yes' :
			writeText('petitioner_preparer_name',  'form1[0].#subform[9].P8_line2[0]') ;
			break ;
		
	}
	
	writeText('petitioner_as_name_family',  'form1[0].#subform[9].P8_line3a_FamilyName[0]') ;
	writeText('petitioner_as_name_given',  'form1[0].#subform[9].P8_line3b_GivenName[0]') ;
	writeText('petitioner_as_title',  'form1[0].#subform[10].P8_line4[0]') ;
	writeText('petitioner_contact_phone',  'form1[0].#subform[10].P8_line5[0]') ;
	writeText('petitioner_contact_mobile',  'form1[0].#subform[10].P8_line6[0]') ;
	writeText('petitioner_contact_email',  'form1[0].#subform[10].P8_line7_EmailAddress[0]') ;

	//PART8 - END
	
	//PART9 - START
	
	writeText('interpreter_name_family',  'form1[0].#subform[10].P9_Line1a_InterpretersFamilyName[0]') ;
	writeText('interpreter_name_given',  'form1[0].#subform[10].P9_Line1b_InterpretersGivenName[0]') ;
	writeText('interpreter_organisation',  'form1[0].#subform[10].P9_Line2_NameofBusinessor[0]') ;
	writeText('interpreter_address_street_name_name',  'form1[0].#subform[10].P9_Line3a_StreetNumberName[0]') ;
	
	checkBox('interpreter_address_o',
		array(
			'Apt' => 'form1[0].#subform[10].P9_checkbox3b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[10].P9_checkbox3b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[10].P9_checkbox3b_Unit[2]'
			
		)
	) ;
	
	writeText('interpreter_address_apt_ste_flr_number',  'form1[0].#subform[10].P9_Line3b_AptSteFlrNumber[0]') ;
	writeText('interpreter_address_city',  'form1[0].#subform[10].P9_Line3c_CityTown[0]') ;
	writeText('interpreter_address_state',  'form1[0].#subform[10].P9_Line3d_State[0]') ;
	writeText('interpreter_address_zip_code',  'form1[0].#subform[10].P9_Line3e_ZipCode[0]') ;
	writeText('interpreter_address_province',  'form1[0].#subform[10].P9_Line3f_Province[0]') ;
	writeText('interpreter_address_postal_code',  'form1[0].#subform[10].P9_Line3g_PostalCode[0]') ;
	writeText('interpreter_address_country',  'form1[0].#subform[10].P9_Line3h_Country[0]') ;
	writeText('interpreter_contact_phone',  'form1[0].#subform[10].P9_Line4_DaytimePhoneNumber[0]') ;
	writeText('interpreter_contact_mobile',  'form1[0].#subform[10].P9_Line5_MobilePhoneNumber[0]') ;
	writeText('interpreter_contact_email',  'form1[0].#subform[10].P9_Line6_EmailAddress[0]') ;
	writeText('interpreter_language',  'form1[0].#subform[10].P9_Language[0]') ;
	
	//PART9 - END 
	
	//PART10 - START
	
	writeText('preparer_name_family',  'form1[0].#subform[11].P10_Line1a_FamilyName[0]') ;
	writeText('preparer_name_given',  'form1[0].#subform[11].P10_Line1b_PreparersGivenName[0]') ;
	writeText('preparer_name_business',  'form1[0].#subform[11].P10_Line2_NameofBusinessor[0]') ;
	writeText('preparer_address_street_number_name',  'form1[0].#subform[11].P10_Line3a_StreetNumberName[0]') ;
	
	checkBox('preparer_address_o',
		array(
			'Apt' => 'form1[0].#subform[11].P10_checkbox3b_Unit[0]' ,
			'Ste' => 'form1[0].#subform[11].P10_checkbox3b_Unit[1]' ,
			'Flr' => 'form1[0].#subform[11].P10_checkbox3b_Unit[2]'
			
		)
	) ;
	
	writeText('preparer_address_apt_ste_flr_number',  'form1[0].#subform[11].P10_Line3b_AptSteFlrNumber[0]') ;
	writeText('preparer_address_city',  'form1[0].#subform[11].P10_Line3c_CityTown[0]') ;
	writeText('preparer_address_state',  'form1[0].#subform[11].P10_Line3d_State[0]') ;
	writeText('preparer_address_zip_code',  'form1[0].#subform[11].P10_Line3e_ZipCode[0]') ;
	writeText('preparer_address_province',  'form1[0].#subform[11].P10_Line3f_Province[0]') ;
	writeText('preparer_address_postal_code',  'form1[0].#subform[11].P10_Line3g_PostalCode[0]') ;
	writeText('preparer_address_country',  'form1[0].#subform[11].P10_Line3h_Country[0]') ;
	writeText('preparer_address_phone',  'form1[0].#subform[11].P10_Line4_PreparersDaytimePhoneNumber[0]') ;
	writeText('preparer_address_mobile',  'form1[0].#subform[11].P10_Line5_PreparersFaxNumber[0]') ;
	writeText('preparer_address_email',  'form1[0].#subform[11].P10_Line6_PreparersEmailAddress[0]') ;
	
	checkBox('preparer_statement_1',
		array(
			'Yes' => 'form1[0].#subform[11].P10_checkbox7[0]'
			
		)
	) ;
	
	checkBox('preparer_statement_2',
		array(
			'Yes' => 'form1[0].#subform[11].P10_checkbox7[1]'
			
		)
	) ;
	
	switch (getFieldLC('preparer_statement_2'))
	{
			
		case 'Yes' :
			
			checkBox('preparer_statement_2_extend',
				array(
				'Extends' => 'form1[0].#subform[11].Pt9Line7b_Checkbox[0]',
				'Does Not Extend' => 'form1[0].#subform[11].Pt9Line7b_Checkbox[1]'
			
			)
		) ;
			
			break ;
		
	}
	
	//PART10 - END
	
	//PART11 - START
	
	writeText('petitioner_additional_name_family',  'form1[0].#subform[12].P1_Line3a_FamilyName[1]') ;
	writeText('petitioner_additional_name_given',  'form1[0].#subform[12].P1_Line3b_GivenName[1]') ;
	writeText('petitioner_additional_name_middle',  'form1[0].#subform[12].P1_Line3c_MiddleName[1]') ;
	writeText('petitioner_additional_alien_number',  'form1[0].#subform[12].#area[15].P1_Line1_AlienNumber[1]') ;
	
	writeText('petitioner_additional_1_page_number',  'form1[0].#subform[12].P11_Line3a_PageNumber[0]') ;
	writeText('petitioner_additional_1_part_number',  'form1[0].#subform[12].P11_Line3b_PartNumber[0]') ;
	writeText('petitioner_additional_1_item_number',  'form1[0].#subform[12].P11_Line3c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_1',  'form1[0].#subform[12].P11_Line3d_AdditionalInfo[0]') ;
	
	writeText('petitioner_additional_2_page_number',  'form1[0].#subform[12].P11_Line4a_PageNumber[0]') ;
	writeText('petitioner_additional_2_part_number',  'form1[0].#subform[12].P11_Line4b_PartNumber[0]') ;
	writeText('petitioner_additional_2_item_number',  'form1[0].#subform[12].P11_Line4c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_2',  'form1[0].#subform[12].P11_Line4d_AdditionalInfo[0]') ;
	
	writeText('petitioner_additional_3_page_number',  'form1[0].#subform[12].P11_Line5a_PageNumber[0]') ;
	writeText('petitioner_additional_3_part_number',  'form1[0].#subform[12].P11_Line5b_PartNumber[0]') ;
	writeText('petitioner_additional_3_item_number',  'form1[0].#subform[12].P11_Line5c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_3',  'form1[0].#subform[12].P11_Line5d_AdditionalInfo[0]') ;
	
	writeText('petitioner_additional_4_page_number',  'form1[0].#subform[12].P11_Line6a_PageNumber[0]') ;
	writeText('petitioner_additional_4_part_number',  'form1[0].#subform[12].P11_Line6b_PartNumber[0]') ;
	writeText('petitioner_additional_4_item_number',  'form1[0].#subform[12].P11_Line6c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_4',  'form1[0].#subform[12].P11_Line6d_AdditionalInfo[0]') ;
	
	writeText('petitioner_additional_5_page_number',  'form1[0].#subform[12].P11_Line7a_PageNumber[0]') ;
	writeText('petitioner_additional_5_part_number',  'form1[0].#subform[12].P11_Line7b_PartNumber[0]') ;
	writeText('petitioner_additional_5_item_number',  'form1[0].#subform[12].P11_Line7c_ItemNumber[0]') ;
	writeText('petitioner_additional_info_5',  'form1[0].#subform[12].P11_Line7d_AdditionalInfo[0]') ;
	
	//PART11 - END  
	
	
	if (!$efs)
	{
		echo 'Error: No I-526 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}


?>