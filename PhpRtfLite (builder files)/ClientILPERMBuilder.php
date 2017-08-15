<?php

	// Leave space for company letterhead & address etc.
	addNewLine(3) ;
	
	showDate();
	addNewLine(1) ;
	
	$section->writetext(getFieldLC('petitioner_primary_contact'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_position'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_address'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_contact_email'), $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_phone_daytime'), $fontR, $paraL) ;
	addNewLine(2) ;
	
	$section->writetext('CLIENT INSTRUCTION LETTER—PERM RECRUITMENT AND APPLICATION', $fontB, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('Dear: ' . getFieldLC('petitioner_company_name'), $fontR, $paraL) ;
	addNewLine(1) ;
	
	///////////////////////
	
	$section->writetext('I. Recruitment', $fontB, $paraL) ;
	
	$section->writetext('The permanent labor certification process requires the following recruitment efforts for all applications, which must be completed more than 30 and less than 180 days prior to filing the permanent labor condition application:', $fontR, $paraL) ;
	
	$section->writetext('Advertising on two different Sundays in a newspaper of general circulation in the area of intended em-ployment most appropriate to the occupation. The employer should prepare an advertisement that meets the requirements of the regulations. Normally this included the job title, minimum experience, and education required for the position, employer/company’s name, and directions on how to apply for the job—"send resume to Mr. X at (123) 456-7890. A brief job description may also be included (ex. "Cook—prepare Thai cuisine using traditional recipes"). The employer should then place a classified advertisement for two Sundays in a newspaper of “general circulation" for the geographic area where the job will be performed. The cost of the advertisement (and other recruitment efforts) must be paid by the employer.', $fontR, $paraL) ;
	
	$section->writetext('A job order should also be placed with the State Workforce Agency (SWA) for a period of at least 30 days. This usually involves a job order on the web site that the SWA uses to post its job opportunities. Make sure to make a print out of the job order showing the start and end dates and a copy of the actual job offer as it appears on the web site. This may be the only way to prove that a job order was placed after the job order expires.', $fontR, $paraL) ;
	
	$section->writetext('There are additional requirements for applications that involve a job offer for a professional position. Prior to beginning any of these recruitment requirements, please contact your legal team to determine which may be the most appropriate considering the facts pertaining to this particular application. These additional re-cruitment efforts must also be completed between 30 and 180 days prior to filing the permanent labor con-dition application (although, one of them may end less than 30 days before the labor certification is filed). These additional recruitment activities for professional level jobs are as follows:', $fontR, $paraL) ;
	
	$section->writetext('If the job involved in the application requires experience and an advanced degree, and a professional jour-nal normally would be used to advertise the job opportunity, the employer may, in lieu of one of the Sun-day advertisement, place an advertisement in the professional journal most likely to bring responses from able, willing, qualified, and available U.S. workers.', $fontR, $paraL) ;
	
	$section->writetext('The employer must select three additional recruitment steps from the alternatives listed below:', $fontR, $paraL) ;
	
	$section->writetext('<strong>Job fairs</strong>. Recruitment at job fairs for the occupation involved in the application, which can be documented by brochures advertising the fair and newspaper advertisements in which the em-ployer is named as a participant in the job fair.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Employer’s website</strong>. The use of the employer’s website as a recruitment medium can be doc-umented by providing dated copies of pages from the site that advertise the occupation in-volved in the application.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Job search website other than the employer’s</strong>. The use of a job search website other than the employer’s can be documented by providing dated copies of pages from one or more web-site(s) that advertise the occupation involved in the application. Copies of web pages generated in conjunction with the newspaper advertisements can serve as documentation of the use of a website other than the employer’s.', $fontR, $paraL) ;
	
	$section->writetext('<strong>On-campus recruiting</strong>. The employer’s on-campus recruiting can be documented by providing copies of the notification issued or posted by the college or university’s placement office nam-ing the employer and the date it conducted interviews for employment in the occupation', $fontR, $paraL) ;
	
	$section->writetext('<strong>Trade or professional organizations</strong>. The use of professional or trade organizations as a re-cruitment source can be documented by providing copies of pages of newsletters or trade jour-nals containing advertisements for the occupation involved in the application for labor certifi-cation.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Private employment firms</strong>. The use of private employment firms or placement agencies can be documented by providing documentation sufficient to demonstrate that recruitment has been conducted by a private firm for the occupation for which certification is sought. For example, documentation might consist of copies of contracts between the employer and the private em-ployment firm and copies of advertisements placed by the private employment firm for the oc-cupation involved in the application.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Employee referral program with incentives</strong>. The use of an employee referral program with incentives can be documented by providing dated copies of employer notices or memoranda advertising the program and specifying the incentives offered.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Campus placement offices</strong>. The use of a campus placement office can be documented by providing a copy of the employer’s notice of the job opportunity provided to the campus placement office.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Local and ethnic newspapers</strong>. The use of local and ethnic newspapers can be documented by providing a copy of the page in the newspaper that contains the employer’s advertisement.', $fontR, $paraL) ;
	
	$section->writetext('<strong>Radio and television advertisements</strong>. The use of radio and television advertisements can be documented by providing a copy of the text of the employer’s advertisement along with a writ-ten confirmation from the radio or television station stating when the advertisement was aired.', $fontR, $paraL) ;
	
	$section->writetext('It is very important to obtain documentation of these additional recruitment efforts, including the dates that the job announcement, listing, etc. was available to the public.', $fontR, $paraL) ;
	
	$section->writetext('At this time, an individual at the sponsoring employer should be designated as the person to accept all in-quiries from the recruitment effort. This person is usually the human resources manager or some other sen-ior manager who usually makes hiring decisions for the company for this type of job. Once the advertise-ments and other recruitment efforts have been started, all employees of the sponsoring employer that nor-mally answer incoming telephone calls, or review the incoming mail, should be aware of the job offer and forward all inquires to the company’s designated individual responsible for this matter.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	
	//////////////////////
	
	$section->writetext('II. Notice', $fontB, $paraL) ;
	
	$section->writetext('The employer must give notice of the filing of the Application for Permanent Employment Certification to the bargaining representative (if any) and the employer’s employees. The employer must document that notice was provided. The notice must be posted for at least 10 consecutive businesses days where the em-ployer’s employees can readily read it. The notice may be posting in the immediate vicinity of other Feder-al and State wage, hour and safety notices. In addition to posting a hard copy of the notice, the employer must also publish the notice in any in-house media, in keeping with the employer’s normal recruitment procedures for similar positions. ', $fontR, $paraL) ;
	
	$section->writetext('If the company recruits internally through electronic or printed material, please make sure that a copy of the notice is published. We have also prepared a statement for the employer to sign that provides infor-mation on when and where the notice was posted. After the ten-day posting period, the statement should be completed, signed, and kept. Also save the posted notice, and a copy or print-out of any in-house publica-tion', $fontR, $paraL) ;
	
	addNewLine(1) ;
	
	/////////////////////
	
	$section->writetext('III. Interview and Records', $fontB, $paraL) ;
	
	$section->writetext('The employer must keep records of the recruitment effort. The records include copies of the prevailing wage determination, posted notice, recruitment (as described in the paragraphs above), a recruitment report, and all résumés or applications that were received. These <em>records must be kept for five years</em> from the date the application for permanent labor certification was filed. We suggest that the sponsoring employer keep all documentation related to the permanent labor certification application in a folder that is kept with other human resource records but separate from the foreign workers’ employee records', $fontR, $paraL) ;
	
	$section->writetext('The recruitment report must contain a description of the recruitment steps that were undertaken and the re-sults of each. The attorneys at <strong>your legal team</strong> will assist in the preparation of this part of the report based on information that the employer gives us. The recruitment report must also contain the number of hires and the number of U.S. workers who were rejected, categorized by the lawful job-related reason for such rejection. Please call us after all recruitment has been completed.', $fontR, $paraL) ;
	
	$section->writetext('The applicants may be rejected if they do not meet any requirement of the job offer. However, if the appli-cant can acquire skills necessary to perform the duties involved in the occupation during a reasonable peri-od of on-the-job training, then that U.S. worker is qualified. Therefore, the recruitment report should also state whether a reasonable period of employment would be sufficient for an applicant to obtain skills that are required for the position.', $fontR, $paraL) ;
	
	$section->writetext('The recruitment report will be easier to prepare if each applicant has a separate evaluation form and deter-mination. Please find attached a general evaluation form that can be used for each applicant. Many of the items that are contained on the form are a result of many years of administrative court decisions. We sug-gest modifying the evaluation form to include the requirements listed in the job description and then mak-ing copies for the interviews. The evaluation forms should be kept with the other recruitment records for a five-year period.', $fontR, $paraL) ;
	
	$section->writetext('The employer often thinks that the recruitment process is intended to find the best applicant for the job. This is not correct in the labor certification context. The issue for the Department of Labor is whether there are U.S. workers who are able, willing, qualified, and available for the position being offered. "Qualified" means meeting the minimum requirements that are needed to perform the duties of the position as stated in the job offer. Sponsoring employers will often reject applicants who have the minimum qualifications for the position. This is not permitted in the labor certification process. Department of Labor regulations forbid <strong>your legal team</strong>, and the foreign worker, from participating in the interview process. Documenting the rea-sons for rejection of an applicant provides credibility. Credibility counts, especially if a Certifying Officer challenges any of the findings.', $fontR, $paraL) ;
	
	$section->writetext('Do: ', $fontB, $paraL) ;
	$section->writetext('<bullet> Make sure everyone that answers the phone and receives mail knows there is a position available, and to whom applicants should be referred', $fontR, $paraL) ;
	$section->writetext('<bullet> Follow up unreturned or unanswered phone calls with letters sent by certified mail with a return re-ceipt requested. Make copies of the letters before mailing and keep the returned receipts', $fontR, $paraL) ;
	$section->writetext('<bullet> Make a record of conversations: who said what to whom and when.', $fontR, $paraL) ;
	$section->writetext('<bullet> Contact potentially qualified applicants and set up appointments for interviews quickly (we recommend within the two weeks following publication of the ad to which the applicant is responding).', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Do Not: ', $fontB, $paraL) ;
	$section->writetext('<bullet> Tell an applicant the position is filled or not available.', $fontR, $paraL) ;
	$section->writetext('<bullet> Reject "overqualified" applicants if the applicant is willing to accept the job at the wage and condi-tions offered.', $fontR, $paraL) ;
	$section->writetext('<bullet> Reject applicants who are more qualified than the foreign worker.', $fontR, $paraL) ;
	$section->writetext('<bullet> Ask any questions regarding marital status, sexual orientation, health, religion, age, etc. Normal employment discrimination rules apply.', $fontR, $paraL) ;
	$section->writetext('<bullet> Ask to see proof of permission to work in the United States. ', $fontR, $paraL) ;
	$section->writetext('<bullet> Reject an applicant for subjective reasons. Generally, only objective reasons can be used.', $fontR, $paraL) ;
	$section->writetext('<bullet> Add new requirements for the position after the job offer has been created and advertised.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Examples of <strong>valid</strong> reasons to reject a U.S. worker include:', $fontR, $paraL) ;
	$section->writetext('<bullet> Where the worker was told to schedule a convenient date for an interview and the worker fails to respond.', $fontR, $paraL) ;
	$section->writetext('<bullet> Applicants who fail to respond to certified mail, return receipt requested.', $fontR, $paraL) ;
	$section->writetext('<bullet> Restaurants may require experience in particular cuisine (must be in job offer requirements).', $fontR, $paraL) ;
	$section->writetext('<bullet> A business may require experience in specific software applications (must be in job offer require-ments).', $fontR, $paraL) ;
	$section->writetext('<bullet> A health care facility may require experience in a specialized field (must be in job offer require-ments).', $fontR, $paraL) ;
	$section->writetext('<bullet> An importer may require experience relating to its product (must be in job offer requirements).', $fontR, $paraL) ;
	$section->writetext('<bullet> Applicant shows no interest in the job or response to the company where the employer submits tel-ephone bills, letters from applicants, and other evidence.', $fontR, $paraL) ;
	$section->writetext('<bullet> Poor references, if documented.', $fontR, $paraL) ;
	$section->writetext('<bullet> Poor references, if documented.', $fontR, $paraL) ;
	$section->writetext('<bullet> Although an applicant may be rejected for failure to provide verification of employment history and credentials, an applicant may not be rejected on this basis without the employer first requesting verification from the applicant and failing to receive it.', $fontR, $paraL) ;
	addNewLine(1) ;
	
	$section->writetext('Examples of <strong>invalid</strong> reasons to reject a U.S. worker who applies:', $fontR, $paraL) ;
	$section->writetext('<bullet> Employer’s insistence that the experience be in manufacturing men’s suits when job offer listed experience in manufacturing men’s garments, which the U.S. applicant had.', $fontR, $paraL) ;
	$section->writetext('<bullet> Employer’s insistence that applicants for a mechanic position know how to use a particular hand tool where the applicant had many years of experience as a mechanic and there was no evidence that applicant could not learn the skill in a reasonable period of on-the-job training', $fontR, $paraL) ;
	$section->writetext('<bullet> Applicant is overqualified.', $fontR, $paraL) ;
	$section->writetext('<bullet> Employer suspects that applicant may not remain in the position.', $fontR, $paraL) ;
	$section->writetext('<bullet> Employer did not get cooperation of reference.', $fontR, $paraL) ;

	addNewLine(1) ;
	
	///////////////////////
	
	$section->writetext('IV. Application', $fontB, $paraL) ;
	
	$section->writetext('The employer, specifically the person designated to monitor the application process, must create an ac-count with the U.S. Department of Labor (DOL). Instructions for creating the account are attached. Please be aware that DOL will require subsequent verification that the employer has set up an account. Once the account has been created, the employer must create a sub-account for your attorney. Instructions for creat-ing the sub-account are also attached. ', $fontR, $paraL) ;
	
	$section->writetext('Your attorney will access the sub-account and submit the permanent labor certification application elec-tronically. The application contains many questions that require information about the sponsoring employer or the foreign worker. Attached to these instructions are questions (or draft forms) that need to be answered or confirmed so that our staff may complete the application with accurate information. Please review the attached questions (or draft forms), make additions or changes, and immediately return the documents to our office.', $fontR, $paraL) ;
	
	$section->writetext('A DOL certifying officer will review the application and make a determination. The certifying officer can certify that there is a shortage of able, willing, qualified, and available U.S. workers, or decide that an audit of the application is required, or determine that additional supervised recruitment is required, or deny the application.', $fontR, $paraL) ;
	
	$section->writetext('If the application is certified, the next step in obtaining permanent resident status for the foreign worker is the submission by the sponsoring employer of an immigrant petition to U.S. Citizenship and Immigration Services (USCIS).', $fontR, $paraL) ;
	
	addNewLine(1) ;
	
	//////////////////////
	
	$section->writetext('V. Audit and Supervised Recruitment', $fontB, $paraL) ;
	
	$section->writetext('The certifying officer may decide to conduct an audit of the sponsoring employer’s records and documen-tation. The audit may arise because of a specific concern that the certifying officer has, or as part of a ran-dom selection of applications to evaluate the uniformity and quality of the process. In case of an audit, the certifying officer will send the sponsoring employer a notice that lists the documents that must be submit-ted to the Department of Labor. These documents might include the recruitment report, copies of adver-tisements, or copies of applicants’ résumés. ', $fontR, $paraL) ;
	
	$section->writetext('The certifying officer may decide that additional supervised recruitment is required, and will inform the employer of what additional recruitment is necessary. Applicants for the position respond directly to the certifying officer who then sends this information to the sponsoring employer. The sponsoring employer will then submit the results of the recruitment efforts to the certifying office in a recruitment report.', $fontR, $paraL) ;
	
	$section->writetext('Failure to comply with the certifying officer’s request, or inconsistencies in the documentation, may lead to denial of the application and, possibly, a requirement that the sponsoring employer conduct supervised re-cruitment in future filings of labor certification applications for up to two years.', $fontR, $paraL) ;
	
	$section->writetext('We do not anticipate that an audit or supervised recruitment will be required. However, if the sponsoring employer receives an audit or supervised recruitment notice, the sponsoring employer should contact the <strong>your legal team</strong> immediately. Please note that the additional work involved in complying with an audit re-quest is usually not included in our fee agreement. Therefore, the client is billed separately for this addi-tional work based on our hourly rate.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	
	//////////////////////
	
	$section->writetext('VI. Petition for Immigrant Visa', $fontB, $paraL) ;
	
	$section->writetext('Upon approval, the sponsoring employer must immediately sign the certified application. <strong>Your legal team</strong> will send the certified application to the employer along with the immigrant visa petition and a request for additional information and documents. The original certified application must be filed with USCIS. There-fore, it is critical that the employer return the original, signed application to your legal team by personal delivery or overnight delivery. ', $fontR, $paraL) ;
	
	$section->writetext('An adjudicating officer of USCIS will review the petition and determine if all the requirements for granting the petition have been met. The approval of the petition allows the foreign worker, and his or her family, to apply for an immigrant visa at the American Consulate in their country of residence. With the immigrant visa, the foreign worker can travel to the United States and be admitted as a permanent resident.', $fontR, $paraL) ;
	
	$section->writetext('In some cases, a foreign worker and his or her family members in the United States might be eligible to ap-ply to USCIS for permanent resident status. The foreign worker, and his or her family, can obtain authori-zation to work while waiting for USCIS to make a decision on the application for permanent residence.', $fontR, $paraL) ;
	
	$section->writetext('The foreign worker should be working with the sponsoring employer after becoming a permanent resident. Failure to actually work for the sponsoring employer could result in a finding that the foreign worker used fraud or made misrepresentations to obtain permanent resident status. This situation usually leads to loss of resident status and removal from the United States. However, there are certain situations where failure to work for the sponsoring employer is excusable. It is very important that <strong>your legal team</strong> be contacted if at any time during this process there is a possibility that the foreign worker will not be working for the spon-soring employer', $fontR, $paraL) ;
	
	$section->writetext('We have presented a lot of information in these instructions so that you can be better informed of the re-quirements and general course of the application process. We believe that if you are better informed, you will have a better understanding of the process and have fewer questions, or your questions will be more specific. However, if you have any question regarding the permanent labor certification, the immigrant pe-titions, or any other related issues, please call our office.', $fontR, $paraL) ;
	
	addNewLine(1) ;
	
	/////////////////////
	
	$section->writetext('VII. Reminders', $fontB, $paraL) ;
	
	$section->writetext('Review and complete the draft permanent labor application. Return the application to <strong>your legal team</strong>. In some cases, you will be instructed to complete an online questionnaire. ', $fontR, $paraL) ;
	
	$section->writetext('Designate an individual at your business that will evaluate applicants. This should be someone who usually does this task. Inform your staff that there is a position open and that all inquiries about the position should be sent to the designated evaluator.', $fontR, $paraL) ;
	
	$section->writetext('Post the attached notice for 10 business days and publish in any in-house media such as an office intranet or company bulletin.', $fontR, $paraL) ;
	
	$section->writetext('Save all documents related to this case in one folder.', $fontR, $paraL) ;
	
	$section->writetext('Complete the Employer’s Statement of Posting.', $fontR, $paraL) ;
	
	$section->writetext('Re-read the section on Recruitment and Interviews.', $fontR, $paraL) ;
	
	$section->writetext('Use the attached Applicant Evaluation Form for interviews. Take notes during interviews.', $fontR, $paraL) ;
	
	$section->writetext('After the recruitment period is over, call <strong>your legal team</strong>.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	
	$section->writetext('Sincerely,', $fontR, $paraR) ;
	$section->writetext('[Attorney]', $fontB, $paraR) ;
	
	
	
?>