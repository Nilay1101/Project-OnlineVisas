<?php

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
	
	/* checkBox('petitioner_race',
		array(
			'White' => 'form1[0].#subform[7].Pt7Line2_Race[0]' ,
			'Asian' => 'form1[0].#subform[7].Pt7Line2_Race[1]' ,
			'Black or African American' => 'form1[0].#subform[7].Pt7Line2_Race[2]' ,
			'American Indian or Alaska Native' => 'form1[0].#subform[7].Pt7Line2_Race[3]' ,
			'Native Hawaiian or Other Pacific Islander' => 'form1[0].#subform[7].Pt7Line2_Race[4]'
		)
	) ;
	
	writeText('petitioner_height_feet',  'form1[0].#subform[8].Pt7Line3_HeightFeet[0]') ;
	writeText('petitioner_height_inches',  'form1[0].#subform[8].Pt7Line3_HeightInches[0]') ; */
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

?>