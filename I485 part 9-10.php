<?php

//PART9 - START
	
	checkBox('petitioner_accomodation_request',
		array(
			'No' => 'form1[0].#subform[13].Pt9Line1_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt9Line1_YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_deaf',
		array(
			'Yes' => 'form1[0].#subform[13].Pt9Line2a_Deaf[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_deaf'))
	{
			
		case 'Yes' :
			writeText('petitioner_sign_language',  'form1[0].#subform[13].Pt9Line2a_Accommodation[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_blind',
		array(
			'Yes' => 'form1[0].#subform[13].Pt9Line2b_Blind[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_blind'))
	{
			
		case 'Yes' :
			writeText('petitioner_blind_accomodation',  'form1[0].#subform[13].Pt9Line2b_Accommodation[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_other_disability',
		array(
			'Yes' => 'form1[0].#subform[13].Pt9Line2c_Other[0]'
		)
	) ;
	
	
	switch (getFieldLC('petitioner_other_disability'))
	{
			
		case 'Yes' :
			writeText('petitioner_other_disability_describe',  'form1[0].#subform[13].Pt9Line2c_Accommodation[0]') ;
			break ;
		
	}
	
	//PART9 - END
	
	//PART10 - START
	
	checkBox('applicant_statement_1',
		array(
			'Yes' => 'form1[0].#subform[14].Pt10Line1_English[1]'
		)
	) ;
	
	checkBox('applicant_statement_2',
		array(
			'Yes' => 'form1[0].#subform[14].Pt10Line1_English[0]'
		)
	) ;
	
	
	switch (getFieldLC('applicant_statement_2'))
	{
			
		case 'Yes' :
			writeText('applicant_language',  'form1[0].#subform[14].Pt10Line1b_Language[0]') ;
			break ;
		
	}
	
	checkBox('applicant_statement_3',
		array(
			'Yes' => 'form1[0].#subform[14].Pt10Line2_PreparerCB[0]'
		)
	) ;
	
	
	switch (getFieldLC('applicant_statement_3'))
	{
			
		case 'Yes' :
			writeText('applicant_preparer_name',  'form1[0].#subform[14].Pt10Line2_Preparer[0]') ;
			break ;
		
	}
	
	writeText('applicant_contact_phone',  'form1[0].#subform[14].Pt10Line3_DaytimePhone[0]') ;
	writeText('applicant_contact_mobile',  'form1[0].#subform[14].Pt10Line4_MobilePhone[0]') ;
	writeText('applicant_contact_email',  'form1[0].#subform[14].Pt10Line5_Email[0]') ;

	//PART10 - END

?>