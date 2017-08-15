<?php

    // Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	$section->writetext('Department of Homeland Security', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('To Whom It May Concern:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('I, ' . getFieldLC('P_1_expert_5') . ' , am qualified to write this letter because ' . getFieldLC('P_1_expert_5_bio') .  '.', $fontR, $paraL) ;
	
	$section->writetext('I have been asked to <strong>provide my expert opinion on the international recognition and exceptional ability of</strong> ' . getFieldLC('Beneficiary_Name') . ' for their '  . getFieldLC('Visa_Type') . ' application. I have been provided with the '  . getFieldLC('Visa_Type') . ' criteria and have assessed their accomplishments as follows:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('Beneficiary_Title')  . ' ' . getFieldLC('Beneficiary_Name')  . ' has competed to a significant extent in a <strong>prior season with a major United States sports league (Criteria 1)</strong> ' . getFieldLC('P_1_prior_season') , $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('Beneficiary_Title')  . ' ' . getFieldLC('Beneficiary_Name')  . ' has <strong>participated to a significant extent in international competition with a national team (Criteria 2)</strong> ' . getFieldLC('P_1_national_team'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('Beneficiary_Title')  . ' ' .  getFieldLC('Beneficiary_Name')  . ' currently has an <strong>international World ranking (Criteria 6)</strong> '  . getFieldLC('P_1_ranking'), $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('Beneficiary_Title')  . ' ' . getFieldLC('Beneficiary_Name')  . ' has received multiple <strong>significant honors or awards (Criteria 7)</strong> in the sport of '  . getFieldLC('P_1_sport') .  '. ' . getFieldLC('P_1_honors') , $fontR, $paraL) ;
	addNewLine(2) ;
	
	
	$section->writetext('Sincerely,', $fontR, $paraL) ;
	$section->writetext(getFieldLC('P_1_expert_5'), $fontR, $paraL) ;
	
?>