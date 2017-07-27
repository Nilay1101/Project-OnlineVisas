<?php
	
	/*
	
	writeText('alien_number_pg_2',  'form1[0].#subform[0].Pt1Line10_AlienNumber[1]') ;
	writeText('alien_number_pg_3',  'form1[0].#subform[0].Pt1Line10_AlienNumber[3]') ;
	writeText('alien_number_pg_4',  'form1[0].#subform[0].Pt1Line10_AlienNumber[4]') ;
	writeText('alien_number_pg_5',  'form1[0].#subform[0].Pt1Line10_AlienNumber[5]') ;
	writeText('alien_number_pg_6',  'form1[0].#subform[0].Pt1Line10_AlienNumber[6]') ;
	writeText('alien_number_pg_7',  'form1[0].#subform[0].Pt1Line10_AlienNumber[7]') ;
	writeText('alien_number_pg_8',  'form1[0].#subform[0].Pt1Line10_AlienNumber[8]') ;
	writeText('alien_number_pg_9',  'form1[0].#subform[0].Pt1Line10_AlienNumber[9]') ;
	writeText('alien_number_pg_10',  'form1[0].#subform[0].Pt1Line10_AlienNumber[10]') ;
	writeText('alien_number_pg_11',  'form1[0].#subform[0].Pt1Line10_AlienNumber[11]') ;
	writeText('alien_number_pg_12',  'form1[0].#subform[0].Pt1Line10_AlienNumber[12]') ;
	writeText('alien_number_pg_13',  'form1[0].#subform[0].Pt1Line10_AlienNumber[13]') ;
	writeText('alien_number_pg_14',  'form1[0].#subform[0].Pt1Line10_AlienNumber[14]') ;
	writeText('alien_number_pg_15',  'form1[0].#subform[0].Pt1Line10_AlienNumber[15]') ;
	writeText('alien_number_pg_16',  'form1[0].#subform[0].Pt1Line10_AlienNumber[16]') ;
	writeText('alien_number_pg_17',  'form1[0].#subform[0].Pt1Line10_AlienNumber[17]') ;
	writeText('alien_number_pg_18',  'form1[0].#subform[0].Pt1Line10_AlienNumber[19]') ; 
	
	*/
	
	//PART8 - START
	
	checkBox('petitioner_involvement_in_us',
		array(
			'No' => 'form1[0].#subform[8].Pt8Line1_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[8].Pt8Line1_YesNo[1]'
		)
	) ;
	
	writeText('petitioner_org_1_name',  'form1[0].#subform[8].Pt8Line2_OrgName[0]') ;
	writeText('petitioner_org_1_city',  'form1[0].#subform[8].Pt8Line3a_CityTown[0]') ;
	writeText('petitioner_org_1_state',  'form1[0].#subform[8].Pt8Line3b_State[0]') ;
	writeText('petitioner_org_1_country',  'form1[0].#subform[8].Pt8Line3c_Country[0]') ;
	writeText('petitioner_org_1_nature_group',  'form1[0].#subform[8].Pt8Line4_Group[0]') ;
	writeText('petitioner_org_1_date_from',  'form1[0].#subform[8].Pt8Line5a_DateFrom[0]') ;
	writeText('petitioner_org_1_date_to',  'form1[0].#subform[8].Pt8Line5b_DateTo[0]') ;
	writeText('petitioner_org_2_name',  'form1[0].#subform[8].Pt8Line6_OrgName[0]') ;
	writeText('petitioner_org_2_city',  'form1[0].#subform[8].Pt8Line7c_Country[0]') ;
	writeText('petitioner_org_2_state',  'form1[0].#subform[8].Pt8Line7b_State[0]') ;
	writeText('petitioner_org_2_country',  'form1[0].#subform[8].Pt8Line8a_CityTown[0]') ;
	writeText('petitioner_org_2_nature_group',  'form1[0].#subform[8].Pt8Line8_Group[0]') ;
	writeText('petitioner_org_2_date_from',  'form1[0].#subform[8].Pt8Line9a_DateFrom[0]') ;
	writeText('petitioner_org_2_date_to',  'form1[0].#subform[8].Pt8Line9b_DateTo[0]') ;
	writeText('petitioner_org_3_name',  'form1[0].#subform[8].Pt8Line10_OrgName[0]') ;
	writeText('petitioner_org_3_city',  'form1[0].#subform[8].Pt8Line11a_CityTown[0]') ;
	writeText('petitioner_org_3_state',  'form1[0].#subform[8].Pt8Line11b_State[0]') ;
	writeText('petitioner_org_3_country',  'form1[0].#subform[8].Pt8Line11c_Country[0]') ;
	writeText('petitioner_org_3_nature_group',  'form1[0].#subform[8].Pt8Line12_Group[0]') ;
	writeText('petitioner_org_3_date_from',  'form1[0].#subform[8].Pt8Line13a_DateFrom[0]') ;
	writeText('petitioner_org_3_date_to',  'form1[0].#subform[8].Pt8Line13b_DateTo[0]') ;
	
	//14
	
	checkBox('petitioner_admission_denial',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line14_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line14_YesNo[1]'
		)
	) ;
	
	//15
	
	checkBox('petitioner_visa_denial',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line15_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line15_YesNo[1]'
		)
	) ;
	
	//16
	
	checkBox('petitioner_work_without_authorization',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line16_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line16_YesNo[1]'
		)
	) ;
	
	//17
	
	checkBox('petitioner_nonimmigration_violation',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line17_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line17_YesNo[1]'
		)
	) ;
	
	//18
	
	checkBox('petitioner_deportation_preceedings',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line18_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line18_YesNo[1]'
		)
	) ;
	
	//19
	
	checkBox('petitioner_deportation_final_order',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line19_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line19_YesNo[1]'
		)
	) ;
	
	//20
	
	checkBox('petitioner_deportation_prior_final_order',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line20_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line20_YesNo[1]'
		)
	) ;
	
	//21
	
	checkBox('petitioner_permanent_status_recinded',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line21_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line21_YesNo[1]'
		)
	) ;
	
	//22
	
	checkBox('petitioner_voluntary_departure_failed',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line22_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line22_YesNo[1]'
		)
	) ;
	
	//23
	
	checkBox('petitioner_deportation_relief',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line23_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line23_YesNo[1]'
		)
	) ;
	
	//24.a
	
	checkBox('petitioner_j_nonimmigrant_residence_requirement',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line24a_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line24a_YesNo[1]'
		)
	) ;
	
	//24.b
	
	checkBox('petitioner_residence_requirement_compiled',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line24b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line24b_YesNo[1]'
		)
	) ;
	
	//24.c
	
	checkBox('petitioner_j_nonimmigrant_waiver',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line24c_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line24c_YesNo[1]'
		)
	) ;
	
	//25
	
	checkBox('petitioner_arrest_for_crime',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line25_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line25_YesNo[1]'
		)
	) ;
	
	//26
	
	checkBox('petitioner_not_arrest_for_crime',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line26_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line26_YesNo[1]'
		)
	) ;
	
	//27
	
	checkBox('petitioner_pled_guilty_for_crime',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line27_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line27_YesNo[1]'
		)
	) ;
	
	//28
	
	checkBox('petitioner_liberty_restrained',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line28_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line28_YesNo[1]'
		)
	) ;
	
	//29
	
	checkBox('petitioner_defendant_in_criminal_proceeding',
		array(
			'Yes' => 'form1[0].#subform[9].Pt8Line29_YesNo[0]' ,
			'No' => 'form1[0].#subform[9].Pt8Line29_YesNo[1]'
		)
	) ;
	
	//30
	
	checkBox('petitioner_violated_control_substance_law',
		array(
			'No' => 'form1[0].#subform[9].Pt8Line30_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[9].Pt8Line30_YesNo[1]'
		)
	) ;
	
	//31
	
	checkBox('petitioner_more_offence_statements',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line31_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line31_YesNo[1]'
		)
	) ;
	
	//32
	
	checkBox('petitioner_traffick_controlled_substance',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line32_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line32_YesNo[1]'
		)
	) ;
	
	//33
	
	checkBox('petitioner_aided_traffick',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line33_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line33_YesNo[1]'
		)
	) ;
	
	//34
	
	checkBox('petitioner_spouse_son_daughter_traffick_1',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line34_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line34_YesNo[1]'
		)
	) ;
	
	//35
	
	checkBox('petitioner_in_prostitution',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line35_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line35_YesNo[1]'
		)
	) ;
	
	//36
	
	checkBox('petitioner_imported_prostitutues',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line36_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line36_YesNo[1]'
		)
	) ;
	
	//37
	
	checkBox('petitioner_proceeds_money_prostitution',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line37_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line37_YesNo[1]'
		)
	) ;
	
	//38
	
	checkBox('petitioner_engage_in_vice',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line38_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line38_YesNo[1]'
		)
	) ;
	
	//39
	
	checkBox('petitioner_ecercised_immunity',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line39_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line39_YesNo[1]'
		)
	) ;
	
	//40
	
	checkBox('petitioner_violate_religious_freedom',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line40_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line40_YesNo[1]'
		)
	) ;
	
	//41
	
	checkBox('petitioner_forced_traffick_sex_acts',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line41_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line41_YesNo[1]'
		)
	) ;
	
	//42
	
	checkBox('petitioner_trafficked_person',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line42_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line42_YesNo[1]'
		)
	) ;
	
	//43
	
	checkBox('petitioner_aided_traffick_sex_acts',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line43_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line43_YesNo[1]'
		)
	) ;
	
	//44
	
	checkBox('petitioner_spouse_son_daughter_traffick_2',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line44_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line44_YesNo[1]'
		)
	) ;
	
	//45
	
	checkBox('petitioner_money_laundering',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line45_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line45_YesNo[1]'
		)
	) ;
	
	//46.a
	
	checkBox('petitioner_espionage_law_violation',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line46a_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line46a_YesNo[1]'
		)
	) ;
	
	//46.b
	
	checkBox('petitioner_export_law_violation',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line46b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line46b_YesNo[1]'
		)
	) ;
	
	//46.c
	
	checkBox('petitioner_overthrow_government_activity',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line46c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line46c_YesNo[1]'
		)
	) ;
	
	//46.d
	
	checkBox('petitioner_security_endanger_activity',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line46d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line46d_YesNo[1]'
		)
	) ;
	
	//46.e
	
	checkBox('petitioner_unlawful_activity',
		array(
			'Yes' => 'form1[0].#subform[10].Pt8Line46e_YesNo[0]' ,
			'No' => 'form1[0].#subform[10].Pt8Line46e_YesNo[1]'
		)
	) ;
	
	//47
	
	checkBox('petitioner_adverse_foreign_policy',
		array(
			'No' => 'form1[0].#subform[10].Pt8Line47_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[10].Pt8Line47_YesNo[1]'
		)
	) ;
	
	//48.a
	
	checkBox('petitioner_harm_individual',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line48a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line48a_YesNo[1]'
		)
	) ;
	
	//48.b
	
	checkBox('petitioner_harm_individual_group',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line48b_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line48b_YesNo[1]'
		)
	) ;
	
	//48.c
	
	checkBox('petitioner_harm_individual_recruit',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line48c_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line48c_YesNo[1]'
		)
	) ;
	
	//48.d
	
	checkBox('petitioner_harm_individual_money',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line48d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line48d_YesNo[1]'
		)
	) ;
	
	//48.e
	
	checkBox('petitioner_harm_individual_money_group',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line48e_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line48e_YesNo[1]'
		)
	) ;
	
	//49
	
	checkBox('petitioner_weapon_training',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line49_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line49_YesNo[1]'
		)
	) ;
	
	//50
	
	checkBox('petitioner_engage_harm_individual',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line50_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line50_YesNo[1]'
		)
	) ;
	
	//51.a
	
	checkBox('petitioner_harm_individual_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51a_YesNo[1]'
		)
	) ;
	
	//51.b
	
	checkBox('petitioner_harm_individual_group_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51b_YesNo[1]'
		)
	) ;
	
	//51.c
	
	checkBox('petitioner_harm_individual_recruit_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51c_YesNo[1]'
		)
	) ;
	
	//51.d
	
	checkBox('petitioner_harm_individual_money_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51d_YesNo[1]'
		)
	) ;
	
	//51.e
	
	checkBox('petitioner_harm_individual_money_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51e_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51e_YesNo[1]'
		)
	) ;
	
	//51.f
	
	checkBox('petitioner_weapon_training_spouse_child',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line51f_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line51f_YesNo[1]'
		)
	) ;
	
	//52
	
	checkBox('petitoner_provide_weapons',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line52_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line52_YesNo[1]'
		)
	) ;
	
	//53
	
	checkBox('petitioner_served_jail',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line53_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line53_YesNo[1]'
		)
	) ;
	
	//54
	
	checkBox('petitoner_provide_weapons_group',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line54_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line54_YesNo[1]'
		)
	) ;
	
	//55
	
	checkBox('petitioner_served_armed_group',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line55_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line55_YesNo[1]'
		)
	) ;
	
	//56
	
	checkBox('petitioner_communist_party_member',
		array(
			'No' => 'form1[0].#subform[11].Pt8Line56_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[11].Pt8Line56_YesNo[1]'
		)
	) ;
	
	//57
	
	checkBox('petitioner_nazi_persecution',
		array(
			'Yes' => 'form1[0].#subform[11].Pt8Line57_YesNo[0]' ,
			'No' => 'form1[0].#subform[11].Pt8Line57_YesNo[1]'
		)
	) ;
	
	//58.a
	
	checkBox('petitioner_torture',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line58a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line58a_YesNo[1]'
		)
	) ;
	
	//58.b
	
	checkBox('petitioner_killing',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line58b_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line58b_YesNo[1]'
		)
	) ;
	
	//58.c
	
	checkBox('petitioner_injured_person',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line58c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line58c_YesNo[1]'
		)
	) ;
	
	//58.d
	
	checkBox('petitioner_forced_sexual_contact',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line58d_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line58d_YesNo[1]'
		)
	) ;
	
	//58.e
	
	checkBox('petitioner_denied_religious_beliefs',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line58e_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line58e_YesNo[1]'
		)
	) ;
	
	//59
	
	checkBox('petitioner_recruit_below15_armed_group',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line59_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line59_YesNo[1]'
		)
	) ;
	
	//60
	
	checkBox('petitioner_recruit_below15_hostilities',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line60_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line60_YesNo[1]'
		)
	) ;
	
	//61
	
	checkBox('petitioner_public_assistance',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line61_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line61_YesNo[1]'
		)
	) ;
	
	//62
	
	checkBox('petitioner_likely_to_public_assistance',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line62_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line62_YesNo[1]'
		)
	) ;
	
	//63.a
	
	checkBox('petitioner_absent_removal_proceeding',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line63_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line63_YesNo[1]'
		)
	) ;
	
	//63.b
	
	checkBox('petitioner_abstent_reasonable_cause',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line63b_YesNo[1]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line63b_YesNo[0]'
		)
	) ;
	
	//64
	
	checkBox('petitioner_fraud_document',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line64_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line64_YesNo[1]'
		)
	) ;
	
	//65
	
	checkBox('petitioner_lied_information',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line65_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line65_YesNo[1]'
		)
	) ;
	
	//66
	
	checkBox('petitioner_false_us_citizen_claim',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line66_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line66_YesNo[1]'
		)
	) ;
	
	//67
	
	checkBox('petitioner_stowaway',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line67_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line67_YesNo[1]'
		)
	) ;
	
	//68
	
	checkBox('petitioner_aided_illegal_entry',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line68_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line68_YesNo[1]'
		)
	) ;
	
	//69
	
	checkBox('petitioner_final_order_civic_penalty',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line69_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line69_YesNo[1]'
		)
	) ;
	
	//70
	
	checkBox('petitioner_deported',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line70_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line70_YesNo[1]'
		)
	) ;
	
	
	//71
	
	checkBox('petitioner_entered_without_parole',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line71_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line71_YesNo[1]'
		)
	) ;
	
	//72.a
	
	checkBox('petitioner_unlawfully_present_days',
		array(
			'No' => 'form1[0].#subform[12].Pt8Line72a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[12].Pt8Line72a_YesNo[1]'
		)
	) ;
	
	//72.b
	
	checkBox('petitioner_unlawfully_present_years',
		array(
			'Yes' => 'form1[0].#subform[12].Pt8Line72b_YesNo[0]' ,
			'No' => 'form1[0].#subform[12].Pt8Line72b_YesNo[1]'
		)
	) ;
	
	//73.a
	
	checkBox('petitioner_unlawfully_present_years_2',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line73a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line73a_YesNo[1]'
		)
	) ;
	
	//73.b
	
	checkBox('petitioner_deported_2',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line73b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line73b_YesNo[1]'
		)
	) ;
	
	//74
	
	checkBox('petitioner_polygamy',
		array(
			'Yes' => 'form1[0].#subform[13].Pt8Line74_YesNo[0]' ,
			'No' => 'form1[0].#subform[13].Pt8Line74_YesNo[1]'
		)
	) ;
	
	//75
	
	checkBox('petitoner_accompanied_sick_national',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line75_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line75_YesNo[1]'
		)
	) ;
	
	//76
	
	checkBox('petitioner_custody_child',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line76_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line76_YesNo[1]'
		)
	) ;
	
	//77
	
	checkBox('petitioner_vote_in_law_regulation',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line77_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line77_YesNo[1]'
		)
	) ;
	
	//78
	
	checkBox('petitioner_renounce_citizenship',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line78_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line78_YesNo[1]'
		)
	) ;
	
	//79.a
	
	checkBox('petitioner_armed_forces_discharge_apply',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line79a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line79a_YesNo[1]'
		)
	) ;
	
	//79.b
	
	checkBox('petitioner_armed_forced_discharged',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line79b_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line79b_YesNo[1]'
		)
	) ;
	
	//79.c
	
	checkBox('petitioner_armed_forces_desertion',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line79c_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line79c_YesNo[1]'
		)
	) ;
	
	//80.a
	
	checkBox('petitioner_force_training_avoid',
		array(
			'No' => 'form1[0].#subform[13].Pt8Line80a_YesNo[0]' ,
			'Yes' => 'form1[0].#subform[13].Pt8Line80a_YesNo[1]'
		)
	) ;
	
	//80.b
	
	writeText('petitioner_force_training_avoid_status',  'form1[0].#subform[13].Pt8Line80b_Natoinality[0]') ;
	
	
	//PART8 - END
	
?>