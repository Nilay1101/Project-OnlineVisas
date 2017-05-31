<?php

// Beneficiary Section
	addNewLine(1) ;
	$section->writetext('Beneficiary', $fontT, $paraT) ;
	addNewLine(1) ;

	$BFTable = $section->addTable() ;   // here goes the table variable
	$BFTable->addRows(1) ;           // and a row is added 


	$BeneficiaryPhotos = getFileForLinkCode($case_id, 'beneficiary_photo') ;    //  here goes link node for the picture, which i dont know......so i keep this unchanged
	// If no photos found, don't show an empty column.
	if (False !== $BeneficiaryPhotos && mysqli_num_rows($BeneficiaryPhotos) > 0)              // this condition is for , if photo is true and sql returns rows > 0
	{
		$BFTable->addColumnsList(array(15-$outputImageWidth, $outputImageWidth)) ;                 //column added
		// Cell 2
		$cellBFR = $BFTable->getCell(1, 2) ;                                                // cell added for picture insertion

		while ($bPhoto = $BeneficiaryPhotos->fetch_assoc() ) {                         //this loop takes title, dimensions of photo and upload it setting its height and width
			$fileName = $bPhoto['file_path'] ;
			$remoteFile = $uploads_dir . '/' . $fileName ;
			$localFile = 'temp/' . $fileName ;                                       
			$data = file_get_contents($remoteFile) ;
			$handle = fopen($localFile, "w") ;
			fwrite($handle, $data) ;
			fclose($handle) ;
			$imageSizeInfo = getimagesize($localFile) ;
			$isWidth = $imageSizeInfo[0] ;
			$isHeight = $imageSizeInfo[1] ;
			$outputHeight = $isHeight / $isWidth * $outputImageWidth ;
			$BFpic = $cellBFR->addImage($localFile) ;
			$BFpic->setWidth($outputImageWidth) ;
			$BFpic->setHeight($outputHeight) ;
			$cellBFR->writeText('<br> <br>') ;
			unlink($localFile) ;                                                              //cool
		}
	}
	else
	{
		// No photos, add a single column
		$BFTable->addColumnsList(array(15)) ;                           // if no photo adding only a single columm, no extra cells generated
	}


	// Cell 1
	$cellBFL = $BFTable->getCell(1, 1) ;

	// Some example text on right
	$cellBFL->writetext(getFieldLC(getFieldLC('beneficiary_first_name') . ' ' . getFieldLC('beneficiary_last_name') . ', a Citizen and National of ' . getFieldLC('beneficiary_citizenship_country') , $fontR, $paraL) ;
	



?>