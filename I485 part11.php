<?php

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

?>