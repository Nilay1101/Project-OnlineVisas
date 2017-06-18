<?php

	$inputFile = 'document-templates/i-131.pdf' ;
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
	
	//PART 1
	

	checkBox('g28_attach',
		array(
			'G-28 is attached' => 'form1[0].#subform[0].G28_Attached[0]'
		)
	) ;
	
	writeText('attorney_state_license_number',  'form1[0].#subform[0].AttorneyStateLicenseNumber[0]') ;
	writeText('part1_name_last',  'form1[0].#subform[0].Line1a_FamilyName[0]') ;
	writeText('part1_name_first',  'form1[0].#subform[0].Line1b_GivenName[0]') ;
	writeText('part1_name_middle',  'form1[0].#subform[0].Line1c_MiddleName[0]') ;
	writeText('part1_address_care_name',  'form1[0].#subform[0].Line2a_InCareofName[0]') ;
	writeText('part1_address_street_number_name',  'form1[0].#subform[0].Line2b_StreetNumberName[0]') ;
	
	checkBox('part1_address_o',
		array(
			'Apt' => 'form1[0].#subform[0].Line2c_Unit[2]' ,
			'Ste' => 'form1[0].#subform[0].Line2c_Unit[0]' ,
			'Flr' => 'form1[0].#subform[0].Line2c_Unit[1]' 
		)
	) ;
	
	writeText('part1_address_apt_ste_flr_number',  'form1[0].#subform[0].Line2c_AptSteFlrNumber[0]') ;
	writeText('part1_address_city',  'form1[0].#subform[0].Line2d_CityOrTown[0]') ;
	
	writeText('part1_address_state',  'form1[0].#subform[0].Line2e_State[0]') ;
	
	writeText('part1_address_zip_code',  'form1[0].#subform[0].Line2f_ZipCode[0]') ;
	writeText('part1_address_postal_code',  'form1[0].#subform[0].Line2g_PostalCode[0]') ;
	writeText('part1_address_province',  'form1[0].#subform[0].Line2h_Province[0]') ;
	writeText('part1_address_country',  'form1[0].#subform[0].Line2i_Country[0]') ;
	writeText('part1_other_alien_reg_number',  'form1[0].#subform[0].#area[1].Line3_AlienNumber[0]') ;
	writeText('part1_other_birth_country',  'form1[0].#subform[0].Line4_CountryOfBirth[0]') ;
	writeText('part1_other_citizen_country',  'form1[0].#subform[0].Line5_CountryOfCitizenship[0]') ;
	writeText('part1_other_admission_class',  'form1[0].#subform[0].Line6_ClassofAdmission[0]') ;
	
	checkBox('part1_other_gender',
		array(
			'F' => 'form1[0].#subform[0].Line7_Female[0]' ,
			'M' => 'form1[0].#subform[0].Line7_Male[0]' 
		)
	) ;
	
	writeText('part1_other_dob', 'form1[0].#subform[0].Line8_DateOfBirth[0]') ;
	writeText('part1_other_us_social_security_number', 'form1[0].#subform[0].#area[2].Line9_SSN[0]') ;
	
	//PART 2
	
	checkBox('part2_application_type1',
		array(
			'Yes' => 'form1[0].#subform[1].Line1a_checkbox[0]'
		)
	) ;
	
	checkBox('part2_application_type2',
		array(
			'Yes' => 'form1[0].#subform[1].Line1b_checkbox[0]'
		)
	) ;
	
	checkBox('part2_application_type3',
		array(
			'Yes' => 'form1[0].#subform[1].Line1c_checkbox[0]'
		)
	) ;
	
	checkBox('part2_application_type4',
		array(
			'Yes' => 'form1[0].#subform[1].Line1d_checkbox[0]'
		)
	) ;
	
	checkBox('part2_application_type5',
		array(
			'Yes' => 'form1[0].#subform[1].Line1e_checkbox[0]'
		)
	) ;
	
	checkBox('part2_application_type6',
		array(
			'Yes' => 'form1[0].#subform[1].Line1f_checkbox[0]'
		)
	) ;
	
	switch (getFieldLC('part2_application_type6'))
	{
		case 'Yes' :
			writeText('part2_name_last',  'form1[0].#subform[1].Line2a_FamilyName[0]') ;
			writeText('part2_name_first',  'form1[0].#subform[1].Line2b_GivenName[0]') ;
			writeText('part2_name_middle',  'form1[0].#subform[1].Line2c_MiddleName[0]') ;
			writeText('part2_dob',  'form1[0].#subform[1].Line2d_DateOfBirth[0]') ;
			writeText('part2_birth_country',  'form1[0].#subform[1].Line2e_CountryOfBirth[0]') ;
			writeText('part2_citizen_country',  'form1[0].#subform[1].Line2f_CountryOfCitizenship[0]') ;
			writeText('part2_daytime_pn_1',  'form1[0].#subform[1].#area[4].Line2g_DaytimePhoneNumber1[0]') ;
			writeText('part2_daytime_pn_2',  'form1[0].#subform[1].#area[4].Line2g_DaytimePhoneNumber2[0]') ;
			writeText('part2_daytime_pn_3',  'form1[0].#subform[1].#area[4].Line2g_DaytimePhoneNumber3[0]') ;
			writeText('part2_address_care_name',  'form1[0].#subform[1].Line2h_InCareofName[0]') ;
			writeText('part2_address_street_number_name',  'form1[0].#subform[1].Line2i_StreetNumberName[0]') ;
	
			checkBox('part2_address_o',
		array(
			'Apt' => 'form1[0].#subform[1].Line2j_Unit[2]' ,
			'Ste' => 'form1[0].#subform[1].Line2j_Unit[0]' ,
			'Flr' => 'form1[0].#subform[1].Line2j_Unit[1]' 
		)
	) ;
	
			writeText('part2_address_apt_ste_flr_number',  'form1[0].#subform[1].Line2j_AptSteFlrNumber[0]') ;
			writeText('part2_address_city',  'form1[0].#subform[1].Line2k_CityOrTown[0]') ;
	
			writeText('part2_address_state',  'form1[0].#subform[1].Line2l_State[0]') ;
	
			writeText('part2_address_zip_code',  'form1[0].#subform[1].Line2m_ZipCode[0]') ;
			writeText('part2_address_postal_code',  'form1[0].#subform[1].Line2n_PostalCode[0]') ;
			writeText('part2_address_province',  'form1[0].#subform[1].Line2o_Province[0]') ;
			writeText('part2_address_country',  'form1[0].#subform[1].Line2p_Country[0]') ;
			break ;
	}
	
	//PART 3
	
	writeText('part3_dop',  'form1[0].#subform[1].Line1_DateIntendedDeparture[0]') ;
	writeText('part3_length_trip',  'form1[0].#subform[1].Line2_ExpectedLengthTrip[0]') ;
	
	checkBox('part3_proceeding',
		array(
			'Yes' => 'form1[0].#subform[1].Line3a_Yes[0]' ,
			'No' => 'form1[0].#subform[1].Line3a_No[0]' 
		)
	) ;
	
	switch (getFieldLC('part3_proceeding'))
	{
		case 'Yes' :
			writeText('part3_proceeding_yes_dhs', 'form1[0].#subform[1].Line3b_NameDHSOffice[0]') ;
			break ;
		
	}
	
	checkBox('part3_RTD',
		array(
			'Yes' => 'form1[0].#subform[1].Line4a_Yes[0]' ,
			'No' => 'form1[0].#subform[1].Line4a_No[0]' 
		)
	) ;
	
	switch (getFieldLC('part3_RTD'))
	{
		case 'Yes' :
			writeText('part3_RTD_yes_doi',  'form1[0].#subform[1].Line4b_DateIssued[0]') ;
			writeText('part3_RTD_yes_disposition',  'form1[0].#subform[1].Line4c_Disposition[0]') ;
			break ;
		
	}
	
	checkBox('part3_document_sent1',
		array(
			'Yes' => 'form1[0].#subform[2].Line5_USAddress[0]'
		)
	) ;
	
	checkBox('part3_document_sent2',
		array(
			'Yes' => 'form1[0].#subform[2].Line6_USEmbassy[0]'
		)
	) ;
	
	checkBox('part3_document_sent3',
		array(
			'Yes' => 'form1[0].#subform[2].Line7_DHSOffice[0]'
		)
	) ;
	
	switch (getFieldLC('part3_document_sent2'))
	{
		case 'Yes' :
			writeText('part3_document_sent_embassy_city',  'form1[0].#subform[2].Line6a_CityOrTown[0]') ;
			writeText('part3_document_sent_embassy_country',  'form1[0].#subform[2].Line6b_Country[0]') ;
			break ;
	}
	
	switch (getFieldLC('part3_document_sent3'))
	{
			
		case 'To a DHS office overseas.' :
			writeText('part3_document_sent_dhs_city',  'form1[0].#subform[2].Line7a_CityOrTown[0]') ;
			writeText('part3_document_sent_dhs_country',  'form1[0].#subform[2].Line7b_Country[0]') ;
			break ;
		
	}
	
	checkBox('part3_document_sent_embassy_dhs_pickup1',
		array(
			'Yes' => 'form1[0].#subform[2].Line8_AddressPart2[0]'
		)
	) ;
	
	checkBox('part3_document_sent_embassy_dhs_pickup2',
		array(
			'Yes' => 'form1[0].#subform[2].Line9_AddressBelow[0]' 
		)
	) ;
	
			switch (getFieldLC('part3_document_sent_embassy_dhs_pickup2'))
	{
		case 'Yes' :
			writeText('part3_pickup_address_care_name',  'form1[0].#subform[2].Line10a_InCareofName[0]') ;
			writeText('part3_pickup_address_street_number_name',  'form1[0].#subform[2].Line10b_StreetNumberName[0]') ;
	
			checkBox('part3_pickup_address_o',
		array(
			'Apt' => 'form1[0].#subform[2].Line10c_Unit[2]' ,
			'Ste' => 'form1[0].#subform[2].Line10c_Unit[0]' ,
			'Flr' => 'form1[0].#subform[2].Line10c_Unit[1]' 
		)
	) ;
	
			writeText('part3_pickup_address_apt_ste_flr_number',  'form1[0].#subform[2].Line10c_AptSteFlrNumber[0]') ;
			writeText('part3_pickup_address_city',  'form1[0].#subform[2].Line10d_CityOrTown[0]') ;
	
			writeText('part3_pickup_address_state',  'form1[0].#subform[2].Line10e_State[0]') ;
	
			writeText('part3_pickup_address_zip_code',  'form1[0].#subform[2].Line10f_ZipCode[0]') ;
			writeText('part3_pickup_address_postal_code',  'form1[0].#subform[2].Line10g_PostalCode[0]') ;
			writeText('part3_pickup_address_province',  'form1[0].#subform[2].Line10h_Province[0]') ;
			writeText('part3_pickup_address_country',  'form1[0].#subform[2].Line10i_Country[0]') ;
			writeText('part3_pickup_address_daytime_pn_1',  'form1[0].#subform[2].#area[5].Line10j_DaytimePhoneNumber1[0]') ;
			writeText('part3_pickup_address_daytime_pn_2',  'form1[0].#subform[2].#area[5].Line10j_DaytimePhoneNumber2[0]') ;
			writeText('part3_pickup_address_daytime_pn_3',  'form1[0].#subform[2].#area[5].Line10j_DaytimePhoneNumber3[0]') ;
			
			break ;
		
	}
	
	//PART 4
	
	writeText('part4_purpose_of_trip',  'form1[0].#subform[2].Line1a_Purpose[0]') ;
	writeText('part4_countries_to_visit',  'form1[0].#subform[2].Line1b_ListCountries[0]') ;
	
	//PART 5
	
	checkBox('part5_time_outside_us1', 
		array(
			'Yes' => 'form1[0].#subform[2].Line1a_Lessthan6[0]'
		)
	) ;
	
	checkBox('part5_time_outside_us2', 
		array(
			'Yes' => 'form1[0].#subform[2].Line1b_6months[0]'
		)
	) ;
	
	checkBox('part5_time_outside_us3', 
		array(
			'Yes' => 'form1[0].#subform[2].Line1c_1to2[0]' 
		)
	) ;
	
	checkBox('part5_time_outside_us4', 
		array(
			'Yes' => 'form1[0].#subform[2].Line1d_2to3[0]' 
			
		)
	) ;
	
	checkBox('part5_time_outside_us5', 
		array(
			'Yes' => 'form1[0].#subform[2].Line1e_3to4[0]'
		)
	) ;
	
	checkBox('part5_time_outside_us6', 
		array(
			'Yes' => 'form1[0].#subform[2].Line1f_morethan[0]' 
		)
	) ;
	
	checkBox('part5_federal_income_tax', 
		array(
			'Yes' => 'form1[0].#subform[2].Line2_Yes[0]' ,
			'No' => 'form1[0].#subform[2].Line2_No[0]'
		)
	) ;
	
	//PART 6
	
	writeText('part6_country_refugee_asylee',  'form1[0].#subform[3].Line1_CountryRefugee[0]') ;
	
	checkBox('part6_country_travel', 
		array(
			'Yes' => 'form1[0].#subform[3].Line2_Yes1[0]' ,
			'No' => 'form1[0].#subform[3].Line2_No1[0]'
		)
	) ;
	
	checkBox('part6_country_return', 
		array(
			'Yes' => 'form1[0].#subform[3].Line3a_Yes1[0]' ,
			'No' => 'form1[0].#subform[3].Line3a_No1[0]'
		)
	) ;
	
	checkBox('part6_country_passport', 
		array(
			'Yes' => 'form1[0].#subform[3].Line3b_Yes[0]' ,
			'No' => 'form1[0].#subform[3].Line3b_No[0]'
		)
	) ;
	
	checkBox('part6_country_benefits', 
		array(
			'Yes' => 'form1[0].#subform[3].Line3c_Yes[0]' ,
			'No' => 'form1[0].#subform[3].Line3c_No[0]'
		)
	) ;
	
	checkBox('part6_country_nationality_reacquire', 
		array(
			'Yes' => 'form1[0].#subform[3].Line4a_Yes[1]' ,
			'No' => 'form1[0].#subform[3].Line4a_No[1]'
		)
	) ;
	
	checkBox('part6_country_nationality_new', 
		array(
			'Yes' => 'form1[0].#subform[3].Line4b_Yes[0]' ,
			'No' => 'form1[0].#subform[3].Line4b_No[0]'
		)
	) ;
	
	checkBox('part6_country_refugee_asylee_status', 
		array(
			'Yes' => 'form1[0].#subform[3].Line4c_Yes[0]' ,
			'No' => 'form1[0].#subform[3].Line4c_Yes[0]'
		)
	) ;
	
	
	//PART7
	
	checkBox('part7_trips', 
		array(
			'One Trip' => 'form1[0].#subform[3].Line1_OneTrip[0]' ,
			'More than one trip' => 'form1[0].#subform[3].Line1_MoreThanOne[0]'
		)
	) ;
	
	writeText('part7_parole_embassy_us_city',  'form1[0].#subform[3].Line2a_CityOrTown[0]') ;
	writeText('part7_parole_embassy_us_country',  'form1[0].#subform[3].Line2b_Country[0]') ;
	
	checkBox('part7_pickup_address1', 
		array(
			'Yes' => 'form1[0].#subform[3].Line3_AddressPart2[0]'
		)
	) ;
	
	checkBox('part7_pickup_address2', 
		array(
			'Yes' => 'form1[0].#subform[3].Line4_AddressBelow[0]'
		)
	) ;
	
	switch (getFieldLC('part7_pickup_address1'))
	{
		case 'Yes' :
			writeText('part7_pickup_address_care_name',  'form1[0].#subform[3].Line4a_InCareofName[0]') ;
			writeText('part7_pickup_address_street_number_name',  'form1[0].#subform[3].Line4b_StreetNumberName[0]') ;
	
			checkBox('part7_pickup_address_o',
		array(
			'Apt' => 'form1[0].#subform[3].Line4c_Unit[2]' ,
			'Ste' => 'form1[0].#subform[3].Line4c_Unit[0]' ,
			'Flr' => 'form1[0].#subform[3].Line4c_Unit[1]' 
		)
	) ;
	
			writeText('part7_pickup_address_apt_ste_flr_number',  'form1[0].#subform[3].Line4c_AptSteFlrNumber[0]') ;
			writeText('part7_pickup_address_city',  'form1[0].#subform[3].Line4d_CityOrTown[0]') ;
	
			writeText('part7_pickup_address_state',  'form1[0].#subform[3].Line4e_State[0]') ;
	
			writeText('part7_pickup_address_zip_code',  'form1[0].#subform[3].Line4f_ZipCode[0]') ;
			writeText('part7_pickup_address_postal_code',  'form1[0].#subform[3].Line4g_PostalCode[0]') ;
			writeText('part7_pickup_address_province',  'form1[0].#subform[3].Line4h_Province[0]') ;
			writeText('part7_pickup_address_country',  'form1[0].#subform[3].Line4i_Country[0]') ;
			writeText('part7_pickup_address_daytime_pn_1',  'form1[0].#subform[3].#area[6].Line4j_DaytimePhoneNumber1[0]') ;
			writeText('part7_pickup_address_daytime_pn_2',  'form1[0].#subform[3].#area[6].Line4j_DaytimePhoneNumber2[0]') ;
			writeText('part7_pickup_address_daytime_pn_3',  'form1[0].#subform[3].#area[6].Line4j_DaytimePhoneNumber3[0]') ;
			break ;
		
	}
	
	//PART 8
	
	writeText('part8_daytime_pn_1',  'form1[0].#subform[4].#area[7].Line2_DaytimePhoneNumber1[0]') ;
	writeText('part8_daytime_pn_2',  'form1[0].#subform[4].#area[7].Line2_DaytimePhoneNumber1[0]') ;
	writeText('part8_daytime_pn_3',  'form1[0].#subform[4].#area[7].Line2_DaytimePhoneNumber3[0]') ;
	
	//PART 9
	
	writeText('part9_prepare_name_last',  'form1[0].#subform[4].Line1a_PreparerFamilyName[0]') ;
	writeText('part9_prepare_name_first',  'form1[0].#subform[4].Line1b_PreparerGivenName[0]') ;
	writeText('part9_prepare_name_business',  'form1[0].#subform[4].Line2_BusinessName[0]') ;
	writeText('part9_paddress_street_number_name',  'form1[0].#subform[4].Line3a_StreetNumberName[0]') ;
	
	checkBox('part9_paddress_o',
		array(
			'Apt' => 'form1[0].#subform[4].Line3b_Unit[2]' ,
			'Ste' => 'form1[0].#subform[4].Line3b_Unit[0]' ,
			'Flr' => 'form1[0].#subform[4].Line3b_Unit[1]' 
		)
	) ;
	
	writeText('part9_paddress_apt_ste_flr_number',  'form1[0].#subform[4].Line3b_AptSteFlrNumber[0]') ;
	writeText('part9_paddress_city',  'form1[0].#subform[4].Line3c_CityOrTown[0]') ;
	
	writeText('part9_paddress_state',  'form1[0].#subform[4].Line3d_State[0]') ;
	
	writeText('part9_paddress_zip_code',  'form1[0].#subform[4].Line3e_ZipCode[0]') ;
	writeText('part9_paddress_postal_code',  'form1[0].#subform[4].Line3f_PostalCode[0]') ;
	writeText('part9_paddress_province',  'form1[0].#subform[4].Line3g_Province[0]') ;
	writeText('part9_paddress_country',  'form1[0].#subform[4].Line3h_Country[0]') ;
	writeText('part9_daytime_pn_1',  'form1[0].#subform[4].#area[8].Line4_DaytimePhoneNumber1[0]') ;
	writeText('part9_daytime_pn_2',  'form1[0].#subform[4].#area[8].Line4_DaytimePhoneNumber2[0]') ;
	writeText('part9_daytime_pn_3',  'form1[0].#subform[4].#area[8].Line4_DaytimePhoneNumber3[0]') ;
	writeText('part9_daytime_extension',  'form1[0].#subform[4].Line4_Extension[0]') ;
	writeText('part9_prepare_email',  'form1[0].#subform[4].Line5_Email[0]') ;
	
	
	if (!$efs)
	{
		echo 'Error: No I-131 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}

?>