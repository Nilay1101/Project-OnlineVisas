<?php

	$inputFile = 'document-templates/g-325a.pdf' ;
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
	writeText('applicant_name_family',  'form1[0].#subform[0].FamilyName[0]') ;
	writeText('applicant_name_first',  'form1[0].#subform[0].FirstName[0]') ;
	writeText('applicant_name_middle',  'form1[0].#subform[0].MiddleName[0]') ;
	writeText('applicant_dob',  'form1[0].#subform[0].DateofBirth[0]') ;
	writeText('applicant_citizenship_nationality',  'form1[0].#subform[0].Citizenship_or_Nationality[0]') ;
	writeText('applicant_all_other_names',  'form1[0].#subform[0].OtherNamesUsed[0]') ;
	writeText('applicant_birth_city_country',  'form1[0].#subform[0].City_and_CountryofBirth[0]') ;
	writeText('applicant_father_name_family',  'form1[0].#subform[0].Father_FamilyName[0]') ;
	writeText('applicant_father_name_first',  'form1[0].#subform[0].Father_FirstName[0]') ;
	writeText('applicant_father_residence_city_country',  'form1[0].#subform[0].FatherCityandCountryofResidence[0]') ;
	
	writeText('applicant_father_dob',  'form1[0].#subform[0].Father_DateofBirth[0]') ;
	writeText('applicant_father_birth_city_country',  'form1[0].#subform[0].FatherCityandCountryofBirth[0]') ;
	writeText('applicant_mother_name_maiden',  'form1[0].#subform[0].MotherMaidenName[0]') ;
	writeText('applicant_mother_name_first',  'form1[0].#subform[0].Mother_FirstName[0]') ;
	writeText('applicant_mother_dob',  'form1[0].#subform[0].Mother_DateofBirth[0]') ;
	writeText('applicant_mother_birth_city_country',  'form1[0].#subform[0].MotherCityandCountryofBirth[0]') ;
	writeText('applicant_mother_residence_city_country',  'form1[0].#subform[0].MotherCityandCountryofResidence[0]') ;
	writeText('applicant_husband_wife_name_family',  'form1[0].#subform[0].Spouse_FamilyName[0]') ;
	writeText('applicant_husband_wife_name_first',  'form1[0].#subform[0].Spouse_FirstName[0]') ;
	writeText('applicant_husband_wife_dob',  'form1[0].#subform[0].Spouse_DateofBirth[0]') ;
	
	writeText('applicant_husband_wife_birth_city_country',  'form1[0].#subform[0].Souse_CityandCountry_of_Birth[0]') ;
	writeText('applicant_husband_wife_dom',  'form1[0].#subform[0].DateofMarriage[0]') ;
	writeText('applicant_husband_wife_pom',  'form1[0].#subform[0].Place_of_Marriage[0]') ;
	writeText('applicant_last_address_street_1',  'form1[0].#subform[0].Table1[0].Row1[0].StreetandNumber[0]') ;
	writeText('applicant_last_address_city_1',  'form1[0].#subform[0].Table1[0].Row1[0].City[0]') ;
	writeText('applicant_last_address_state_1',  'form1[0].#subform[0].Table1[0].Row1[0].ProvinceorState[0]') ;
	writeText('applicant_last_address_country_1',  'form1[0].#subform[0].Table1[0].Row1[0].Country[0]') ;
	writeText('applicant_last_address_from_month_1',  'form1[0].#subform[0].Table1[0].Row1[0].Month[0]') ;
	writeText('applicant_last_address_from_year_1',  'form1[0].#subform[0].Table1[0].Row1[0].Year[0]') ;
	writeText('applicant_last_address_street_2',  'form1[0].#subform[0].Table1[0].Row2[0].StreetandNumber_2[0]') ;
	
	writeText('applicant_last_address_city_2',  'form1[0].#subform[0].Table1[0].Row2[0].City_2[0]') ;
	writeText('applicant_last_address_state_2',  'form1[0].#subform[0].Table1[0].Row2[0].ProvinceorState_2[0]') ;
	writeText('applicant_last_address_country_2',  'form1[0].#subform[0].Table1[0].Row2[0].Country_2[0]') ;
	writeText('applicant_last_address_from_month_2',  'form1[0].#subform[0].Table1[0].Row2[0].Month_2[0]') ;
	writeText('applicant_last_address_from_year_2',  'form1[0].#subform[0].Table1[0].Row2[0].Year_2[0]') ;
	writeText('applicant_last_address_to_month_1',  'form1[0].#subform[0].Table1[0].Row2[0].Month_2[1]') ;
	writeText('applicant_last_address_to_year_1',  'form1[0].#subform[0].Table1[0].Row2[0].Year_2[1]') ;
	writeText('applicant_last_address_street_3',  'form1[0].#subform[0].Table1[0].Row3[0].StreetandNumber_3[0]') ;
	writeText('applicant_last_address_city_3',  'form1[0].#subform[0].Table1[0].Row3[0].City_3[0]') ;
	writeText('applicant_last_address_state_3',  'form1[0].#subform[0].Table1[0].Row3[0].ProvinceorState_3[0]') ;
	
	writeText('applicant_last_address_country_3',  'form1[0].#subform[0].Table1[0].Row3[0].Country_3[0]') ;
	writeText('applicant_last_address_from_month_3',  'form1[0].#subform[0].Table1[0].Row3[0].Month_3[0]') ;
	writeText('applicant_last_address_from_year_3',  'form1[0].#subform[0].Table1[0].Row3[0].Year_3[0]') ;
	writeText('applicant_last_address_to_month_2',  'form1[0].#subform[0].Table1[0].Row3[0].Month_3[1]') ;
	writeText('applicant_last_address_to_year_2',  'form1[0].#subform[0].Table1[0].Row3[0].Year_3[1]') ;
	writeText('applicant_last_address_street_4',  'form1[0].#subform[0].Table1[0].Row4[0].StreetandNumber_4[0]') ;
	writeText('applicant_last_address_city_4',  'form1[0].#subform[0].Table1[0].Row4[0].City_4[0]') ;
	writeText('applicant_last_address_state_4',  'form1[0].#subform[0].Table1[0].Row4[0].ProvinceorState_4[0]') ;
	writeText('applicant_last_address_country_4',  'form1[0].#subform[0].Table1[0].Row4[0].Country_4[0]') ;
	writeText('applicant_last_address_from_month_4',  'form1[0].#subform[0].Table1[0].Row4[0].Month_4[0]') ;
	
	writeText('applicant_last_address_from_year_4',  'form1[0].#subform[0].Table1[0].Row4[0].Year_4[0]') ;
	writeText('applicant_last_address_to_month_3',  'form1[0].#subform[0].Table1[0].Row4[0].Month_4[1]') ;
	writeText('applicant_last_address_to_year_3',  'form1[0].#subform[0].Table1[0].Row4[0].Year_4[1]') ;
	writeText('applicant_last_address_street_5',  'form1[0].#subform[0].Table1[0].Row5[0].StreetandNumber_5[0]') ;
	writeText('applicant_last_address_city_5',  'form1[0].#subform[0].Table1[0].Row5[0].City_5[0]') ;
	writeText('applicant_last_address_state_5',  'form1[0].#subform[0].Table1[0].Row5[0].ProvinceorState_5[0]') ;
	writeText('applicant_last_address_country_5',  'form1[0].#subform[0].Table1[0].Row5[0].Country_5[0]') ;
	writeText('applicant_last_address_from_month_5',  'form1[0].#subform[0].Table1[0].Row5[0].Month_5[0]') ;
	writeText('applicant_last_address_from_year_5',  'form1[0].#subform[0].Table1[0].Row5[0].Year_5[0]') ;
	writeText('applicant_last_address_to_month_4',  'form1[0].#subform[0].Table1[0].Row5[0].Month_5[1]') ;
	
	writeText('applicant_last_address_to_year_4',  'form1[0].#subform[0].Table1[0].Row5[0].Year_5[1]') ;
	writeText('applicant_1year_last_address_street',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_StreetandNumber[0]') ;
	writeText('applicant_1year_last_address_city',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_City[0]') ;
	writeText('applicant_1year_last_address_state',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_ProvinceorState[0]') ;
	writeText('applicant_1year_last_address_country',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_Country[0]') ;
	writeText('applicant_1year_last_address_from_month',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_From_Month[0]') ;
	writeText('applicant_1year_last_address_from_year',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_From_Year[0]') ;
	writeText('applicant_1year_last_address_to_month',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_To_Month[0]') ;
	writeText('applicant_1year_last_address_to_year',  'form1[0].#subform[0].Table2[0].Row1[0].Table2_To_Year[0]') ;
	writeText('applicant_last_employer_name_address_1',  'form1[0].#subform[0].Table3[0].Row1[0].FullName_and_AddressofEmployer[0]') ;
	
	writeText('applicant_last_employer_occupation_1',  'form1[0].#subform[0].Table3[0].Row1[0].Occupation[0]') ;
	writeText('applicant_last_employer_from_month_1',  'form1[0].#subform[0].Table3[0].Row1[0].Table3_From_Month[0]') ;
	writeText('applicant_last_employer_from_year_1',  'form1[0].#subform[0].Table3[0].Row1[0].Table3_From_Year[0]') ;
	writeText('applicant_last_employer_name_address_2',  'form1[0].#subform[0].Table3[0].Row2[0].Line2_FullName_and_AddressofEmployer[0]') ;
	writeText('applicant_last_employer_occupation_2',  'form1[0].#subform[0].Table3[0].Row2[0].Line2_Occupation[0]') ;
	writeText('applicant_last_employer_from_month_2',  'form1[0].#subform[0].Table3[0].Row2[0].Table3_Line2_From_Month[0]') ;
	writeText('applicant_last_employer_from_year_2',  'form1[0].#subform[0].Table3[0].Row2[0].Table3_Line2_From_Year[0]') ;
	writeText('applicant_last_employer_to_month_1',  'form1[0].#subform[0].Table3[0].Row2[0].Table2_Line2_To_Month[0]') ;
	writeText('applicant_last_employer_to_year_1',  'form1[0].#subform[0].Table3[0].Row2[0].Table3_Line2_To_Year[0]') ;
	writeText('applicant_last_employer_name_address_3',  'form1[0].#subform[0].Table3[0].Row3[0].Line3_FullName_and_AddressofEmployer[0]') ;
	
	writeText('applicant_last_employer_occupation_3',  'form1[0].#subform[0].Table3[0].Row3[0].Line3_Occupation[0]') ;
	writeText('applicant_last_employer_from_month_3',  'form1[0].#subform[0].Table3[0].Row3[0].Table3_Line3_From_Month[0]') ;
	writeText('applicant_last_employer_from_year_3',  'form1[0].#subform[0].Table3[0].Row3[0].Table3_Line3_From_Year[0]') ;
	writeText('applicant_last_employer_to_month_2',  'form1[0].#subform[0].Table3[0].Row3[0].Table2_Line3_To_Month[0]') ;
	writeText('applicant_last_employer_to_year_2',  'form1[0].#subform[0].Table3[0].Row3[0].Table3_Line3_To_Year[0]') ;
	writeText('applicant_last_employer_name_address_4',  'form1[0].#subform[0].Table3[0].Row4[0].Line4_FullName_and_AddressofEmployer[0]') ;
	writeText('applicant_last_employer_occupation_4',  'form1[0].#subform[0].Table3[0].Row4[0].Line4_Occupation[0]') ;
	writeText('applicant_last_employer_from_month_4',  'form1[0].#subform[0].Table3[0].Row4[0].Table3_Line4_From_Month[0]') ;
	writeText('applicant_last_employer_from_year_4',  'form1[0].#subform[0].Table3[0].Row4[0].Table3_Line4_From_Year[0]') ;
	writeText('applicant_last_employer_to_month_3',  'form1[0].#subform[0].Table3[0].Row4[0].Table2_Line4_To_Month[0]') ;
	
	writeText('applicant_last_employer_to_year_3',  'form1[0].#subform[0].Table3[0].Row4[0].Table3_Line4_To_Year[0]') ;
	writeText('applicant_last_employer_name_address_5',  'form1[0].#subform[0].Table3[0].Row4[1].Line5_FullName_and_AddressofEmployer[0]') ;
	writeText('applicant_last_employer_occupation_5',  'form1[0].#subform[0].Table3[0].Row4[1].Line5_Occupation[0]') ;
	writeText('applicant_last_employer_from_month_5',  'form1[0].#subform[0].Table3[0].Row4[1].Table3_Line5_From_Month[0]') ;
	writeText('applicant_last_employer_from_year_5',  'form1[0].#subform[0].Table3[0].Row4[1].Table3_Line5_From_Year[0]') ;
	writeText('applicant_last_employer_to_month_4',  'form1[0].#subform[0].Table3[0].Row4[1].Table2_Line5_To_Month[0]') ;
	writeText('applicant_last_employer_to_year_4',  'form1[0].#subform[0].Table3[0].Row4[1].Table3_Line5_To_Year[0]') ;
	writeText('applicant_application_connection_other_specify',  'form1[0].#subform[0].Specify[0]') ;
	writeText('applicant_name_native_alphabet',  'form1[0].#subform[0].Field91[0]') ;
	writeText('applicant_alien_name_given',  'form1[0].#subform[0].ApplicantGivenName[0]') ;
	
	writeText('applicant_alien_name_family',  'form1[0].#subform[0].ApplicantFamilyName[0]') ;
	writeText('applicant_alien_name_middle',  'form1[0].#subform[0].ApplicantMiddleName[0]') ;
	writeText('applicant_last_employer_if_name_address',  'form1[0].#subform[0].FullName_and_AddressofEmployer[0]') ;
	writeText('applicant_last_employer_if_to_year',  'form1[0].#subform[0].ToYear[0]') ;
	writeText('applicant_last_employer_if_to_month',  'form1[0].#subform[0].ToMonth[0]') ;
	writeText('applicant_last_employer_if_from_year',  'form1[0].#subform[0].Year[0]') ;
	writeText('applicant_last_employer_if_from_month',  'form1[0].#subform[0].FromMonth[0]') ;
	writeText('applicant_last_employer_if_occupation',  'form1[0].#subform[0].Occupation[0]') ;
	
	////////////////////////////
	
	checkBox('applicant_application_connection', 
		array(
			'Naturalization' => 'form1[0].#subform[0].FormStatus[0]',
			'Status as Permanent Resident' => 'form1[0].#subform[0].FormStatus[1]',
			'Other (Specify):' => 'form1[0].#subform[0].FormStatus[2]'
		)
	) ;
	
	////////////////////////////
	
	writeText('applicant_former_husband_wife_name_first_1',  'form1[0].#subform[0].Former_Spouse_FirstName[0]') ;
	writeText('applicant_former_husband_wife_name_first_2',  'form1[0].#subform[0].Former_Spouse_FirstName2[0]') ;
	writeText('applicant_former_husband_wife_dob_1',  'form1[0].#subform[0].Former_Spouse_DateofBirth[0]') ;
	writeText('applicant_former_husband_wife_dob_2',  'form1[0].#subform[0].Former_Spouse_DateofBirth2[0]') ;
	writeText('applicant_former_husband_wife_dom_pom_1',  'form1[0].#subform[0].FormerSpouse_DateandPlace_of_Marriage[0]') ;
	writeText('applicant_former_husband_wife_dom_pom_2',  'form1[0].#subform[0].FormerSpouse_DateandPlace_of_Marriage2[0]') ;
	writeText('applicant_former_husband_wife_dotm_potm_1',  'form1[0].#subform[0].FormerSpouse_DateandTermin_of_Marriage[0]') ;
	writeText('applicant_former_husband_wife_dotm_potm_2',  'form1[0].#subform[0].FormerSpouse_DateandTermin_of_Marriage2[0]') ;
	writeText('applicant_former_husband_wife_name_family_1',  'form1[0].#subform[0].Former_Spouse_FamilyName[0]') ;
	writeText('applicant_former_husband_wife_name_family_2',  'form1[0].#subform[0].Former_Spouse_FamilyName2[0]') ;
	
	////////////////////////////
	
	checkBox('applicant_gender', 
		array(
			'F' => 'form1[0].#subform[0].Gender[0]',
			'M' => 'form1[0].#subform[0].Gender[1]'
		)
	) ;
	
	////////////////////////////
	
	writeText('applicant_file_number',  'form1[0].#subform[0].ANumber[0]') ;
	writeText('applicant_us_social_security_number',  'form1[0].#subform[0].SSN1[0]') ;
	writeText('applicant_alien_registration_number',  'form1[0].#subform[0].ANumber[1]') ;
	
	
	if (!$efs)
	{
		echo 'Error: No G-325A data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}

?>