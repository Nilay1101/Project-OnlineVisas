<?php

	$inputFile = 'document-templates/i-765.pdf' ;
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
	
	checkBox('apply_status',
		array(
			'Permission to accept employment.' => 'form1[0].#subform[0].applying[0]' ,
			'Replacement (of lost employment authorization document).' => 'form1[0].#subform[0].applying[1]' ,
			'Renewal of my permission to accept employment (attach a copy of your previous employment authorization document).' => 'form1[0].#subform[0].applying[2]'
		)
	) ;
	
	writeText('apply_name_full',  'form1[0].#subform[0].Line1_FamilyName[0]') ;
	writeText('apply_name_other1',  'form1[0].#subform[0].other_names[0]') ;
	writeText('apply_name_other2',  'form1[0].#subform[0].other_names[1]') ;
	writeText('apply_address_street',  'form1[0].#subform[0].Line3_StreetNumberName[0]') ;
	writeText('apply_address_apt',  'form1[0].#subform[0].apt_number[0]') ;
	writeText('apply_address_city',  'form1[0].#subform[0].Line3_CityOrTown[0]') ;
	
	writeText('apply_address_state',  'form1[0].#subform[0].Line3_State[0]') ;
	
	writeText('apply_address_zip',  'form1[0].#subform[0].Line3_ZipCode[0]') ;
	writeText('apply_citizenship',  'form1[0].#subform[0].county_of_citizenship[0]') ;
	writeText('apply_pob',  'form1[0].#subform[0].place_of_birth[0]') ;
	writeText('apply_dob',  'form1[0].#subform[0].Date_of_Birth[0]') ;
	
	checkBox('apply_gender',
		array(
			'M' => 'form1[0].#subform[0].Gender[0]' ,
			'F' => 'form1[0].#subform[0].Gender[1]'
		)
	) ;
	
	checkBox('apply_marital_status',
		array(
			'Single' => 'form1[0].#subform[0].Line8_Marital[2]' ,
			'Married' => 'form1[0].#subform[0].Line8_Marital[0]' ,
			'Divorced' => 'form1[0].#subform[0].Line8_Marital[3]' ,
			'Widowed' => 'form1[0].#subform[0].Line8_Marital[4]' ,
			
		)
	) ;
	
	writeText('apply_ssn',  'form1[0].#subform[0].ssn_s[0]') ;
	writeText('apply_alien_no',  'form1[0].#subform[0].alien_re_number[0]') ;
	
	checkBox('apply_ea',
		array(
			'Yes' => 'form1[0].#subform[0].Line11[1]' ,
			'No' => 'form1[0].#subform[0].Line11[0]'
		)
	) ;
	
	switch (getFieldLC('apply_ea'))
	{
			
		case 'Yes' :
			writeText('apply_ea_office',  'form1[0].#subform[0].#area[0].Line11_ins_office[0]') ;
			writeText('apply_ea_dates',  'form1[0].#subform[0].#area[0].Line11_Date[0]') ;
			writeText('apply_ea_result',  'form1[0].#subform[0].#area[0].Line11_results[0]') ;
			break ;
		
	}
	
	
	writeText('apply_last_entry_us_doe',  'form1[0].#subform[0].Line12_Date_of_last_entry[0]') ;
	writeText('apply_last_entry_us_poe',  'form1[0].#subform[0].place_entry[0]') ;
	writeText('apply_last_entry_us_status',  'form1[0].#subform[0].manner[0]') ;
	writeText('apply_current_immig_status',  'form1[0].#subform[0].status[0]') ;
	writeText('apply_ec_16_1',  'form1[0].#subform[0].#area[1].section_1[0]') ;
	writeText('apply_ec_16_2',  'form1[0].#subform[0].#area[1].section_2[0]') ;
	writeText('apply_ec_16_3',  'form1[0].#subform[0].#area[1].section_3[0]') ;
	writeText('apply_ec_17_degree',  'form1[0].#subform[1].section_1[4]') ;
	writeText('apply_ec_17_ename',  'form1[0].#subform[1].section_1[5]') ;
	writeText('apply_ec_17_ecompany',  'form1[0].#subform[1].section_1[3]') ;
	writeText('apply_ec_18',  'form1[0].#subform[1].section_1[1]') ;
	writeText('apply_ec_19',  'form1[0].#subform[1].section_1[2]') ;
	
	checkBox('apply_crime_arrest',
		array(
			'Yes' => 'form1[0].#subform[1].Line19b[0]' ,
			'No' => 'form1[0].#subform[1].Line19b[1]'
		)
	) ;
	
	writeText('apply_tn',  'form1[0].#subform[1].telephone4[0]') ;
	writeText('apply_name_printed',  'form1[0].#subform[1].print_name[0]') ;
	writeText('apply_address',  'form1[0].#subform[1].last_address[0]') ;
	
	
	if (!$efs)
	{
		echo 'Error: No I-765 data found.' ;
		exit ;
	}
	foreach ($efs as $efk => $efv) {
		if ($efv) {
			$PDFfields[$efk]->setValue($efv) ;
		}
	}

	
?>