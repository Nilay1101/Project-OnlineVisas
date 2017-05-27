<?php

// Leave space for company letterhead & address etc.
	addNewLine(5) ;
	
	$mydate=getdate(date("U"));
	
	$section->writetext('LEASE AGREEMENT', $fontT, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext('It is Agreed on the '. $mydate['mday'] . ' day of ' . $mydate['month'] . ' ' . $mydate['year'] . ' between ' . getFieldLC('L_Int_Company') . ', a ' . getFieldLC('L_State_Incorp_IC') . ' LLC or Corporation ("Lessor") and ' . getFieldLC('petitioner_company_name') . ' ("Lessee") that the lease described below will be assigned to the lessee, for the building located at ' . getFieldLC('Lease_Address') . '.', $fontR, $paraL) ;
    addNewLine(2);
	
	$section->writetext('WITNESS', $fontT, $paraT) ;
	addNewLine(2) ;
	
	$section->writetext("That in consideration of the Lessee's covenants and agreements herein contained, it is hereby agreed by the parties as follows:", $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('I.  Premises', $fontB, $paraL) ;
	$section->writetext('Lessor hereby grants to Lessee the use of an office, conference room, office equipment and support staff at the discretion of Lessor of the building located at ' . getFieldLC('Lease_Address') . ', containing ' . getFieldLC('Lease_Area') . ' (the "Premises").', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('II. Term', $fontB, $paraL) ;
	$section->writetext('The term of this Lease shall commence on ' . getFieldLC('Lease_Start') . ' through ' . getFieldLC('Lease_End') . ', unless previously terminated as hereinafter provided.', $fontR, $paraL) ;
	$section->writetext('Lessor and its designees shall have the right to enter the Premises during reasonable business hours after reasonable notice by telephone or in writing to Lessee, and, in emergencies, at all times, ' . "(i) for any purpose connected with Lessor's rights or obligations under this Lease, and (ii) for all other lawful purposes.", $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('III. Rent', $fontB, $paraL) ;
	$section->writetext('The first year shall be rent free. For years two and three Lessee shall pay to Lessor rental for said Premises in the sum of ' . getFieldLC('Total_Sum') . ', payable in twelve monthly installments of ' . getFieldLC('Installment_Sum') . ', each in advance upon the tenth day of every calendar month of the first year of the lease term hereof, and at the same rate for fractions of a month if said term shall be terminated, as hereinafter provided. ', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('IV.  Interest on Late Payments', $fontB, $paraL) ;
	$section->writetext('Each and every month rental payment and every payment of other charges hereunder which shall not be paid when due shall bear interest at the prime rate as then established, which rate is effective from the date when the same is payable under the terms of this Lease until the same shall be paid.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('V.  Taxes ', $fontB, $paraL) ;
	$section->writetext("(a) In the event that the Premises are taxed, Lessee shall pay any and all real estate taxes assessed on the property as a result of Lessee's tenancy during each calendar year or portion thereof of the Lease. The amount due for any calendar year shall be payable in two (2) installments and Lessee shall pay such amount to Lessor not later than fifteen (15) days prior to the due date of the real estate taxes. ", $fontR, $paraL) ;
	$section->writetext('(b) In the event that any federal, state, local or other governmental authority shall impose or assess any tax, levy or other charge on or against all or any part of the rentals paid or to be paid by Lessee under the terms of this Lease and Lessor is thereby required to collect from Lessee and/or pay such tax, levy or charge to such authority, Lessee covenants and agrees, within ten (10) days from written demand therefore, to pay to or reimburse Lessor (as the case may be) all such charges as may be imposed or assessed, which, for the purposes of this Lease, shall be deemed to be due from Lessee as additional rent.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('VI. Use', $fontB, $paraL) ;
	$section->writetext('The Lessee shall use and occupy such Premises for conducting a fitness training and exercise business. Lessee shall not permit the Premises to be used for any other purpose without the written consent of the Lessor', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('VII. Utilities and Maintenance', $fontB, $paraL) ;
	$section->writetext('Lessor shall provide all utility services, including but not limited to gas, water, sewer and electricity. Lessor shall provide janitorial services. Lessor shall provide for landscaping and removal of snow and ice from driveways and sidewalks', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('VIII. Condition of Premises', $fontB, $paraL) ;
	$section->writetext('No representation except such as are endorsed herein, have been made to the Lessee respecting the condition of said Premises. The taking possession of said Premises by the Lessee shall be conclusive evidence against the Lessee that said Premises were in good and satisfactory condition when possession of the same was so taken; and the Lessee will, at the termination of this Lease by lapse of time or otherwise, return said Premises to the Lessor in as good condition as when received, loss by fire and ordinary wear excepted.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext("IX. Transfer of Occupant's Interest", $fontB, $paraL) ;
	$section->writetext("The Lessee shall not assign, transfer or sublet the leased Premises or any interest hereunder and will not sublet said Premises or any part thereof without the prior written consent of Lessor which consent may be withheld at Lessor's sole and absolute discretion. The Lessee will not permit the use of said Premises by any parties other than the Lessee, its agents and servants, except with the prior written consent of the Lessor which consent may be withheld at Lessor's sole and absolute discretion. If the Lessee shall at any time during the term hereby granted become insolvent, or if proceedings in bankruptcy shall be instituted by or against the Lessee, or if a receiver or a trustee of the Lessee's property shall be appointed, or if the Lessee shall make an assignment for the benefit of creditors, or if this Lease shall, by operation of law, devolve upon or pass to any person or persons other than Lessee, then and in each of said cases it shall and may be lawful for the Lessor, at the Lessor's election, to forfeit this Lease and reenter said Premises and take possession thereof as of its former state without the service of any notice or demand whatever.", $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('X.  Repairs ', $fontB, $paraL) ;
	$section->writetext('(a) Lessor shall make, at its sole cost and expense, all repairs necessary to maintain the plumbing, air conditioning and electrical systems, windows, floors, and all other items which constitute a part of the Premises and are installed or furnished by Lessor; provided, however, that Lessor shall not be obligated for any of such repairs until the expiration of a reasonable period of time after written notice from Lessee that such repair is needed. In no event shall Lessor be obligated under this paragraph to repair any damage caused by any act, omission or negligence of the Lessee or its employees, agents, invitees, licensees, subtenants, or contractors.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('XI.  Indemnification and Liability Insurance', $fontB, $paraL) ;
	$section->writetext('(a) Lessee shall indemnify, hold harmless and defend Lessor from and against any and all costs, expenses, liabilities, losses, damages, suits, actions, fines, penalties, claims or demands of any kind and asserted by or on behalf of any person or governmental authority, arising out of or in any way connected with, and Lessor shall not be liable to Lessee on account of, (i) any failure by Lessee to perform any of the terms, covenants or conditions of this Lease required to be performed by Lessee, (ii) any failure by Lessee to comply with any statutes, ordinances, regulations or orders of any governmental authority, or (iii) any accident, death or personal injury, or damage to or loss or theft of property, which shall occur in or about the Premises except as the same may be caused by the gross negligence of Lessor, its employees or agents.', $fontR, $paraL) ;
	$section->writetext('(b) During the term of this Lease or any renewal thereof, Lessee shall obtain and promptly pay all premiums for general public liability insurance against claims for personal injury, death or property damage occurring upon, in or about the Premises. On or before the commencement date of the term of this Lease and thereafter not less than fifteen (15) days prior to the expiration dates of said policy or policies, Lessee shall provide copies of policies or certificates of insurance evidencing coverage required by this Lease; these policies shall name the Lessor and the Presbytery of Chicago as additional named insured parties.', $fontR, $paraL) ;
	$section->writetext("(c) All policies of insurance shall provide (i) that no material change or cancellation of said policies shall be made without ten (10) days' prior written notice to Lessor and Lessee, (ii) that any loss shall be payable notwithstanding any act or negligence of the Lessee or the Lessor which might otherwise result in the forfeiture of said insurance, and (iii) that the insurance company issuing the same shall have no right of subrogation against the Lessor.", $fontR, $paraL) ;
	$section->writetext('(d) Lessee and Lessor, respectively, hereby release each other from any and all liability or responsibility to the other or anyone claiming through or under them by way of subrogation or otherwise for any loss or damage to property caused by fire or any of the extended coverage or supplementary contract casualties, to the extent such loss or damage is covered by collectible insurance. Lessor and Lessee further agree that insurance carried by either of them against loss or damage by fire or other casualty shall contain, if available without additional cost to Lessee or Lessor, a clause whereby the insurer waives its rights to subrogation against the other party.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('XII. Governmental Regulations', $fontB, $paraL) ;
	$section->writetext('The Lessee, its agents and servants, at its own expense, shall at all times observe, perform and abide by all requirements of any federal, state and local regulatory authorities with respect to the use of the Premises and shall obtain and maintain at its own expense any required licenses, certificates, or variations of the zoning laws, if applicable. Lessor agrees to maintain all fire extinguishers and fire alarms in accordance with the applicable fire code regulations', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('XIII.  Holding Over', $fontB, $paraL) ;
	$section->writetext("If the Lessee retains possession of the Premises or any part thereof after the termination of the term by lapse of time or otherwise, then the Lessor may at its option within thirty (30) days after the termination of the term serve written notice upon Lessee that such holding over constitutes either (a) renewal of this Lease for one year, and from year to year thereafter, at double the monthly payment specified, or (b) creation of a month to month tenancy, upon the terms of this Lease except at double the monthly payment specified. Lessee shall also pay to Lessor all direct and consequential damages sustained by Lessor resulting from retention of possession by Lessee. Lessor's acceptance of any rent after holding over does not constitute a waiver of Lessor's right of reentry.", $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext("XIV.  Lessee's Property", $fontB, $paraL) ;
	$section->writetext('All property belonging to Lessee and its employees, agents and invitees or any occupant of the Premises that is in the building or the Premises, shall be there at the risk of Lessee or other person only, and Lessor shall not be liable for damage thereto or theft or misappropriation thereof.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext("XV.  Lessor's Title", $fontB, $paraL) ;
	$section->writetext("Lessor's title is and shall always be paramount to the title of Lessee and nothing herein contained shall empower Lessee to do any act which can, may, or shall cloud or encumber Lessor's title. Lessee's rights are and shall always to be subordinate to the lien of any mortgage, deed of trust or trust deed in the nature of the mortgage (or trust indentures) as may hereafter be placed on the Premises pursuant to the exercise of its rights under such instrument or instruments, and further provided that Lessee is not in default under the terms of the Lease, Lessee's possession of the Premises shall not be disturbed by such mortgagee, nor shall Lessee be named as a party defendant to any foreclosure of the lien of such instrument or instruments. In confirmation of this subordination, Lessee shall execute and deliver promptly any certificate that shall be requested by Lessor. Lessee hereby appoints the Lessor as attorney-in-fact for the Lessee with full power and authority to execute and deliver in the name of Lessee any such instrument or instruments if not executed within fifteen (15) days after request.", $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('XVI.  Damage by Fire or Other Casualty', $fontB, $paraL) ;
	$section->writetext("If the Premises or the building are made substantially untenantable by fire or other casualty, Lessor may elect (a) to terminate this Lease as of the date of the fire or casualty, or (b) to repair, restore or rehabilitate the building or the Premises at the Lessor's expense within one hundred twenty (120) days after the Lessor is enabled to take possession of the damaged Premises and undertake reconstruction or repairs, in which latter event this Lease shall not terminate but rent shall be abated on a per diem basis while the Premises are untenantable. Lessor shall give Lessee notice of Lessor's election within thirty (30) days after the date of the fire or other casualty. If the Lessor elects to repair, restore or rehabilitate the building or the Premises and does not substantially complete the work within the one hundred twenty (120) day period, Lessee can terminate this Lease as of the date of such fire or casualty by notice to the Lessor not later than one hundred thirty (130) days after the Lessor is enabled to take possession of the damaged Premises and undertake reconstruction or repairs. In the event of termination of the Lease pursuant to this section, rent shall be apportioned on a per diem basis and be paid to the date of the fire or casualty. In all cases due allowance shall be made for reasonable delay caused by adjustment of insurance claims, strikes, labor difficulties or any cause beyond Lessor's reasonable control.", $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('XVII.  Surrender of Premises', $fontB, $paraL) ;
	$section->writetext('Upon any termination of this Lease, by expiration or otherwise, (a) Lessee shall immediately vacate the Premises and surrender possession thereof, including all keys as herein required, to Lessor; (b) Lessee shall surrender the Premises in an good condition as when Lessee took possession, except for reasonable wear and tear and damage by any casualty not caused by Lessee, or for which Lessor collects insurance proceeds; and (c) Lessee grants to Lessor full authority and license to enter the Premises and take possession in the event of any such termination.', $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext('Notices shall be in writing and shall be effectively served by Lessor upon Lessee in any one of the following manners:', $fontR, $paraL) ;
	$section->writetext('(a) by delivery to Lessee at the Premises; or ', $fontR, $paraL) ;
	$section->writetext('(b) by forwarding through certified or registered mail, return receipt requested, to Lessee at the Premises, in which case the time of mailing shall be the time of notice.', $fontR, $paraL) ;
	addNewLine(1);
	$section->writetext('Notices shall be effectively served by Lessee upon Lessor when addressed to Lessor and served either:', $fontR, $paraL) ;
	$section->writetext('(a) upon an officer of Lessor at the Premises; or', $fontR, $paraL) ;
	$section->writetext('(b) upon an authorized person in the office of the building; or ', $fontR, $paraL) ;
	$section->writetext('(c) by forwarding through certified or registered mail, return receipt requested, to Lessor at the building or if notified of another address by Lessor, at such letter address.', $fontR, $paraL) ;
	addNewLine(1);
	
	$section->writetext('XVIII.  Effect of Invalid Provision', $fontB, $paraL) ;
	$section->writetext('If any term or provision of this Lease or the application thereof to any person or circumstances shall to any extent be invalid or unenforceable, the remainder of this Lease, or the application of such term or provision to persons or circumstances other than those as to which it is invalid or unenforceable, shall not be affected thereby, and each term and provision of this Lease shall be valid and be enforced to the fullest extent permitted by law.', $fontR, $paraL) ;
	
	$section->insertPageBreak() ;
	
	$section->writetext('The parties, having read and agreed to the above terms, sign their names as follows:', $fontR, $paraL) ;
	addNewLine(2);
	
	
	$section->writetext('_______________________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('Lessee_Name') . showDate(), $fontR, $paraL) ;
	addNewLine(2);
	
	$section->writetext('_______________________', $fontR, $paraL) ;
	$section->writetext(getFieldLC('petitioner_company_name') . showDate(), $fontR, $paraL) ;
	
	
	

?>