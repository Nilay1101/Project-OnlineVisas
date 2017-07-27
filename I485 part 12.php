<?php

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

?>