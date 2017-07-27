<?php

//PART2 - START
	
	checkBox('petitioner_family_based',
		array(
			'Immediate relative of a U.S. citizen, Form I-130' => 'form1[0].#subform[2].Pt2Line1_CB[0]' ,
			'Other relative of a U.S. citizen or relative of a lawful permanent resident under the family-based preference categories, Form I-130' => 'form1[0].#subform[2].Pt2Line1_CB[1]' ,
			'Person admitted to the United States as a fiancé(e) or child of a fiancé(e) of a U.S. citizen, Form I-129F (K-1/K-2 Nonimmigrant)' => 'form1[0].#subform[2].Pt2Line1_CB[2]' ,
			'Widow or widower of a U.S. citizen, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[3]' ,
			'VAWA self-petitioner, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[4]'
			
		)
	) ;
	
	checkBox('petitioner_employment_based',
		array(
			'Alien entrepreneur, Form I-526' => 'form1[0].#subform[2].Pt2Line1_CB[5]' , 
			'Alien worker, Form I-140' => 'form1[0].#subform[2].Pt2Line1_CB[6]'
			
		)
	) ;
	
	checkBox('petitioner_special_immigrant',
		array(
			'Religious worker, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[7]' ,
			'Certain Afghan or Iraqi national, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[8]' ,
			'Special immigrant juvenile, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[9]' ,
			'Certain G-4 international organization or family member or NATO-6 employee or family member, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[10]' ,
			'Certain international broadcaster, Form I-360' => 'form1[0].#subform[2].Pt2Line1_CB[11]'
			
		)
	) ;
	
	checkBox('petitioner_asylee',
		array(
			'Refugee status (INA section 207), Form I-590 or Form I-730' => 'form1[0].#subform[2].Pt2Line1_CB[12]' ,
			'Asylum status (INA section 208), Form I-589 or Form I-730' => 'form1[0].#subform[2].Pt2Line1_CB[13]'
			
		)
	) ;
	
	checkBox('petitioner_victim_trafficking_crime',
		array(
			'Human trafficking victim (T Nonimmigrant), Form I-914 or derivative family member, Form I-914A' => 'form1[0].#subform[2].Pt2Line1_CB[14]' ,
			'Crime victim (U Nonimmigrant), Form I-918, derivative family member, Form I-918A, or qualifying family member, Form I-929' => 'form1[0].#subform[2].Pt2Line1_CB[15]'
			
		)
	) ;
	
	checkBox('petitioner_public_laws_programs',
		array(
			'Dependent status under the Haitian Refugee Immigrant Fairness Act' => 'form1[0].#subform[2].Pt2Line1_CB[16]' , /*     */
			'Lautenberg Parolees' => 'form1[0].#subform[2].Pt2Line1_CB[17]' ,
			'Diplomats or high ranking officials unable to return home (Section 13 of the Act of September 11, 1957)' => 'form1[0].#subform[2].Pt2Line1_CB[18]' ,
			'Dependent status under the Haitian Refugee Immigrant Fairness Act for battered spouses and children' => 'form1[0].#subform[2].Pt2Line1_CB[19]' ,
			'Indochinese Parole Adjustment Act of 2000' => 'form1[0].#subform[2].Pt2Line1_CB[20]' ,
			'The Cuban Adjustment Act' => 'form1[0].#subform[2].Pt2Line1_CB[21]' ,
			'The Cuban Adjustment Act for battered spouses and children' => 'form1[0].#subform[2].Pt2Line1_CB[22]'
			
		)
	) ;
	
	checkBox('petitioner_additional_options',
		array(
			'Continuous residence in the United States since before January 1, 1972 ("Registry")' => 'form1[0].#subform[2].Pt2Line1_CB[23]' ,
			'Individual born in the United States under diplomatic status' => 'form1[0].#subform[2].Pt2Line1_CB[24]' ,
			'Diversity Visa program' => 'form1[0].#subform[2].Pt2Line1_CB[25]' ,
			'Other eligibility' => 'form1[0].#subform[2].Pt2Line1_CB[26]'
			
		)
	) ;
	
	switch (getFieldLC('petitioner_additional_options'))
	{
			
		case 'Other eligibility' :
			writeText('petitioner_additional_options_text',  'form1[0].#subform[2].Pt2Line1g_OtherEligibility[0]') ;
			break ;
		
	}
	
	checkBox('petitioner_ina_apply',
		array(
			'Yes' => 'form1[0].#subform[2].Pt2Line2_CB[0]' ,
			'No' => 'form1[0].#subform[2].Pt2Line2_CB[1]' 
			
		)
	) ;
	
	writeText('principal_receipt_petition_1',  'form1[0].#subform[3].Pt2Line3_Receipt[0]') ;
	writeText('principal_priority_date_petition_1',  'form1[0].#subform[3].Pt2Line4_Date[0]') ;
	
	writeText('principal_priority_date_petition_1',  'form1[0].#subform[3].Pt2Line5a_FamilyName[0]') ;
	writeText('principal_name_given',  'form1[0].#subform[3].Pt2Line5b_GivenName[0]') ;
	writeText('principal_name_middle',  'form1[0].#subform[3].Pt2Line5c_MiddleName[0]') ;
	writeText('principal_alien_number',  'form1[0].#subform[3].Pt1Line8_AlienNumber[0]') ;
	writeText('principal_dob',  'form1[0].#subform[3].Pt2Line7_Date[0]') ;
	writeText('principal_receipt_petition_2',  'form1[0].#subform[3].Pt2Line8_ReceiptNumber[0]') ;
	writeText('principal_priority_date_petition_2',  'form1[0].#subform[3].Pt2Line9_Date[0]') ;
	
	//PART2 - END

?>