<?php
	
	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	$section->writetext('MASTER PROFESSIONAL SERVICES AGREEMENT', $fontR, $paraC) ;
	$section->writetext('This Master Professional Services Agreement ("Agreement") is entered into by and between ' . getFieldLC('company_name_3party') . ' ("Client") and ' . getFieldLC('petitioner_company_name') . ' ("Provider") as of either         or the latest date set forth on the signature page to this Agreement.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	
	$section->writetext('1. <u>Services</u>', $fontR, $paraL) ;
	$section->writetext('   1.1 <u>Services</u>. Service Provider will perform the professional services and provide the deliverables described on statements of work that the parties may enter into from time to time by mutual written agreement (such services, the "Services," such deliverables, the "Deliverables," and each such statement of work, a "Statement of Work" or "SOW"). Service Provider will provide the Services and Deliverables in accordance with the timetable and the specifications and requirements set forth in an applicable SOW. Client makes no promises or commitments as to the amount of business, if any, Service Provider may receive at any time under this Agreement.', $fontR, $paraL) ;
	
	$section->writetext('   1.2 <u>Statements of Work</u>. Except as otherwise agreed by the parties, each Statement of Work will be substantially in the form set forth on Exhibit A to this Agreement, and the terms and conditions of this Agreement will apply to each Statement of Work. Client’s affiliates may enter into their own SOWS under this Agreement.', $fontR, $paraL) ;
	
	$section->writetext('   1.3 <u>Personnel</u>. Service Provider will provide experienced and qualified personnel to provide the Services and the Deliverables. In their performance under this Agreement Service Provider personnel will comply with Client’s requests, rules, policies and regulations regarding personal and professional conduct. Client may request that Service Provider remove any Service Provider personnel that Client reasonably deems unacceptable. Service Provider will be responsible for the performance of its personnel, including its employees, agents and subcontractors (collectively, "Personnel") under this Agreement. Service Provider may not subcontract the provision of any Services or Deliverables without the prior written consent of Client.', $fontR, $paraL) ;
	
	$section->writetext('   1.4 <u>Right to Control</u>. Service Provider is the employer and has the right to control its employee’s services referenced in this Agreement and attachments, including the ability to hire, fire, supervise and be responsible for the overall work and that it will done for the duration Agreement with or Services rendered to Client. Employee(s) shall be ultimately supervised and report to Service Provider routinely regarding services rendered by Employee(s) on Service Provider’s behalf to Client.', $fontR, $paraL) ;
	
	$section->writetext('   1.5 <u>Network Security</u>. If and to the extent that Service Provider will have physical or electronic access to Client’s computer network or systems, Service Provider will comply with all network access and security requirements communicated by Client to Service Provider from time to time.', $fontR, $paraL) ;
	
	$section->writetext('   1.6 <u>Acceptance</u>. Unless otherwise set forth in a Statement of Work, Client will evaluate any Deliverables for compliance with the terms of this Agreement and with any acceptance criteria or specifications described in the Statement of Work. Client will provide a written acceptance or rejection to Service Provider within thirty (30) days after the receipt of the final version of any such Deliverables, Service Provider, at its own cost and expense, will correct any errors or non-conformities in the Deliverables within ten (10) business days following receipt of Client’s notice or rejection thereof.', $fontR, $paraL) ;
	
	$section->writetext('   1.7 <u>Change Control</u>. Material changes to a SOW under this Agreement may result in changes to schedule, Services, Deliverables, personnel effort, and/or fees set forth in the SOW. Upon the request of Client or the identification of any such potential changes by Service Provider, Service Provider will provide a change order request to Client detailing the specifics of the requested change, including at a minimum fees, schedule, scope and/or Services and Deliverables, for Client’s review and response Upon mutual written agreement, which must be obtained in advance, any such change order request will be incorporated into a written amendment to the SOW executed by the parties.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('2. <u>Compensation</u>', $fontR, $paraL) ;
	$section->writetext('   2.1 <u>Fees</u>. Subject to the terms and conditions of this Agreement, Client will compensate Service Provider as set forth in an applicable Statement of Work, which may provide for Service Provider to be paid on a fine-and-materials, fixed fee, milestone, or other basis.', $fontR, $paraL) ;
	$section->writetext('   2.2 <u>Expenses</u>. Client will reimburse Service Provider at actual cost without markup solely for those reasonable and necessary expenses that are pre-approved in writing by Client. ', $fontR, $paraL) ;
	$section->writetext("   2.3 <u>Invoices</u>. Unless otherwise set forth in an applicable SOW, Client will pay Service Provider all undisputed amounts via secure electronic funds transfer or by credit card within thirty (30) days after receipt of Service Provider's complete and correct invoice, which will include any substantiating documentation for expenses as may be requested by Client. Each Invoice must reference the correct PO number. Any contractual terms contained in any Client’s purchase orders will not be applicable to any transaction between the parties unless contained in a written document signed by both parties. Except as otherwise set forth in an applicable SOW, Service Provider’s will consolidate all invoicing to one invoice per monthly billing cycle. Service Provider will invoice Client monthly and in no event more than thirty (30) days after the Services are accepted. ", $fontR, $paraL) ;
	$section->writetext("   2.4 <u>Taxes</u>. Client is responsible for all applicable taxes, duties or other charges, including sales or use taxes, imposed by any federal, state or local governmental entity on Services and Deliverables provided by Service Provider under this Agreement, except for taxes based on Service Provider's net income, gross revenue or employment obligations. If Service Provider is obligated by applicable law or regulation to collect and remit any taxes relating to the Services or Deliverables, then Service Provider will add the appropriate amount to Client's invoices as a separate line item.", $fontR, $paraL) ;
	$section->writetext("   2.5 <u>Books and Records</u>. During the term of this Agreement and for two years thereafter, Service Provider will keep copies of books and records related to amounts Service Provider requests to be paid for the Services and Deliverables. Client may, on reasonable notice to Service Provider and during normal business hours no more than once per year, examine and make copies of such books and records for purposes of auditing and verifying the fees charged under this Agreement and Service Provider's compliance with its obligations hereunder.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('3. <u>Term</u>', $fontR, $paraL) ;
	$section->writetext('   3.1 <u>Term and Renewal</u>. The term of this Agreement will begin on the Effective Date and will continue for three (3) years, unless earlier terminated as set forth herein. This Agreement may be renewed or extended if and as mutually agreed by the parties in writing. If Services under an applicable SOW extend beyond the term of this Agreement, this Agreement will continue with respect to such SOW until the satisfactory completion of the Services thereunder.', $fontR, $paraL) ;
	$section->writetext('   3.2 <u>Termination for Convenience</u>. Client may terminate this Agreement or any SOW, in whole or in part, at its discretion. If Client terminates the Agreement pursuant to this Section. Client will be responsible for any portion of the compensation owed to Service Provider for any Services rendered and Deliverables provided through the termination date.', $fontR, $paraL) ;
	$section->writetext('   3.3 <u>Survival</u>. The terms and conditions of this Agreement that by their sense and context are intended to survive termination hereof will so survive, including the following Sections: 4, 5, 7, 8. l, 9-16 and 1822.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('4. <u>Ownership</u>', $fontR, $paraL) ;
	$section->writetext("   4.1 <u>Clent's Ownership</u>. Subject to Section 4.2 below and except as otherwise agreed to by the parties in a SOW, Client will own exclusively all right, title and interest in and to all items that are conceived, made, discovered, written or created by Service Provider Personnel alone or Jointly with third parties under this Agreement, including the Deliverables, whether completed or works-in-progress. Without limiting the previous sentence. all Deliverables, in whole and in part, will be deemed 'works made for hire' of Client for all purposes of copyright law, and the copyright will belong solely to Client To the extent that any such Deliverables do not fall within the specifically enumerated works that constitute 'works made for hire' under the United States copyright laws, and to the extent that any Deliverables include materials subject to copyright, patent, trade secret or other proprietary right protection, Service Provider hereby irrevocably assigns to Client all its right, title and interest that it may be deemed to have in and to any and all inventions, copyrights, patents, trade secrets and other proprietary rights therein (including renewals thereof). Service Provider will obtain, at its expense, such assignments to Client and any other documentation, or to Service Provider, from Service Provider's employees, agents and contractors as are necessary to effectuate the purposes or the previous sentence.", $fontR, $paraL) ;
	$section->writetext("   4.2 <u>Pre-Existing Materials</u>. Notwithstanding anything to the contrary herein, Deliverables that are owned by Client will not include Service Provider's pre-existing software, inventions, copyrights, patents, trade secrets, trademarks and other proprietary rights, including ideas, concepts and know-how of Service Provider, that existed before the commencement of the Services and that are included in the Deliverables (collectively, the 'Pre-Existing Materials'). Service Provider hereby grants to Client a non-exclusive, worldwide, perpetual (without regard to any termination or expiration of this Agreement), irrevocable, fully paid, royalty-free license to use the Pre-Existing Materials to the extent they are included in, and as necessary to use and exploit, the Deliverables.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('5. <u>Confidentiality</u>', $fontR, $paraL) ;
	$section->writetext("   5.1 <u>Definitation</u>. 'Confidential Information' of a party means all confidential or proprietary information, including all information not generally known to the public, and the terms and conditions of this Agreement. Confidential Information includes all data and information that is submitted to or learned by either party in connection with this Agreement, including information relating to either party's customers, technology, operations, facilities, products, systems, procedures, practices, research, development, employees, business affairs and financial information. Without limiting the foregoing, Confidential Information includes all such information provided to each party by the other party both before and after the date of this Agreement.", $fontR, $paraL) ;
	$section->writetext("   5.2 <u>Use and Disclosure</u>. All Confidential Information relating to a party will be held in confidence by the other party to the same extent and with at least the same degree of care as such party protects its own Confidential Information of like kind, but in no event using less than a reasonable degree or care and may only be used in relation to such party's obligations under this Agreement. Neither party may disclose, duplicate, publish, release, transfer or otherwise make available Confidential Information of the other party in any form to, or for the use or benefit of, any person or entity without the other party's prior written consent. The obligations in this Section 5.2 do not restrict any disclosure by either party (i) pursuant to any applicable law, or by order of any court or government agency (provided that the disclosing party will give prompt notice to the non-disclosing party or such order so that the non-disclosing party may seek a protective order or other appropriate remedy); or (ii) to either party's accountants, legal advisors, auditors and financial advisors so long as such advisors are informed of and bound by this confidentiality provision.", $fontR, $paraL) ;
	$section->writetext('   5.3 <u>Disclosure of Confidential Information</u>. In the event of a breach of this Section or other compromise or Confidential Information or which a party is or should be aware (whether or not resulting from a breach), such party will immediately notify the other party in a writing detailing all information known to such party about the compromise, the Confidential information affected, and the steps taken by such party to prevent the recurrence or such breach and to mitigate the risk to the other party. If and to the extent that any compromised Client’s Confidential Information includes any customer data, Service Provider will also identify the customers and customer information affected and will provide Client with access to all information related to the security breach as reasonably requested by Client. Service Provider shall also cooperate with all reasonable Client’s requests to investigate or prosecute any such breach.', $fontR, $paraL) ;
	$section->writetext("   5.4 <u>Return of Materials</u>. On request and/or on termination of this Agreement for any reason, Service Provider will return or destroy any and all records or copies of records relating to Client or its business, including Confidential information, according to Client's Instructions or relevant industry best practices if no instructions are provided. On Client’s request, Service Provider will certify in writing that all such Confidential Information has been so returned or destroyed.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('6. <u>Representation and Warranties</u>', $fontR, $paraL) ;
	$section->writetext("   6.1 <u>Service Provider's Representation and Warranties</u>. Service Provider represents and warrants to Client that: (i) it will provide the Services and Deliverables in a competent and professional manner in accordance with industry standards; (ii) the Services and Deliverables will not infringe or misappropriate any third party's intellectual property or proprietary rights; (iii) Service Provider's performance of its obligations hereunder will not violate any agreements between Service Provider and third parties, (iv) the Deliverables will conform to their specifications as set forth in an applicable SOW, and (v) Service Provider has the necessary authority to enter into this Agreement and carry out its obligations hereunder.", $fontR, $paraL) ;
	$section->writetext("   6.2 <u>Client's Representation and Warranties</u>. Client represents and warrants to Service Provider that Client has the necessary authority to enter into this Agreement and carry out its obligations hereunder.", $fontR, $paraL) ;
	$section->writetext('   6.3 <u>Exclusive Warranties</u>. EXCEPT AS OTHERWISE SET FORTH IN THIS AGREEMENT, NEITHER PARTY MAKES ANY WARRANTIES, EXPRESS OR IMPLIED, WITH RESPECT TO THE SERVICES, DELIVERABLES OR ANY OBLIGATIONS HEREUNDER, AND BOTH PARTIES EXPRESSLY DISCLAIM THE WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('7. <u>Indemnification</u>', $fontR, $paraL) ;
	$section->writetext("   7.1 <u>Infringement Indemnity</u>. Service Provider will indemnify, defend and hold harmless Client and its parent, subsidiaries and affiliates and their respective directors, employees and agents (collectively, the 'Indemnitees') from and against any and all damages, liabilities, penalties, fines, losses, costs and expenses including reasonable attorneys' fees (collectively, 'Losses') arising from or relating to any claim or allegation that the Services and/or Deliverables infringe any patent, copyright, trademark or other proprietary right, or misappropriate any trade secret, of any third party.", $fontR, $paraL) ;
	$section->writetext("   7.2 <u>General Indemnification</u>. Service Provider will indemnify, defend and hold harmless the Indemnitees from and against any and all Losses arising from or relating to any claims or actions arising from or relating to: (i) any claim with respect to the negligence or willful misconduct of Service Provider or its Personnel; (ii) any third party claim with respect to Service Provider's breach or the warranty in Section 6.1; (iii) any claim for wages or benefits and/or related taxes against Client by Service Provider or its Personnel; and (iv) any third party claim with respect to bodily injury, death or damage to tangible property sustained as a result of the Services or Deliverables.", $fontR, $paraL) ;
	$section->writetext("   7.3 <u>Client Indemnification</u>. Client will indemnify, defend and hold harmless Service Provider from and against any and all damages, liabilities, penalties, fines, losses, costs and expenses including reasonable attorneys' fees arising from or relating to any third-party claims or actions based on Client's gross negligence or willful misconduct in performing its obligations under this Agreement.", $fontR, $paraL) ;
	$section->writetext("   7.4 <u>Notification</u>. The indemnified party agrees to give the indemnifying party prompt written notice of any claim subject to indemnification; provided that an indemnified party's failure to promptly notify the indemnifying party will not affect the indemnifying party's obligations hereunder except to the extent that such delay prejudices the indemnifying party’s ability to defend such claim. The indemnifying party will have the right to defend against any such claim with counsel of its own choosing and to settle such claim as the indemnifying party deems appropriate, provided that the indemnifying party will not enter any settlement that adversely affects the indemnified party's rights without the indemnified party's prior written consent. The indemnified party agrees to reasonably cooperate with the indemnifying party in the defense and settlement of any such claim, at the indemnifying party's expense.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('8. <u>Insurance</u>', $fontR, $paraL) ;
	$section->writetext("   8.1 <u>Requirements</u>. Service Provider shall maintain (and shall cause each of its agents, independent contractors and subcontractors performing any services hereunder to maintain) at all times during the Term and, with respect to any claims-made policies, for a period of three years thereafter, at its sole cost and expense at least the following insurance covering its obligations under this Agreement: (i) Commercial General Liability insurance with limits of no less than $2 million per occurrence and $2 million as an annual aggregate, including but not limited to products and completed operations liability, (ii) Workers' Compensation insurance in compliance with all statutory requirements, and (jii) other insurance as requested by Client. Client and its directors, officers and employees, parent company, general partners, subsidiaries, affiliates, representatives and assigns existing now or hereafter shall be named as additional insureds on all such policies of the other party as applicable. Policies shall be written with a licensed insurance company with a Best's Rating of no less than A- V Ill. Service Provider shall provide to Client, upon execution of this Agreement, a certificate of insurance evidencing all such coverages and providing that the insurance company shall provide to the additional insureds (i) 30 days prior written notice of cancellation and/or any material change in any such policy and (ii) a renewal certificate 15 days prior to the renewal of any such policy", $fontR, $paraL) ;
	$section->writetext("   8.2 <u>Verification</u>. Service Provider shall be responsible for the verification of all agents, independent contractors and contractors' compliance with this insurance provision throughout the term of this Agreement. Failure by Service Provider to require and verify compliance will be considered a material breach of this Agreement. Client retains the right but not the obligation to inspect Service Provider's files or request applicable documentation to verify compliance with this Section.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext("9. <u>Damages Limitation</u>. EXCEPT FOR DAMAGES ARISING FROM ANY BREACH OF SECTION 5 (CONFIDENTIALITY) AND/OR OBLIGATIONS ARISING UNDER SECTION 7 (INDEMNIFICATION), IN NO EVENT WILL EITHER PARTY BE LIABLE FOR ANY INCIDENTAL, INDIRECT, SPECIAL OR CONSEQUENTIAL DAMAGES FOR ANY CLAIM ARISING UNDER THIS AGREEMENT, REGARDLESS OF THE CAUSE OF ACTION AND EVEN IF A PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. EXCEPT FOR ATTORNEYS FEES THAT MAY BE AWARED IN CONNECTION WITH ANY CLAIM HEREUNDER, ANY DAMAGES ARISING FROM ANY BREACH OF SECTION 1.4 (NETWORK SECURITY), SECTION 5 (CONFIDENTIALITY) AND/OR SECTION 6 (WARRANTIES), AND OBLIGATIONS ARISING UNDER SECTION 7 (INDEMNIFICATION) AND DAMAGES RESULTING FROM SERVICE PROVIDER'S NEGLIGENCE HEREUNDER, NEITHER PARTY'S TOTAL LIABILITY TO THE OTHER PARTY FOR ANY CLAIM ARISING UNDER THIS AGREEMENT WILL EXCEED THE GREATER OF (A) FIVE TIMES THE TOTAL AMOUNT PAID AND OWING BY CLIENT TO SERVICE PROVIDER UNDER THIS AGREEMENT, OR (B) $250,000.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext("10. <u>Independent Contractor</u>. Client and Service Provider are independent contractors with respect to the Services and Deliverables provided and received under this Agreement and any Statement of Work. The provisions of this Agreement will not be construed to establish any form or partnership, agency or other joint venture of any kind between Client and Service Provider, nor to constitute either party as the agent, employee or legal representative of the other. All persons furnished by either party to accomplish the intent of this Agreement will be considered solely as the furnishing party's employees or agents and the furnishing party will be solely responsible for compliance with all laws, rules and regulations involving, among other things, employment of labor, hours of labor, working conditions, workers' compensation, payment of wages, and withholding and payment of all applicable taxes of any nature.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext("11. <u>No Publicity</u>. Neither party may use the other party's name or mark in any advertising, written sales promotion, press releases and/or other publicity matters relating to this Agreement without the other party's prior written consent. Service Provider acknowledges that Client has a no publicity policy regarding its Service Provider relationships.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext("12. <u>Dispute Resolution</u>. If a dispute or claim arises under this Agreement (a 'Dispute') that the project managers or primary business contacts of each party are unable to resolve, a party will notify the other party of the Dispute in writing (which may be via email) with as much detail as possible. Client and Service Provider senior business representatives with full authority to resolve the Dispute will use good faith efforts to resolve the Dispute within ten (10) business days after receipt or a Dispute notice. If the parties' senior business representatives are unable to resolve the Dispute, or agree upon the appropriate corrective action to be taken, within such ten (10) business days, then either party may pursue any course of action available to it. Pending resolution of the Dispute, both parties will continue to perform their respective undisputed responsibilities under this Agreement. Nothing contained in this Section will limit or delay the right of either party to seek injunctive relief from a court of competent jurisdiction, whether or not such party has pursued informal resolution in accordance with this Section.", $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('13. <u>Governing Law</u>. This Agreement is governed by the laws of the State of Texas, excluding its conflicts of law rules. Exclusive venue for any action hereunder will lie in the state and federal courts located in Dallas, Dallas County, Texas and both parties hereby submit to the jurisdiction of such courts.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('14. <u>Assignment</u>. Service Provider may not assign or transfer this Agreement, in whole or in part, without Client prior written consent. Any assignment in contravention of this provision will be null and void. This Agreement will be binding on all permitted assignees and successors in interest.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('15. <u>Entire Agreement/Amendments</u>. This Agreement, including all exhibits that are incorporated herein by reference, contains the entire agreement of the parties regarding the subject matter described herein, and all other promises, representations, understandings, arrangements and prior agreements related thereto are merged herein  and superseded hereby (including any provision contained in any Service Provider invoice, shipping document or other Service Provider  documentation that is different from or in addition to this Agreement or applicable SOW). The provisions of this Agreement may not be amended except by an agreement in writing signed by authorized representatives of both parties referencing this Agreement and stating their intention to amend this Agreement.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('16. <u>Notices</u>. Except as may be otherwise set forth herein, all notices, requests, demands and other communications hereunder will be in writing and will be deemed to have been duly given: (i) on the next day if delivered personally to such party; (ii) on the date three (3) days after mailing if mailed by registered or certified  mail; or (iii) on the next day if delivered by courier. All notices will be sent to the following address:', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('If to Client:', $fontR, $paraL) ;
	$section->writetext(getFieldLC('company_name_3party'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('name_3party_official'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('title_3party_official'), $fontB, $paraL) ;
	$section->writetext('Address:', $fontR, $paraL) ;
	addNewLine(3) ;
	$section->writetext('Email:', $fontR, $paraL) ;
	$section->writetext('Telephone:', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('If to Provider:', $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_address'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_phone_daytime'), $fontB, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('If to Vendor:', $fontR, $paraL) ;
	$section->writetext(getFieldLC('company_name_vendor'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('name_vendor_official'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('title_vendor_official'), $fontB, $paraL) ;
	$section->writetext('Address:', $fontR, $paraL) ;
	addNewLine(3) ;
	$section->writetext('Email:', $fontR, $paraL) ;
	$section->writetext('Telephone:', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('Such addresses may be changed by notice given by one party to the other pursuant to this Section 16 or by other form of notice agreed to by the parties.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('17. <u>Compliance</u>. Service Provider acknowledges and agrees that Client expects and requires the highest standards of business ethics from all its Service Providers and suppliers. Service Provider hereby represents and warrants to Client that in the conduct of its provision of Services hereunder, and the conduct of its business generally, it shall at all times, (i) comply with all applicable laws, rules, regulations and orders of any governmental authority in its performance under this Agreement, including, in particular, laws and regulations relating to anti-bribery and anti-corruption (including without limitation, and as applicable, the IJK Bribery Act and the FCPA); (ii) without prejudice to the foregoing, not pay (or offer to pay), or receive (or offer to receive), any bribe, gift, facilitation payment or other monetary or non-monetary inducement; and (iii) have in place professional and robust policies and procedures to ensure compliance by its directors, employees, agents and other connected persons with this Section.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('18. <u>Severability</u>. If any provision of this Agreement is invalid or unenforceable in any jurisdiction, the other provisions herein will remain in full force and effect in such jurisdiction and will be liberally construed to effectuate the purpose and intent of this Agreement, and the invalidity or unenforceability of any provision of this Agreement in any jurisdiction will not affect the validity or enforceability of any such provision in any other jurisdiction', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('19. <u>Waiver of Breach</u>. The waiver of any breach of any provision of this Agreement will be effective only if in writing. No such waiver will operate or be construed as a waiver of any subsequent breach.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('20. <u>Interpretion</u>. As used in this Agreement, including Statements of Work, the use of the term "including" is illustrative and not limiting.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('21. <u>Order of Precedence</u>. To the extent the terms and conditions of this Agreement conflict with the terms and conditions of an applicable SOW, this Agreement will control.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('22. <u>Counterparts</u>. This Agreement may be executed in two or more counterparts, each of which will be deemed to be an original, but all of which together will be considered one and the same agreement.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('23. <u>Non-Circumvention of Vendor(s)</u>. Parties agree that in the event undersigned Vendor or Vendors developed the relationship or provided other services between Client and Provider and parties have agreed to payment of fees for services to Vendor(s), that the party responsible for such fees shall not circumvent Vendor from agreed upon payments. ', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$section->writetext('The parties hereto have caused this Agreement to be executed by their duly authorized representatives as of the Effective Date.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(6,6,6)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext(getFieldLC('company_name_3party'), $fontB, $paraL) ;
	$cellBF1->writetext('By ', $fontB, $paraL);
	$cellBF1->writetext(getFieldLC('name_3party_official'), $fontB, $paraL) ;
	$cellBF1->writetext(getFieldLC('title_3party_official'), $fontB, $paraL) ;
	$cellBF1->writetext('Date: ', $fontB, $paraL);
	
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext(getFieldLC('petitioner_company_name'), $fontB, $paraL) ;
	$cellBF1->writetext('By ', $fontB, $paraL);
	$cellBF1->writetext(getFieldLC('petitioner_primary_contact'), $fontB, $paraL) ;
	$cellBF1->writetext(getFieldLC('petitioner_contact_position'), $fontB, $paraL) ;
	$cellBF1->writetext('Date: ', $fontB, $paraL);
	$cellBF1->writetext('TAX Payer ID: ', $fontB, $paraL);
	
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext(getFieldLC('company_name_vendor'), $fontB, $paraL) ;
	$cellBF1->writetext('By ', $fontB, $paraL);
	$cellBF1->writetext(getFieldLC('name_vendor_official'), $fontB, $paraL) ;
	$cellBF1->writetext(getFieldLC('title_vendor_official'), $fontB, $paraL) ;
	$cellBF1->writetext('Date: ', $fontB, $paraL);
	$cellBF1->writetext('TAX Payer ID: ', $fontB, $paraL);
	
	//EXHIBIT PAGE
	addNewLine(3) ;
	$section->writetext('EXHIBIT A', $fontB, $paraT);
	
	addNewLine(1) ;
	$section->writetext('This Statement of Work ("SOW") is executed as of         , 20   between ' . getFieldLC('company_name_3party') . ' ("Client") and ' . getFieldLC('petitioner_company_name') . ' "Provider.") ', $fontR, $paraL);
	
	$section->writetext('<b>Name of Service Provider’s Employee:</b> ' . getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last') . '.', $fontR, $paraL);
	
	$section->writetext('<b>Position:</b> ' . getFieldLC('position_job_title') . '.', $fontR, $paraL);
	
	$section->writetext('<b>Duties and Qualifications:</b>', $fontR, $paraL);
	
	$section->writetext(getFieldLC('position_duties'), $fontR, $paraL);
	
	$section->writetext("<b>Providers' Supervisor:</b> " . getFieldLC('name_background_supervisor') . ".", $fontR, $paraL);
	
	$section->writetext('<b>Rate paid by Client:</b>', $fontR, $paraL);
	
	$section->writetext('<b>Salary paid by Provider:</b> ' . getFieldLC('position_hourly_pay') . '.', $fontR, $paraL);
	
	$section->writetext('<b>Benefits provided by Provider:</b>', $fontR, $paraL);
	
	$section->writetext('<b>Tools/equipment or other items provided by Provider:</b>', $fontR, $paraL);
	
	$section->writetext('<b>Term:</b> ' . getFieldLC('visa_duration') . '.', $fontR, $paraL);
	
	$section->writetext('<b>Termination:</b> In the event, Client desires to terminate the services of Provider, it may do so at any time with written notice. ', $fontR, $paraL);
	
	$section->writetext('<b>No Employment Relationship between Client and employee(s) of Provider</b>', $fontR, $paraL);
	
	$section->writetext('Parties acknowledge that Service Provider is employer of its employees that may provide services pursuant to this Agreement. Service Provider has right to control its employees, including payment of salaries or fees, benefits if any, determination of whether to hire, fire, promote or admonish or other duties of an employer.  ', $fontR, $paraL);
	
	$section->writetext('<b>Non-Circumvention of Vendor(s)</b>. Parties agree that in the event undersigned Vendor or Vendors developed the relationship or provided other services between Client and Provider and parties have agreed to payment of fees for services to Vendor(s), that the party responsible for such fees shall not circumvent Vendor from agreed upon payments. ', $fontR, $paraL);
	
	addNewLine(1) ;
	$BFTable = $section->addTable() ; 
	$BFTable->addRows(1) ; 
	$BFTable->addColumnsList(array(6,6,6)) ;
	
	$cellBF1 = $BFTable->getCell(1, 1) ;
	$cellBF1->writetext(getFieldLC('company_name_3party'), $fontB, $paraL) ;
	$cellBF1->writetext('By ', $fontB, $paraL);
	$cellBF1->writetext(getFieldLC('name_3party_official'), $fontB, $paraL) ;
	$cellBF1->writetext(getFieldLC('title_3party_official'), $fontB, $paraL) ;
	$cellBF1->writetext('Date: ', $fontB, $paraL);
	
	
	$cellBF1 = $BFTable->getCell(1, 2) ;
	$cellBF1->writetext(getFieldLC('petitioner_company_name'), $fontB, $paraL) ;
	$cellBF1->writetext('By ', $fontB, $paraL);
	$cellBF1->writetext(getFieldLC('petitioner_primary_contact'), $fontB, $paraL) ;
	$cellBF1->writetext(getFieldLC('petitioner_contact_position'), $fontB, $paraL) ;
	$cellBF1->writetext('Date: ', $fontB, $paraL);
	$cellBF1->writetext('TAX Payer ID: ', $fontB, $paraL);
	
	
	$cellBF1 = $BFTable->getCell(1, 3) ;
	$cellBF1->writetext(getFieldLC('company_name_vendor'), $fontB, $paraL) ;
	$cellBF1->writetext('By ', $fontB, $paraL);
	$cellBF1->writetext(getFieldLC('name_vendor_official'), $fontB, $paraL) ;
	$cellBF1->writetext(getFieldLC('title_vendor_official'), $fontB, $paraL) ;
	$cellBF1->writetext('Date: ', $fontB, $paraL);
	$cellBF1->writetext('TAX Payer ID: ', $fontB, $paraL);
	
	
	
	

	
	
	

?>