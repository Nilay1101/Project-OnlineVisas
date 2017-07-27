<?php 

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

?>