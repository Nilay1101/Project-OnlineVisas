<?php

    // Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	$section->writetext('Department of Homeland Security', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Re: ' . getFieldLC('Beneficiary_Name')  . ', '  . getFieldLC('Visa_Type'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('To Whom It May Concern:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('My name is ' . getFieldLC('P_1_expert_3') . ' , I hold the position ' . getFieldLC('P_1_expert_3_bio') .  '.', $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets the following '  . getFieldLC('Visa_Type') . ' criteria:', $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets <strong>criteria 1</strong>, <em>participation to a significant extent in a prior season with a major United States sports league, as</em> ' . getFieldLC('P_1_prior_season'), $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets <strong>criteria 2</strong>, <em>evidence of participation to a significant extent in international competition with a national team,</em> ' . getFieldLC('P_1_national_team'), $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets <strong>criteria 4</strong>, <em>written statement from an official of the governing body of his sport detailing how he is internationally recognized,</em> ' . getFieldLC('P_1_gov_body_official'), $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets <strong>criteria 5</strong>, <em>written statement from a member of a recognized expert in the sport which details how</em> ' . getFieldLC('Beneficiary_Name')  . ' <em>is internationally recognized,</em> ' . getFieldLC('P_1_peer'), $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets <strong>criteria 6</strong>, <em>evidence that</em> ' . getFieldLC('Beneficiary_Name')  . ' <em>has international rankings, as they are currently ranked</em> ' . getFieldLC('P_1_ranking'), $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' meets <strong>criteria 7</strong>, <em>evidence that</em> ' . getFieldLC('Beneficiary_Name')  . ' <em>has received significant honors and awards in the sport.</em>' . getFieldLC('P_1_honors'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('As a leader in their sport, ' . getFieldLC('Beneficiary_Name')  . ' is an internationally recognized athlete and meets the ' . getFieldLC('Visa_Type') .  ' "exceptional ability" criteria. Please accept this letter as written consultation of ' . getFieldLC('Beneficiary_Name')  . ' achievements in the sport of '  . getFieldLC('P_1_sport') . '.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraL) ;
	$section->writetext(getFieldLC('P_1_expert_3'), $fontR, $paraL) ;


?>