<?php

$section->writetext(getFieldLC('petitioner_company_name').' Business Plan', $fontR, $paraR);
addNewLine(3) ;

$section->writetext('Table of Contents', $fontT, $paraT) ;
addNewLine(3) ;

$section->writetext('I. Company Overview ', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('II. Products/Services and Objectives ', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('III. Market Analysis', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('IV. Target Market', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('V. Marketing Strategy', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('VI. Business Processes', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('VII. Significant Customers/Clients', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('VIII. Significant Contracts', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('VIIII. Organizational Structure', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('IX. Staffing', $fontR, $paraL);
addNewLine(1) ;
$section->writetext('X. Five-Year Financial Projections  ', $fontR, $paraL);

$section->insertPageBreak() ;

$section->writetext(getFieldLC('petitioner_company_name') . ' Business Plan', $fontR, $paraR);
addNewLine(3) ;

$section->writetext('I. Company Overview ', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('L_Describe_US_Company'), $fontR, $paraL);
$section->writetext(getFieldLC('petitioner_company_name') . 'name was organized under the laws of the State of ' . getFieldLC('L_State_Incorp_USC') . ' on ' . getFieldLC('L_Date_Incorp_USC'), $fontR, $paraL);
$section->writetext(getFieldLC('petitioner_company_name') . ' is owned by the following:', $fontR, $paraL);
$section->writetext(getFieldLC('L_USC_Ownership'), $fontR, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('L_Describe_Intl_Company'), $fontR, $paraL);
$section->writetext(getFieldLC('L_Int_Company') . ' was organized under the laws of ' . getFieldLC('L_Place_Incorp_IC'). ' on ' . getFieldLC('L_IC_Date_Incorp') .'.', $fontR, $paraL);
$section->writetext(getFieldLC('L_Int_Company') . ' is owned by the following:', $fontR, $paraL);
$section->writetext(getFieldLC('L_IC_Ownership'), $fontR, $paraL);
addNewLine(1) ;
$section->writetext('The legal nexus or qualifying relationship between the companies is ' . getFieldLC('Companies_Relationship') . '.', $fontR, $paraL);
addNewLine(2) ;


$section->writetext('II. Products/Services and Objectives ', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Products_Services_Objectives'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('III. Market Analysis', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Market_Analysis'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('IV. Target Market', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Target_Market'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('V. Marketing Strategy', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Marketing_Strategy'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('VI. Business Processes', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Business_Processes'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('VII. Significant Customers/Clients', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Customer_Clients'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('VIII. Significant Contracts', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Significant_Contracts'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('VIIII. Organizational Structure', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Org_Structure'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('IX. Staffing', $fontB, $paraL);
addNewLine(1) ;
$section->writetext(getFieldLC('Staffing_Description'), $fontR, $paraL);
addNewLine(2) ;


$section->writetext('X. Five-Year Financial Projections  ', $fontB, $paraL);



?>