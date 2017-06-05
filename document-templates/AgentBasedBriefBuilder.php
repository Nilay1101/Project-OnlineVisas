<?php

	// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	showDate();
	addNewLine(1) ;
	
	$section->writetext('United States Department of Homeland Security', $fontR, $paraL) ;
	$section->writetext('United States Citizenship and Immigration Services', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Re : I-129, ' . getFieldLC('petitioner_company_name') . ' , as Agent P-1 Visa Petition for ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' , an alien of exceptional ability as a ' . getFieldLC('position_job_title'), $fontR, $paraL);
	addNewLine(1) ;
	
	$section->writetext('Pursuant to <strong>Section 101 (a) (15) (P) of the Immigration and Nationality Act of 1952, 8 USC § 1101 (a) (15) (P), 8 CFR § 214.2 (p) (1), 22 CFR § 41.56, 59 Fed. Reg. 41, 818-42 (August 15, 1994)</strong>; please find the following enclosed requisite forms and documents submitted herewith, in duplicate, on behalf of ' . getFieldLC('petitioner_company_name') . ' as agent on behalf of ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ', a Citizen and National of ' . getFieldLC('beneficiary_citizenship_country') . '.The Beneficiary in an intending P-1 visa applicant and seeks to enter the United States as a' . getFieldLC('position_job_title'), $fontR, $paraL) ;
	
	$section->writetext('The submitted petition is supported by substantial evidence attached to this Visa Petition. Each piece of evidence is numerically labeled “Exhibits.” Included are letters attesting to the qualifications of the Petitioner and the Beneficiary, explanations of ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . '’s qualifications, as well as his satisfaction of criteria defining him as an "P-1 Exceptional Ability ' . getFieldLC('position_job_title') . ' which has been demonstrated by sustained national or international acclaim," set forth by <strong>8 CFR § 214.2(p)(6).</strong>', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('ATTACHMENTS', $fontB, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('Enclosed please find the following forms and documents to support positive adjudication of his petition:', $fontR, $paraL) ;
	addNewLine(1) ;
	$section->writetext('<bullet> Form G-28 and a check for ', $fontR, $paraL) ;
	$section->writetext('<bullet> Form I-129 Petition for Nonimmigrant Worker and P-1 supplement;', $fontR, $paraL) ;
	$section->writetext('<bullet> ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . '’s Passport from ' . getFieldLC('beneficiary_citizenship_country') . ' and I-94 if applicable ', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('EXHIBITS', $fontB, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('<strong>Exhibit 1 Agent Letter</strong> from ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' as agent, in support of the petition.  This letter establishes the qualifications and international recognition of ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 2 Agent Contract</strong> between ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' and ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 3 Memorandum</strong> dated November 20, 2009 which discussed the requirements for agents and sponsors filing as petitioners for the O and P visa classifications;', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 4 Sponsorship Agreement(s)</strong> between ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' and ' . getFieldLC('Direct_employer_names'), $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 5 Schedule of Daily Activities</strong> for ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 6 Annual Schedules</strong> for ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' for a term of 5 years', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 7 Letter</strong> from ' . getFieldLC('Consultation_Letter_Author'), $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 8 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 9 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 10 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 11 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 12 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 13 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 14 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 15 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 16 </strong>', $fontR, $paraL) ;
	$section->writetext('<strong>Exhibit 17 </strong>', $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('BENEFICIARY', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' is ' . getFieldLC('beneficiary_bio'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('PETITIONER', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('P_1_Petitioners_Bio'), $fontR, $paraL) ;
	
	$section->writetext( 'As Agent, ' . getFieldLC('petitioner_company_name') . ' seeks employment for ' .  getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' as a ' . getFieldLC('position_job_title') . 'for a period of five years for the duration of their agreement.', $fontR, $paraL) ;
	
	$section->writetext('Pursuant to the Memorandum from November 20, 2009 (listed as Exhibit 3), this serves as an agent based petition wherein  ' . getFieldLC('petitioner_company_name') . ' is not the employer, however  ' . getFieldLC('petitioner_company_name') . ' is permitted to petition as agent. ', $fontR, $paraL) ;
	
	$section->writetext('As required by the memorandum, ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' and ' . getFieldLC('Direct_employer_names') . ' have engaged in contracts and provided letters of authorization for the agent to petition on their behalf for services during the term in which ' . getFieldLC('petitioner_company_name') . ' wishes to sponser ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' as a ' . getFieldLC('position_job_title') . 'while competing as a competitor and/or in an ancillary or related function pursuant to the regulations, discussed further in the brief.', $fontR, $paraL) ;
	
	$section->writetext(getFieldLC('petitioner_company_name') . ' will continue to search for additional ancillary or related work within the industry for the duration of  ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') .'’s five year visa.', $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('EMPLOYMENT', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('An athlete meets the criteria for a P-1A athlete visa 8 C.F.R. § 214.2(p)(4 ) if he/she is coming to the United States to perform services which require an internationally recognized athlete Id. at § 214.2(p)(3).  The criteria for a P-1A athlete requires that the athlete must be coming to the US to participate in an athletic competition which has a distinguished reputation and requires the athlete participate in a team that has an international reputation Id. at § 214.2(p)(4)(ii)(A).  The regulation also provides,', $fontR, $paraL) ;
	
	$section->writetext('<strong>Competition, event, or performance</strong> means an activity such as an athletic competition, athletic season, tournament, tour, exhibit, project, entertainment event, or engagement.  Such activity could include short vacations, promotional appearances for the petitioning employer relating to the competition, event, or performance, and stopovers which are <strong>incidental and/or related to the activity</strong>.  An athletic competition or entertainment event could include an entire season of performances.  <strong>A group of related activities will also be considered an event…</strong>.In the case of a P-1 athlete, the event may be the duration of the alien’s contract (Emphasis added).', $fontR, $paraL) ;
	
	$section->writetext('Where the interpretation is clear on its face, it is inappropriate to stretch the plain of meaning of a regulation. See INS v Phinpathya, 464 U.S. 183, 189 (1984). ', $fontR, $paraL) ;
	
	$section->writetext('Under these facts, ' . getFieldLC('beneficiary_title') . getFieldLC('beneficiary_name_last') . '’s application for a P-1A classification is met as he is coming to the United States to perform as a ' . getFieldLC('position_job_title') . ' under the sponsorship of ' . getFieldLC('Direct_employer_names') . '. Duties in addition to competition fall within the definition of events that are incidental and related to the competing of internationally recognized ' . getFieldLC('position_job_title') . ' and/or a group of related activities pertaining to the activities of an internationally recognized ' . getFieldLC('position_job_title'), $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('CRITERIA', $fontT, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<em>P-1 Visas. Section <strong>101 (a) (15) (P)</strong> of the Immigration and Nationality Act of 1952, <strong>8 USC § 1101 (a) (15) (P), 8 CFR § 214.2 (p) (1), 22 CFR § 41.56, 59 Fed. Reg. 41. 818-42</strong>, relevant to this petition, requires the following for issuance of a P-1 Visa:</em>', $fontR, $paraL) ;

	$section->writetext('<em><strong>8 CFR § 214.2 (p) (1) (i)</strong> – General.
"Under section <strong>101 (a) (15) (P)</strong> of the Act, an alien having a residence in a foreign country which he or she has no intention of abandoning may be authorized to come to the United States temporarily to perform services for an employer or a sponsor. Under the nonimmigrant category, the alien may be classified under section 101 (a) (15) (P) (i) of the Act as an alien who is coming to perform services as an internationally recognized athlete . . . "</em>', $fontR, $paraL) ;

	$section->writetext('<em><strong>8 CFR § 214.2 (p) (2)</strong> – Filing of Petitions:
(i) "General. A P-1 petition for an athlete or entertainment group shall be filed by a United States employer, a United States sponsoring organization, a United States agent, or a foreign employer through a United States agent." </em>', $fontR, $paraL) ;

	$section->writetext('<em><strong>8 CFR §214.2 (p) (2) (ii)</strong> – "<u>Evidence required to accompany a petition for a petition for a P nonimmigrant. Petitions for P nonimmigrant</u> aliens shall be accompanied by the following:"</em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (2) (ii) (B)</strong> – "Copies of any written contracts between the petitioner and the alien beneficiary or, if there is no written contract, a summary of the terms of the oral agreement under which the alien(s) will be employed."</em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (2) (ii) (C)</strong> - "An explanation of the nature of the events or activities, the beginning and ending dates for the events or activities, and a copy of any itinerary for the events or activities" </em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (2) (ii) (D)</strong> - "A written consultation from a labor organization."</em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (2) (iii)</strong> - "<u>Form of Documentation</u>. The evidence submitted with a P Petition should conform to the following:</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(A) Affidavits, contracts, awards, and similar documentation must reflect the nature of the alien’s achievement and be executed by an officer or responsible person employed by the institution, establishment, or organization where the work was performed. </em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(B) Affidavits written by present or former employers or recognized experts certifying to the recognition and extraordinary ability, . . . of the alien, which shall specifically describe the alien’s recognition and ability or achievement in factual terms. The affidavit must also set forth the expertise of the affiant and the manner in which the affiant acquired such information." </em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (4) (ii)</strong> - "<u>Criteria and documentary requirements for P-1 athletes</u></em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(A) <u>General</u>. A P-1 athlete must have an internationally recognized reputation as an international athlete or he or she must be a member of a foreign team that is internationally recognized. The athlete or team must be coming to the United States to participate in an athletic competition which has a distinguished reputation and which requires participation of an athlete or athletic team that has an international reputation.</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(B) <u>Evidentiary requirements for an internationally recognized athlete or athletic team</u>. A petition for an athlete who will compete individually or as a member of a U.S. team must be accompanied by evidence that the athlete has achieved international recognition in the sport based on his or his reputation. A petition for a P-1 athlete or athletic team shall include: </em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (4) (ii) (B) (1)</strong> A tendered contract with a major United states sports league or team, or a tendered contract in an individual sport commensurate with international recognition in that sport, if such contracts are normally executed in the sport"</em>', $fontR, $paraL) ;
	
	$section->writetext('<em><strong>8 CFR § 214.2 (p) (4) (ii) (B) (2)</strong> "Documentation of at least two of the following:</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(i) Evidence of having participated to a significant extent in a prior season with a major United States sports league;</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(ii) Evidence of having participated in international competition with a national team;</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(iii) Evidence of having participated to a significant extent in a prior season for a U.S. college or university in intercollegiate competition;</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(iv) A written statement from an official of a major U.S. sports league or an official of the governing body of the sport which details how the alien or team is internationally recognized;</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(v) A written statement from a member of the sports media or a recognized expert in the sport which details how the alien or team is internationally recognized;</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(vi) Evidence that the individual or team is ranked if the sport has international rankings; or</em>', $fontR, $paraL) ;
	
	$section->writetext('<em>(vii) Evidence that the alien or team has received a significant honor or award in the sport."</em>', $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('LEGAL DISCUSSION AND RECITATION OF AUTHORITIES', $fontT, $paraL) ;
	addNewLine(1) ;
	
	
	$section->insertPageBreak() ;
	
	$section->writetext('CONCLUSION', $fontB, $paraT) ;
	addNewLine(1) ;
	
	$section->writetext('The evidence submitted and referenced above meets the requirements of the P-1 visa and clearly demonstrates that ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' has achieved international recognition in sport of ' . getFieldLC('p_1_sport') . ' and will participate across the United States. ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' exceeds the regulation of <strong>8 CFR § 214.2 (p)(4)(ii)(B)(2)</strong> - "Documentation of at least two of the following" by meeting the stated criteria:', $fontR, $paraL) ;
	
	$section->writetext('WHEREFORE, premises considered ' . getFieldLC('petitioner_company_name') . ' and ' . getFieldLC('beneficiary_title') . ' ' . getFieldLC('beneficiary_name_last') . ' respectfully request that a P-1 visa be issued.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Respectfully Submitted', $fontR, $paraL) ;
	addNewLine(3) ;
	
	$section->writetext('Jon Velie', $fontR, $paraL) ;
	$section->writetext('Attorney for Beneficiary', $fontR, $paraL) ;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	






?>