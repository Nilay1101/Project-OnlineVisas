<?php
	
	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('<b>EMPLOYMENT AGREEMENT</b>', $fontU, $paraC) ;
	addNewLine(1) ;
	
	$section->writetext('This <b>AGREEMENT</b> is made on the date below by and between ' . getFieldLC('petitioner_company_name') . ' ("the Company"), a          Corporation, with its principal place of business at ' . getFieldLC('petitioner_contact_address') . ' and ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . ' ("the Employee"), individual residing at ' . getFieldLC('beneficiary_address_street') . ',  ' . getFieldLC('beneficiary_address_city') . ',      State, Zip      whose Social Security Number is ending ' . getFieldLC('beneficiary_personal_ssn') . '.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('WHEREAS, the Company is in the business of providing ' . getFieldLC('petitioner_type_of_company') . ' to its Customers, and the Company desires to hire the Employee and to assign the Employee to provide technical services to its Customers on the Company’s behalf; and,', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('WHEREAS, the Company and the Employee desire to enter into the relationship of employer and Employee and set for the terms, covenants and conditions with respect to such employment.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('NOW THEREFORE, in consideration of the mutual covenants, promises and conditions contained herein, and for other good and valuable consideration, the receipt and sufficiency of which is hereby acknowledged, it is this      Day of       Agreed as follows:', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>1. Employment/Term:</b></u> The Employee hereby agrees and acknowledges that this Agreement is a condition of employment with the Company, and that he/she will become an “At-Will Employee” of the Company, further subject to the terms and conditions of the Company’s obligations to the Customer/Customers. The Employee understands and agrees that the employment under this Agreement is not for any specified term, and that the employment relationship may be terminated by either the Company or the Employee with or without cause at any time. The Employee further acknowledges and agrees that his/her employment will be terminated by the Company at any time for any reason, without notice on the basis of Employee’s misconduct, conflict of interest, neglect of duty, failure to perform, failure to send time sheets, disloyalty or non – compliance with the terms of this Agreement or Company policies. If the Company terminates the Employee, he/she shall be entitled to compensation only through last day worked, but in no event shall compensation be owed after the effective date of such termination. Furthermore, it is understood that the nature of the employment may require Employee to work more than general business hours as required by the Customer.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>2. ' . getFieldLC('position_job_title') . ' Duties:</b></u> ' . getFieldLC('position_overview') . '.', $fontR, $paraL) ;
	$section->writetext(getFieldLC('position_duties'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>3. Employee Services at Off-Site Client Location:</b></u> In the event Employee is placed at a client location, Employer and Employee understand, that Company, not client, is the employer and has the right to control Employee’s services, including the ability to hire, fire, supervise and be responsible for the overall work and that it will done for the duration employment with Company. Employee shall check in with Company and Company may contact Employee routinely regarding services rendered by Employee on Company’s behalf to client. Company will provide performance reviews annually pursuant to Performance Review section of Employee Handbook. Company will pay employee’s salary and taxes required to be paid as an employer, Employee shall receive the same benefits discussed within this Employee Handbook, when working at off-site locations.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>4. Compensation/Benefits:</b></u> In consideration of the services to be rendered by the Employee, the company agrees to compensate an offer benefits to the Employee in accordance with the terms stated in the offer letter agreed to by parties. The Company is authorized to deduct any sums as may be required to be deducted or withheld from the Employee’s compensation under the provisions of any federal, state or local law now in effect or hereafter becoming effective during the term of employment hereunder, or as authorized by the <b>Employee</b>.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>5. Freedom to Contract/No Authority:</b></u> <b>Employee</b> represents that he/she is free to enter into this Agreement, and that he/she will not disclose to the <b>Company</b>, or use for the Company’s benefit, any trade secrets or confidential information which is the priority certified to work in the United States. The Employee also expressly agrees and acknowledges that he/she shall have no authority to enter into any contract binding upon the Company or otherwise create any obligations for or on the part of the Company, except as may be specifically provided further in writing hereafter an only as authorized by an officer of the Company, except as may be specifically provided further in writing hereafter and only as authorized by an offer of the Company acting person to authority granted by the Board of Directors of the <b>Company</b>.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>6. Confidentiality and Proprietary Authority:</b></u> Company provides computer system design, development, implementation, integration, training, software and related consulting services and products to various clienteles at diverse locations. Company has made and continues to make substantial investments of personnel and financial resources to recruit, train and compensate its employees and to establish long-term near permanent relationships with Customers, the loss of either of which would constitute substantial and irreparable injury to Company. Company has developed valuable technical and non-technical information, which is safeguarded as confidential and secret and must be protected from direct or indirect disclosure by Employee. It is specifically agreed and understood that the Employee during the term of employment will, may or might be a part of the development and/or use of confidential information or proprietary data in processing work on behalf of the Company or the Customer, including but not limited to Customer operations, Customer lists, accounts, computer software, programs, systems, specifications, techniques, codes, designs, methods, works and/or trade secrets. It is specifically agreed and understood by both the Company and the Employee that the business of the company and the customer is highly competitive and that both the Company and the Customer’s ability to maintain their reputations, business, and third-party obligations is dependent upon the maintenance of the proprietary protection and confidentiality of such data and information. Accordingly, the Employee hereby agrees, such agreement to expressly survive termination of this Agreement, to never directly or indirectly copy, use for personal gain, disclose, release, publish or otherwise reveal the confidential information, proprietary data and/or trade secrets of the Company or those of the customer to anyone other than such individuals specifically authorized in writing to receive the same by the Company and the Customer. Further, it is agreed and understood by the Employee that any systems, techniques, works, and/or methods developed by the Employee or Employees of the Company shall be and remain the exclusive property of the Company or the Customer. Employee understands and agrees that he/she shall acquire no rights to any of this information whatsoever. The Employee hereby acknowledges his/her affirmative obligation to deliver and/or return such information to the Company, and agrees to promptly deliver and/or return any and all such confidential information, proprietary data, or other property of the Company and/or the Customer to the Company immediately upon termination of the employment or earlier upon the request of the Company. The Employee also hereby agrees to execute at the Company’s request, any such further assurances or other documents containing covenants for the protection of proprietary data and confidential information as may be required by the Company or the Customer.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>7. Inventions, Discoveries, and Concepts:</b></u> All works, inventions, discoveries, improvement, ideas, and/or concepts, whether patentable or unpatentable, made, devised, or discovered by the Employee, whether by himself or jointly with others, from the time of entering the Company’s employ until the termination of his employment, relating or pertaining in any way to the business of his employment are to insure to the benefit of the Company and become and remain its sole and exclusive property. Further, the Employee acknowledges and agrees that such works, inventions, discoveries, improvements, ideas, and/or concepts developed with the Customer shall be considered to be “work made for hire” as that term is defined in section 101 or the US copyright Act.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>8. Agreement Not to Compete/Restrictive Covenant:</b></u> The Employee acknowledges that his/her employment with the Company has provided and will provide him/her with specialized knowledge, training, skills and information including access to those items in areas set forth in paragraph 4, Confidentiality and Proprietary Rights, which, if used in competition with the Company, could cause it harm and result in damages. Accordingly, as a condition and in consideration of employment and continued employment of Employee by the Company and in consideration of the confidential aspects of the operations of the Company, the Employee agrees not to become a competitor of the Company, and/or accept direct or temporary employment or otherwise contract for his/her services in any other capacity whatsoever that is related to his/her employment with the Company, directly or indirectly, with the Customer or any competitor of the Company, for a period of at least twelve(12) months after termination of employment with the Company or the final resolution of any dispute under this section, whichever is greater, without the express prior written approval of the Company. A competitor of the Company for purposes of these sections shall be any person, firm, partnership, corporation or other business which develops and markets products and/or services similar to those marketed by the Company at any time during the last twelve months of the Employee’s employment.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>9. Non-Solicitation:</b></u> The Employee shall not attempt to recruit for hire, hire, assist others in recruiting or hiring discuss employment or referrals for employment with, or otherwise solicit the services of any person who is or was an Employee of the Company or an Employee of the Customer during the twelve months preceding termination of the Employee’s employment, at any time during the term of employment with the Company and for a period not less that at least (3) years thereafter.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>10. Employer’s Remedies for Breach:</b></u> In addition to any other remedy available at law, in the event if a breach or a threatened breach by the Employee of the provisions of this Agreement, the Company will be entitled to an injunction restraining the Employee from such breach and from rendering any services to any person, firm or entity in breach of this Agreement. Employee agrees to indemnify and hold harmless the Company from all damages and costs, including reasonable attorney’s fees relating to the Employee’s breach or threatened breach. Nothing in this Agreement nor pursuing the injunctive remedy will be construed as prohibiting the Company from pursuing any other remedies available to it for a breach or threatened breach, including, but not limited to, any fees, costs, losses, expenses, damages or other monetary remedy available at law or in equity.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>11. Variances:</b></u> This Agreement may not be changed or terminated orally, a no change, termination, or attempted waiver of any provisions hereof shall be binding unless in writing and signed by both the Employee and authorized representative of the Company. The Employee’s compensation may be increased without in any way affecting any of the terms and conditions of this Agreement, which in all aspects shall remain in full force and effect.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>12. Governing Law:</b></u> This Agreement shall be governed and constructed under the laws of the        .', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('<u><b>13. Severability:</b></u> The terms and conditions of this Agreement shall be separate and severable so that if any such term or condition is deemed to be invalid or unenforceable, then that term or condition shall be deemed void and of no effect and the remainder of the Agreement shall be valid and binding upon the parties hereto. Both the Company and the Employee agree that the restrictive covenants agreed to herein shall be binding on the Employee to the greatest extent permitted under applicable law and regulation. If, for any reason, any of his section’s or subsection’s provisions are found to be unenforceable, then such provisions shall be deemed severable and the remaining provisions shall remain valid and enforceable to the extent permitted under law and regulation.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	
	$section->writetext('IN WITNESS WHEREOF, the parties have executed this Agreement on this      Day of      .', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(9,9)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext('By <br><br>', $fontR, $paraL);
	$cellBF1->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	$cellBF1->writetext('("The Employee")', $fontR, $paraL);
	
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext('By <br><br>', $fontR, $paraL);
	$cellBF1->writetext(getFieldLC('petitioner_company_name'), $fontB, $paraL) ;
	$cellBF1->writetext('("The Company")', $fontR, $paraL);
	
	

?>