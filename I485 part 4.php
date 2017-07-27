<?php 

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

?>