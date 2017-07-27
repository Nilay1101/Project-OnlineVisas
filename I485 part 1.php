<?php

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

?>