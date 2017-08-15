<?php

	$inputFile = 'document-templates/i-485.pdf' ;
	$reader = new SetaPDF_Core_Reader_File($inputFile) ;
	$document = SetaPDF_Core_Document::load($reader, $writer) ;
	// Unlock security
	$secHandlerIn = $document->getSecHandlerIn() ;
	if ($secHandlerIn->auth('')) {
	    $ref = new ReflectionClass($secHandlerIn) ;
	    $prop = $ref->getProperty('_authMode') ;
	    $prop->setAccessible(true) ;
	    $prop->setValue($secHandlerIn, SetaPDF_Core_SecHandler::OWNER) ;
	} else {
	    $secHandlerIn->auth('owner password') ;
	}
	$document->setSecHandler(null) ;
	$document->getCatalog()->getPermissions()->removeUsageRights() ;
	$document->getCatalog()->getAcroForm()->removeXfaInformation() ;
	
	$formFiller = new SetaPDF_FormFiller($document) ;
	$PDFfields = $formFiller->getFields() ;
	
	// SET UP FIELD MAPPING
	// Goes here
	
	checkBox('g28_attach',
		array(
			'Yes' => 'form1[0].#subform[0].FFRectangle33[0]'
		)
	) ;
	
	writeText('volag_no',  'form1[0].#subform[0].FFText183[0]') ;
	writeText('attorney_state_license_number',  'form1[0].#subform[0].FFText184[0]') ;
	writeText('petitioner_name_last',  'form1[0].#subform[0].FamilyNameLastName[0]') ;
	writeText('petitioner_name_first',  'form1[0].#subform[0].GivenNameFirstName[0]') ;
	writeText('petitioner_name_middle',  'form1[0].#subform[0].MiddleName[0]') ;
	writeText('petitioner_address_street',  'form1[0].#subform[0].Address[0]') ;
	writeText('petitioner_address_apartment',  'form1[0].#subform[0].ApartmentNumber[0]') ;
	writeText('petitioner_contact_name',  'form1[0].#subform[0].InCareOf[0]') ;
	writeText('petitioner_address_city',  'form1[0].#subform[0].City[0]') ;
	writeText('petitioner_address_state',  'form1[0].#subform[0].State[0]') ;
	
	writeText('petitioner_address_zip',  'form1[0].#subform[0].ZipCode[0]') ;
	writeText('petitioner_dob',  'form1[0].#subform[0].DateofBirth[0]') ;
	writeText('petitioner_birth_country',  'form1[0].#subform[0].CountryofBirth[0]') ;
	writeText('petitioner_citizenship_nationality',  'form1[0].#subform[0].CountryofCitizenshipNationality[0]') ;
	writeText('petitioner_usssn',  'form1[0].#subform[0].USSocialSecurityNumber[0]') ;
	writeText('petitioner_an',  'form1[0].#subform[0].ANumber[0]') ;
	writeText('petitioner_dola',  'form1[0].#subform[0].DateofLastArrival[0]') ;
	writeText('petitioner_i94_drn',  'form1[0].#subform[0].I-94Number[0]') ;
	writeText('petitioner_uscis_status_current',  'form1[0].#subform[0].CurrentUSCISStatus[0]') ;
	writeText('petitioner_uscis_status_expire',  'form1[0].#subform[0].ExpiresOn[0]') ;
	
	checkBox('petitioner_adjustment_resident_status_1',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[0]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_2',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[1]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_3',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[2]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_4',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[3]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_5',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[4]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_6',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[5]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_7',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[6]'
		)
	) ;
	
	checkBox('petitioner_adjustment_resident_status_8',
		array(
			'Yes' => 'form1[0].#subform[0].Part2_Checkbox[7]'
		)
	) ;
	
	writeText('petitioner_adjustment_resident_status_8_explain',  'form1[0].#subform[0].Other[0]') ;
	
	checkBox('petitioner_permanent_resident_status_1',
		array(
			'Yes' => 'form1[0].#subform[0].Part2a_Checkbox[0]' 
		)
	) ;
	
	checkBox('petitioner_permanent_resident_status_2',
		array(
			'Yes' => 'form1[0].#subform[0].Part2a_Checkbox[1]' 
		)
	) ;
	
	writeText('petitioner_birth_city',  'form1[0].#subform[1].CityTownVillageofBirth[0]') ;
	writeText('petitioner_occupation_current',  'form1[0].#subform[1].CurrentOccupation[0]') ;
	writeText('petitioner_mother_name_first',  'form1[0].#subform[1].YourMothersFirstName[0]') ;
	writeText('petitioner_father_name_first',  'form1[0].#subform[1].YourFathersFirstName[0]') ;
	writeText('petitioner_name_i94',  'form1[0].#subform[1].nameexactlyasitappearsonyourArrivalDepartureRecord[0]') ;
	writeText('petitioner_us_entry_last_place',  'form1[0].#subform[1].PlaceofLastEntryIntotheUnitedStates[0]') ;
	writeText('petitioner_us_entry_status',  'form1[0].#subform[1].Inwhatstatusdidyoulastenter[0]') ;
	
	checkBox('petitioner_us_immig_inspect',
		array(
			'Yes' => 'form1[0].#subform[1].Part3_Inspected[0]' ,
			'No' => 'form1[0].#subform[1].Part3_Inspected[1]'
		)
	) ;
	
	
	
	writeText('petitioner_nonimmig_vn',  'form1[0].#subform[1].NonimmigrantVisaNumber[0]') ;
	writeText('petitioner_consulate_visa_issue',  'form1[0].#subform[1].ConsulateWhereVisaWasIssued[0]') ;
	writeText('petitioner_visa_issue_date',  'form1[0].#subform[1].DateVisaIssued[0]') ;
	
	checkBox('petitioner_gender',
		array(
			'M' => 'form1[0].#subform[1].Part3_Gender[0]' ,
			'F' => 'form1[0].#subform[1].Part3_Gender[1]'
		)
	) ;
	
	checkBox('petitioner_maritial_status',
		array(
			'Married' => 'form1[0].#subform[1].Part3_MaritalStatus[0]' ,
			'Single' => 'form1[0].#subform[1].Part3_MaritalStatus[1]' ,
			'Divorced' => 'form1[0].#subform[1].Part3_MaritalStatus[2]',
			'Widowed' => 'form1[0].#subform[1].Part3_MaritalStatus[3]'
		)
	) ;
	
	checkBox('petitioner_us_pr_apply',
		array(
			'Yes' => 'form1[0].#subform[1].PR_Status[0]' ,
			'No' => 'form1[0].#subform[1].PR_Status[1]'
		)
	) ;
	
	writeText('petitioner_dod_pod',  'form1[0].#subform[1].IfYes[0]') ;
	writeText('petitioner_spouse_name_last_1',  'form1[0].#subform[1].Table1[0].Row1[0].FamilyName[0]') ;
	writeText('petitioner_spouse_name_first_1',  'form1[0].#subform[1].Table1[0].Row1[0].GivenName[0]') ;
	writeText('petitioner_spouse_name_middle_1',  'form1[0].#subform[1].Table1[0].Row1[0].MiddleInitial[0]') ;
	writeText('petitioner_spouse_dob_1',  'form1[0].#subform[1].Table1[0].Row1[0].DateofBirth[0]') ;
	writeText('petitioner_spouse_birth_country_1',  'form1[0].#subform[1].Table1[1].Row1[0].CountryofBirth[0]') ;
	writeText('petitioner_spouse_relationship_1',  'form1[0].#subform[1].Table1[1].Row1[0].Relationship[0]') ;
	writeText('petitioner_spouse_an_1',  'form1[0].#subform[1].Table1[1].Row1[0].ANumber[0]') ;
	writeText('petitioner_spouse_name_last_2',  'form1[0].#subform[1].Table1[2].Row1[0].FamilyName[0]') ;
	
	writeText('petitioner_spouse_name_first_2',  'form1[0].#subform[1].Table1[2].Row1[0].GivenName[0]') ;
	writeText('petitioner_spouse_name_middle_2',  'form1[0].#subform[1].Table1[2].Row1[0].MiddleInitial[0]') ;
	writeText('petitioner_spouse_dob_2',  'form1[0].#subform[1].Table1[2].Row1[0].DateofBirth[0]') ;
	writeText('petitioner_spouse_birth_country_2',  'form1[0].#subform[1].Table1[3].Row1[0].CountryofBirth[0]') ;
	writeText('petitioner_spouse_relationship_2',  'form1[0].#subform[1].Table1[3].Row1[0].Relationship[0]') ;
	writeText('petitioner_spouse_an_2',  'form1[0].#subform[1].Table1[3].Row1[0].ANumber[0]') ;
	writeText('petitioner_spouse_name_last_3',  'form1[0].#subform[1].Table1[8].Row1[0].FamilyName[0]') ;
	writeText('petitioner_spouse_name_first_3',  'form1[0].#subform[1].Table1[8].Row1[0].GivenName[0]') ;
	writeText('petitioner_spouse_name_middle_3',  'form1[0].#subform[1].Table1[8].Row1[0].MiddleInitial[0]') ;
	writeText('petitioner_spouse_dob_3',  'form1[0].#subform[1].Table1[8].Row1[0].DateofBirth[0]') ;
	
	writeText('petitioner_spouse_relationship_3',  'form1[0].#subform[1].Table1[9].Row1[0].Relationship[0]') ;
	writeText('petitioner_spouse_an_3',  'form1[0].#subform[1].Table1[9].Row1[0].ANumber[0]') ;
	writeText('petitioner_spouse_name_last_4',  'form1[0].#subform[1].Table1[6].Row1[0].FamilyName[0]') ;
	writeText('petitioner_spouse_name_first_4',  'form1[0].#subform[1].Table1[6].Row1[0].GivenName[0]') ;
	writeText('petitioner_spouse_name_middle_4',  'form1[0].#subform[1].Table1[6].Row1[0].MiddleInitial[0]') ;
	writeText('petitioner_spouse_dob_4',  'form1[0].#subform[1].Table1[6].Row1[0].DateofBirth[0]') ;
	writeText('petitioner_spouse_birth_country_4',  'form1[0].#subform[1].Table1[7].Row1[0].CountryofBirth[0]') ;
	writeText('petitioner_spouse_relationship_4',  'form1[0].#subform[1].Table1[7].Row1[0].Relationship[0]') ;
	writeText('petitioner_spouse_an_4',  'form1[0].#subform[1].Table1[7].Row1[0].ANumber[0]') ;
	writeText('petitioner_spouse_name_last_5',  'form1[0].#subform[1].Table1[4].Row1[0].FamilyName[0]') ;
	
	writeText('petitioner_spouse_name_first_5',  'form1[0].#subform[1].Table1[4].Row1[0].GivenName[0]') ;
	writeText('petitioner_spouse_name_middle_5',  'form1[0].#subform[1].Table1[4].Row1[0].MiddleInitial[0]') ;
	writeText('petitioner_spouse_dob_5',  'form1[0].#subform[1].Table1[4].Row1[0].DateofBirth[0]') ;
	writeText('petitioner_spouse_birth_country_5',  'form1[0].#subform[1].Table1[5].Row1[0].CountryofBirth[0]') ;
	writeText('petitioner_spouse_relationship_5',  'form1[0].#subform[1].Table1[5].Row1[0].Relationship[0]') ;
	writeText('petitioner_spouse_an_5',  'form1[0].#subform[1].Table1[5].Row1[0].ANumber[0]') ;
	
	checkBox('petitioner_spouse_apply_1',
		array(
			'Yes' => 'form1[0].#subform[1].Apply_Check1[0]' ,
			'No' => 'form1[0].#subform[1].Apply_Check1[1]'
		)
	) ;
	
	checkBox('petitioner_spouse_apply_2',
		array(
			'Yes' => 'form1[0].#subform[1].Apply_Check2[0]' ,
			'No' => 'form1[0].#subform[1].Apply_Check2[1]'
		)
	) ;
	
	checkBox('petitioner_spouse_apply_3',
		array(
			'Yes' => 'form1[0].#subform[1].Apply_Check3[0]' ,
			'No' => 'form1[0].#subform[1].Apply_Check3[1]'
		)
	) ;
	
	checkBox('petitioner_spouse_apply_4',
		array(
			'Yes' => 'form1[0].#subform[1].Apply_Check4[1]' ,
			'No' => 'form1[0].#subform[1].Apply_Check4[0]'
		)
	) ;
	
	checkBox('petitioner_spouse_apply_5',
		array(
			'Yes' => 'form1[0].#subform[1].Apply_Check5[1]' ,
			'No' => 'form1[0].#subform[1].Apply_Check5[0]'
		)
	) ;
	
	writeText('petitioner_organisation_1',  'form1[0].#subform[12].Table1[10].Row1[0].NamesofOrganizations[0]') ;
	writeText('petitioner_organisation_2',  'form1[0].#subform[12].Table1[10].Row1[1].NamesofOrganizations[0]') ;
	writeText('petitioner_organisation_3',  'form1[0].#subform[12].Table1[10].Row1[2].NamesofOrganizations[0]') ;
	writeText('petitioner_organisation_4',  'form1[0].#subform[12].Table1[10].Row1[3].NamesofOrganizations[0]') ;
	
	writeText('petitioner_organisation_5',  'form1[0].#subform[12].Table1[10].Row1[4].NamesofOrganizations[0]') ;
	writeText('petitioner_organisation_6',  'form1[0].#subform[12].Table1[10].Row1[5].NamesofOrganizations[0]') ;
	writeText('petitioner_olocation_1',  'form1[0].#subform[12].Table1[10].Row1[0].Locations[0]') ;
	writeText('petitioner_olocation_2',  'form1[0].#subform[12].Table1[10].Row1[1].Locations[0]') ;
	writeText('petitioner_olocation_3',  'form1[0].#subform[12].Table1[10].Row1[2].Locations[0]') ;
	writeText('petitioner_olocation_4',  'form1[0].#subform[12].Table1[10].Row1[3].Locations[0]') ;
	writeText('petitioner_olocation_5',  'form1[0].#subform[12].Table1[10].Row1[4].Locations[0]') ;
	writeText('petitioner_olocation_6',  'form1[0].#subform[12].Table1[10].Row1[5].Locations[0]') ;
	writeText('petitioner_omember_from_1',  'form1[0].#subform[12].Table1[10].Row1[0].From[0]') ;
	writeText('petitioner_omember_from_2',  'form1[0].#subform[12].Table1[10].Row1[1].From[0]') ;
	
	writeText('petitioner_omember_from_3',  'form1[0].#subform[12].Table1[10].Row1[2].From[0]') ;
	writeText('petitioner_omember_from_4',  'form1[0].#subform[12].Table1[10].Row1[3].From[0]') ;
	writeText('petitioner_omember_from_5',  'form1[0].#subform[12].Table1[10].Row1[4].From[0]') ;
	writeText('petitioner_omember_from_6',  'form1[0].#subform[12].Table1[10].Row1[5].From[0]') ;
	writeText('petitioner_omember_to_1',  'form1[0].#subform[12].Table1[10].Row1[0].To[0]') ;
	writeText('petitioner_omember_to_2',  'form1[0].#subform[12].Table1[10].Row1[1].To[0]') ;
	writeText('petitioner_omember_to_3',  'form1[0].#subform[12].Table1[10].Row1[2].To[0]') ;
	writeText('petitioner_omember_to_4',  'form1[0].#subform[12].Table1[10].Row1[3].To[0]') ;
	writeText('petitioner_omember_to_5',  'form1[0].#subform[12].Table1[10].Row1[4].To[0]') ;
	writeText('petitioner_omember_to_6',  'form1[0].#subform[12].Table1[10].Row1[5].To[0]') ;
	
	 checkBox('petitioner_crime_drug',
		array(
			'Yes' => 'form1[0].#subform[12].Line1a[0]' ,
			'No' => 'form1[0].#subform[12].Line1a[1]'
		)
	) ;
	
	checkBox('petitioner_arrest_law_violation',
		array(
			'Yes' => 'form1[0].#subform[12].Line1b[0]' ,
			'No' => 'form1[0].#subform[12].Line1b[1]'
		)
	) ;
	
	checkBox('petitioner_rehabilitation_decree',
		array(
			'Yes' => 'form1[0].#subform[12].Line1c[0]' ,
			'No' => 'form1[0].#subform[12].Line1c[1]'
		)
	) ;
	
	checkBox('petitioner_diplomatic_immunity',
		array(
			'Yes' => 'form1[0].#subform[12].Line1d[0]' ,
			'No' => 'form1[0].#subform[12].Line1d[1]'
		)
	) ;
	
	checkBox('petitioner_public_assistance',
		array(
			'Yes' => 'form1[0].#subform[12].Line2[0]' ,
			'No' => 'form1[0].#subform[12].Line2[1]'
		)
	) ;
	
	checkBox('petitioner_10_prostitute',
		array(
			'Yes' => 'form1[0].#subform[12].Line3a[0]' ,
			'No' => 'form1[0].#subform[12].Line3a[1]'
		)
	) ;
	
	checkBox('petitioner_illegal_gambling',
		array(
			'Yes' => 'form1[0].#subform[12].Line3b[0]' ,
			'No' => 'form1[0].#subform[12].Line3b[1]'
		)
	) ;
	
	checkBox('petitioner_assist_alien_us_enter_illegal',
		array(
			'Yes' => 'form1[0].#subform[12].Line3c[0]' ,
			'No' => 'form1[0].#subform[12].Line3c[1]'
		)
	) ;
	
	checkBox('petitioner_illicit_trafficking',
		array(
			'Yes' => 'form1[0].#subform[12].Line3d[0]' ,
			'No' => 'form1[0].#subform[12].Line3d[1]'
		)
	) ;
	
	checkBox('petitioner_funds_terrorist_activity',
		array(
			'Yes' => 'form1[0].#subform[12].Line4_Checkbox[0]' ,
			'No' => 'form1[0].#subform[12].Line4_Checkbox[1]'
		)
	) ;
	
	checkBox('petitioner_espionage',
		array(
			'Yes' => 'form1[0].#subform[14].Line5a[0]' ,
			'No' => 'form1[0].#subform[14].Line5a[1]'
		)
	) ;
	
	checkBox('petitioner_us_government_opposition',
		array(
			'Yes' => 'form1[0].#subform[14].Line5b[0]' ,
			'No' => 'form1[0].#subform[14].Line5b[1]'
		)
	) ;
	
	checkBox('petitioner_violate_us_export_law',
		array(
			'Yes' => 'form1[0].#subform[14].Line5c[0]' ,
			'No' => 'form1[0].#subform[14].Line5c[1]'
		)
	) ;
	
	checkBox('petitioner_communist_party',
		array(
			'Yes' => 'form1[0].#subform[14].Line6[0]' ,
			'No' => 'form1[0].#subform[14].Line6[1]'
		)
	) ;
	
	checkBox('petitioner_nazi_associate',
		array(
			'Yes' => 'form1[0].#subform[14].Line7[0]' ,
			'No' => 'form1[0].#subform[14].Line7[1]'
		)
	) ;
	
	checkBox('petitioner_us_deport',
		array(
			'Yes' => 'form1[0].#subform[14].Line8[0]' ,
			'No' => 'form1[0].#subform[14].Line8[1]'
		)
	) ;
	
	checkBox('petitioner_INA_penalty',
		array(
			'Yes' => 'form1[0].#subform[14].Line9[0]' ,
			'No' => 'form1[0].#subform[14].Line9[1]'
		)
	) ;
	
	checkBox('petitioner_avoid_us_forces',
		array(
			'Yes' => 'form1[0].#subform[14].Line10[0]' ,
			'No' => 'form1[0].#subform[14].Line10[1]'
		)
	) ;
	
	checkBox('petitioner_j_nonimmigator',
		array(
			'Yes' => 'form1[0].#subform[14].Line11[0]' ,
			'No' => 'form1[0].#subform[14].Line11[1]'
		)
	) ;
	
	checkBox('petitioner_us_child_custody',
		array(
			'Yes' => 'form1[0].#subform[14].Line12[0]' ,
			'No' => 'form1[0].#subform[14].Line12[1]'
		)
	) ;
	
	checkBox('petitioner_polygamy_practice',
		array(
			'Yes' => 'form1[0].#subform[14].Line13[0]' ,
			'No' => 'form1[0].#subform[14].Line13[1]'
		)
	) ;
	
	checkBox('petitioner_torture_genocide',
		array(
			'Yes' => 'form1[0].#subform[14].Line14a[0]' ,
			'No' => 'form1[0].#subform[14].Line14a[1]'
		)
	) ;
	
	checkBox('petitioner_person_killing',
		array(
			'Yes' => 'form1[0].#subform[14].Line14b[0]' ,
			'No' => 'form1[0].#subform[14].Line14b[1]'
		)
	) ;
	
	checkBox('petitioner_intentional_injuring',
		array(
			'Yes' => 'form1[0].#subform[14].Line14c[0]' ,
			'No' => 'form1[0].#subform[14].Line14c[1]'
		)
	) ;
	
	checkBox('petitioner_forced_sexual_contact',
		array(
			'Yes' => 'form1[0].#subform[14].Line14d[0]' ,
			'No' => 'form1[0].#subform[14].Line14d[1]'
		)
	) ;
	
	checkBox('petitioner_religion_force',
		array(
			'Yes' => 'form1[0].#subform[14].Line14e[0]' ,
			'No' => 'form1[0].#subform[14].Line14e[1]'
		)
	) ;
	
	checkBox('petitioner_militiary_unit_serve',
		array(
			'Yes' => 'form1[0].#subform[14].Line15a[0]' ,
			'No' => 'form1[0].#subform[14].Line15a[1]'
		)
	) ;
	
	checkBox('petitioner_jail_serve',
		array(
			'Yes' => 'form1[0].#subform[14].Line15b[0]' ,
			'No' => 'form1[0].#subform[14].Line15b[1]'
		)
	) ;
	
	checkBox('petitioner_weapon_unit_member',
		array(
			'Yes' => 'form1[0].#subform[14].Line16[0]' ,
			'No' => 'form1[0].#subform[14].Line16[1]'
		)
	) ;
	
	checkBox('petitioner_weapon_selling_member',
		array(
			'Yes' => 'form1[0].#subform[15].Line17[0]' ,
			'No' => 'form1[0].#subform[15].Line17[1]'
		)
	) ;
	
	checkBox('petitioner_military_weapon_training',
		array(
			'Yes' => 'form1[0].#subform[15].Line18[0]' ,
			'No' => 'form1[0].#subform[15].Line18[1]'
		)
	) ;
	
	checkBox('petitioner_acco_request_disability',
		array(
			'Yes' => 'form1[0].#subform[15].Disabilities[0]' ,
			'No' => 'form1[0].#subform[15].Disabilities[1]'
		)
	) ; 
	
	writeText('petitioner_deaf',  'form1[0].#subform[15].Iamdeaforhardofhearing[0]') ;
	writeText('petitioner_blind',  'form1[0].#subform[15].Iamblindorsightimpaired[0]') ;
	writeText('petitioner_other_disability',  'form1[0].#subform[15].OtherDisability[0]') ;
	
	checkBox('petitioner_deaf_check',
		array(
			'Yes' => 'form1[0].#subform[15].CheckBox1[0]' 
		)
	) ;
	
	checkBox('petitioner_blind_check',
		array(
			'Yes' => 'form1[0].#subform[15].CheckBox1[1]'
		)
	) ;
	
	checkBox('petitioner_other_disability_check',
		array(
			'Yes' => 'form1[0].#subform[15].CheckBox1[2]' 
		)
	) ;
	
	checkBox('applicant_language_english',
		array(
			'Yes' => 'form1[0].#subform[16].Part5[0]' 
		)
	) ;
	
	checkBox('applicant_language_other',
		array(
			'Yes' => 'form1[0].#subform[16].Part5[1]' 
		)
	) ;
	
	writeText('applicant_language_used',  'form1[0].#subform[16].LanguageUsed[1]') ;
	writeText('applicant_full_name',  'form1[0].#subform[16].PrintYourName[0]') ;
	writeText('applicant_daytime_pn',  'form1[0].#subform[16].DaytimePhoneNumber[0]') ;
	writeText('interpreter_language_used',  'form1[0].#subform[16].LanguageUsed[0]') ;
	writeText('interpreter_full_name',  'form1[0].#subform[16].PrintYourName[1]') ;
	writeText('interpreter_daytime_pn',  'form1[0].#subform[16].DaytimePhoneNumber[1]') ;
	writeText('preparer_full_name',  'form1[0].#subform[16].PrintYourName[2]') ;
	writeText('preparer_daytime_pn',  'form1[0].#subform[16].DaytimePhoneNumber[2]') ;
	writeText('preparer_name_address_firm',  'form1[0].#subform[16].FirmNameandAddress[0]') ;
	writeText('preparer_email',  'form1[0].#subform[16].E-MailAddress[0]') ;
	
		if (!$efs)
	{
		echo 'Error: No I-485 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}

	
?>