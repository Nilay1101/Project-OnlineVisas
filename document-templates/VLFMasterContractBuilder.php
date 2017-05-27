<?php

    // Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('beneficiary_contact_email'), $fontB, $paraL) ;
	$section->writetext(getFieldLC('beneficiary_contact_phone_daytime'), $fontB, $paraL) ;
	
	addNewLine(2) ;
	
	$section->writetext('Thank you for choosing Velie Law Firm, PLLC for legal representation in the immigration matter referenced in the attached invoice, which is a part of this Agreement. This Agreement describes the terms in which we agree to operate.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Our Duties:', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('Upon Velie Law Firm, PLLC accepting your case, we will process your visa petition with the United States Citizenship and Immigration Services and other entities necessary or required for approval of your visa.  Velie Law Firm, PLLC will strive to process your application expeditiously.  We will keep all relevant items of your case confidential, to the extent the law allows.  Acceptance of your case will begin only when Velie Law Firm, PLLC receives a signed contract and payment.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Your Duties:', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('You promise to fully disclose all information requested, so we can adequately represent you.  We must rely on the information provided by you as being accurate.  You agree to assume all liability regarding the truthfulness of the information you and your related parties provide to Velie Law Firm, PLLC.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Charges and Payment:', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('The Fees for your services are detailed in the attached invoice.', $fontR, $paraL) ;
	
	$section->writetext('Fees submitted for representation are held in a trust account, and are withdrawn on an ongoing basis as services are rendered. Unless otherwise agreed, all fees for legal services must be paid upfront.', $fontR, $paraL) ;
	
	$section->writetext('Fees listed for representation are based on typical cases for each type of visa. We reserve the right to adjust fees as complex and unique situations arise. You will be notified prior to any fee adjustment, and will be advised of the situation and additional fees. If this occurs you will have the right to terminate representation at that time.', $fontR, $paraL) ;
	
	$section->writetext('Fees are subject to change. Changes are not retroactive. The amount charged is the amount that you agree to in the contract. The United States Citizenship and Immigration Services constantly change the amount of filing fees and Velie Law Firm, PLLC has no control over those fee changes. Therefore, the USCIS fees quoted in this contract are intended to give you an estimate of filing fees you are likely to incur. However, USCIS filing fees are subject to change, at any time without notice, and you will be required to provide all filing fees prior to submission of a petition.', $fontR, $paraL) ;
	
	$section->writetext('We accept Visa, MasterCard, American Express or Discover Cards via the Internet, telephone, or in person and personal and corporate checks. Any returned checks will be charged a $25.00 penalty in addition to any payments currently owed. We reserve the right to terminate representation of your case for failure to pay. In the event work is undertaken by Velie Law Firm, PLLC, and no payment is made, you will be charged an hourly rate of $250.00 per hour, up to the estimated price of your case as quoted at the time work was begun.', $fontR, $paraL) ;
	
	$section->writetext('Our estimates attempt to build in the expenses incurred in a typical case. However, some cases require necessary additional expenses. These could include, but are not limited to, job advertisements in media, postal services, phone charges, witness fees, expert testimony or fees for political consultants, In the event the estimated expenses are going to exceed the amount quoted, we will notify you , seeking your approval.', $fontR, $paraL) ;
	
	$section->writetext('USCIS has increased their Request Further Evidence (RFE) to virtually all cases.  Because of this we are finding that we have to put in significant time to answer their questions.  We have determined a 2-Tier system as the best approach to RFEs.  1)  For a standard RFE of questions less than 4 hours additional work will be charged a flat fee of $750.00 and 2) for a complex RFE requiring more than 4 hours additional work will be charged a flat fee of $1,200.00.  We will inform you immediately if you receive a RFE and if it is a tier 1 or 2.  Once we receive payment we will begin work on all questions contained in the RFE. ', $fontR, $paraL) ;
	
	$section->writetext('In the event your cases proves to be more unique or complex than usual or you require additional services, (beyond the services listed in this contract), we will notify you regarding the additional time or services needed and attempt to reach a mutually agreeable resolution. If Velie Law Firm, PLLC and you cannot reach an agreement, a refund of any money not expended will be provided, upon written notification from you stating that you wish to terminate our representation of your case.', $fontR, $paraL) ;
	
	$section->writetext('If you will be Consular Processing and you choose to have the Velie Law Firm, PLLC schedule your appointment for you, the fee will be $500.00.', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Right to Market:', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('You agree to allow us to distribute and/or publish your name and likeness that we have represented you and your company, if you are a representative of a company. If you object to Velie Law Firm, PLLC marketing that we have represented you, please notify Velie Law Firm, PLLC in writing. ', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Guarantee:', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('While we cannot know whether USCIS will approve your petition, we guarantee our work. If you are denied, we will resubmit your case unless the law does not permit it. If the denial was based on an act or omission by us, we will pay the filling fees and cost. If the denial was not due to our error, such as a discretionary decision, we will still provide legal services for free but the fees and costs are your responsibilities', $fontR, $paraL) ;
	$section->writetext('USCIS time to process any Petition is constantly changing.  Therefore, we cannot guarantee when USCIS will adjudicate your Petition.  During your Strategy Session an approximate time may be given based on the current average time of your specific visa.  It is an estimate only. ', $fontR, $paraL) ;
	
	addNewLine(2) ;
	$section->writetext('Governing Law:', $fontB, $paraL) ;
	addNewLine(1) ;
	$section->writetext('The laws of the State of Oklahoma will govern this agreement at all times. Actions to interpret this Agreement shall be heard in the Cleveland County District Court of Norman, Oklahoma. ', $fontR, $paraL) ;
	
	$section->writetext('This is a binding document and by signing below, Velie Law Firm, PLLC and you agree to all the above terms and conditions of this Agreement.  Facsimile or photocopies signatures are binding as well as originals.', $fontR, $paraL) ;
	addNewLine(2);
	
	$section->writetext('Agreed to:<br>Velie Law Firm, PLLC', $fontR, $paraL) ;
	addNewLine(3);
	$section->writetext('_______________________', $fontR, $paraL) ;
	$section->writetext('Jon Velie', $fontR, $paraL) ;
	showDate();
	addNewLine(2);
	
	$section->writetext('Agreed to:', $fontR, $paraL) ;
	addNewLine(3);
	$section->writetext('_______________________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('beneficiary_name_first') . ' ' . getFieldLC('beneficiary_name_last'), $fontR, $paraL) ;
	showDate();
	addNewLine(2);
	
	showFees();
	$section->writetext('*Discounted from $2,000.00   Total discount $500.00', $fontR, $paraL) ;
	
?>