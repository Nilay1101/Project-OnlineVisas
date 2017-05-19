<?php

	// Leave space for company letterhead & address etc.
	addNewLine(6) ;
	
	$mydate=getdate(date("U"));

$section->writetext('EMPLOYMENT AGREEMENT', $fontB, $paraC) ;
addNewLine(2);

$section->writetext('THIS EMPLOYMENT AGREEMENT (" Agreement ") is made as of the '. $mydate['mday'] . ' day of ' . $mydate['month'] . ' ' . $mydate['year'] . ' between ' . getFieldLC('petitioner_company_name') . ', a  ' . getFieldLC('L_State_Incorp_USC') . ' enitity (" Company "), and ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' (" Executive ").', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS, pursuant to determination of the Board of Directors of the Company, Company desires to confirm Executive’s position as ' . $getFieldLCarray['position_job_title'] . ' of Company.', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS, Executive has been employed with ' . getFieldLC('L_Int_Company') . ' since ' . getFieldLC("L_Beneficiary's_Start_Date") . '.', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS,IC held the position of ' . getFieldLC("L_Beneficiary's_IC_Position") . ' at the venue of ' . getFieldLC("L_Beneficiary's_work_venue_IC") . '.', $fontR, $paraL );
addNewLine(1);

$section->writetext('WHEREAS, Company desires to retain the benefit of the Executive’s skill, knowledge and experience in order to insure the continued successful operation of its business, and the Executive desires to render services to the Company;', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS, the Executive and the Company desire to enter into this Agreement setting forth the terms and conditions for the employment relationship of the Executive with the Company;', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS, The Employment Agreement confirms an employer-employee relationship, wherein the Executive is the Employee and is subject to determinations of his employment by the Board of Directors of the Company, the Employer.', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS, Executive will implement policies and other actions determined by and under the direction and control of the Board.', $fontR, $paraL) ;
addNewLine(1);

$section->writetext('WHEREAS, Executive will report to the Board, in either a written or oral report, on a monthly basis or as needed.', $fontR, $paraL) ;
addNewLine(1);

$section->writetext("WHEREAS, The Board has the right to terminate Executive's position, adjust Executive’s salary, determine Executive's duties and determine Executive’s schedule and location of services, subject to provisions contained herein.", $fontR, $paraL) ;
addNewLine(1);

$section->writetext('NOW, THEREFORE, in consideration of the mutual covenants and agreements herein contained and other good and valuable consideration, the receipt and sufficiency of which is hereby acknowledged, the parties agree as follows:', $fontR, $paraL) ;
addNewLine(1);


$section->writetext("1. Position and Duties :", $fontB, $paraL ); 
$section->writetext("During the Term, the Executive shall serve as the President of the Company, and shall have such powers and duties as may from time to time be prescribed by the Board of Directors of the " . getFieldLC('petitioner_company_name') . ", provided that such duties are consistent with the Executive's position.", $fontR, $paraL ) ;
addNewLine(1);
$section->writetext('Specific duties are as follows:', $fontR, $paraL) ;
addNewLine(1);
$section->writetext('(A) Long-term Business Planning:', $fontB, $paraL );
$section->writetext('Supply vision and imagination at the highest level. Identify, develop and direct the implementation of the Board’s business strategies. Work closely with other executives to determine high level business options, maintain profitability, research investment, building and maintaining relationships with prospective affiliates and current clients, and ensure positive image of company. ', $fontR, $paraL) ;
addNewLine(1);
$section->writetext('(B) Supervisor Management:', $fontB, $paraL );
$section->writetext('Direct functions of the Company via the executive team. Manage executive meetings to ensure orderly conduct and appropriate opportunity for all to contribute. Determine agenda, direct discussion and make decisions consistent with Board philosophies and mandates.', $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(C) Development of Daily Operations:", $fontB, $paraL );
$section->writetext("Meet with Company executives, managers, employees and franchisees to coordinate all aspects of the company, and productivity.  When there are issues and problems, meet with the staff to create a solution.  Prepare annual financial reports, profit and loss analysis, review of marketing strategies and budget review. Guide direction of the Company's activities to achieve targets and standards for financial performance, quality, cultural and adherence to law and policy", $fontR, $paraL) ;
addNewLine(2);


$section->writetext("2. Term: " . getFieldLC("L_Beneficiary's_term_employment") . '.', $fontB, $paraL );
addNewLine(2);


$section->writetext("3. Compensation and Related Matters :", $fontB, $paraL );
addNewLine(1);
$section->writetext("(A) Base Salary:", $fontB, $paraL );
$section->writetext('The Executive’s salary shall be ' . getFieldLC("L_Beneficiary's_Salary"), $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(B) Bonuses:", $fontB, $paraL );
$section->writetext('The Executive may from time to time be eligible to earn cash bonuses.', $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(C) Expenses:", $fontB, $paraL );
$section->writetext('The Executive shall be entitled to receive prompt reimbursement for all reasonable expenses incurred by the Executive in performing services hereunder during the Term, in accordance with the policies and procedures then in effect and established by the Company for its senior executive officers.', $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(D) Other Benefits:", $fontB, $paraL );
$section->writetext('The Executive shall also be entitled to participate in any pension plan, profit-sharing plan, life, medical, dental, disability, or other insurance plan or other plan or benefit as from time to time is in effect during the term of this Agreement that the Company may provide generally for management-level employees of the Company and in accordance with the terms of such plan or benefit.', $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(E) Vacations:", $fontB, $paraL );
$section->writetext('The Executive shall be entitled to paid vacation days in each calendar year in accordance with the Company’s then current vacation policy. The Executive shall also be entitled to all paid holidays given by the Company to its employees generally.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("4. Termination: ", $fontB, $paraL );
$section->writetext("The Executive's employment hereunder may be terminated without any breach of this Agreement under the following circumstances:", $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(A) Death:", $fontB, $paraL );
$section->writetext("The Executive's employment hereunder shall terminate upon the Executive's death.", $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(B) Termination by Company for Cause:", $fontB, $paraL );
$section->writetext("At any time during the Term, the Company may terminate the Executive's employment hereunder for Cause. For purposes of this Agreement, ". '"Cause"' .' shall mean: (i) a willful act of dishonesty by the Executive with respect to any matter involving the Company or any subsidiary or affiliate, or (ii) conviction of the Executive of a crime involving moral turpitude, or (iii) the gross or willful failure by the Executive to substantially perform the Executive’s duties with the Company;', $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(C) Termination by the Executive:", $fontB, $paraL );
$section->writetext("At any time during the Term, the Executive may terminate the Executive's employment hereunder for any or no reason.", $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(D) Notice of Termination:", $fontB, $paraL );
$section->writetext("Any termination of the Executive's employment by the Company or any such termination by the Executive shall be communicated by written Notice of Termination to the other party hereto. For purposes of this Agreement, a " . '"Notice of Termination"'. ' shall mean a notice which shall indicate the specific termination provision in this Agreement relied upon', $fontR, $paraL) ;
addNewLine(1);
$section->writetext("(E) Date of Termination:", $fontB, $paraL );
$section->writetext('"Date of Termination"'. " shall mean: (i) if the Executive's employment is terminated by the Executive's death, the date of the Executive's death; (ii) if the Executive's employment is terminated by the Company for Cause under Section 4(c), the date on which Notice of Termination is given after all applicable notice and cure periods provided therein; (iii) if the Executive's employment is terminated by the Company, 30 days after the date on which a Notice of Termination is given; (iv) if the Executive's employment is terminated by the Executive, the date on which a Notice of Termination. ", $fontR, $paraL) ;
addNewLine(2);


$section->writetext("5. Compensation Upon Termination:", $fontB, $paraL );
addNewLine(1);
$section->writetext("(A) Termination Generally:", $fontB, $paraL );
$section->writetext("If the Executive's employment with the Company is terminated for any reason during the Term, within 30 days of the Date of Termination, the Company shall pay or provide to the Executive (or to the Executive's authorized representative or estate) any earned but unpaid Base Salary, incentive compensation earned but not yet paid, unpaid expense reimbursements, accrued but unused vacation and any vested benefits the Executive may have under any employee benefit plan of the Company through the Date of Termination " . '(the "Accrued Benefit"). ', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("6. Settlement and Arbitration of Disputes:", $fontB, $paraL );
$section->writetext('Any controversy or claim arising out of or relating to this Agreement or the breach thereof shall be settled exclusively by arbitration in accordance with the laws of the State of ' . getFieldLC('L_Date_Incorp_USC') . ' by three arbitrators, one of whom shall be appointed by the Company, one by the Executive and the third by the first two arbitrators. If the first two arbitrators cannot agree on the appointment of a third arbitrator, then the third arbitrator shall be appointed by the American Arbitration Association in Las Vegas, ' . getFieldLC('L_Date_Incorp_USC') . '. Such arbitration shall be conducted in Las Vegas, '. getFieldLC('L_Date_Incorp_USC') . ' in accordance with the Employment Dispute Resolutions Rules of the American Arbitration Association, except with respect to the selection of arbitrators which shall be as provided in this Section 9. Judgment upon the award rendered by the arbitrators may be entered in any court having jurisdiction thereof. This Section 9 shall be specifically enforceable. Notwithstanding the foregoing, this Section 9 shall not preclude either party from pursuing a court action for the sole purpose of obtaining a temporary restraining order or a preliminary injunction in circumstances in which such relief is appropriate; provided that any other relief shall be pursued through an arbitration proceeding pursuant to this Section 9.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("7. Consent to Jurisdiction:", $fontB, $paraL );
$section->writetext('To the extent that any court action is permitted consistent with or to enforce the terms of Section 9 or any other provision of this Agreement, the parties hereby consent to and designate the jurisdiction and venue of Las Vegas, ' . getFieldLC('L_Date_Incorp_USC'). ' as being proper and appropriate ("' . getFieldLC('L_Date_Incorp_USC') . ' Courts".  Accordingly, with respect to any such court action, the Executive (a) submits to the personal jurisdiction of such courts; (b) consents to service of process; (c) waives, and agrees not to plead or to make, any claim that any such action or proceeding brought in ' . getFieldLC('L_Date_Incorp_USC') . ' Courts has been brought in an improper or inconvenient forum; and (d) waives any other requirement (whether imposed by statute, rule of court, or otherwise) with respect to personal jurisdiction or service of process.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("8. Successor to the Executive:", $fontB, $paraL );
$section->writetext("This Agreement and the rights of the Executive hereunder are personal to the Executive and are not, without the prior written consent of the Company, assignable by the Executive. This Agreement shall inure for the benefit (and not burden) of and be enforceable by the Executive’s personal representatives, executors, administrators, heirs, distributees, devisees and legatees. In the event of the Executive's death after the Executive's termination of employment but prior to the completion by the Company of all payments due the Executive under this Agreement, the Company shall continue such payments to the Executive's beneficiary designated in writing to the Company prior to the Executive's death (or to the Executive's estate, if the Executive fails to make such designation).", $fontR, $paraL) ;
addNewLine(2);


$section->writetext("9. Enforceability:", $fontB, $paraL );
$section->writetext('If any portion or provision of this Agreement (including, without limitation, any portion or provision of any section of this Agreement) shall to any extent be declared illegal or unenforceable by a court of competent jurisdiction or by an arbitrator, the court or arbitrator (as applicable) shall limit the application of such portion or provision and proceed to enforce the Agreement as so limited or modified. Consequently, the remainder of this Agreement, or the application of such portion or provision in circumstances other than those as to which it is so declared illegal or unenforceable, shall not be affected thereby, and each portion and provision of this Agreement shall be valid and enforceable to the fullest extent permitted by law.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("10. Waiver:", $fontB, $paraL );
$section->writetext('No waiver of any provision hereof shall be effective unless made in writing and signed by the waiving party. The failure of any party to require the performance of any term or obligation of this Agreement, or the waiver by any party of any breach of this Agreement, shall not prevent any subsequent enforcement of such term or obligation or be deemed a waiver of any subsequent breach.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("11. Notices:", $fontB, $paraL );
$section->writetext('Any notices, requests, demands and other communications provided for by this Agreement shall be sufficient only if in writing and delivered in person or sent by a nationally recognized overnight courier service or by registered or certified mail, postage prepaid, return receipt requested, to the Executive at the last address the Executive has filed in writing with the Company or, in the case of the Company, to the Board of Directors.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("12. Effect on Other Plans:", $fontB, $paraL );
$section->writetext("Nothing in this Agreement shall be construed to limit the rights of the Executive under the Company's benefit plans, programs or policies (including, without limitation, the Plan); provided, however, to the extent there is a limitation set forth in this Agreement such limitation set forth in this Agreement shall control.", $fontR, $paraL) ;
addNewLine(2);


$section->writetext("13. Amendment:", $fontB, $paraL );
$section->writetext('This Agreement may be amended or modified only by a written instrument signed by the Executive and by a duly authorized representative of the Company.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("14. Governing Law:", $fontB, $paraL );
$section->writetext('This is a ' . getFieldLC('L_Date_Incorp_USC'). ' contract and shall be construed under and be governed in all respects by the laws of the State of ' . getFieldLC('L_Date_Incorp_USC'). ', without giving effect to the conflict of laws principles of such State. With respect to any disputes concerning federal law, such disputes shall be determined in accordance with the law as it would be interpreted and applied by the United States Court of Appeals for the appropriate Circuit.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("15. Counterparts:", $fontB, $paraL );
$section->writetext('This Agreement may be executed in any number of counterparts, each of which when so executed and delivered shall be taken to be an original; but such counterparts shall together constitute one and the same document.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("16. Successor to Company:", $fontB, $paraL );
$section->writetext('The Company may unilaterally assign this Agreement to a related entity, a successor, or an assign. The Company, however, shall require any successor (whether direct or indirect, by purchase, merger, consolidation or otherwise) to all or substantially all of the business or assets of the Company expressly to assume and agree to perform this Agreement to the same extent that the Company would be required to perform it if no succession had taken place. Failure of the Company to obtain an assumption of this Agreement at or prior to the effectiveness of any succession shall be a material breach of this Agreement.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("17. Gender Neutral:", $fontB, $paraL );
$section->writetext('Wherever used herein, a pronoun in the masculine gender shall be considered as including the feminine gender unless the context clearly indicates otherwise.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext("18. Representation by Counsel:", $fontB, $paraL );
$section->writetext('The Company and the Executive each acknowledge that each party to this Agreement has had the opportunity to be represented by counsel in connection with this Agreement. Accordingly, any rule of law or any legal decision that would require interpretation of any claimed ambiguities in this Agreement against the party that drafted it, has no application and is expressly waived.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext('IN WITNESS WHEREOF, the parties have executed this Employment Agreement effective on the date and year first above written.', $fontR, $paraL) ;
addNewLine(2);


$section->writetext(getFieldLC('petitioner_company_name'), $fontB, $paraR );
addNewLine(1);
$section->writetext('By :', $fontR, $paraR);
addNewLine(1);
$section->writetext(getFieldLC('US_employment_letter_signator'), $fontR, $paraR);
$section->writetext(getFieldLC('Title_US_employment_letter_signator') . ', ' . getFieldLC('petitioner_company_name'), $fontR, $paraR);
addNewLine(2);


$section->writetext('Executive', $fontR, $paraR);
addNewLine(1);
$section->writetext('By :', $fontR, $paraR);
addNewLine(1);
$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraR);
$section->writetext(getFieldLC("L_Beneficiary's_US_Position"), $fontR, $paraR);






?>