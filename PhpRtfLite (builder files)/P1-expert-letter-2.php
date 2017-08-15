<?php

    // Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(2) ;
	
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	$section->writetext('Department of Homeland Security', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Re: ' . getFieldLC('Beneficiary_Name')  . ' , '  . getFieldLC('Visa_Type'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('To Whom It May Concern:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('My name is ' . getFieldLC('P_1_expert_2') . ' . ' . getFieldLC('P_1_expert_2_bio') .  ' . I am an expert in the sport and I have been asked to evaluate professional '  . getFieldLC('P_1_sport') . ' player ' . getFieldLC('Beneficiary_Name')  . ' in light of the ' . getFieldLC('Visa_Type') .  ' criteria', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion One</em> – <strong>Having participated to a significant extent in a prior season with a major United States sports league</strong> - ' . getFieldLC('P_1_prior_season'), $fontR, $paraL) ;

	
	$section->writetext('<em>Criterion Two</em> - <strong>Evidence of having participated to a significant extent in international competition with a national team</strong> – ' . getFieldLC('P_1_national_team'), $fontR, $paraL) ;
	
	$section->writetext('<em>Criterion Three</em> - <strong>Participation to significant extent in a prior season for a U.S. college or university in an intercollegiate competition</strong> - ' . getFieldLC('P_1_us_college_team'), $fontR, $paraL) ;
	
	$section->writetext('<em>Criterion Four</em> - <strong>A written statement from an official of a major U.S. sports league or an official of the governing body of the sport which details how you or your team is internationally recognized</strong> –  ' . getFieldLC('P_1_gov_body_official'), $fontR, $paraL) ;
	
	$section->writetext('<em>Criterion Five</em> –  <strong>A written statement from a member of the sports media or a recognized expert in the sport which details how you or your team is internationally recognized</strong> – ' . getFieldLC('P_1_peer'), $fontR, $paraL) ;
	
	$section->writetext('<em>Criterion Six</em> - <strong>Evidence that you or your team is ranked, if the sport has international rankings</strong> – ' . getFieldLC('P_1_ranking'), $fontR, $paraL) ;
	
	$section->writetext('<em>Criterion Seven</em> - <strong>Evidence that you or your team has received a significant honor or award in the sport</strong> – ' . getFieldLC('P_1_honors'), $fontR, $paraL) ;
	
	$section->writetext( getFieldLC('Beneficiary_Name')  . ' exceeds the number of ' . getFieldLC('Visa_Type') .  ' visa criteria by meeting seven of the seven. ', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraL) ;
	$section->writetext(getFieldLC('P_1_expert_2'), $fontR, $paraL) ;


?>