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
	
	$section->writetext('My name is ' . getFieldLC('P_1_gov_body_official') . ' . I am an official in the sport of ' . getFieldLC('p_1_sport') . ' . ', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('p_1_gov_official_bio') , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Because of my accomplishments established above, I am an expert in the sport and I have been asked to evaluate ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_first') . ' ' .  getFieldLC('beneficiary_name_last') . ' in light of the P-1 visa criteria. ', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion One</em> – <strong>Having participated to a significant extent in a prior season with a major United States sports league</strong> - ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' has played in several professional competitions in ' . getFieldLC('p_1_sport') . ' . The following evidence supports the statement above : ' . getFieldLC('P_1_prior_season') , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion Two</em> - <strong>Evidence of having participated to a significant extent in international competition with a national team</strong> – ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' was selected to represent ' . getFieldLC('beneficiary_citizenship_country') . ' in an international competition. The following evidence supports the statement above : ' . getFieldLC('P_1_national_team') , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion Three</em> - <strong>Evidence of having participated to a significant extent in a prior season for a U.S. college or university in intercollegiate competition</strong> - ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' has participated in numerous intercollegiate competitions. The following evidence supports the statement above : ' . getFieldLC('P_1_us_college_team') , $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion Four</em> - <strong>A written statement from an official of a major U.S. sports league or an official of the governing body of the sport which details how you or your team is internationally recognized</strong> – ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' has received a letter from ' . getFieldLC('P_1_gov_body_official') . ' an official in the sport of ' . getFieldLC('p_1_sport') . ' that confirms ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' has competed in elite competition and details how it is internationally recognized as exceptional as follows: Based on ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . '’s experience and exceptional accomplishments, it is clear that ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' has reached a level of international recognition. This letter meets this criterion. ', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion Five</em> – <strong>A written statement from a member of the sports media or a recognized expert in the sport which details how you or your team is internationally recognized</strong> – ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' has received a written statement form a recognized expert. The following evidence supports the statement above : ' . getFieldLC('P_1_peer'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion Six</em> - <strong>Evidence that you or your team is ranked, if the sport has international rankings</strong> – The following evidence supports the statement above : ' . getFieldLC('P_1_ranking'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>Criterion Seven</em> - <strong>Evidence that you or your team has received a significant honor or award in the sport</strong> – While competing in the sport of p_1_sport , ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . ' achieved many honors and awards. The following evidence supports the statement above : ' . getFieldLC('P_1_honors'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . 'is an internationally recognized athlete. Please accept this written statement detailing ' . getFieldLC('beneficiary_title') . ' ' .  getFieldLC('beneficiary_name_last') . '’s exceptional ability as a ' . getFieldLC('position_job_title'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext(getFieldLC('P_1_gov_body_official'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('p_1_gov_official_contact'), $fontR, $paraL) ;


?>