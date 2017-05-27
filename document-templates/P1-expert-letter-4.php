<?php

    // Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	$section->writetext('Department of Homeland Security', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('USCIS Adjudicator:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('My name is ' . getFieldLC('P_1_expert_4') . ' , and I am ' . getFieldLC('P_1_expert_4_bio') .  '.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext( 'My career in '  . getFieldLC('P_1_sport') . ' along with my accomplishments and success within my career would qualify me as an expert in the sport to provide my opinion on ' . getFieldLC('Beneficiary_Name')  . '’s exceptional ability as a '  . getFieldLC('P_1_sport') . ' player.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('Beneficiary_Name')  . ' <strong>has participated to a significant extent in a prior season with a major United States sports league.</strong> ' . getFieldLC('P_1_prior_season') . '. ' . getFieldLC('Beneficiary_Name')  . ' has also <strong>participated in international competition with a national team</strong>. While representing ' . getFieldLC('beneficiary_citizenship_country') . ' ,' . getFieldLC('Beneficiary_Name')  . ' participated in international competition with a national team. ' . getFieldLC('P_1_national_team'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('Beneficiary_Name')  . ' <strong>has participated for a U.S. college or university in intercollegiate competition</strong>. ' . getFieldLC('P_1_us_college_team') . '.' . getFieldLC('Beneficiary_Name')  . 'has also received a <strong>written statement from an official of a major U.S. sports league or an official of the governing body of the sport</strong> from '  . getFieldLC('P_1_gov_body_official') . '.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('Beneficiary_Name')  . ' has received <strong>a written statement from a member of the sports</strong> media or a recognized expert in the sport which displays how ' . getFieldLC('Beneficiary_Name')  . ' is internationally recognized. ' . getFieldLC('P_1_peer') . '. ' . getFieldLC('Beneficiary_Name')  . ' has earned <strong>international rankings</strong> through competition.'  . getFieldLC('P_1_ranking'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('Beneficiary_Name')  . ' earned many <strong>significant honors and awards</strong> in '  . getFieldLC('P_1_sport') . '. '  . getFieldLC('P_1_honors') , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('Beneficiary_Name')  . ' meets the necessary number of criteria needed to obtain the '  . getFieldLC('Visa_Type') . ' visa status. ' . getFieldLC('Beneficiary_Name')  . ' is an exceptional ability athlete.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraL) ;
	$section->writetext(getFieldLC('P_1_expert_4'), $fontR, $paraL) ;


?>