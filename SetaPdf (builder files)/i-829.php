<?php

	$inputFile = 'document-templates/i-829.pdf' ;
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
			'Yes' => 'form1[0].Page1[0].Attorney-Rep[0].G28CheckBox[0]'
		)
	) ;

	writeText('attorney_state_bar_number',  'form1[0].Page1[0].Attorney-Rep[0].attorneyBarNumber[0]') ;
	writeText('uscis_oan',  'form1[0].Page1[0].Attorney-Rep[0].uscisOnlineNumber[0]') ;
	
	//PART1 : START
	
	checkBox('RC_investment',
		array(
			'Yes' => 'form1[0].Page1[0].pg1Col1[0].p1Line1YesNo[0]' ,
			'No' => 'form1[0].Page1[0].pg1Col1[0].p1Line1YesNo[1]'
		)
	) ;
	
	switch (getFieldLC('RC_investment'))
	{
			
		case 'Yes' :
			writeText('RC_name',  'form1[0].Page1[0].pg1Col1[0].p1Line2aNameRegCtr[0]') ;
	        writeText('RC_identification_number',  'form1[0].Page1[0].pg1Col1[0].p1Line2bRegionalCenterIDNum[0]') ;
			break ;
		
	}
	
	
	writeText('NCE_name',  'form1[0].Page1[0].pg1Col1[0].p1Line3aNCEName[0]') ;
	writeText('NCE_identification_number',  'form1[0].Page1[0].pg1Col1[0].p1Line3bNCEIDNum[0]') ;
	
	checkBox('CPR_type',
		array(
			'I am a conditional permanent resident based on my investment in a commercial enterprise.' => 'form1[0].Page1[0].pg1Col1[0].p1Line456Checkbox[0]' ,
			"I am a conditional permanent resident who is the spouse, former spouse, or child of an entrepreneur, and I am filing separately from the entrepreneur's Form I-829." => 'form1[0].Page1[0].pg1Col1[0].p1Line456Checkbox[1]',
			'I am a conditional permanent resident spouse or child of an entrepreneur who has died.' => 'form1[0].Page1[0].pg1Col1[0].p1Line456Checkbox[2]'
		)
	) ;
	
	//PART1 : END
	
	//PART2 : START
	
	writeText('petitioner_name_family',  'form1[0].Page1[0].p2Line1afamilyName[0]') ;
	writeText('petitioner_name_given',  'form1[0].Page1[0].p2Line1bGivenName[0]') ;
	writeText('petitioner_name_middle',  'form1[0].Page1[0].p2Line1cMiddleName[0]') ;
	writeText('petitioner_alien_number',  'form1[0].Page1[0].aNumber[0].p2Line2AlienNumber[0]') ;
	writeText('petitioner_uscis_oan',  'form1[0].Page1[0].p2Line3USCISNum[0]') ;
	writeText('petitioner_uscis_ssn',  'form1[0].Page1[0].p2Line4SSN[0]') ;
	writeText('petitioner_dob',  'form1[0].Page1[0].p2Line5DateOfBirth[0]') ;
	
	checkBox('petitioner_gender',
		array(
			'M' => 'form1[0].Page1[0].p2Line6Gender[0]' ,
			'F' => 'form1[0].Page1[0].p2Line6Gender[1]'
		)
	) ;
	
	writeText('petitioner_birth_country',  'form1[0].Page1[0].p2Line7CountryofBirth[0]') ;
	writeText('petitioner_citizenship',  'form1[0].Page1[0].p2Line8CountryCizNatl[0]') ;
	writeText('petitioner_CPR_admission_date',  'form1[0].Page1[0].p2Line9DateOfAdmission[0]') ;
	writeText('petitioner_i526_receipt_number',  'form1[0].Page1[0].p2Line10ReceiptNumber[0]') ;
	writeText('petitioner_additional_form_number',  'form1[0].Page2[0].col1[0].p2Line11ReceiptNumber[0]') ;
	
	writeText('petitioner_other_name_family_1',  'form1[0].Page2[0].col1[0].p2Line12aFamilyName[0]') ;
	writeText('petitioner_other_name_given_1',  'form1[0].Page2[0].col1[0].p2Line12bGivenName[0]') ;
	writeText('petitioner_other_name_middle_1',  'form1[0].Page2[0].col1[0].p2Line12cMiddleName[0]') ;
	writeText('petitioner_other_name_family_2',  'form1[0].Page2[0].col1[0].p2Line13aFamilyName[0]') ;
	writeText('petitioner_other_name_given_2',  'form1[0].Page2[0].col1[0].p2Line13bGivenName[0]') ;
	writeText('petitioner_other_name_middle_2',  'form1[0].Page2[0].col1[0].p2Line13cMiddleName[0]') ;
	
	writeText('petitioner_address_care_name',  'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14InCareofName[0]') ;
	writeText('petitioner_address_street_number_name',  'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14StreetNumberName[0]') ;
	
	checkBox('petitioner_address_o',
		array(
			'Apt' => 'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14Unit[0]' ,
			'Ste' => 'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14Unit[1]' ,
			'Flr' => 'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14Unit[2]'
		)
	) ;
	
	writeText('petitioner_apt_ste_flr_number',  'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14AptSteFlrNumber[0]') ;
	writeText('petitioner_address_city',  'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14CityOrTown[0]') ;
	writeText('petitioner_address_state',  'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14State[0]') ;
	writeText('petitioner_address_zip_code',  'form1[0].Page2[0].col1[0].p2Line14USmailing[0].p2Line14ZipCode[0]') ;
	
	checkBox('petitioner_cms_pa',
		array(
			'Yes' => 'form1[0].Page2[0].col1[0].p2Line15YesNo[0]' ,
			'No' => 'form1[0].Page2[0].col1[0].p2Line15YesNo[1]'
		)
	) ;
	
	switch (getFieldLC('petitioner_cms_pa'))
	{
			
		case 'No' :
			writeText('petitioner_address_1_street_number_name',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16StreetNumberName[0]') ;
	
	       checkBox('petitioner_address_1_o',
		array(
			'Apt' => 'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16Unit[0]' ,
			'Ste' => 'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16Unit[1]' ,
			'Flr' => 'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16Unit[2]'
		)
	) ;
	
			writeText('petitioner_address_1_apt_ste_flr_number',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16AptSteFlrNumber[0]') ;
			writeText('petitioner_address_1_city',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16CityOrTown[0]') ;
			writeText('petitioner_address_1_state',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16State[0]') ;
			writeText('petitioner_address_1_zip_code',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16ZipCode[0]') ;
			writeText('petitioner_address_1_province',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16Province[0]') ;
			writeText('petitioner_address_1_postal_code',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16PostalCode[0]') ;
			writeText('petitioner_address_1_country',  'form1[0].Page2[0].p2Line16physicalAddress[0].p2Line16Country[0]') ;
			break ;
		
	}
	
	
	
	checkBox('petitioner_CPR_criminal_history_1',
		array(
			'Yes' => 'form1[0].Page2[0].p2Line17YesNo[0]' ,
			'No' => 'form1[0].Page2[0].p2Line17YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_CPR_criminal_history_2',
		array(
			'Yes' => 'form1[0].Page2[0].p2Line18YesNo[0]' ,
			'No' => 'form1[0].Page2[0].p2Line18YesNo[1]'
		)
	) ;
	
	//PART2 : END 
	
	//PART3 : START
	
	writeText('petitioner_spouse_C/FCPR_name_family',  'form1[0].Page2[0].p3Line1aFamilyName[0]') ;
	writeText('petitioner_spouse_C/FCPR_name_given',  'form1[0].Page2[0].p3Line1bGivenName[0]') ;
	writeText('petitioner_spouse_C/FCPR_name_middle',  'form1[0].Page2[0].p3Line1cMiddleName[0]') ;
	
	checkBox('petitioner_spouse_C/FCPR_gender',
		array(
			'F' => 'form1[0].Page3[0].p3Line2Gender[0]' ,
			'M' => 'form1[0].Page3[0].p3Line2Gender[1]'
		)
	) ;
	
	writeText('petitioner_spouse_C/FCPR_alien_number',  'form1[0].Page3[0].#subform[0].p3Line3AlienNumber[0]') ;
	writeText('petitioner_spouse_C/FCPR_uscis_oan',  'form1[0].Page3[0].p3Line3ELISAcctIdentifier[0]') ;
	writeText('petitioner_spouse_C/FCPR_dob',  'form1[0].Page3[0].p3Line5DateOfBirth[0]') ;
	
	writeText('petitioner_spouse_C/FCPR_other_name_family_1',  'form1[0].Page3[0].p3Line6aFamilyName[0]') ;
	writeText('petitioner_spouse_C/FCPR_other_name_given_1',  'form1[0].Page3[0].p3Line6bGivenName[0]') ;
	writeText('petitioner_spouse_C/FCPR_other_name_middle_1',  'form1[0].Page3[0].p3Line6cMiddleName[0]') ;
	writeText('petitioner_spouse_C/FCPR_other_name_family_2',  'form1[0].Page3[0].p3Line7aFamilyName[0]') ;
	writeText('petitioner_spouse_C/FCPR_other_name_given_2',  'form1[0].Page3[0].p3Line7bGivenName[0]') ;
	writeText('petitioner_spouse_C/FCPR_other_name_middle_2',  'form1[0].Page3[0].p3Line7cMiddleName[0]') ;
	
	writeText('petitioner_spouse_C/FCPR_address_street',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8StreetNumberName[0]') ;
	
	checkBox('petitioner_spouse_C/FCPR_address_o',
		array(
			'Apt' => 'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8Unit[0]' ,
			'Ste' => 'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8Unit[1]' ,
			'Flr' => 'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8Unit[2]'
		)
	) ;
	
	writeText('petitioner_spouse_C/FCPR_address_o_number',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8AptSteFlrNumber[0]') ;
	writeText('petitioner_spouse_C/FCPR_address_city',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8CityOrTown[0]') ;
	writeText('petitioner_spouse_C/FCPR_address_state',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8State[0]') ;
	writeText('petitioner_spouse_C/FCPR_address_zip_code',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8ZipCode[0]') ;
	writeText('petitioner_spouse_C/FCPR_address_province',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8Province[0]') ;
	writeText('petitioner_spouse_C/FCPR_address_postal_code',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8PostalCode[0]') ;
	writeText('petitioner_spouse_C/FCPR_address_country',  'form1[0].Page3[0].p3Line8MailingAddress[0].p3Line8Country[0]') ;
	
	checkBox('petitioner_spouse_C/FCPR',
		array(
			'Current Spouse' => 'form1[0].Page3[0].p3Line9OtherInfo[0]' ,
			'Former Conditional Permanent Resident Spouse' => 'form1[0].Page3[0].p3Line9OtherInfo[1]'
		)
	) ;
	
	writeText('petitioner_spouse_C/FCPR_date_marriage',  'form1[0].Page3[0].p3Line10DateOfMarriage[0]') ;
	writeText('petitioner_spouse_C/FCPR_date_divorce',  'form1[0].Page3[0].p4Line11MarriageTerminated[0]') ;
	
	checkBox('petitioner_spouse_C/FCPR_live',
		array(
			'Yes' => 'form1[0].Page3[0].p3Line12YesNo[0]' ,
			'No' => 'form1[0].Page3[0].p3Line12YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_spouse_C/FCPR_apply',
		array(
			'Yes' => 'form1[0].Page3[0].p3Line13YesNo[0]' ,
			'No' => 'form1[0].Page3[0].p3Line13YesNo[1]'
		)
	) ;
	
	writeText('petitioner_spouse_C/FCPR_current_immig_status',  'form1[0].Page3[0].p3Line14CurrentStatus[0]') ;
	
	checkBox('petitioner_spouse_C/FCPR_immig_status_mutual',
		array(
			'Yes' => 'form1[0].Page3[0].p3Line15YesNo[0]' ,
			'No' => 'form1[0].Page3[0].p3Line15YesNo[1]'
		)
	) ;
	
	//PART3 : END 
	
	//PART4 : START
	
	//Child1
	
	writeText('petitioner_child_1_legal_name_family',  'form1[0].Page3[0].p4Line1aFamilyName[0]') ;
	writeText('petitioner_child_1_legal_name_given',  'form1[0].Page3[0].p4Line1bGivenName[0]') ;
	writeText('petitioner_child_1_legal_name_middle',  'form1[0].Page3[0].p4Line1cMiddleName[0]') ;
	
	checkBox('petitioner_child_1_gender',
		array(
			'M' => 'form1[0].Page3[0].p4Line2Gender[1]' ,
			'F' => 'form1[0].Page3[0].p4Line2Gender[0]'
		)
	) ;
	
	writeText('petitioner_child_1_alien_number',  'form1[0].Page3[0].p4Line3ANumber[0].p4Line3AlienNumber[0]') ;
	writeText('petitioner_child_1_uscis_oan',  'form1[0].Page3[0].p4Line4USCISNum[0]') ;
	writeText('petitioner_child_1_dob',  'form1[0].Page3[0].p4Line5DateOfBirth[0]') ;
	
	writeText('petitioner_child_1_other_name_family',  'form1[0].Page3[0].p4Line6aFamilyName[0]') ;
	writeText('petitioner_child_1_other_name_given',  'form1[0].Page3[0].p4Line6bGivenName[0]') ;
	writeText('petitioner_child_1_other_name_middle',  'form1[0].Page3[0].p4Line6cMiddleName[0]') ;
	
	writeText('petitioner_child_1_address_street_number_name',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7StreetNumberName[0]') ;
	
	checkBox('petitioner_child_1_address_o',
		array(
			'Apt' => 'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7Unit[0]' ,
			'Ste' => 'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7Unit[1]' ,
			'Flr' => 'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7Unit[2]'
		)
	) ;
	
	writeText('petitioner_child_1_address_apt_ste_flr_number',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7AptSteFlrNumber[0]') ;
	writeText('petitioner_child_1_address_city',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7CityOrTown[0]') ;
	writeText('petitioner_child_1_address_state',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7State[0]') ;
	writeText('petitioner_child_1_address_zip_code',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7ZipCode[0]') ;
	writeText('petitioner_child_1_address_province',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7Province[0]') ;
	writeText('petitioner_child_1_address_postal_code',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7PostalCode[0]') ;
	writeText('petitioner_child_1_address_country',  'form1[0].Page4[0].P4col1[0].p4Line7MailingAddess[0].p4Line7Country[0]') ;
	
	checkBox('petitioner_child_1_live',
		array(
			'Yes' => 'form1[0].Page4[0].P4col1[0].p4Line8YesNo[0]' ,
			'No' => 'form1[0].Page4[0].P4col1[0].p4Line8YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_child_1_apply',
		array(
			'Yes' => 'form1[0].Page4[0].P4col1[0].p4Line9YesNo[0]' ,
			'No' => 'form1[0].Page4[0].P4col1[0].p4Line9YesNo[1]'
		)
	) ;
	
	writeText('petitioner_child_1_current_immigration_status',  'form1[0].Page4[0].P4col1[0].p4Line10CurrentImmigrationStatus[0]') ;
	
	//Child2
	
	writeText('petitioner_child_2_legal_name_family',  'form1[0].Page4[0].P4col1[0].p4Line11aFamilyName[0]') ;
	writeText('petitioner_child_2_legal_name_given',  'form1[0].Page4[0].P4col1[0].p4Line11GivenName[0]') ;
	writeText('petitioner_child_2_legal_name_middle',  'form1[0].Page4[0].P4col1[0].p4Line11MiddleName[0]') ;
	
	checkBox('petitioner_child_2_gender',
		array(
			'M' => 'form1[0].Page4[0].P4col1[0].p4Line12Gender[1]' ,
			'F' => 'form1[0].Page4[0].P4col1[0].p4Line12Gender[0]'
		)
	) ;
	
	writeText('petitioner_child_2_alien_number',  'form1[0].Page4[0].P4col1[0].#subform[1].p4Line13AlienNumber[0]') ;
	writeText('petitioner_child_2_uscis_oan',  'form1[0].Page4[0].P4col1[0].p4Line14USCISNum[0]') ;
	writeText('petitioner_child_2_dob',  'form1[0].Page4[0].P4col1[0].p4Line15DateOfBirth[0]') ;
	
	writeText('petitioner_child_2_other_name_family',  'form1[0].Page4[0].P4col1[0].p4Line16aFamilyName[0]') ;
	writeText('petitioner_child_2_other_name_given',  'form1[0].Page4[0].P4col1[0].p4Line16bGivenName[0]') ;
	writeText('petitioner_child_2_other_name_middle',  'form1[0].Page4[0].P4col1[0].p4Line16cMiddleName[0]') ;
	
	writeText('petitioner_child_2_address_street_number_name',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17StreetNumberName[0]') ;
	
	checkBox('petitioner_child_2_o',
		array(
			'Apt' => 'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17Unit[0]' ,
			'Ste' => 'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17Unit[1]' ,
			'Flr' => 'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17Unit[2]'
		)
	) ;
	
	writeText('petitioner_child_2_apt_ste_flr_number',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17AptSteFlrNumber[0]') ;
	writeText('petitioner_child_2_address_city',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17CityOrTown[0]') ;
	writeText('petitioner_child_2_address_state',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17State[0]') ;
	writeText('petitioner_child_2_address_zip_code',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17ZipCode[0]') ;
	writeText('petitioner_child_2_address_province',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17Province[0]') ;
	writeText('petitioner_child_2_address_postal_code',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17PostalCode[0]') ;
	writeText('petitioner_child_2_address_country',  'form1[0].Page4[0].P4col2[0].p4Line17address[0].p4Line17Country[0]') ;
	
	checkBox('petitioner_child_2_live',
		array(
			'Yes' => 'form1[0].Page4[0].P4col2[0].p4Line18YesNo[0]' ,
			'No' => 'form1[0].Page4[0].P4col2[0].p4Line18YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_child_2_apply',
		array(
			'Yes' => 'form1[0].Page4[0].P4col2[0].p4Line19YesNo[0]' ,
			'No' => 'form1[0].Page4[0].P4col2[0].p4Line19YesNo[1]'
		)
	) ;
	
	writeText('petitioner_child_2_current_immigration_status',  'form1[0].Page4[0].P4col2[0].p4Line20CurrentImmigrationStatus[0]') ;
	
	//Child3
	
	writeText('petitioner_child_3_legal_name_family',  'form1[0].Page4[0].P4col2[0].p4Line21aFamilyName[0]') ;
	writeText('petitioner_child_3_legal_name_given',  'form1[0].Page4[0].P4col2[0].p4Line21bGivenName[0]') ;
	writeText('petitioner_child_3_legal_name_middle',  'form1[0].Page4[0].P4col2[0].p4Line21cMiddleName[0]') ;
	
	checkBox('petitioner_child_3_gender',
		array(
			'M' => 'form1[0].Page4[0].P4col2[0].p4Line22Gender[1]' ,
			'F' => 'form1[0].Page4[0].P4col2[0].p4Line22Gender[0]'
		)
	) ;
	
	writeText('petitioner_child_3_alien_number',  'form1[0].Page4[0].P4col2[0].#subform[1].p4Line23AlienNumber[0]') ;
	writeText('petitioner_child_3_uscis_oan',  'form1[0].Page4[0].P4col2[0].p4Line24USCISNum[0]') ;
	writeText('petitioner_child_3_dob',  'form1[0].Page4[0].P4col2[0].p4Line25DateOfBirth[0]') ;
	
	writeText('petitioner_child_3_other_name_family',  'form1[0].Page4[0].P4col2[0].p4Line26aFamilyName[0]') ;
	writeText('petitioner_child_3_other_name_given',  'form1[0].Page4[0].P4col2[0].p4Line26bGivenName[0]') ;
	writeText('petitioner_child_3_other_name_middle',  'form1[0].Page4[0].P4col2[0].p4Line26cMiddleName[0]') ;
	
	writeText('petitioner_child_3_address_street_number_name',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27StreetNumberName[0]') ;
	
	checkBox('petitioner_child_3_address_o',
		array(
			'Apt' => 'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27Unit[0]' ,
			'Ste' => 'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27Unit[1]' ,
			'Flr' => 'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27Unit[2]'
		)
	) ;
	
	writeText('petitioner_child_3_apt_ste_flr_number',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27AptSteFlrNumber[0]') ;
	writeText('petitioner_child_3_address_city',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27CityOrTown[0]') ;
	writeText('petitioner_child_3_address_state',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27State[0]') ;
	writeText('petitioner_child_3_address_zip_code',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27ZipCode[0]') ;
	writeText('petitioner_child_3_address_province',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27Province[0]') ;
	writeText('petitioner_child_3_address_postal_code',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27PostalCode[0]') ;
	writeText('petitioner_child_3_address_country',  'form1[0].Page5[0].P5col1[0].p4Line27Address[0].p4Line27Country[0]') ;
	
	checkBox('petitioner_child_3_live',
		array(
			'Yes' => 'form1[0].Page5[0].P5col1[0].p4Line28YesNo[0]' ,
			'No' => 'form1[0].Page5[0].P5col1[0].p4Line28YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_child_3_apply',
		array(
			'Yes' => 'form1[0].Page5[0].P5col1[0].p4Line29YesNo[0]' ,
			'No' => 'form1[0].Page5[0].P5col1[0].p4Line29YesNo[1]'
		)
	) ;
	
	writeText('petitioner_child_3_current_immigration_status',  'form1[0].Page5[0].P5col1[0].p4Line30CurrentImmigrationStatus[0]') ;
	
	//Child4
	
	writeText('petitioner_child_4_legal_name_family',  'form1[0].Page5[0].P5col1[0].p4Line31aFamilyName[0]') ;
	writeText('petitioner_child_4_legal_name_given',  'form1[0].Page5[0].P5col1[0].p4Line31bGivenName[0]') ;
	writeText('petitioner_child_4_legal_name_middle',  'form1[0].Page5[0].P5col1[0].p4Line31cMiddleName[0]') ;
	
	checkBox('petitioner_child_4_gender',
		array(
			'M' => 'form1[0].Page5[0].P5col1[0].p4Line32Gender[1]' ,
			'F' => 'form1[0].Page5[0].P5col1[0].p4Line32Gender[0]'
		)
	) ;
	
	writeText('petitioner_child_4_alien_number',  'form1[0].Page5[0].P5col1[0].#subform[1].p4Line33AlienNumber[0]') ;
	writeText('petitioner_child_4_uscis_oan',  'form1[0].Page5[0].P5col1[0].p4Line34USCISNum[0]') ;
	writeText('petitioner_child_4_dob',  'form1[0].Page5[0].P5col1[0].p4Line35DateOfBirth[0]') ;
	
	writeText('petitioner_child_4_other_name_family',  'form1[0].Page5[0].P5col1[0].p4Line36aFamilyName[0]') ;
	writeText('petitioner_child_4_other_name_given',  'form1[0].Page5[0].P5col1[0].p4Line36bGivenName[0]') ;
	writeText('petitioner_child_4_other_name_middle',  'form1[0].Page5[0].P5col1[0].p4Line36cMiddleName[0]') ;
	
	writeText('petitioner_child_4_address_street_number_name',  'form1[0].Page5[0].p4Line37address[0].p4Line37StreetNumberName[0]') ;
	
	checkBox('petitioner_child_4_address_o',
		array(
			'Apt' => 'form1[0].Page5[0].p4Line37address[0].p4Line37Unit[0]' ,
			'Ste' => 'form1[0].Page5[0].p4Line37address[0].p4Line37Unit[1]' ,
			'Flr' => 'form1[0].Page5[0].p4Line37address[0].p4Line37Unit[2]'
		)
	) ;
	
	writeText('petitioner_child_4_apt_ste_flr_number',  'form1[0].Page5[0].p4Line37address[0].p4Line37AptSteFlrNumber[0]') ;
	writeText('petitioner_child_4_address_city',  'form1[0].Page5[0].p4Line37address[0].p4Line37CityOrTown[0]') ;
	writeText('petitioner_child_4_address_state',  'form1[0].Page5[0].p4Line37address[0].p4Line37State[0]') ;
	writeText('petitioner_child_4_address_zip_code',  'form1[0].Page5[0].p4Line37address[0].p4Line37ZipCode[0]') ;
	writeText('petitioner_child_4_address_province',  'form1[0].Page5[0].p4Line37address[0].p4Line37Province[0]') ;
	writeText('petitioner_child_4_address_postal_code',  'form1[0].Page5[0].p4Line37address[0].p4Line37PostalCode[0]') ;
	writeText('petitioner_child_4_address_country',  'form1[0].Page5[0].p4Line37address[0].p4Line37Country[0]') ;
	
	checkBox('petitioner_child_4_live',
		array(
			'Yes' => 'form1[0].Page5[0].p4Line38YesNo[0]' ,
			'No' => 'form1[0].Page5[0].p4Line38YesNo[1]'
		)
	) ;
	
	checkBox('petitioner_child_4_apply',
		array(
			'Yes' => 'form1[0].Page5[0].p4Line39YesNo[0]' ,
			'No' => 'form1[0].Page5[0].p4Line39YesNo[1]'
		)
	) ;
	
	writeText('petitioner_child_4_current_immigration_status',  'form1[0].Page5[0].p4Line40CurrentImmigrationStatus[0]') ;
	
	//PART4 : END 
	
	//PART5 : START
	
	checkBox('petitioner_ethnicity',
		array(
			'Hispanic or Latino' => 'form1[0].Page5[0].p4Line1Ethnicity[1]' ,
			'Not Hispanic or Latino' => 'form1[0].Page5[0].p4Line1Ethnicity[0]'
		)
	) ;
	
	checkBoxMulti('petitioner_race',
		array(
			'White' => 'form1[0].Page5[0].p4Line2White[0]' ,
			'Asian' => 'form1[0].Page5[0].p4Line2Asian[0]' ,
			'Black or African American' => 'form1[0].Page5[0].p4Line2Black[0]' ,
			'American Indian or Alaska Native' => 'form1[0].Page5[0].p4Line2Indian[0]' ,
			'Native Hawaiian or Other Pacific Islander' => 'form1[0].Page5[0].p4Line2Hawaiian[0]'
		)
	) ; 
	
	writeText('petitioner_height_feet',  'form1[0].Page5[0].p4Line3HeightFeet[0]') ;
	writeText('petitioner_height_inches',  'form1[0].Page5[0].p4Line3HeightInches[0]') ;

	$weight = getFieldLC(petitioner_weight) ;
	$efs['form1[0].Page5[0].p5Line4WeightPounds1[0]'] = ucfirst(substr( $weight, -3,-2 )) ;
	$efs['form1[0].Page5[0].p5Line4WeightPounds2[0]'] = ucfirst(substr( $weight, -2,-1 )) ;
	$efs['form1[0].Page5[0].p5Line4WeightPounds3[0]'] = ucfirst(substr( $weight, -1 )) ;

	checkBox('petitioner_eyecolor',
		array(
			'Blue' => 'form1[0].Page5[0].p5Line5EyeColor[0]' ,
			'Green' => 'form1[0].Page5[0].p5Line5EyeColor[1]' ,
			'Hazel' => 'form1[0].Page5[0].p5Line5EyeColor[2]' ,
			'Pink' => 'form1[0].Page5[0].p5Line5EyeColor[3]' ,
			'Maroon' => 'form1[0].Page5[0].p5Line5EyeColor[4]' ,
			'Brown' => 'form1[0].Page5[0].p5Line5EyeColor[5]' ,
			'Black' => 'form1[0].Page5[0].p5Line5EyeColor[6]' ,
			'Unknown/Other' => 'form1[0].Page5[0].p5Line5EyeColor[7]' ,
			'Gray' => 'form1[0].Page5[0].p5Line5EyeColor[8]'
		)
	) ; 
	
	checkBox('petitioner_haircolor',
		array(
			'Bald (No Hair)' => 'form1[0].Page5[0].p5Line6HairColor[0]' ,
			'Blond' => 'form1[0].Page5[0].p5Line6HairColor[1]' ,
			'Gray' => 'form1[0].Page5[0].p5Line6HairColor[2]' ,
			'Sandy' => 'form1[0].Page5[0].p5Line6HairColor[3]' ,
			'Unknown/Other' => 'form1[0].Page5[0].p5Line6HairColor[4]' ,
			'White' => 'form1[0].Page5[0].p5Line6HairColor[5]' ,
			'Red' => 'form1[0].Page5[0].p5Line6HairColor[6]' ,
			'Brown' => 'form1[0].Page5[0].p5Line6HairColor[7]' ,
			'Black' => 'form1[0].Page5[0].p5Line6HairColor[8]'
		)
	) ;
	
	//PART5 : END 
	
	//PART6 : START
	
	writeText('petitioner_i924_receipt_number', 'form1[0].Page6[0].p6Line1ReceiptNumber[0]') ;
	
	checkBox('RC_entrepreneur_termination',
		array(
			'Yes' => 'form1[0].Page6[0].p6Line2YesNo[0]' ,
			'No' => 'form1[0].Page6[0].p6Line2YesNo[1]'
		)
	) ;
	
	writeText('NCE_address_street_number_name', 'form1[0].Page6[0].p6Line3StreetNumberName[0]') ;
	
	checkBox('NCE_address_o',
		array(
			'Apt' => 'form1[0].Page6[0].p6Line3Unit[0]' ,
			'Ste' => 'form1[0].Page6[0].p6Line3Unit[1]' ,
			'Flr' => 'form1[0].Page6[0].p6Line3Unit[2]'
		)
	) ;
	
	writeText('NCE_apt_ste_flr_number', 'form1[0].Page6[0].p6Line3AptSteFlrNumber[0]') ;
	writeText('NCE_address_city', 'form1[0].Page6[0].p6Line3CityOrTown[0]') ;
	writeText('NCE_address_state', 'form1[0].Page6[0].p6Line3State[0]') ;
	writeText('NCE_address_zip_code', 'form1[0].Page6[0].p6Line3ZipCode[0]') ;
	
	writeText('NCE_telephone', 'form1[0].Page6[0].p6Line4Phone[0]') ;
	writeText('NCE_website_url', 'form1[0].Page6[0].p6Line5Web[0]') ;
	writeText('NCE_included_industries', 'form1[0].Page6[0].p6Line6NAICS[0]') ;
	writeText('NCE_IRS_tax_identification_number', 'form1[0].Page6[0].p6Line7TaxID[0]') ;
	writeText('NCE_date_business_establishment', 'form1[0].Page6[0].p6Line8BusinessEstablished[0]') ;
	writeText('NCE_date_entrepreneur_initial_investment', 'form1[0].Page6[0].p6Line9InitialInvestment[0]') ;
	writeText('NCE_amount_entrepreneur_initial_investment', 'form1[0].Page6[0].p6Line10InitialInvestment[0]') ;
	
	writeText('NCE_date_subsequent_investment', 'form1[0].Page6[0].p6Line11aSubsequentInvestment[0]') ;
	writeText('NCE_amount_subsequent_investment', 'form1[0].Page6[0].p6Line11bSubsequentInvestment[0]') ;
	writeText('NCE_type_subsequent_investment', 'form1[0].Page6[0].p6Line11cSubsequentInvestment[0]') ;
	
	writeText('NCE_amount_capital_investment', 'form1[0].Page6[0].p6Line12CapitalInvestment[0]') ;
	
	checkBox('NCE_change_in_assets',
		array(
			'Yes' => 'form1[0].Page6[0].p6Line13YesNo[0]' ,
			'No' => 'form1[0].Page6[0].p6Line13YesNo[1]'
		)
	) ;
	
	writeText('NCE_amount_eb5_investment', 'form1[0].Page6[0].p6Line14EB5CapInvestment[0]') ;
	writeText('NCE_number_eb5_investors', 'form1[0].Page6[0].p6Line15EBInvestors[0]') ;
	
	checkBox('NCE_unlawful_activity',
		array(
			'Yes' => 'form1[0].Page6[0].p6Line16YesNo[0]' ,
			'No' => 'form1[0].Page6[0].p6Line16YesNo[1]'
		)
	) ;
	
	//PART6 : END
	
	//PART7 : START
	
	writeText('JCE_1_name', 'form1[0].Page7[0].p7Line1JCE[0]') ;
	writeText('JCE_1_address_street_number_name', 'form1[0].Page7[0].p7Line2Address[0].p7Line2StreetNumberName[0]') ;
	
	checkBox('JCE_1_address_o',
		array(
			'Apt' => 'form1[0].Page7[0].p7Line2Address[0].p7Line2Unit[0]' ,
			'Ste' => 'form1[0].Page7[0].p7Line2Address[0].p7Line2Unit[1]' ,
			'Flr' => 'form1[0].Page7[0].p7Line2Address[0].p7Line2Unit[2]'
		)
	) ;
	
	writeText('JCE_1_apt_ste_flr_number', 'form1[0].Page7[0].p7Line2Address[0].p7Line2AptSteFlrNumber[0]') ;
	writeText('JCE_1_address_city', 'form1[0].Page7[0].p7Line2Address[0].p7Line2CityOrTown[0]') ;
	writeText('JCE_1_address_state', 'form1[0].Page7[0].p7Line2Address[0].p7Line2State[0]') ;
	writeText('JCE_1_address_zip_code', 'form1[0].Page7[0].p7Line2Address[0].p7Line2ZipCode[0]') ;
	
	writeText('JCE_2_name', 'form1[0].Page7[0].p7Line3JCE[0]') ;
	writeText('JCE_2_address_street_number_name', 'form1[0].Page7[0].p7Line4Address[0].p7Line4StreetNumberName[0]') ;
	
	checkBox('JCE_2_address_o',
		array(
			'Apt' => 'form1[0].Page7[0].p7Line4Address[0].p7Line4Unit[0]' ,
			'Ste' => 'form1[0].Page7[0].p7Line4Address[0].p7Line4Unit[1]' ,
			'Flr' => 'form1[0].Page7[0].p7Line4Address[0].p7Line4Unit[2]'
		)
	) ;
	
	writeText('JCE_2_apt_ste_flr_number', 'form1[0].Page7[0].p7Line4Address[0].p7Line4AptSteFlrNumber[0]') ;
	writeText('JCE_2_address_city', 'form1[0].Page7[0].p7Line4Address[0].p7Line4CityOrTown[0]') ;
	writeText('JCE_2_address_state', 'form1[0].Page7[0].p7Line4Address[0].p7Line4State[0]') ;
	writeText('JCE_2_address_zip_code', 'form1[0].Page7[0].p7Line4Address[0].p7Line4ZipCode[0]') ;
	
	writeText('JCE_3_name', 'form1[0].Page7[0].p7Line5JCE[0]') ;
	writeText('JCE_3_address_street_number_name', 'form1[0].Page7[0].p7Line6Address[0].p7Line6StreetNumberName[0]') ;
	
	checkBox('JCE_3_address_o',
		array(
			'Apt' => 'form1[0].Page7[0].p7Line6Address[0].p7Line6Unit[0]' ,
			'Ste' => 'form1[0].Page7[0].p7Line6Address[0].p7Line6Unit[1]' ,
			'Flr' => 'form1[0].Page7[0].p7Line6Address[0].p7Line6Unit[2]'
		)
	) ;
	
	writeText('JCE_3_apt_ste_flr_number', 'form1[0].Page7[0].p7Line6Address[0].p7Line6AptSteFlrNumber[0]') ;
	writeText('JCE_3_address_city', 'form1[0].Page7[0].p7Line6Address[0].p7Line6CityOrTown[0]') ;
	writeText('JCE_3_address_state', 'form1[0].Page7[0].p7Line6Address[0].p7Line6State[0]') ;
	writeText('JCE_3_address_zip_code', 'form1[0].Page7[0].p7Line6Address[0].p7Line6ZipCode[0]') ;
	
	checkBox('JCE_unlawful_activity',
		array(
			'Yes' => 'form1[0].Page7[0].p7Line7YesNo[1]' ,
			'No' => 'form1[0].Page7[0].p7Line7YesNo[0]'
		)
	) ;
	
	//PART7 : END
	
	//PART8 : START
	
	writeText('NCE_employees_number_initial_investment', 'form1[0].Page7[0].p8Line1aFullTimeInitial[0]') ;
	writeText('NCE_employees_number_filing_petition', 'form1[0].Page7[0].p8Line1bFullTimeTimeofFiling[0]') ;
	writeText('NCE_employees_difference', 'form1[0].Page7[0].p8Line1cDifference[0]') ;
	writeText('NCE_amount_eb5_not_invested', 'form1[0].Page7[0].p8Line1dCapInvested[0]') ;
	
	writeText('NCE_jobs_by_eb5_investment', 'form1[0].Page7[0].p8Line2aIndirectFullTime[0]') ;
	writeText('NCE_amount_eb5_jce_transfer', 'form1[0].Page7[0].p8Line2bCapTransferred[0]') ;
	writeText('NCE_amount_jce_not_invested', 'form1[0].Page7[0].p8Line2cCapInvestedNotFunded[0]') ;
	
	checkBox('NCE_troubled_business_investment',
		array(
			'Yes' => 'form1[0].Page7[0].p8Line3YesNo[1]' ,
			'No' => 'form1[0].Page7[0].p8Line3YesNo[0]'
		)
	) ;
	
	writeText('NCE_troubled_positions_maintained', 'form1[0].Page7[0].p8Line4aMaintained[0]') ;
	writeText('NCE_troubled_positions_created', 'form1[0].Page7[0].P5_Line7[0]') ;
	writeText('NCE_job_creation_expected_time', 'form1[0].Page8[0].p8Line5JobsExpected[0]') ;
	
	checkBox('NCE_business_plan_change_by_i526',
		array(
			'Yes' => 'form1[0].Page8[0].p8Line6YesNo[1]' ,
			'No' => 'form1[0].Page8[0].p8Line6YesNo[0]'
		)
	) ;
	
	//PART8 : END 
	
	//PART9 : START
	
	checkBox('petitioner_statement',
		array(
			'I can read and understand English, and I have read and understand every question and instruction on this petition and my answer to every question.' => 'form1[0].Page8[0].p9Line1Interpreter[0]' ,
			'The interpreter named in Part 10. read to me every question and instruction on this petition and my answer to every question in 1.b. ....X.... a language in which I am fluent. I understood all of this information as interpreted.' => 'form1[0].Page8[0].p9Line1Interpreter[1]' ,
			'At my request, the preparer named in Part 11 ....X....prepared this petition for me based only upon information I provided or authorized.'  => 'form1[0].Page8[0].p9Line2Preparer[0]'
		)
	) ;
	
	switch (getFieldLC('petitioner_statement'))
	{
			
		case 'The interpreter named in Part 10. read to me every question and instruction on this petition and my answer to every question in 1.b. ....X.... a language in which I am fluent. I understood all of this information as interpreted.' :
			writeText('petitioner_language',  'form1[0].Page8[0].p9Line1bLanguage[0]') ;
			break ;
		
		case 'At my request, the preparer named in Part 11 ....X....prepared this petition for me based only upon information I provided or authorized.' :
			writeText('petitioner_preparer_name',  'form1[0].Page8[0].p9Line2PreparerName[0]') ;
			break ;
		
	}
	
	writeText('petitioner_contact_phone',  'form1[0].Page8[0].P8_Line3_DaytimePhoneNumber[0]') ;
	writeText('petitioner_contact_mobile',  'form1[0].Page8[0].P8_Line4_MobilePhoneNumber[0]') ;
	writeText('petitioner_contact_email',  'form1[0].Page8[0].P8_Line5_EmailAddress[0]') ;
	
	//PART9 : END  
	
	//PART10 : START
	
	writeText('interpreter_name_family', 'form1[0].Page8[0].p10Line1aInterpretersFamilyName[0]') ;
	writeText('interpreter_name_first', 'form1[0].Page8[0].p10Line1bInterpretersGivenName[0]') ;
	writeText('interpreter_organisation', 'form1[0].Page8[0].p10Line2NameofBusinessor[0]') ;
	
	writeText('interpreter_address_street_number_name', 'form1[0].Page9[0].p10Line3StreetNumberName[0]') ;
	
	checkBox('intrepreter_address_o',
		array(
			'Ste' => 'form1[0].Page9[0].p10Line3Unit[0]' ,
			'Flr' => 'form1[0].Page9[0].p10Line3Unit[1]' ,
			'Apt' => 'form1[0].Page9[0].p10Line3Unit[2]'
		)
	) ;
	
	writeText('interpreter_address_apt_ste_flr_number', 'form1[0].Page9[0].p10Line3AptSteFlrNumber[0]') ;
	writeText('interpreter_address_city', 'form1[0].Page9[0].p10Line3CityTown[0]') ;
	writeText('interpreter_address_state', 'form1[0].Page9[0].p10Line3State[0]') ;
	writeText('interpreter_address_zip_code', 'form1[0].Page9[0].p10Line3ZipCode[0]') ;
	writeText('interpreter_address_province', 'form1[0].Page9[0].p10Line3Province[0]') ;
	writeText('interpreter_address_postal_code', 'form1[0].Page9[0].p10Line3PostalCode[0]') ;
	writeText('interpreter_address_country', 'form1[0].Page9[0].p10Line3Country[0]') ;
	
	writeText('interpreter_contact_phone', 'form1[0].Page9[0].p10Line4Phone[0]') ;
	writeText('interpeter_contact_mobile', 'form1[0].Page9[0].p10Line5MobilePhone[0]') ;
	writeText('interpreter_contact_email', 'form1[0].Page9[0].p10Line6Email[0]') ;
	
	writeText('interpreter_language', 'form1[0].Page9[0].p10Language[0]') ;
	
	//PART10 : END
	
	//PART11 : START
	
	writeText('preparer_name_family', 'form1[0].Page9[0].p11Line1aFamilyName[0]') ;
	writeText('preparer_name_given', 'form1[0].Page9[0].p11Line1bPreparersGivenName[0]') ;
	writeText('preparer_name_business', 'form1[0].Page9[0].p11Line2NameofBusinessor[0]') ;
	
	writeText('preparer_address_street_number_name', 'form1[0].Page9[0].p11Line3StreetNumberName[0]') ;
	
	checkBox('preparer_address_o',
		array(
			'Ste' => 'form1[0].Page9[0].p11Line3Unit[0]' ,
			'Flr' => 'form1[0].Page9[0].p11Line3Unit[1]' ,
			'Apt' => 'form1[0].Page9[0].p11Line3Unit[2]'
		)
	) ;
	
	writeText('preparer_address_apt_ste_flr_number', 'form1[0].Page9[0].p11Line3AptSteFlrNumber[0]') ;
	writeText('preparer_address_city', 'form1[0].Page9[0].p11Line3CityTown[0]') ;
	writeText('preparer_address_state', 'form1[0].Page9[0].p11Line3State[0]') ;
	writeText('preparer_address_zip_code', 'form1[0].Page9[0].p11Line3ZipCode[0]') ;
	writeText('preparer_address_province', 'form1[0].Page9[0].p11Line3Province[0]') ;
	writeText('preparer_address_postal_code', 'form1[0].Page9[0].p11Line3PostalCode[0]') ;
	writeText('preparer_address_country', 'form1[0].Page9[0].p11Line3Country[0]') ;
	
	writeText('preparer_address_phone', 'form1[0].Page9[0].p11Line4Phone[0]') ;
	writeText('preparer_address_mobile', 'form1[0].Page9[0].p11Line5MobilePhone[0]') ;
	writeText('preparer_address_email', 'form1[0].Page9[0].p11Line6Email[0]') ;
	
	checkBox('preparer_statement',
		array(
			"I am not an attorney or accredited representative but have prepared this form on behalf of the authorized individual and with the authorized individual's consent." => 'form1[0].Page9[0].p11Line7Attorney[0]' ,
			"I am an attorney or accredited representative and have prepared this form on behalf of the authorized individual and with the authorized individual's consent." => 'form1[0].Page9[0].p11Line7Attorney[1]'
		)
	) ;
	
	//PART11 : END 
	
	//PART12 : START
	
	writeText('preparer_additional_name_family',  'form1[0].Page11[0].P11col1[0].p2Line1afamilyName[0]') ;
	writeText('preparer_additional_name_given',  'form1[0].Page11[0].P11col1[0].p2Line1bGivenName[0]') ;
	writeText('preparer_additional_name_middle',  'form1[0].Page11[0].P11col1[0].p2Line1cMiddleName[0]') ;
	writeText('preparer_additional_alien_number',  'form1[0].Page11[0].P11col1[0].p2Line2AlienNumber[0]') ;
	
	writeText('preparer_additional_1_page_number',  'form1[0].Page11[0].P11col1[0].p12Line3aPageNum[0]') ;
	writeText('preparer_additional_1_part_number',  'form1[0].Page11[0].P11col1[0].p12Line3bPartNum[0]') ;
	writeText('preparer_additional_1_item_number',  'form1[0].Page11[0].P11col1[0].p12Line3cItemNum[0]') ;
	writeText('preparer_additional_info_1',  'form1[0].Page11[0].P11col1[0].p12Line3dNarrative[0]') ;
	
	writeText('preparer_additional_2_page_number',  'form1[0].Page11[0].P11col1[0].p12Line4aPageNum[0]') ;
	writeText('preparer_additional_2_part_number',  'form1[0].Page11[0].P11col1[0].p12Line4bPartNum[0]') ;
	writeText('preparer_additional_2_item_number',  'form1[0].Page11[0].P11col1[0].p12Line4cItemNum[0]') ;
	writeText('preparer_additional_info_2',  'form1[0].Page11[0].P11col1[0].p12Line4dNarrative[0]') ;
	
	writeText('preparer_additional_3_page_number',  'form1[0].Page11[0].P11col2[0].p12Line5sPageNum[0]') ;
	writeText('preparer_additional_3_part_number',  'form1[0].Page11[0].P11col2[0].p12Line5bPartNum[0]') ;
	writeText('preparer_additional_3_item_number',  'form1[0].Page11[0].P11col2[0].p12Line5cItemNum[0]') ;
	writeText('preparer_additional_info_3',  'form1[0].Page11[0].P11col2[0].p12Line5dNarrative[0]') ;
	
	writeText('preparer_additional_4_page_number',  'form1[0].Page11[0].P11col2[0].p12Line6aPage[0]') ;
	writeText('preparer_additional_4_part_number',  'form1[0].Page11[0].P11col2[0].p12Line6bPartNum[0]') ;
	writeText('preparer_additional_4_item_number',  'form1[0].Page11[0].P11col2[0].p12Line6cItemNum[0]') ;
	writeText('preparer_additional_info_4',  'form1[0].Page11[0].P11col2[0].p12Line6dNarrative[0]') ;
	
	writeText('preparer_additional_5_page_number',  'form1[0].Page11[0].P11col2[0].p12Line7aPageNum[0]') ;
	writeText('preparer_additional_5_part_number',  'form1[0].Page11[0].P11col2[0].p12Line7bPartNum[0]') ;
	writeText('preparer_additional_5_item_number',  'form1[0].Page11[0].P11col2[0].p12Line7cItemNum[0]') ;
	writeText('preparer_additional_info_5',  'form1[0].Page11[0].P11col2[0].p12Line7dNarrative[0]') ;
	
	//PART12 : END  
	
	if (!$efs)
	{
		echo 'Error: No I-829 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}

?>