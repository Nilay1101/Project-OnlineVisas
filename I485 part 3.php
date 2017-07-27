<?php 

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

?>