<?php

	// HTTP referrer check
	if ( isSet($_SERVER['HTTP_REFERER']) && sizeof($_POST) )
	{
		$refData = parse_url($_SERVER['HTTP_REFERER']) ;
		if ($refData['host'] != $_SERVER['SERVER_NAME'])
		{
			echo 'Failed the test.' ;
			myDebug($_POST) ;
			exit ;
		}
	}

	include './settings/db.php' ;
	$dev_mode = ($db_db == 'ov-live') ? False : True ;

	error_reporting(E_ERROR | E_WARNING | E_PARSE) ;

	header('Content-Type: text/html; charset=utf-8') ;
	ini_set('default_charset', "utf-8") ;

	session_start() ;
	define ('CRLF', "\r\n") ;
	$current_user_is_admin = (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] ==  1) ? True : False ;

	$debugSQL = False ;
	// if ($_SESSION['user_id'] == 320) $debugSQL = True ;

	// $uploads_dir = 'uploads' ; // Redundant?
	
	$anetLoginLive = $_ENV['ANET_X_LOGIN_LIVE'] ;
	$anetTxnKeyLive = $_ENV['ANET_TXN_KEY_LIVE'] ;
	$anetLoginSbox = $_ENV['ANET_X_LOGIN_SBOX'] ;
	$anetTxnKeySbox = $_ENV['ANET_TXN_KEY_SBOX'] ;

	$awsAccessKey = $_ENV['AWS_ACCESS_KEY'] ;
	$awsSecretKey = $_ENV['AWS_SECRET_KEY'] ;
	$hash_salt = $_ENV['HASH_SALT'] ;

	$awsRoot = 'https://s3.amazonaws.com' ;
	$awsSystemImagesBucket = 'gateway-system-images' ;
	$awsUserImageBucket = 'gateway-user-images' ;
	$awsLogosBucket = 'gateway-logos' ;
	$awsCaseUploadsBucket = 'gateway-case-uploads' ;
	$awsCaseDocumentsBucket = 'gateway-case-documents' ;

	$logos_dir = $awsRoot . '/' . $awsLogosBucket ;
	$photos_dir = $awsRoot . '/' . $awsUserImageBucket ;
	$uploads_dir = $awsRoot . '/' . $awsCaseUploadsBucket ;
	
	$baseHREF = 'http://' . $_SERVER['SERVER_NAME'] ;


	// Used to switch between Authorize.net test/live mode.
	$pay_live = False ;

	$referring_attorney_stakeholder_role_code = 11 ;
	$referring_client_stakeholder_role_code = 13 ;
	$default_lead_section_id = 0 ;
	$default_org_lead_section_id = 0 ;
	
	$milestone_codes = array('' , 'Lead', 'Case', 'Available', 'Offered', 'Adopted', 'New', 'Rejected', 'Resubmitted', 'Strategy', 'In progress', 'Complete', 'Cancelled', 'Archived') ;
	$lead_categories = array('Work', 'Business', 'Investor', 'Family', 'Visitor', 'Tourist') ;

	// Note: There's also a "Special" section type, which is only visible to Superusers.
	$section_types = array('Lead', 'Org-Lead', 'Document', 'Strategy', 'Contract', 'Case-Plan', 'Additional', 'Document-Production', 'Government-Correspondence') ;
	
	$step_types = array (
		0=>'Section Header',
		1=>'Check',
		2=>'File Upload',
		3=>'Simple Payment Link',
		4=>'Authorize.net Payment',
		5=>'Custom Link',
		6=>'Text field',
		7=>'Long text field',
		8=>'Drop-down',
		9=>'Drop-down (Multi-select)',
		10=>'I Agree (button)',
		11=>'Note',
		12=>'Image',
		99=>'Signature'
	) ;
	// Additional: -1 = Embedded subsection
	// Deprecated: 4=>'Private File',

	$NL = "\r\n" ;

	/*
		ORDER OF FUNCTIONS
		1. User
		2. Organization
		3. Firm
		4. Stakeholder & Role
		5. Visa
		6. Petition/Case
		7. Steps
		8. Sections
		9. Leads
		10. Payments
		11. Document Snippets
		12. Case Documents
		13. Hints (inline help)
	*/

	/* 1: USER Functions */

	function loginUser($result, $redirectOnLogin = 'Yes') {
		GLOBAL $cross_max_limit ;
		$bendebug = False ;
		// echo 'Rows = ' . mysqli_num_rows($result) ; exit ;
		
		if ($bendebug) {
			echo 'Rows found = ' . mysqli_num_rows($result) ;
			exit ;
		}

		if (mysqli_num_rows($result) == 1) {

			$row = $result->fetch_assoc() ;
			$_SESSION['user_id'] = $row['id'] ;
			$_SESSION['user_type'] = $row['user_type'] ;
			$_SESSION['first_name'] = $row['first_name'] ;
			$_SESSION['last_name'] = $row['last_name'] ;
			$_SESSION['is_admin'] = $row['is_admin'] ;
			$_SESSION['user_type'] = $row['user_type'] ;
			$_SESSION['user_icon_url'] = gravatar(trim($_POST['email'])) ;

			if ($row['user_type'] == 'Organization') {
				// Org Rep. Fetch Org information
				$org_info = orgFetch($row['organization_id']) ;
				$_SESSION['organization_id'] = $row['organization_id'] ;
				$_SESSION['org_name'] = $org_info['org_name'] ;
				if ($org_info['logo_file'] != null && strlen($org_info['logo_file']) > 0) {
					$_SESSION['logo'] = $org_info['logo_file'] ;
				}
				// Go straight to Petitions list
				$_SESSION['is_single_beneficiary'] = False ;
				logEvent('Logged in', $_SESSION['user_id']) ;
			    header( 'Location: org-show.php?id=' . $row['organization_id'] . '&msgtype=ok&msg=Logged in as: '. $row['first_name'] . ' ' . $row['last_name'] ) ;
			    exit ;
			}
			else if ($row['user_type'] == 'Firm') {
				// Firm Rep. Fetch Firm information
				$firm_info = firmFetch($row['firm_id']) ;
				$_SESSION['firm_id'] = $row['firm_id'] ;
				$_SESSION['firm_name'] = $firm_info['firm_name'] ;
				$_SESSION['country_id'] = $firm_info['country_id'] ;
				// Go straight to Petitions list
				$_SESSION['is_single_beneficiary'] = False ;
				if ($firm_info['logo_file'] != null && strlen($firm_info['logo_file']) > 0) {
					$_SESSION['logo'] = $firm_info['logo_file'] ;
				}
				logEvent('Logged in', $_SESSION['user_id']) ;

				if (isSet($_POST['fwd'])) {
					header('Location: ' . ltrim(urldecode($_POST['fwd']), '/')) ;
				}
			    else {
			    	header( 'Location: pets-list.php?msgtype=ok&msg=Logged in as: '. $row['first_name'] . ' ' . $row['last_name'] ) ;
			    }
			    exit ;
			}

			// But also check if the user is beneficiary on one Petition only.
			$isBen = beneficiaryTest($row['id']) ;
			//echo $row['id'] ; exit ;
			if ($isBen !== False) {
				$_SESSION['is_single_beneficiary'] = True ;
				$_SESSION['single_beneficiary_petition_id'] = $isBen ;

				// And get logo file for the Organization (preferred) or Firm associated with the specific Petition
				$logoInfo = getLogoForPetition($isBen) ;

				if (strlen($logoInfo['logo_file'])) {
					$_SESSION['logo'] = $logoInfo['logo_file'] ;
				}
				if ($logoInfo['organization_id'] != Null) {
					$_SESSION['organization_id'] = $logoInfo['organization_id'] ;
				}
				else if ($logoInfo['firm_id'] != Null) {
					$_SESSION['firm_id'] = $logoInfo['firm_id'] ;
				}
			}

			$_SESSION['show_help'] = 'show-help-on' ;

			// myDebug($row) ;
			// Log the login event
			logEvent('Logged in', $_SESSION['user_id']) ;

			if (isSet($_POST['fwd'])) {
				header('Location: ' . $_POST['fwd']) ;
			}
			else if (isset($_SESSION['is_single_beneficiary']) && $_SESSION['is_single_beneficiary'] == True) {
				header('Location:case-show.php?id=' . $isBen) ;
			}
			else if ($_SESSION['user_type'] == 'Superuser') {
		    	header( 'Location: index.php?msgtype=ok&msg=Logged in as: '. $row['first_name'] . ' ' . $row['last_name'] ) ;
		   	}
		   	else {
		   		// myDebug($_POST) ; exit ;
		   		if ($redirectOnLogin == 'Yes') {
			   		header( 'Location: user-home.php?msgtype=ok&msg=Logged in as: '. $row['first_name'] . ' ' . $row['last_name'] ) ;
			   	}
		   	}
		}
		else if (mysqli_num_rows($result) > 1) {
			header( 'Location: index.php?msgtype=error&msg=Login failed: ' . mysqli_num_rows($result) . ' results found.' ) ;
			exit ;
		}
		else {
			if($cross_max_limit==1){
				$add_error = '&maxattempt=1' ;
			}
			else{
				$add_error = '';
			}
		    header( 'Location: index.php?msgtype=error&msg=Login failed' . $add_error ) ;
		    exit ;
		}
		
	}

	function userFetch($id, $activation_code = NULL) {
		settype($id, 'integer') ;
		//$activation_code = unPunctuate($activation_code) ;

		// Get all details for named user, including organization/firm details.
		$SQL_user_fetch = 'SELECT
			tUsers.*,
			tOrganizations.org_name,
			tFirms.firm_name, tFirms.country_id
			FROM tUsers LEFT OUTER JOIN tOrganizations ON tUsers.organization_id = tOrganizations.id
			LEFT OUTER JOIN tFirms on tUsers.firm_id = tFirms.id
		' ;
		if ($id != Null) {
			$SQL_user_fetch .= ' WHERE tUsers.id = ' . $id . ' LIMIT 1 ;' ;
		}
		else if (isset($activation_code)) {
			$SQL_user_fetch .= ' WHERE tUsers.activation_code = ' . $activation_code . ' LIMIT 1 ;' ;
		}
		// myDebug($SQL_user_fetch) ;
		$result_user_fetch = runSQL($SQL_user_fetch, 'reader') ;
		if (mysqli_num_rows($result_user_fetch) == 1) {
			if (False === is_null($activation_code)) {
				return $result_user_fetch ;
			}
			else {
				return ($result_user_fetch->fetch_assoc()) ;
			}
		}
		else return False ;
	}

	function userFetchEmail($email, $notUserID = NULL) {
		$SQL_user_fetch_email = 'SELECT * FROM tUsers WHERE email = "' . trim($email) . '"' ;
		if (False === is_null($notUserID)) {
			$SQL_user_fetch_email .= ' AND id != ' . $notUserID ;	
		}
		$SQL_user_fetch_email .= ' ;' ;
		// myDebug($SQL_user_fetch_email) ; exit ;
		$result_user_fetch_email = runSQL($SQL_user_fetch_email, 'reader') ;
		return ($result_user_fetch_email) ;
	}

	function listUsersFirm($scope) {
		$SQL_list_firm_reps = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.date_added, tUsers.firm_id,
			tUsers.is_admin, tUsers.hidden, tFirms.firm_name, tUsers.email
			FROM tUsers
			LEFT OUTER JOIN tFirms
			ON tUsers.firm_id = tFirms.id
		' ;
		if ($scope == 'ALL') {
			$SQL_list_firm_reps .= ' WHERE tUsers.firm_id IS NOT NULL AND tUsers.firm_id != 0 ' ;
		}
		else if ($scope == 'MINE') {
			$SQL_list_firm_reps .= ' WHERE tUsers.firm_id = ' . $_SESSION['firm_id'] ;
		}
		$SQL_list_firm_reps .= ' ORDER BY tFirms.firm_name, tUsers.last_name ; ' ;
		// myDebug($SQL_list_firm_reps) ;
		$result_list_firm_reps = runSQL($SQL_list_firm_reps, 'reader') ;
		return $result_list_firm_reps ;
	}

	function listUsersOrg($scope) {
		$SQL_list_org_reps = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.email, tUsers.date_added,
			tUsers.organization_id, tUsers.is_admin, tUsers.hidden,
			tOrganizations.org_name
			FROM tUsers INNER JOIN tOrganizations
			ON tUsers.organization_id = tOrganizations.id
			WHERE tUsers.organization_id > 0
			' ;
		if ($scope == 'ALL') {
			$SQL_list_org_reps .= ' AND tUsers.organization_id IS NOT NULL ' ;
		}
		else if ($scope == 'MINE') {
			$SQL_list_org_reps .= ' AND tUsers.organization_id = ' . $_SESSION['organization_id'] ;
		}
		$SQL_list_org_reps .= ' ORDER BY tOrganizations.org_name, tUsers.last_name ; ' ;
		// myDebug($SQL_list_org_reps) ;
		$result_list_org_reps = runSQL($SQL_list_org_reps, 'reader') ;
		return $result_list_org_reps ;
	}

	function listUsersMyFirmsOrg() {
		$SQL_list_users_my_firms_org = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.email, tUsers.date_added,
			tUsers.organization_id, tUsers.is_admin,
			tOrganizations.org_name
			FROM tUsers INNER JOIN tOrganizations
				ON tUsers.organization_id = tOrganizations.id
			INNER JOIN tOrgFirmLinks
				ON tUsers.organization_id = tOrgFirmLinks.organization_id
			WHERE tUsers.organization_id > 0
			AND tOrgFirmLinks.firm_id = ' . $_SESSION['firm_id'] . '
			ORDER BY tOrganizations.org_name, tUsers.last_name ; ' ;
		// myDebug($SQL_list_users_my_firms_org) ;
		$result_list_users_my_firms_org = runSQL($SQL_list_users_my_firms_org, 'reader') ;
		return $result_list_users_my_firms_org ;
	}

	function listUsersOther() {
		$SQL_list_users_other = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.date_added, tUsers.organization_id,
			tUsers.is_admin, tUsers.hidden, tUsers.email
			FROM tUsers
			WHERE user_type = "Stakeholder"
			ORDER BY tUsers.last_name ; ' ;
		// myDebug($SQL_list_users_other) ;
		$result_list_users_other = runSQL($SQL_list_users_other, 'reader') ;
		return $result_list_users_other ;
	}

	function listUsersICreated() {
		// Show users who have no Firm or Organization set, and which I created.
		$SQL_list_users_i_created = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.email, tUsers.date_added, tUsers.hidden, NULL as firm_name, NULL as org_name
			FROM tUsers
			WHERE tUsers.user_type = "Stakeholder"
			AND tUsers.created_by_user_id = ' . $_SESSION['user_id'] . ' ;' ;
		// var_dump($SQL_list_users_i_created) ; exit ;
		$result_list_users_i_created = runSQL($SQL_list_users_i_created, 'reader') ;
		return $result_list_users_i_created ;
	}

	function iCreatedUser($userID) {
		$SQL_i_created_user = 'SELECT id FROM tUsers WHERE id = ' . $userID . ' AND created_by_user_id = ' . $_SESSION['user_id'] ;
		$result_i_created_user = runSQL($SQL_i_created_user, 'reader') ;
		return (mysqli_num_rows($result_i_created_user)==1) ? True : False ;
	}

	function myFirmCreatedUser($userID) {
		$SQL_my_firm_created_user = 'SELECT QueryUserTable.id
			FROM tUsers QueryUserTable INNER JOIN tUsers CreatedByUserTable
			ON QueryUserTable.created_by_user_id = CreatedByUserTable.id
			WHERE CreatedByUserTable.firm_id = ' . $_SESSION['firm_id'] . '
			AND QueryUserTable.id = ' . $userID . '
			 ;
		' ;
		$result_my_firm_created_user = runSQL($SQL_my_firm_created_user, 'reader') ;
		if ($result_my_firm_created_user && mysqli_num_rows($result_my_firm_created_user) > 0) {
			return True ;
		}
		else {
			return False ;
		}
	}

	function imFirmAdminForUser($userID) {
		if ($_SESSION['user_type'] != 'Firm' || $_SESSION['current_user_is_admin'] !== True) {
			return False ;
		}
		else {
			$SQL_im_firm_admin = 'SELECT * FROM tUsers WHERE id = ' . $userID ;
			$result_im_firm_admin = runSQL($SQL_im_firm_admin, 'reader') ;
			$row_im_firm_admin = $result_im_firm_admin->fetch_assoc() ;
			if ($row_im_firm_admin['firm_id'] != $_SESSION['firm_id']) {
				return False ;
			}
			else {
				return True ;
			}
		}
	}

	function imInSameFirmAsUser($userID) {
		if ($_SESSION['user_type'] != 'Firm') {
			return False ;
		}
		else {
			$SQL_in_same_firm = 'SELECT * FROM tUsers WHERE id = ' . $userID . ' LIMIT 1 ; ' ;
			$result_in_same_firm = runSQL($SQL_in_same_firm, 'reader') ;
			$row_in_same_firm = $result_in_same_firm->fetch_assoc() ;
			if ($row_in_same_firm['firm_id'] != $_SESSION['firm_id']) {
				return False ;
			}
			else {
				return True ;
			}
		}
	}

	function imOrgAdminForUser($userID) {
		if ($_SESSION['user_type'] != 'Organization' || $_SESSION['current_user_is_admin'] !== True) {
			return False ;
		}
		else {
			$SQL_im_org_admin = 'SELECT * FROM tUsers WHERE id = ' . $userID ;
			$result_im_org_admin = runSQL($SQL_im_org_admin, 'reader') ;
			$row_im_org_admin = $result_im_org_admin->fetch_assoc() ;
			if ($row_im_org_admin['organization_id'] != $_SESSION['organization_id']) {
				return False ;
			}
			else {
				return True ;
			}
		}
	}

	function imInSameOrgAsUser($userID) {
		if ($_SESSION['user_type'] != 'Organization') {
			return False ;
		}
		else {
			$SQL_in_same_org = 'SELECT * FROM tUsers WHERE id = ' . $userID ;
			$result_in_same_org = runSQL($SQL_in_same_org, 'reader') ;
			$row_in_same_org = $result_in_same_org->fetch_assoc() ;
			if ($row_in_same_org['organization_id'] != $_SESSION['organization_id']) {
				return False ;
			}
			else {
				return True ;
			}
		}
	}

	function listSuperusers() {
		$SQL_list_superusers = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.date_added,
			tUsers.organization_id, tUsers.firm_id,
			tUsers.is_admin, tUsers.hidden,  tUsers.email
			FROM tUsers
			WHERE tUsers.user_type = "Superuser"
			ORDER BY tUsers.last_name
			; ' ;
		$result_list_superusers = runSQL($SQL_list_superusers, 'reader') ;
		return $result_list_superusers ;
	}


















	/* 2: ORG Functions */

	function getCustomFields($type, $parent_id) {
		$SQL_get_custom_fields = 'SELECT * FROM tCustomFields WHERE type = "' . $type . '" AND parent_id = ' . $parent_id . ' ; ' ;
		$RES_get_custom_fields = runSQL($SQL_get_custom_fields, 'reader') ;
		return $RES_get_custom_fields ;
		
	}

	function orgFetch($org_id = Null, $sort = 'name') {
		$SQL_org_fetch = 'SELECT
				tOrganizations.*
			FROM tOrganizations
			WHERE 1=1 ' ;

		if (isset($org_id)) {
			settype($org_id, 'integer') ;
			$SQL_org_fetch .= ' AND tOrganizations.id = ' . $org_id  ;
		}
		/*
		else if ($_SESSION['is_firm_rep'] == 1) {
			$SQL_org_fetch .= ' and tOrganizations.firm_id = ' . $_SESSION['firm_id'] ;
		}
		*/
		$SQL_org_fetch .= ' AND tOrganizations.trashed != 1';
		
		if ($sort == 'name') {
			$SQL_org_fetch .= ' ORDER BY org_name ; ' ;
		}
		else if ($sort == 'date') {
			$SQL_org_fetch .= ' ORDER BY date_added DESC ; ' ;
		}
		$result_org_fetch = runSQL($SQL_org_fetch, 'reader') ;
		if (isset($org_id)) {
			return ($result_org_fetch->fetch_assoc()) ;
		}
		else {
			return $result_org_fetch ;
		}
	}

	function getMyOrganization() {
		$SQL_get_org = '
			SELECT tOrganizations.id AS org_id, tOrganizations.org_name
			FROM tOrganizations INNER JOIN tUsers 
			ON tUsers.organization_id = tOrganizations.id
			WHERE tUsers.id = ' . $_SESSION['user_id'] . ' ; ' ;
			// var_dump($SQL_get_org) ;
		$result_get_org = runSQL($SQL_get_org, 'reader') ;
		// myDebug($result_get_org) ;
		return $result_get_org->fetch_assoc() ;
	}

	function getOrgReps($org_id) {
		settype($org_id, 'integer') ;
		$SQL_get_org_reps = 'SELECT first_name, last_name, email,image_file, contact_phone
				FROM tUsers
				WHERE user_type = "Organization"
				AND organization_id = ' . $org_id . ' ; ' ;
		$result_get_org_reps = runSQL($SQL_get_org_reps, 'reader') ;
		return $result_get_org_reps ; }

	function listOrgsLinkedToFirm($firm_id = Null, $sort = 'name') {
		if (is_null($firm_id)) $firm_id = $_SESSION['firm_id'] ;
		$SQL_list_orgs_linked_to_firm = 'SELECT tOrganizations.*
			FROM tOrganizations INNER JOIN tOrgFirmLinks
			ON tOrgFirmLinks.organization_id = tOrganizations.id
			WHERE tOrgFirmLinks.firm_id = ' . $firm_id ;

		if ($sort == 'name')
		{
			$SQL_list_orgs_linked_to_firm .= ' ORDER BY org_name ; ' ;
		}
		else if ($sort == 'date')
		{
			$SQL_list_orgs_linked_to_firm .= ' ORDER BY date_added DESC ; ' ;
		}
		$result_list_orgs_linked_to_firm = runSQL($SQL_list_orgs_linked_to_firm, 'reader') ;
		return $result_list_orgs_linked_to_firm ;
	}

	function myFirmIsConnectedToOrg($org_id) {
		$SQL_my_firm_is_connected_to_org = 'SELECT id FROM tOrgFirmLinks WHERE firm_id = ' . $_SESSION['firm_id'] . ' AND organization_id = ' . $org_id . ' ; ' ;
		$result_my_firm_is_connected_to_org = runSQL($SQL_my_firm_is_connected_to_org, 'reader') ;
		if (mysqli_num_rows($result_my_firm_is_connected_to_org) > 0) {
			return True ;
		}
		else return False ;
	}






















	/* 3: FIRM Functions */

	function firmFetch($id = Null, $order = 'Firm') {
		// Returns either details on a single firm or all firms.
		$SQL_firm_fetch = 'SELECT tFirms.*, tCountries.country, tCountries.country_code FROM tFirms
			left JOIN tCountries ON tFirms.country_id = tCountries.id WHERE 1=1';
		if (isset($id)) {
			settype($id, 'integer') ;
			$SQL_firm_fetch .= ' and tFirms.id = ' . $id  ;

		}
		$SQL_firm_fetch .= ' and trashed != 1  ' ;
		if ($order == 'Country') {
			$SQL_firm_fetch .= ' ORDER BY country, firm_name ' ;
		}
		else {
			$SQL_firm_fetch .= ' ORDER BY firm_name ' ;
		}
		$result_firm_fetch = runSQL($SQL_firm_fetch, 'reader') ;
		if (isset($id)) {
			return ($result_firm_fetch->fetch_assoc()) ;
		}
		else {
			return $result_firm_fetch ;
		}
	}

	function firmCountry($firm_id = Null) {
		if (is_null($firm_id)) {
			$firm_id = $_SESSION['firm_id'] ;
		}
		$SQL_firm_country = 'SELECT country_id FROM tFirms WHERE id = ' . $firm_id . ' ; ' ;
		$result_firm_country = runSQL($SQL_firm_country, 'reader') ;
		$row_firm_country = $result_firm_country->fetch_assoc() ;
		return $row_firm_country['country_id'] ;
	}

	function firmsListForOrg() {
		$SQL_firms_list_for_org = 'SELECT DISTINCT tOrgFirmLinks.firm_id, tFirms.firm_name
			FROM tOrgFirmLinks INNER JOIN tFirms ON tFirms.id = tOrgFirmLinks.firm_id
			WHERE tOrgFirmLinks.organization_id = ' . $_SESSION['organization_id'] . ' ; ' ;
		$result_firms_list_for_org = runSQL($SQL_firms_list_for_org, 'reader') ;
		return $result_firms_list_for_org ;
	}

	function getContactEmailFirm($firm_id) {
		$SQL_get_contact_email_firm = 'SELECT primary_email FROM tFirms WHERE id = ' . $firm_id ;
		$result_get_contact_email_firm = runSQL($SQL_get_contact_email_firm, 'reader') ;
		$row_get_contact_email_firm = $result_get_contact_email_firm->fetch_assoc() ;
		if (!strlen($row_get_contact_email_firm['primary_email'])) {
			return Null ;
		}
		else return $row_get_contact_email_firm['primary_email'] ;
	}

	function getFirmCustomField($firm_id, $field_name) {
		$SQL_get_fcf = 'SELECT field_value FROM tCustomFields
			WHERE type = "firm" AND parent_id = ' . $firm_id . ' AND field_name = "' . $field_name . '" LIMIT 1 ; ' ;
		$RES_get_fcf = runSQL($SQL_get_fcf, 'reader') ;
		if (mysqli_num_rows($RES_get_fcf) == 1) {
			$ROW_get_fcf = $RES_get_fcf->fetch_assoc() ;
			return $ROW_get_fcf['field_value'] ;
		}
		else return False ;
	}





















	/* 4: STAKEHOLDER & ROLE Functions */

	function ovAddSpecialStakeholders($case_id)
	{
		ovAddSpecialStakeholder($case_id, 14, 'judy@onlinevisas.com') ;
		ovAddSpecialStakeholder($case_id, 13, 'nina@onlinevisas.com') ;
		ovAddSpecialStakeholder($case_id, 13, 'heidi.ochs@onlinevisas.com') ;
	}

	function ovAddSpecialStakeholder($case_id, $sh_role_id, $email)
	{
		$SQL_find_rep_id = 'SELECT id FROM tUsers WHERE email = "' . $email . '" LIMIT 1 ;' ;
		$RES_find_rep_id = runSQL($SQL_find_rep_id, 'reader') ;
		if ($RES_find_rep_id && mysqli_num_rows($RES_find_rep_id) == 1)
		{
			$ROW_find_rep_id = $RES_find_rep_id->fetch_assoc() ;
			$user_id = $ROW_find_rep_id['id'] ;
			$SQL_insert_special_stakeholder = 'INSERT INTO tStakeholders (petition_id, stakeholder_role_id, stakeholder_user_id) 
				VALUES ( ' . $case_id . ' , ' . $sh_role_id . ' , ' . $user_id . ' ) ' ;
			$RES_insert_special_stakeholder = runSQL($SQL_insert_special_stakeholder, 'writer') ;
		}
	}

	function getStakeholderContactDetails($case_id, $stakeholder_role_code)
	{
		$SQL_get_sh_details = 'SELECT
			tUsers.first_name, tUsers.last_name, tUsers.email, tUsers.contact_phone,
			tStakeholderRoles.stakeholder_role_code, tStakeholderRoles.stakeholder_role_description
			FROM tUsers
				INNER JOIN tStakeholders ON tUsers.id = tStakeholders.stakeholder_user_id
				INNER JOIN tStakeholderRoles ON tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			WHERE
				tStakeholderRoles.stakeholder_role_code = "' . $stakeholder_role_code . '"
			AND
				tStakeholders.petition_id = ' . $case_id . '
		; ' ;
		// myDebug($SQL_get_sh_details) ;
		$RES_get_sh_details = runSQL($SQL_get_sh_details, 'reader') ;
		return $RES_get_sh_details ;
	}

	function getBeneficiaryForPetition($petition_id)
	{
		settype($petition_id, 'integer') ;
		$SQL_get_beneficiary_for_petition = 'SELECT
			tUsers.first_name, tUsers.last_name, tUsers.image_file
			FROM tUsers INNER JOIN tStakeholders ON tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tStakeholderRoles ON tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			INNER JOIN tPetitions ON tStakeholders.petition_id = tPetitions.id
			WHERE tPetitions.id = ' . $petition_id . '
			AND tStakeholderRoles.stakeholder_role_code = "beneficiary"
			LIMIT 1 ;
		' ;
		// Was.. AND tUsers.user_type = "Stakeholder"
		// myDebug($SQL_get_beneficiary_for_petition) ;
		$result_get_beneficiary_for_petition = runSQL($SQL_get_beneficiary_for_petition, 'reader') ;
		$row_get_beneficiary_for_petition = $result_get_beneficiary_for_petition->fetch_assoc() ;
		// myDebug($row_get_beneficiary_for_petition) ;
		return $row_get_beneficiary_for_petition ;
	}

	function beneficiaryTest($user_id = Null) {
		// Tests whether the current logged-in user is a beneficiary on a single Petition
		if ($user_id == Null) {
			$user_id = $_SESSION['user_id'] ;
		}
	    $pets_list = getPetitionsForStakeholder($user_id) ;
	    if (mysqli_num_rows($pets_list) == 1) {
	        $pet_details = $pets_list->fetch_assoc() ;
	        if ($pet_details['stakeholder_role_code'] == 'beneficiary') {
	            return ($pet_details['id']) ;
	        }
	    }
	    return False ;
	}

	function getTempBeneficiaryInfo($activation_code) {
		settype($activation_code, 'integer') ;
		$SQL_get_temp_beneficiary_info = 'SELECT
			tUsers.id, tUsers.first_name, tUsers.last_name, tUsers.email, tUsers.is_admin, tUsers.pwd_hash,
			tPetitions.organization_id,
			tStakeholders.petition_id,
			tFirms.logo_file AS firm_logo,
			tOrganizations.logo_file AS org_logo
			FROM tUsers INNER JOIN tStakeholders ON tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tPetitions ON tStakeholders.petition_id = tPetitions.id
			LEFT OUTER JOIN tOrganizations ON tPetitions.organization_id = tOrganizations.id
			LEFT OUTER JOIN tFirms ON tPetitions.firm_id = tFirms.id
			WHERE tUsers.activation_code = ' . $activation_code . ' LIMIT 1 ;' ;
		$result_get_temp_beneficiary_info = runSQL($SQL_get_temp_beneficiary_info, 'reader') ;
		$row_get_temp_beneficiary_info = $result_get_temp_beneficiary_info->fetch_assoc() ;
		return $row_get_temp_beneficiary_info ;
	}

	function getPetitionsForStakeholder($user_id) {
		settype($user_id, 'integer') ;
		$SQL_get_petitions_for_sh = 'SELECT
			tPetitions.*,
			tUsers.first_name, tUsers.last_name,
			tStakeholderRoles.stakeholder_role_code,
			tStakeholders.receive_updates,
			tStakeholders.id AS sh_id,
			tVisaTypes.visa_code,
			tFirms.firm_name
			FROM tPetitions INNER JOIN tStakeholders ON tStakeholders.petition_id = tPetitions.id
			INNER JOIN tUsers ON tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tStakeholderRoles ON tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			LEFT OUTER JOIN tVisaTypes ON tPetitions.visa_type_id = tVisaTypes.id
			INNER JOIN tFirms ON tPetitions.firm_id = tFirms.id
			WHERE tStakeholders.stakeholder_user_id = ' . $user_id  . '
			AND tPetitions.trashed != 1 ' ;
		if (False === is_null($sql_filter))
		{
			$SQL_get_petitions_for_sh .= ' AND ' . $sql_filter ;
		}
		$SQL_get_petitions_for_sh .=  ' ; ' ;
		$result_get_petitions_for_sh = runSQL($SQL_get_petitions_for_sh, 'reader') ;
		return $result_get_petitions_for_sh ;
	}

	function getOtherSHLeadsForFirmUser()
	{
		settype($user_id, 'integer') ;
		$SQL_get_other_sh_leads_for_firm_user = 'SELECT
			tPetitions.*
			FROM tPetitions INNER JOIN tStakeholders ON tStakeholders.petition_id = tPetitions.id
			INNER JOIN tUsers ON tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tStakeholderRoles ON tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			WHERE tStakeholders.stakeholder_user_id = ' . $_SESSION['user_id']  . '
			AND tPetitions.trashed != 1
			AND (tPetitions.firm_id IS NULL OR tPetitions.firm_id != ' . $_SESSION['firm_id'] . ')
			AND tPetitions.status IN ("Lead","Adopted","Rejected")
			' ;
		$RES_get_other_sh_leads_for_firm_user = runSQL($SQL_get_other_sh_leads_for_firm_user, 'reader') ;
		return $RES_get_other_sh_leads_for_firm_user ;
	}

	function getPetitionsForStakeholderByString($string) {
		$SQL_get_petitions_for_sh_string = 'SELECT
			tPetitions.*,
			tUsers.first_name, tUsers.last_name, tUsers.email,
			tStakeholderRoles.stakeholder_role_code,
			tStakeholders.receive_updates,
			tStakeholders.id AS sh_id,
			tVisaTypes.visa_code,
			tFirms.firm_name
			FROM tPetitions INNER JOIN tStakeholders ON tStakeholders.petition_id = tPetitions.id
			INNER JOIN tUsers ON tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tStakeholderRoles ON tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			LEFT OUTER JOIN tVisaTypes ON tPetitions.visa_type_id = tVisaTypes.id
			INNER JOIN tFirms ON tPetitions.firm_id = tFirms.id
			WHERE 1
			' ;
		if ($_SESSION['user_type'] == 'Firm')
		{
			$SQL_get_petitions_for_sh_string .= '
				AND
				(
					tUsers.firm_id = ' . $_SESSION['firm_id'] . '
					OR
					tPetitions.referring_firm = ' . $_SESSION['firm_id'] . '
				) ' ;
		}
		
		$SQL_get_petitions_for_sh_string .= '
			AND
			(
				tUsers.first_name LIKE "%' . $string . '%"
				OR tUsers.last_name LIKE "%' . $string . '%"
				OR tUsers.email LIKE "%' . $string . '%"
			)
			; ' ;

			//var_dump($SQL_get_petitions_for_sh_string) ; exit ;
		$result_get_petitions_for_sh_string = runSQL($SQL_get_petitions_for_sh_string, 'reader') ;
		return $result_get_petitions_for_sh_string ;
	}

	function rolesList() {
		$SQL_roles_list = 'SELECT * FROM tStakeholderRoles ORDER BY stakeholder_role_code ; ' ;
		$result_roles_list = runSQL($SQL_roles_list, 'reader') ;
		return $result_roles_list ;
	}

	function roleFetch($id) {
		settype($id, 'integer') ;
		$SQL_role_fetch = 'SELECT * FROM tStakeholderRoles WHERE id = ' . $id . ' ; ' ;
		$result_role_fetch = runSQL($SQL_role_fetch, 'reader') ;
		return $result_role_fetch->fetch_assoc() ;
	}

	function beneficiaryRoleID() {
		$SQL_ben_role_id = 'SELECT id FROM tStakeholderRoles WHERE stakeholder_role_code = "beneficiary" ; ' ;
		$RES_ben_role_id = runSQL($SQL_ben_role_id, 'reader') ;
		$row_ben_role_id = $RES_ben_role_id->fetch_assoc() ;
		return $row_ben_role_id['id'] ;
	}

	function findRoleID($role_description) {
		$SQL_role_id = 'SELECT id FROM tStakeholderRoles WHERE stakeholder_role_code = "' . $role_description . '" ; ' ;
		$RES_role_id = runSQL($SQL_role_id, 'reader') ;
		if (mysqli_num_rows($RES_role_id) == 1)
		{
			$row_role_id = $RES_role_id->fetch_assoc() ;
			return $row_role_id['id'] ;
		}
		else return False ;
	}

	function stakeholdersForPetition($id) {
		settype($id, 'integer') ;
		$SQL_stakeholders_for_petition = 'SELECT
			tStakeholders.*,
			tUsers.first_name, tUsers.email, tUsers.last_name, tUsers.pwd_hash,
			tUsers.activation_code, tUsers.image_file, tUsers.contact_phone,
			tStakeholderRoles.stakeholder_role_description
			FROM tStakeholders
			INNER JOIN tUsers on tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tStakeholderRoles on tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			WHERE petition_id = ' . $id . ' ; ' ;
		$result_stakeholders_for_petition = runSQL($SQL_stakeholders_for_petition, 'reader') ;
		return $result_stakeholders_for_petition ; 
	}

	function stakeholderAdd($row, $petitionID) {
		/* Expects:
			- role_id
			- first_name
			- last_name
			- email
		*/
		GLOBAL $baseHREF ;
		settype($petitionID, 'integer') ;

		// If $row is Null, insert the current logged-in user as an "Attorney" stakeholder.
		if ($row == Null) {
			$stakeholderUserId = $_SESSION['user_id'] ;
			$role_id = getAttorneyRoleCode() ;
			$receive_updates = 1 ;
			$row = array() ;
			$row['first_name'] = $_SESSION['first_name'] ;
			$row['last_name'] = $_SESSION['last_name'] ;
		}
		else {
			$role_id = $row['role_id'] ;
			$receive_updates = $row['sh_receive_updates'] ;

			// Does a user exist with that email?
			$matchingUsers = userFetchEmail(trim($row['email'])) ;
			// myDebug($matchingUsers->fetch_assoc()) ;

			if (mysqli_num_rows($matchingUsers) > 0) {
				$firstUser =  $matchingUsers->fetch_assoc() ;
				$stakeholderUserId = $firstUser['id'] ;	
				// Also email the details to the stakeholder
				$recipient_name = $row['first_name'] . ' ' . $row['last_name'] ;
				$recipient_email = $row['email'] ;
				$email_subject = 'You have been added as a stakeholder on a case on Online Visas Gateway' ;
				$email_content = 'Dear ' . $row['first_name'] . ' ' . $row['last_name'] . '

				This email is letting you know that you have been added as a stakeholder on an immigration case.

				Please click the link below to view the details of the case.
				' . $baseHREF . '/case-show.php?id=' . $petitionID . '

				Thank you,
				Online Visas Team
				' ;
				sendEmail($recipient_name = False, $recipient_email, $email_subject, $email_content) ;
			}
			else {
				// If not, first create a part user record, and fetch ID back.
				$SQL_new_user_insert = 'INSERT INTO tUsers (created_by_user_id, first_name, last_name, email, user_type, activation_code) VALUES ( ' ;
				$SQL_new_user_insert .= $_SESSION['user_id'] . ', ' ;
				$SQL_new_user_insert .= '"' . trim($row['first_name']) . '", ' ;
				$SQL_new_user_insert .= '"' . trim($row['last_name']) . '", ' ;
				$SQL_new_user_insert .= '"' . trim($row['email']) . '", ' ;
				$SQL_new_user_insert .= '"Stakeholder", ' ;
				$SQL_new_user_insert .= rand(0,1000000000) . ') ; ' ;
				$result_new_user_insert = runSQL($SQL_new_user_insert, 'writer', True) ;
				$stakeholderUserId = $result_new_user_insert ;

				// Also email the details to the new stakeholder
				$recipient_name = $row['first_name'] . ' ' . $row['last_name'] ;
				$recipient_email = $row['email'] ;
				$email_subject = 'You have been added as a stakeholder on a case on Online Visas Gateway' ;
				$email_content = 'Dear ' . $row['first_name'] . ' ' . $row['last_name'] . '

				This email is letting you know that you have been added as a stakeholder on an immigration case.

				Please click the link below, where you will be able to choose a password for Gateway, and then view the details of the case.
				' . $baseHREF . '/case-show.php?id=' . $petitionID . '

				Thank you,
				Online Visas Team
				' ;
				sendEmail($recipient_name = False, $recipient_email, $email_subject, $email_content) ;
			}
		}

		// echo '$stakeholderUserId = ' . $stakeholderUserId ;

		// Add that user as a stakeholder
		$SQL_set_stakeholder = 'INSERT INTO tStakeholders (petition_id, stakeholder_user_id, stakeholder_role_id, receive_updates) VALUES (' ;
		$SQL_set_stakeholder .= $petitionID . ', ' ;
		$SQL_set_stakeholder .= $stakeholderUserId . ', ' ;
		$SQL_set_stakeholder .= $role_id . ', ' ;
		if (isset($receive_updates) && $receive_updates == 1) {
			$SQL_set_stakeholder .= '1) ;' ;
		}
		else {
			$SQL_set_stakeholder .= '0) ;' ;
		}
		// myDebug($row) ;
		// myDebug($SQL_set_stakeholder) ;
		$result_set_stakeholder = runSQL($SQL_set_stakeholder, 'writer') ;
		// And log
		$roleRow = roleFetch($role_id) ;
		$roleDesc = $roleRow['stakeholder_role_description'] ;
		$logText = 'Added stakeholder: ' . $row['first_name'] . ' ' . $row['last_name'] . ' as ' . $roleDesc ;
		logPetitionEvent($petitionID, Null, Null, $logText , $sh_notified = 0) ;
	}

	function getAttorneyRoleCode() {
		$SQL_get_attorney_role_code = 'SELECT id FROM tStakeholderRoles WHERE stakeholder_role_code = "attorney" LIMIT 1 ; ' ;
		$result_get_attorney_role_code = runSQL($SQL_get_attorney_role_code, 'reader') ;
		$row_get_attorney_role_code = $result_get_attorney_role_code->fetch_assoc() ;
		return $row_get_attorney_role_code['id'] ;
	}

	function getAttorneyInfoForPetition($petition_id) {
		$SQL_get_attorney_info_for_petition = 'SELECT
			tUsers.first_name, tUsers.last_name, tUsers.email
			FROM tUsers INNER JOIN tStakeholders ON tStakeholders.stakeholder_user_id = tUsers.id
			INNER JOIN tStakeholderRoles ON tStakeholders.stakeholder_role_id = tStakeholderRoles.id
			INNER JOIN tPetitions ON tStakeholders.petition_id = tPetitions.id
			WHERE tPetitions.id = ' . $petition_id . '
			AND tStakeholderRoles.stakeholder_role_code = "attorney"
		; ' ;
		$result_get_attorney_info_for_petition = runSQL($SQL_get_attorney_info_for_petition, 'reader') ;
		$row_get_attorney_info_for_petition = $result_get_attorney_info_for_petition->fetch_assoc() ;
		return $row_get_attorney_info_for_petition ;
	}

	function isCurrentUserStakeholder($petition_id) {
		$SQL_is_current_user_stakeholder = 'SELECT stakeholder_user_id FROM tStakeholders WHERE petition_id = ' . $petition_id . ' AND stakeholder_user_id = ' . $_SESSION['user_id'] . ' ; ' ;
		$result_is_current_user_stakeholder = runSQL($SQL_is_current_user_stakeholder, 'reader') ;
		if (mysqli_num_rows($result_is_current_user_stakeholder) > 0) return True ;
		else return False ;
	}

	function isUserJointStakeholder($userID) {
		// Tells you if any user is also a stakeholder on any petition for which you are a stakeholder
		$SQL_user_stakeholder_match = 'SELECT * FROM tStakeholders
			WHERE stakeholder_user_id = ' . $userID . '
			AND petition_id IN (
				SELECT petition_id FROM tStakeholders WHERE stakeholder_user_id = ' . $_SESSION['user_id'] . '
			) ; ' ;
		$result_user_stakeholder_match = runSQL($SQL_user_stakeholder_match, 'reader') ;
		if (mysqli_num_rows($result_user_stakeholder_match) == 1) return True ;
		else return False ;
	}











	/* 5: VISA Functions */

	function visaDefaultSections($visa_type_id) {
		$SQL_visa_default_sections = 'SELECT tSections.id AS section_id, tSections.section_title, tSections.section_type, tVisaDefaultSections.*
			FROM tSections INNER JOIN tVisaDefaultSections
			ON tVisaDefaultSections.section_id = tSections.id
			WHERE tVisaDefaultSections.visa_type_id = ' . $visa_type_id . '
			ORDER BY sort_order
		' ;
		$RES_visa_default_sections = runSQL($SQL_visa_default_sections, 'reader') ;
		return $RES_visa_default_sections ;
	}

	function visasList() {
		$SQL_visas_list = 'SELECT tVisaTypes.*, tCountries.country, tCountries.country_code
			FROM tVisaTypes INNER JOIN tCountries ON tVisaTypes.country_id = tCountries.id
			WHERE tVisaTypes.trashed != 1
			ORDER BY tCountries.country, visa_code ; ' ;
		$result_visas_list = runSQL($SQL_visas_list, 'reader') ;
		return $result_visas_list ;
	}

	function visaFetch($id) {
		settype($id, 'integer') ;
		$SQL_visa_fetch = 'SELECT * FROM tVisaTypes WHERE id = ' . $id . ' ; ' ;
		$result_visa_fetch = runSQL($SQL_visa_fetch, 'reader') ;
		return $result_visa_fetch->fetch_assoc() ;
	}

	function visasFetchForCountry($country_id) {
		$SQL_visa_fetch = 'SELECT
			tVisaTypes.*, tCountries.country, tCountries.country_code
			FROM tVisaTypes INNER JOIN tCountries ON tVisaTypes.country_id = tCountries.id
			WHERE tVisaTypes.trashed != 1
			AND country_id = ' . $country_id . '
			ORDER BY visa_code ; ' ;
		$result_visas_list = runSQL($SQL_visa_fetch, 'reader') ;
		return $result_visas_list;
	}

	function visaSteps($id) {
		settype($id, 'integer') ;
		$SQL_visa_steps = 'SELECT * FROM tVisaSteps WHERE visa_type_id = ' . $id . ' ORDER BY sort_order ; ' ;
		$result_visa_steps = runSQL($SQL_visa_steps, 'reader') ;
		return $result_visa_steps ;
	}

	function getVisaTypes($country = False) {
		$SQL_get_visa_types = 'SELECT tVisaTypes.*, tCountries.country FROM tVisaTypes LEFT OUTER JOIN tCountries ON tVisaTypes.country_id = tCountries.id ' ;
		if ($country !== False && $country != 'ALL') {
			$user_details = userFetch($_SESSION['user_id']) ;
			$my_country = $user_details['country_id'] ;
			$SQL_get_visa_types .= ' WHERE country_id = ' . $my_country ;
		}
		$SQL_get_visa_types .= ' ORDER BY country, visa_code ; ' ;
		$result_get_visa_types = runSQL($SQL_get_visa_types, 'reader') ;
		return $result_get_visa_types ;
	}




































	/* 6: PETITION Functions */

	function caseListFiles($case_id)
	{
		$SQL_list_files = 'SELECT tPetitionStepComments.id as file_id, tPetitionStepComments.date_added, tPetitionStepComments.file_description, tPetitionStepComments.file_path, tPetitionSteps.step_type
			FROM
				tPetitionStepComments INNER JOIN tPetitionSteps ON tPetitionStepComments.step_id = tPetitionSteps.id
			INNER JOIN tPetitions ON tPetitionSteps.petition_id = tPetitions.id
			WHERE tPetitionStepComments.file_path != ""
			AND tPetitionStepComments.is_hidden = 0
			AND tPetitions.id = ' . $case_id .' order by tPetitionSteps.sort_order ASC;' ;
		$RES_list_files = runSQL($SQL_list_files, 'reader') ;
		return $RES_list_files ;
	}

	function petitionAddDefaultSections($case_id, $visa_type_id, $add_default_lead_section = False)
	{
		GLOBAL $default_lead_section_id ;
		// Get any default sections for the visa type, listed by sort_order
		$defaultSections = visaDefaultSections($visa_type_id) ;
		// Add them in order
		myDebug('$defaultSections has ' . mysqli_num_rows($defaultSections) . ' rows.') ;
		while ($row = mysqli_fetch_assoc($defaultSections) ) {
			// myDebug('Adding: ' . $case_id . ' / ' . $row['section_id']) ;
			insertSectionIntoPetition($case_id, $row['section_id']) ;
		}
		if ($add_default_lead_section)
		{
			insertSectionIntoPetition($case_id, $default_lead_section_id) ;
		}
		myDebug('DONE: petitionAddDefaultSections') ;
	}

	function insertSectionIntoPetitionRecursive($petition_id, $new_section_id, $target_position = Null) {
		// NOT NEEDED
		// First, count how many steps there are in the Petition.
		$originalStepNum = countStepsInPetition($petition_id) ;
		myDebug('Original number of steps = ' . $originalStepNum) ;

		// Then get the IDs of all the steps that have sort_order >= target SO, and put them in an array.
		
		// Want to insert new steps AFTER this sort order.
		myDebug('Initial target position: ' . $target_position) ;

		if (is_null($target_position)) $target_sort_order = 0 ;
		else $target_sort_order = getSortOrderForStep($target_position) ;

		$SQL_higher_steps = 'SELECT id FROM tPetitionSteps WHERE petition_id = ' . $petition_id . ' AND sort_order > ' . $target_sort_order . ' ; ' ;
		myDebug('Find any higher steps = <br>' . $SQL_higher_steps) ;

		$RES_higher_steps = runSQL($SQL_higher_steps, 'reader') ;
		$steps_to_bump = '' ;
		while ($row = $RES_higher_steps->fetch_assoc()) {
			if (strlen($steps_to_bump)) $steps_to_bump .= ',' ;
			$steps_to_bump .= $row['id'] ;
		}

		// Do the insert goodness, setting the sort_order as the target SO, so that our new steps go in in the right place.
		insertSectionIntoPetition($petition_id, $new_section_id, $target_sort_order) ;

		// Only if not adding to an empty case (otherwise causes a SQL error)
		if (mysqli_num_rows($RES_higher_steps) > 0) {
			// Count the steps again.
			$resultStepNum = countStepsInPetition($petition_id) ;
			myDebug('Final number of steps = ' . $resultStepNum) ;

			// Figure out how many we've added.
			$stepsAdded = 100 + $resultStepNum - $originalStepNum ;
			myDebug('Need to add = ' . $stepsAdded) ;

			// And finally bump the SO of all the steps in the array by that number.
			$SQL_bump_higher_steps = 'UPDATE tPetitionSteps SET sort_order = sort_order + ' . $stepsAdded . ' WHERE id IN (' . $steps_to_bump . ') ; ' ;
			myDebug($SQL_bump_higher_steps) ;
			$RES_bump_higher_steps = runSQL($SQL_bump_higher_steps, 'writer') ;
		}
		return ;
	}

	function insertSectionIntoPetition($petition_id, $section_id, $target_position = Null) {
		if (is_null($target_position)) {
			$maxso = getMaxSortOrderPetitionSteps($petition_id) ;
		}
		else {
			$maxso = $target_position ;
		}
		myDebug($section_id . ' / $maxso = ' . $maxso . '.' ) ;

		$section_type = getSectionType($section_id) ;
		myDebug('Section type for section_id ' . $section_id . ' = ' . $section_type) ;
		// Pull in the steps
		$SQL_get_section_steps = 'SELECT * FROM tSectionSteps WHERE section_id = ' . $section_id . ' ORDER BY sort_order ; ' ;
		$RES_get_section_steps = runSQL($SQL_get_section_steps, 'reader') ;

		myDebug('$RES_get_section_steps: ' . mysqli_num_rows($RES_get_section_steps) . ' rows.') ;
		// myDebug($RES_get_section_steps) ;

		if (mysqli_num_rows($RES_get_section_steps) == 0) return false ;

		$sortOrder = $maxso + 1 ;
		myDebug('Sort order = ' . $sortOrder) ;

		// Insert steps, one at a time
		while ($row = $RES_get_section_steps->fetch_assoc()) {

			myDebug($row) ;
			// Force subsections to sections
			//if ($row['step_type'] == -1) $row['step_type'] = 0 ;
			if (strlen($row['link_code'])) {
				$default_value = getDefaultValue($petition_id, $row['link_code']) ;
			}
			else {
				$default_value = '' ;
			}

			$SQL_copy_lead_steps = 'INSERT INTO tPetitionSteps (
				petition_id,
				step_desc,
				step_notes,
				required,
				firm_only,
				is_complete,
				step_type,
				set_milestone,
				sort_order,
				section_type,
				value,
				link_code
			) VALUES ' ;
			$SQL_copy_lead_steps .= '(' ;
			$SQL_copy_lead_steps .=  $petition_id . ',' . CRLF ;
			$SQL_copy_lead_steps .=  '"' . addslashes($row['step_desc']) . '" ,' . CRLF ;
			$SQL_copy_lead_steps .=  '"' . addslashes($row['step_notes']) . '" ,' . CRLF ;
			$SQL_copy_lead_steps .=  $row['required'] . ',' . CRLF ;
			$SQL_copy_lead_steps .=  $row['firm_only'] . ',' . CRLF ;
			$SQL_copy_lead_steps .=  '0 ,' . CRLF ;
			$SQL_copy_lead_steps .=  $row['step_type'] . ',' . CRLF ;
			$SQL_copy_lead_steps .=  '"' . $row['set_milestone'] . '" , ' . CRLF ;
			$SQL_copy_lead_steps .= $sortOrder . ',' . CRLF ;
			$SQL_copy_lead_steps .=  '"' . $section_type . '" , ' . CRLF ;
			$SQL_copy_lead_steps .=  '"' . $default_value . '" , ' . CRLF ;
			$SQL_copy_lead_steps .=  '"' . $row['link_code'] . '" ' . CRLF ;
			$SQL_copy_lead_steps .= ' ) ; '  . CRLF ;
			
			myDebug('SQL_copy_lead_steps = ' . $SQL_copy_lead_steps) ;
			$result_copy_lead_steps = runSQL($SQL_copy_lead_steps, 'writer') ;
			// echo '+' . $sortOrder . '<br>' ;

			// IF the step found is an embedded section, run this function again.
			if ($row['step_type'] == -1) {
				myDebug('Subsection found. Nesting.') ;
				$sortOrder = insertSectionIntoPetition($petition_id, $row['step_notes'], $sortOrder) ;
				if ($sortOrder === False) break ;
			}

			$sortOrder++ ;
		}
		return $sortOrder ;
	}

	function countStepsInPetition($petition_id) {
		$SQL_count_steps = 'SELECT COUNT(*) AS num_steps FROM tPetitionSteps WHERE petition_id = ' . $petition_id . ' ; ' ;
		$RES_count_steps = runSQL($SQL_count_steps, 'reader') ;
		$ROW_count_steps = $RES_count_steps->fetch_assoc() ;
		return $ROW_count_steps['num_steps'] ;
	}

	function getMaxSortOrderPetitionSteps($petition_id) {
		$SQL_get_max_so = 'SELECT MAX(sort_order) AS maxso FROM tPetitionSteps WHERE petition_id = ' . $petition_id . ' ; ' ;
		$RES_get_max_so = runSQL($SQL_get_max_so, 'reader') ;
		if (mysqli_num_rows($RES_get_max_so) == 0) {
			return 0 ;
		}
		else {
			$ROW_get_max_so = $RES_get_max_so->fetch_assoc() ;
			return $ROW_get_max_so['maxso'] ;
		}
	}

	function getCaseLinkCodeValue($case_id, $link_code, $first_value = false) {
		$SQL_get_clcv = 'SELECT DISTINCT value FROM tPetitionSteps WHERE petition_id = ' . $case_id . '
			AND link_code = "' . $link_code . '" ' ;
		if ($first_value)
		{
			$SQL_get_clcv .= ' LIMIT 1 ' ;
		}
		$RES_get_clcv = runSQL($SQL_get_clcv, 'reader') ;
		if (mysqli_num_rows($RES_get_clcv) > 1)
		{
			return $RES_get_clcv ;
		}
		if (mysqli_num_rows($RES_get_clcv) == 1) {
			$ROW_get_clcv = $RES_get_clcv->fetch_assoc() ;
			return $ROW_get_clcv['value'] ;
		}
		else return False ;
	}

	function getContractFees($case_id, $section_type = Null) {
		$SQL_get_contract_fees = 'SELECT step_desc, step_notes
			FROM tPetitionSteps
			WHERE petition_id = ' . $case_id  . '
			AND link_code LIKE "fee%" ' ;
		if ($section_type) {
			$SQL_get_contract_fees .= ' AND section_type = "' . $section_type . '" ' ;
		}
		$SQL_get_contract_fees .= ' ORDER BY sort_order ' ;
		$RES_get_contract_fees = runSQL($SQL_get_contract_fees, 'reader') ;
		return $RES_get_contract_fees ;
	}

	function getPetitionForStep($step_id) {
		$SQL_get_petition_for_step = 'SELECT petition_id FROM tPetitionSteps WHERE id = ' . $step_id . ' LIMIT 1 ;' ;
		$result_get_petition_for_step = runSQL($SQL_get_petition_for_step, 'reader') ;
		$row_get_petition_for_step = $result_get_petition_for_step->fetch_assoc() ;
		return ($row_get_petition_for_step['petition_id']) ;
	}

	function logPetitionEvent($petition_id = Null, $step_id = Null, $user_id = Null, $text, $sh_notified = 0, $section_type = Null) {
		// logPetitionEvent($petitionID, Null, Null, $logText , $sh_notified = 0) ;
		if (is_null($petition_id)) $petition_id = getPetitionForStep($step_id) ;
		if (is_null($user_id)) {
			if (isSet($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'] ;
			}
			else $user_id = 0 ;
		}
		$SQL_log_petition_event = 'INSERT INTO tPetitionEvents (
			petition_id, note_description, stakeholder_user_id, stakeholders_notified, step_id, section_type) 
			VALUES ( ' ;
			$SQL_log_petition_event .= $petition_id . ', ' ;
			$SQL_log_petition_event .= ' "' . addslashes($text) . '" , ' ;
			$SQL_log_petition_event .= $user_id . ' , ' ;
			$SQL_log_petition_event .= $sh_notified . ' , ' ;
			$SQL_log_petition_event .= (is_null($step_id)) ? 'NULL' : $step_id ;
			$SQL_log_petition_event .=  ' , ' ;
			$SQL_log_petition_event .= (is_null($section_type)) ? 'NULL' : '"' . $section_type . '"' ;
			$SQL_log_petition_event .= ')' ;
		$result_log_petition_event = runSQL($SQL_log_petition_event, 'writer') ;
	}

	function listPetitionEvents($petition_id, $list_num = Null) {
		$SQL_list_petition_events = 'SELECT tPetitionEvents.*, tUsers.first_name, tUsers.last_name
			FROM tPetitionEvents INNER JOIN tUsers ON tPetitionEvents.stakeholder_user_id = tUsers.id
			WHERE petition_id = ' . $petition_id ;
		$SQL_list_petition_events .= ' ORDER BY time DESC ' ;
		if (isSet($list_num)) {
			$SQL_list_petition_events .= ' LIMIT ' . $list_num ;
		}
		$result_list_petition_events = runSQL($SQL_list_petition_events, 'reader') ;
		return $result_list_petition_events ;
	}

	function getPetitionStatus($id) {
		$SQL_get_petition_status = 'SELECT status FROM tPetitions WHERE id = ' . $id . ' LIMIT 1 ; ' ;
		$result_get_petition_status = runSQL($SQL_get_petition_status, 'reader') ;
		$row_get_petition_status = $result_get_petition_status->fetch_assoc() ;
		return $row_get_petition_status['status'] ;
	}

	function getPetitionVisaTypeInfo($id) {
		$SQL_get_petition_code = 'SELECT tPetitions.visa_type_id, tVisaTypes.*
			FROM tPetitions LEFT OUTER JOIN tVisaTypes
			ON tPetitions.visa_type_id = tVisaTypes.id
			WHERE tPetitions.id = ' . $id . ' LIMIT 1 ; ' ;
		$result_get_petition_code = runSQL($SQL_get_petition_code, 'reader') ;
		$row_get_petition_code = $result_get_petition_code->fetch_assoc() ;
		return $row_get_petition_code ;
	}

	function getLogoForPetition($petition_id) {
		settype($petition_id, 'integer') ;
		// Get the Org logo, if there is one
		$SQL_get_logo_for_petition_org = 'SELECT
			tOrganizations.logo_file, tOrganizations.id AS organization_id
			FROM tOrganizations INNER JOIN tPetitions ON tPetitions.organization_id = tOrganizations.id
			WHERE tPetitions.id = ' . $petition_id . ' LIMIT 1 ;' ;
		$result_get_logo_for_petition_org = runSQL($SQL_get_logo_for_petition_org, 'reader') ;
		if (mysqli_num_rows($result_get_logo_for_petition_org) == 1) {
			return $result_get_logo_for_petition_org->fetch_assoc() ;
		}
		else {
			// Else, try to get Firm logo
			$SQL_get_logo_for_petition_firm = 'SELECT
				tFirms.logo_file, tFirms.id AS firm_id
				FROM tFirms INNER JOIN tPetitions ON tPetitions.firm_id = tFirms.id
				WHERE tPetitions.id = ' . $petition_id . ' LIMIT 1 ;' ;
			$result_get_logo_for_petition_firm = runSQL($SQL_get_logo_for_petition_firm, 'reader') ;
			return $result_get_logo_for_petition_firm->fetch_assoc() ;
		}
	}

	function petitionFetch($id) {
		settype($id, 'integer') ;
		$SQL_petition_fetch = 'SELECT
				tPetitions.*,
				tVisaTypes.visa_code,tVisaTypes.country_id, tVisaTypes.visa_description,
				tCountries.country_description,
				tFirms.firm_name, tFirms2.firm_name AS referring_firm_name,
				tOrganizations.org_name
			FROM tPetitions
			LEFT OUTER JOIN tVisaTypes ON tPetitions.visa_type_id = tVisaTypes.id
			LEFT OUTER JOIN tFirms ON tPetitions.firm_id = tFirms.id
			LEFT OUTER JOIN tFirms tFirms2 ON tPetitions.referring_firm = tFirms2.id
			LEFT OUTER JOIN tOrganizations ON tPetitions.organization_id = tOrganizations.id
			LEFT OUTER JOIN tCountries ON tVisaTypes.country_id
			WHERE tPetitions.id = ' . $id . ' and tPetitions.trashed != 1;' ;
		$result_petition_fetch = runSQL($SQL_petition_fetch, 'reader') ;
		return $result_petition_fetch->fetch_assoc() ;
	}

	function myStakeHolderInfo($id) {
		settype($id, 'integer') ;
		$SQL_my_stakeholder_info = 'SELECT
			id, receive_updates
			FROM tStakeholders
			WHERE petition_id = ' . $id . ' 
			AND stakeholder_user_id = ' . $_SESSION['user_id'] . ' 
			LIMIT 1 ;' ;
		$result_my_stakeholder_info = runSQL($SQL_my_stakeholder_info, 'reader') ;
		return $result_my_stakeholder_info->fetch_assoc() ;
	}

	function petitionSteps($id, $show_sections = 'Petition') {
		settype($id, 'integer') ;
		$SQL_petition_steps = 'SELECT * FROM tPetitionSteps WHERE petition_id = ' . $id ;
		if (isSet($show_sections)) {
			$SQL_petition_steps .= ' AND section_type = "' . $show_sections . '" ' ;
		}
		$SQL_petition_steps .= ' ORDER BY sort_order ;' ;
		// myDebug($SQL_petition_steps, 'Yes') ;
		$result_petition_steps = runSQL($SQL_petition_steps, 'reader') ;
		return $result_petition_steps ;
	}

	function onOfferByOurClientOrg($petition_id) {
		// Returns True if the case in question is on offer by an Org that is connected to the current user's Firm.
		$SQL_on_offer_by_our_client_org = 'SELECT tPetitions.id FROM
			tPetitions INNER JOIN tOrgFirmLinks ON tPetitions.organization_id = tOrgFirmLinks.organization_id
			WHERE tPetitions.status="Offered"
			AND tOrgFirmLinks.firm_id = ' . $_SESSION['firm_id'] . ' ; ' ;
		$result_on_offer_by_our_client_org = runSQL($SQL_on_offer_by_our_client_org, 'reader') ;
		if (mysqli_num_rows($result_on_offer_by_our_client_org) == 1) {
			return True ;
		}
		else {
			return False ;
		}
	}

	function petsList($pet_id = Null, $org_id = Null, $filter = Null, $returnCount = Null) {
		// global $current_user_is_org_rep, $current_user_is_firm_rep ;
		// Needs to be adjusted to include MY petitions (if I don't belong to an Organization) (??)

		$ignoreExtraFilters = False ;
		
		$SQL_pets_list = '
			SELECT DISTINCT
				tPetitions.id, tPetitions.date_started, tPetitions.status, tPetitions.visa_type_id,
				tFirms.firm_name, tOrganizations.org_name,
				tVisaTypes.visa_code
			FROM tPetitions
				LEFT OUTER JOIN tVisaTypes ON tPetitions.visa_type_id = tVisaTypes.id
				LEFT OUTER JOIN tFirms ON tPetitions.firm_id = tFirms.id
				LEFT OUTER JOIN tOrganizations ON tPetitions.organization_id = tOrganizations.id
				WHERE 1
		' ;

		// Filtered for type, e.g. Lead?
		if (is_null($filter) === False) {
			switch ($filter) {
				case 'Leads' :
					$SQL_pets_list .= '
						AND tPetitions.visa_type_id IS NULL
						AND (
								(
									tPetitions.firm_id = ' . $_SESSION['firm_id'] . ' 
									AND tPetitions.status IN ("Lead","Adopted","Rejected")
								)
							OR
								(
									referring_firm = ' . $_SESSION['firm_id'] . '
									AND tPetitions.status IN ("Lead","Adopted","Rejected","Offered")
								)
							)
					' ;
					break ;
				case 'Petitions' :
					$SQL_pets_list .= ' AND tPetitions.status != "LEAD" AND tPetitions.visa_type_id IS NOT NULL ' ;
					if ($_SESSION['user_type'] == 'Firm') {
						$SQL_pets_list .= 'AND tPetitions.firm_id = ' . $_SESSION['firm_id'] . ' ' ;
					}
					break ;
				case 'Leads-OVPM' :
					$SQL_pets_list .= ' AND tPetitions.status IN ("LEAD","Resubmitted") AND lead_available_for_transfer = 1 ' ;
					break ;
				case 'Cases' :
					$SQL_pets_list .= ' AND tPetitions.status IN ("Lead","Case","org-lead")
										AND organization_id = ' . $_SESSION['organization_id'] ;
					break ;
				case 'Cases-OVPM' :
					$SQL_pets_list .= ' AND tPetitions.is_case = 1 AND status != "Offered" AND lead_available_for_transfer = 1 ' ;
					break ;
				case 'Offered' :
					$SQL_pets_list .= ' AND tPetitions.status = "Offered" AND tPetitions.firm_id = ' . $_SESSION['firm_id'] .
						' AND NOT EXISTS (SELECT * FROM tFirmIgnorePetitions WHERE firm_id = ' . $_SESSION['firm_id'] . ' AND petition_id = tPetitions.id) ' ;
					 ;
					break ;
				case 'Available' :
					$SQL_pets_list .= ' AND tPetitions.firm_id != ' . $_SESSION['firm_id'] . '
						 AND tPetitions.status = "Available"
						 AND tPetitions.lead_available_for_transfer = 1
						 AND NOT EXISTS (SELECT * FROM tFirmIgnorePetitions WHERE firm_id = ' . $_SESSION['firm_id'] . ' AND petition_id = tPetitions.id)
						 ' ;
					break ;
				case 'Leads-OVPM-offered' :
					$SQL_pets_list .= ' AND tPetitions.status = "Offered" ' ;
					break ;
				case 'Our-Firms' :
					$SQL_pets_list .= '
						AND tPetitions.firm_id IS NULL
						AND tPetitions.lead_available_for_transfer = 1
						AND tPetitions.organization_id IN (SELECT organization_id FROM tOrgFirmLinks WHERE firm_id = ' . $_SESSION['firm_id'] . ')' ;
						break ;
				case 'Stakeholder-not-my-firm' :
					$SQL_pets_list .= '
						AND tPetitions.firm_id != ' . $_SESSION['firm_id'] .'
						AND tPetitions.id IN (
								SELECT petition_id FROM tStakeholders WHERE stakeholder_user_id = ' . $_SESSION['user_id'] . '
							)
					' ;
					/* Removed from above
						AND tPetitions.referring_firm != ' . $_SESSION['firm_id'] .'
					*/
						
					$ignoreExtraFilters = True ;
					break ;
			}
		}

		if ($ignoreExtraFilters == False) {
			// EXTRA FILTERS
			// If returning one petition, just do that
			if (isSet($pet_id)) {
				settype($pet_id, 'integer') ;
				$SQL_pets_list .= ' and tPetitions.id = ' . $pet_id . ' ' ;
			}
			// If Org Rep... OR we're looking at petitions for a specific org, ditto...
			else if ($_SESSION['user_type'] == 'Organization') {
				$SQL_pets_list .= '	and tPetitions.organization_id = ' . $_SESSION['organization_id'] ;
			}
			else if ($org_id !== NULL) {
				$SQL_pets_list .= '	and tPetitions.organization_id = ' . $org_id ;
			}
			// If Firm Rep (admin or not), restrict to that firm's Petitions
			/*
			else if ($_SESSION['user_type'] == 'Firm' && in_array($filter, array('Available','Our-Firms')) == False) {
				$SQL_pets_list .= '	AND tPetitions.firm_id = ' . $_SESSION['firm_id'] ;
			}
			*/
			else if ($_SESSION['user_type'] == 'Superuser') {
				$SQL_pets_list .= '' ;
			}
			// If neither, only show me the ones for which I'm any stakeholder.
			else {
				//$SQL_pets_list .= '
				//WHERE tUsers.id = ' . $_SESSION['user_id'] ;
			}
		}

		$SQL_pets_list .= ' and tPetitions.trashed != 1';

		if (isset($_GET['order'])) {
			switch ($_GET['order']) {
				// ben, org, firm, date, status
				case 'pet-code' :
					$SQL_pets_list .= ' ORDER BY  visa_type_id ' ;
					break ;
				case 'firm' :
					$SQL_pets_list .= ' ORDER BY  firm_name ' ;
					break ;
				case 'date' :
					$SQL_pets_list .= ' ORDER BY  date_started ' ;
					break ;
				case 'status' :
					$SQL_pets_list .= ' ORDER BY  status ' ;
					break ;
			}
			if (isSet($_GET['desc'])) {
				$SQL_pets_list .= ' DESC ' ;
			}
		}
		else {
			$SQL_pets_list .= ' ORDER BY  date_started DESC ' ;
		}

		$SQL_pets_list .=	' ; ' ;


		// myDebug($SQL_pets_list) ; exit ;


		$result_pets_list = runSQL($SQL_pets_list, 'reader') ;

		if (True === is_null($returnCount)) {
			return $result_pets_list ;	
		}
		else {
			return mysqli_num_rows($result_pets_list) ;
		}
		
	}

	function listPetitionsForOrganization($organization_id) {
		//$SQL_list_petitions_for_organization = 'SELECT *'
	}

	function getFirmForPetition($petition_id) {
		$SQL_get_firm_for_petition = 'SELECT firm_id FROM tPetitions WHERE id = ' . $petition_id . ' ; ' ;
		$result_get_firm_for_petition = runSQL($SQL_get_firm_for_petition, 'reader') ;
		$row_get_firm_for_petition = $result_get_firm_for_petition->fetch_assoc() ;
		return $row_get_firm_for_petition['firm_id'] ;
	}

	function getPetitionProgress($petition_id) {
		$SQL_get_petition_progress = 'SELECT
			count(id) as total,
			sum(is_complete = 1) as complete
			FROM tPetitionSteps
			WHERE step_type != 0
			AND section_type IN ("step","case-plan","petition")
			AND petition_id = ' . $petition_id . ' ; ' ;
		$result_get_petition_progress = runSQL($SQL_get_petition_progress, 'reader') ;
		return $result_get_petition_progress ;
	}

	function getCasePlanSteps($petition_id) {
		$SQL_get_case_plan_steps = 'SELECT *
			FROM tPetitionSteps
			WHERE step_type NOT IN (0,99)
			AND section_type IN ("step","case-plan","petition")
			AND petition_id = ' . $petition_id . ' ORDER BY sort_order ; ' ;
		$result_get_case_plan_steps = runSQL($SQL_get_case_plan_steps, 'reader') ;
		return $result_get_case_plan_steps ;
	}




























	/* 7: STEP functions */

	function getFileForLinkCode($case_id, $link_code, $first_result = false) {
		// First, get all steps that has that link code
		$SQL_get_file_paths = 'SELECT file_path
			FROM tPetitionSteps INNER JOIN tPetitionStepComments
			ON tPetitionStepComments.step_id = tPetitionSteps.id
			WHERE tPetitionSteps.petition_id = ' . $case_id . ' 
			AND tPetitionSteps.link_code = "' . $link_code . '"
			AND tPetitionStepComments.file_path != ""
			AND tPetitionStepComments.is_hidden != 1
			ORDER BY tPetitionStepComments.id DESC ' ;
		if ($first_result)
		{
			$SQL_get_file_paths .= ' LIMIT 1 ' ;
		}
		$RES_get_file_paths = runSQL($SQL_get_file_paths, 'reader') ;
		if ($first_result && mysqli_num_rows($RES_get_file_paths))
		{
			$ROW_get_file_paths = $RES_get_file_paths->fetch_assoc() ;
			return $ROW_get_file_paths['file_path'] ;
		}
		elseif (mysqli_num_rows($RES_get_file_paths))
		{
			return $RES_get_file_paths ;
		}
		else
		{
			return false ;
		}
	}

	function getLinkCodePreset($petition_id, $step_link_code) {
		$SQL_get_link_code_preset = 'SELECT value FROM tPetitionSteps
			WHERE link_code = "' . $step_link_code . '"
			AND petition_id = ' . $petition_id . '
			AND value IS NOT NULL AND value != ""
			LIMIT 1
			; ' ;
		$RES_get_link_code_preset = runSQL($SQL_get_link_code_preset, 'reader') ;
		if (mysqli_num_rows($RES_get_link_code_preset) == 1) {
			$ROW_get_link_code_preset = $RES_get_link_code_preset->fetch_assoc() ;
			return ($ROW_get_link_code_preset['value']) ;
		}
		else return false ;
	}

	function getDefaultValue($petition_id, $step_link_code) {
		if (empty($step_link_code))
		{
			return False ;
		}
		// First, is there already a field in the same Petition/Case with the same link_code and a value set?
		$link_code_preset = getLinkCodePreset($petition_id, $step_link_code) ;
		if ($link_code_preset) {
			return $link_code_preset ;
		}
		else {
			$SQL_pet_org_firm = 'SELECT organization_id, firm_id FROM tPetitions WHERE tPetitions.id = ' . $petition_id . ' LIMIT 1 ; ' ;
			$RES_pet_org_firm = runSQL($SQL_pet_org_firm, 'reader') ;
			$row_pet_org_firm = $RES_pet_org_firm->fetch_assoc() ;
			// Does Org have a default?
			if ($row_pet_org_firm['organization_id']) {
				$org_default = getOrgDefault($row_pet_org_firm['organization_id'], $step_link_code) ;
				if (False === is_null($org_default)) {
					return $org_default ;
				}
			}
			if (strlen($row_pet_org_firm['firm_id'])) {
				// ... Firm default?
				$firm_default = getFirmDefault($row_pet_org_firm['firm_id'], $step_link_code) ;
				if ($firm_default) {
					return $firm_default ;
				}
			}
			// ... System default?
			$sys_default = getSystemDefault($step_link_code) ;
			if ($sys_default) {
				return $sys_default ;
			}

			else
			{
				return Null ;
			}
		}
	}
	function getOrgDefault($org_id, $link_code) {
		$SQL_get_org_default = 'SELECT field_value FROM tCustomFields WHERE type ="org" AND field_name = "' . $link_code . '" AND parent_id = ' . $org_id ;
		$RES_get_org_default = runSQL($SQL_get_org_default, 'reader') ;
		if (mysqli_num_rows($RES_get_org_default) == 1) {
			$row_get_org_default = $RES_get_org_default->fetch_assoc() ;
			return $row_get_org_default['field_value'] ;
		}
		else return Null ;
	}
	function getFirmDefault($firm_id, $link_code) {
		$SQL_get_firm_default = 'SELECT field_value FROM tCustomFields WHERE type ="firm" AND field_name = "' . $link_code . '" AND  parent_id = ' . $firm_id ;
		$RES_get_firm_default = runSQL($SQL_get_firm_default, 'reader') ;
		if (mysqli_num_rows($RES_get_firm_default) == 1) {
			$row_get_firm_default = $RES_get_firm_default->fetch_assoc() ;
			return $row_get_firm_default['field_value'] ;
		}
		else return Null ;
	}
	function getSystemDefault($link_code) {
		$SQL_get_system_default = 'SELECT field_value FROM tCustomFields WHERE type ="system" AND field_name = "' . $link_code . '" LIMIT 1 ; '  ;
		$RES_get_system_default = runSQL($SQL_get_system_default, 'reader') ;
		if (mysqli_num_rows($RES_get_system_default) == 1) {
			$row_get_system_default = $RES_get_system_default->fetch_assoc() ;
			return $row_get_system_default['field_value'] ;
		}
		else return Null ;
	}

	function addComment($step_id, $comment_text, $user_id = Null, $is_private = 0) {
		if (is_null($user_id)) $user_id = $_SESSION['user_id'] ;
		$SQL_new_comment = 'INSERT INTO tPetitionStepComments (step_id, comment_text, comment_by_user_id, is_private) VALUES (' ;
		$SQL_new_comment .= $step_id . ' , "' . addSlashes($comment_text) . '", ' . $user_id . ', ' . $is_private . ') ;' ;
		// myDebug($SQL_new_comment) ; exit ;
		$RES_new_comment = runSQL($SQL_new_comment, 'writer', True) ;
	}

	function getModeForStep($step_id) {
		$SQL_get_mode_for_step = 'SELECT section_type FROM tPetitionSteps WHERE id = ' . $step_id . ' ; ' ;
		$RES_get_mode_for_step = runSQL($SQL_get_mode_for_step, 'reader') ;
		if (mysqli_num_rows($RES_get_mode_for_step) != 1) {
			return false ;
		}
		else {
			$ROW_get_mode_for_step = $RES_get_mode_for_step->fetch_assoc() ;
			return $ROW_get_mode_for_step['section_type'] ;
		}
	}

	function listStepComments($step_id) {
		$SQL_list_comments = 'SELECT
			tPetitionStepComments.*, tUsers.id AS user_id, tUsers.first_name, tUsers.last_name
			FROM tPetitionStepComments INNER JOIN tUsers ON tPetitionStepComments.comment_by_user_id = tUsers.id
			WHERE tPetitionStepComments.is_hidden=0 and step_id = ' . $step_id . ' ORDER BY tPetitionStepComments.date_added;' ;
		$result_list_comments = runSQL($SQL_list_comments, 'reader') ;
		return $result_list_comments ;
	}

	function showStepType($code) {
		global $step_types ;
		return $step_types[$code] ;
	}

	function nextStepForPetition($petition_id) {
		settype($petition_id, 'integer') ;
		$SQL_next_step_for_petition = 'SELECT MIN(id), step_notes, step_desc, firm_only FROM tPetitionSteps WHERE is_complete = 0 AND petition_id = ' . $petition_id . ';' ;
		$result_next_step_for_petition = runSQL($SQL_next_step_for_petition, 'reader') ;
		return $result_next_step_for_petition->fetch_assoc() ;
	}

	function updatePetitionMilestone($petition_id, $set_milestone) {
		$SQL_set_milestone = 'UPDATE tPetitions SET status = "' . $set_milestone . '" WHERE id = ' . $petition_id . ' ; ' ;
		$result_set_milestone = runSQL($SQL_set_milestone, 'writer') ;
	}

	function autoUpdatePetitionMilestone($step_id) {
		// Similar to above function, but does not require that you know if set_milestone is set first.
		// Does the step activate a milestone?
		$SQL_test_step_milestone = 'SELECT set_milestone, petition_id FROM tPetitionSteps WHERE id = ' . $step_id . ' LIMIT 1 ;' ;
		$result_test_step_milestone = runSQL($SQL_test_step_milestone, 'reader') ;
		if (mysqli_num_rows($result_test_step_milestone) == 1) {
			$row = $result_test_step_milestone->fetch_assoc() ;
			if (strlen($row['set_milestone'])) {
				$SQL_set_milestone = 'UPDATE tPetitions SET status = "' . $row['set_milestone'] . '" WHERE id = ' . $row['petition_id'] . ' ; ' ;
				$result_set_milestone = runSQL($SQL_set_milestone, 'writer') ;
			}
		}
	}

	function getStepType($step_id) {
		settype($step_id, 'integer') ;
		$SQL_step_type = 'SELECT step_type FROM tPetitionSteps WHERE id = ' . $step_id . ' ; ' ;
		$result_step_type = runSQL($SQL_step_type, 'reader') ;
		$row_step_type = $result_step_type->fetch_assoc() ;
		return $row_step_type['step_type'] ;
	}

	function getSortOrderForStep($target_position) {
		$SQL_get_so = 'SELECT sort_order FROM tPetitionSteps WHERE id = ' . $target_position ;
		$RES_get_so = runSQL($SQL_get_so, 'reader') ;
		$ROW_get_so = $RES_get_so->fetch_assoc() ;
		return $ROW_get_so['sort_order'] ;
	}

	function getStepValue($case_id, $step_id = Null, $link_code = Null)
	{
		$SQL_get_step_value = 'SELECT value FROM tPetitionSteps WHERE petition_id = ' . $case_id . ' AND ' ;
		if (False === is_null($step_id))
		{
			$SQL_get_step_value .= ' step_id = ' . $step_id ;
		}
		else
		{
			$SQL_get_step_value .= ' link_code = "' . $link_code . '"' ;
		}
		$SQL_get_step_value .= ' LIMIT 1 ; ' ;
		$RES_get_step_value = runSQL($SQL_get_step_value, 'reader') ;
		if (mysqli_num_rows($RES_get_step_value) == 1)
		{
			$ROW_get_step_value = $RES_get_step_value->fetch_assoc() ;
			return $ROW_get_step_value['value'] ;
		}
		else
		{
			return false ;
		}
	}























	/* 8: SECTION Functions */

	function deleteSection($section_id)
	{
		$SQL_delete_section = 'UPDATE tSections SET trashed = 1 WHERE id = ' . $section_id ;
		$RES_delete_section = runSQL($SQL_delete_section, 'writer') ;
	}

	function sectionsList($section_type = Null) {
		$SQL_sections_list = 'SELECT tSections.*, tCountries.country
			FROM tSections LEFT OUTER JOIN tCountries ON tSections.country_id = tCountries.id
			WHERE tSections.trashed != 1
			 ' ;
		if (False === is_null($section_type)) {
			$SQL_sections_list .= 'AND section_type = "' . $section_type . '" ' ;
		}
		$SQL_sections_list .= ' ORDER BY section_title ; ' ;
		// myDebug($SQL_sections_list) ;
		$result_sections_list = runSQL($SQL_sections_list, 'reader') ;
		// echo mysqli_num_rows($result_sections_list) ;
		return $result_sections_list ;
	}

	function sectionsListByType() {
		$SQL_sections_list_by_type = 'SELECT tSections.*
			FROM tSections
			WHERE tSections.trashed != 1
			ORDER BY tSections.section_type, tSections.section_title
			 ' ;
		$RES_sections_list_by_type = runSQL($SQL_sections_list_by_type, 'reader') ;
		return $RES_sections_list_by_type ;
	}

	function subSectionsList($section_type = Null, $id) {
		//myDebug($section_type) ;
		$SQL_subsections_list = 'SELECT tSections.* FROM tSections WHERE 1 ' ;
		if (False === is_null($section_type)) {
			$SQL_subsections_list .= ' AND section_type = "' . $section_type . '" ' ;
		}
		$SQL_subsections_list .= '
			AND id != ' . $id . '
			ORDER BY section_title ; ' ;
		$result_subsections_list = runSQL($SQL_subsections_list, 'reader') ;
		//myDebug($result_subsections_list) ;
		return $result_subsections_list ;
	}

	function sectionFetch($id) {
		settype($id, 'integer') ;
		$SQL_section_fetch = 'SELECT tSections.*, tCountries.country FROM tSections LEFT OUTER JOIN tCountries ON tSections.country_id = tCountries.id WHERE tSections.id = ' . $id . ' ; ' ;
		$result_section_fetch = runSQL($SQL_section_fetch, 'reader') ;
		return $result_section_fetch->fetch_assoc() ;
	}

	function sectionSteps($id) {
		settype($id, 'integer') ;
		$SQL_section_steps = 'SELECT * FROM tSectionSteps WHERE section_id = ' . $id . ' ORDER BY sort_order, id ; ' ;
		$result_section_steps = runSQL($SQL_section_steps, 'reader') ;
		return $result_section_steps ;
	}

	function getSectionType($section_id) {
		$SQL_get_section_type = 'SELECT section_type from tSections WHERE id = ' . $section_id . ' LIMIT 1 ; ' ;
		$RES_get_section_type = runSQL($SQL_get_section_type, 'reader') ;
		$ROW_get_section_type = $RES_get_section_type->fetch_assoc() ;
		return $ROW_get_section_type['section_type'] ;
	}

	function getSectionTitle($section_id) {
		$SQL_get_section_title = 'SELECT section_title from tSections WHERE id = ' . $section_id . ' LIMIT 1 ; ' ;
		$RES_get_section_title = runSQL($SQL_get_section_title, 'reader') ;
		$ROW_get_section_title = $RES_get_section_title->fetch_assoc() ;
		return $ROW_get_section_title['section_title'] ;
	}














	/* 9: LEAD Functions */

	function leadsListOurs() {
		if ($_SESSION['user_type'] != 'Firm') {
			return 'ERROR' ;
		}
		else {
			$SQL_leads_list_ours = 'SELECT tLeads.*, tUsers.first_name, tUsers.last_name
									FROM tLeads INNER JOIN tUsers ON tLeads.added_by_user_id = tUsers.id
									WHERE tLeads.referring_firm = ' . $_SESSION['firm_id'] . ' ; ' ;

			$result_leads_list_ours = runSQL($SQL_leads_list_ours, 'reader') ;
			return $result_leads_list_ours ;
		}
	}

	function getLeadCategoryDescription($id) {
		settype($id, 'integer') ;
		$SQL_get_lead_category = 'SELECT lead_category_text FROM tLeadCategories WHERE id = ' . $id . ' LIMIT 1 ;' ;
		// myDebug($SQL_get_lead_category) ; exit ;
		$result_get_lead_category = runSQL($SQL_get_lead_category, 'reader') ;
		$row_get_lead_category = $result_get_lead_category->fetch_assoc() ;
		return $row_get_lead_category['lead_category_text'] ;
	}

	function buildLeadDescription($id) {
		$SQL_get_first_lead_steps = 'SELECT value FROM tPetitionSteps WHERE section_type IN ("Lead","Org-Lead","Case") AND step_type != 99 AND petition_id = ' . $id . ' ORDER BY sort_order ;' ;
		$result_get_first_lead_steps = runSQL($SQL_get_first_lead_steps, 'reader') ;
		$desc = '' ;
		$resultCount = 0 ;
		while ($resultCount < 6 && $row = $result_get_first_lead_steps->fetch_assoc()) {
			if (strlen($row['value'])) {
				if (strlen($desc)) {
					$desc .= ' / ' ;
				}
				$desc .= $row['value'] ;
				$resultCount++ ;
			}
		}
		if (strlen($desc) == 0) $desc = 'No info added yet' ;
		$desc = substr($desc, 0, 50) ;
		if (strlen($desc)==50) $desc .= '&hellip;' ;
		return $desc ;
	}

	function isLeadAvailable($petition_id) {
		$SQL_is_lead_available = 'SELECT lead_available_for_transfer FROM tPetitions WHERE id = ' . $petition_id . ' ; ' ;
		$result_is_lead_available = runSQL($SQL_is_lead_available, 'reader') ;
		$row_is_lead_available = $result_is_lead_available->fetch_assoc() ;
		if ($row_is_lead_available['lead_available_for_transfer'] == 1) return True ;
	}

	function leadsForReview($mode) {
		$SQL_leads_for_review = 'SELECT * FROM tPetitions
			WHERE status IN ( "Lead" , "Org-Lead", "Case", "Offered" )
			AND lead_available_for_transfer = 1
			AND trashed != 1
			;' ;
		$result_leads_for_review = runSQL($SQL_leads_for_review, 'reader') ;
		if ($mode == 'number') {
			return mysqli_num_rows($result_leads_for_review) ;
		}
		else {
			return $result_leads_for_review ;
		}
	}

	function leadsAvailable($mode) {
		$SQL_leads_available = 'SELECT * FROM tPetitions
			WHERE
			(
					(status = "Available" AND lead_available_for_transfer = 1 AND firm_id != ' . $_SESSION['firm_id'] . ')
				OR
					(status = "Offered" AND firm_id = ' . $_SESSION['firm_id'] . ')
				OR
					(	tPetitions.firm_id IS NULL
						AND tPetitions.organization_id IN
						(SELECT organization_id FROM tOrgFirmLinks WHERE firm_id = ' . $_SESSION['firm_id'] . ')
						AND lead_available_for_transfer = 1
					)
			)
			AND trashed != 1
			AND NOT EXISTS
				(SELECT * FROM tFirmIgnorePetitions
				 WHERE firm_id = ' . $_SESSION['firm_id'] . ' AND petition_id = tPetitions.id)
			;' ;
		// myDebug($SQL_leads_available) ; exit ;
		$result_leads_available = runSQL($SQL_leads_available, 'reader') ;
		if ($mode == 'number') {
			return mysqli_num_rows($result_leads_available) ;
		}
		else {
			return $result_leads_available ;
		}
	}

	function caseIsMyClientOrgs($petition_id) {
		if (False === isSet($petition_id)) {
			return 0 ;
		}
		$SQL_case_is_my_client_orgs = 'SELECT id
			FROM tPetitions
			WHERE firm_id IS NULL
			AND id = ' . $petition_id . '
			AND status = "Org-Lead"
			AND organization_id IN (SELECT organization_id FROM tOrgFirmLinks WHERE firm_id = ' . $_SESSION['firm_id'] . ')' ;
		$result_case_is_my_client_orgs = runSQL($SQL_case_is_my_client_orgs, 'reader') ;
		return mysqli_num_rows($result_case_is_my_client_orgs) ;
	}

	function isLeadMyFirms($id) {
		$SQL_is_lead_my_firms = 'SELECT firm_id FROM tPetitions WHERE id = ' . $id . ' AND firm_id = ' . $_SESSION['firm_id'] . ' ; ' ;
		$result_is_lead_my_firms = runSQL($SQL_is_lead_my_firms, 'reader') ;
		if (mysqli_num_rows($result_is_lead_my_firms) == 1) {
			return True ;
		}
		else return False ;
	}

	function buildCaseTitle($id) {
		$petInfo = getPetitionVisaTypeInfo($id) ;
		// If it's a petition
		if (False === is_null($petInfo['visa_type_id'])) {
			$caseTitle = $petInfo['visa_code']  ;
			$beneficiaryDetails = getBeneficiaryForPetition($id) ;
			if ($beneficiaryDetails === NULL) {
				$caseTitle .=  ' (beneficiary not set)' ;
			}
			else if (strlen($beneficiaryDetails['first_name']) == 0) {
				$caseTitle .= ' for un-named beneficiary' ;
			}
			else {
				$caseTitle .= ' for ' . $beneficiaryDetails['first_name'] . ' ' . $beneficiaryDetails['last_name'] ;
			}
		}
		else {
			// It's a lead or case, so use existing function
			$caseTitle = buildLeadDescription($id) ;
		}

		return $caseTitle ;
	}

	function listNPAs($mode = Null) {
		$SQL_list_npas = 'SELECT * FROM tPetitions
			WHERE status = "NPA"
			AND trashed != 1
			ORDER BY date_started DESC
			;' ;
		$result_list_npas = runSQL($SQL_list_npas, 'reader') ;
		if ($mode == 'number') {
			return mysqli_num_rows($result_list_npas) ;
		}
		else {
			return $result_list_npas ;
		}
	}







	/* 10. Payments */

	function getPaymentInfo($step_id) {
		$SQL_get_payment_info = 'SELECT * FROM tPayments WHERE petition_step_id = ' . $step_id . ' ; ' ;
		$RES_get_payment_info = runSQL($SQL_get_payment_info, 'reader') ;
		if (mysqli_num_rows($RES_get_payment_info) == 1) {
			return $RES_get_payment_info->fetch_assoc() ;
		}
		else return mysqli_num_rows($RES_get_payment_info) ;
	}














	/* 11. Document Snippets */
	
	function listSnippets($id = Null) {
		$SQL_list_snippets = 'SELECT
			tDocumentSnippets.id AS snippet_id, tDocumentSnippets.snippet_code, tDocumentSnippets.snippet_description,
			tCountries.country, tCountries.id AS country_id
			FROM tDocumentSnippets LEFT OUTER JOIN tCountries ON tDocumentSnippets.country_id = tCountries.id ' ;
		if ($_SESSION['user_type'] == 'Firm') {
			$SQL_list_snippets .= ' WHERE country_id = ' . firmCountry() ;
		}
		$RES_list_snippets = runSQL($SQL_list_snippets, 'reader') ;
		return $RES_list_snippets ;
	}
	
	function getSnippet($id) {
		$SQL_list_snippets = 'SELECT
			tDocumentSnippets.snippet_code,
			tDocumentSnippets.snippet_description, tDocumentSnippets.snippet_content,	
			tCountries.id AS country_id
			FROM tDocumentSnippets LEFT OUTER JOIN tCountries ON tDocumentSnippets.country_id = tCountries.id
			WHERE tDocumentSnippets.id = ' . $id  ;
		$RES_list_snippets = runSQL($SQL_list_snippets, 'reader') ;
		return $RES_list_snippets->fetch_assoc() ;
	}

















	/* 12. Case Documents */

	function getCaseDocLatestIndex($case_id, $doc_name) {
		$SQL_get_case_doc_index = 'SELECT MAX(doc_index) AS maxindex FROM tCaseDocuments
			WHERE petition_id = ' . $case_id . ' AND doc_name = "' . $doc_name . '" ; ' ;
		$RES_get_case_doc_index = runSQL($SQL_get_case_doc_index, 'reader') ;
		$ROW_get_case_doc_index = $RES_get_case_doc_index->fetch_assoc() ;
		// myDebug($SQL_get_case_doc_index) ;
		if (is_null($ROW_get_case_doc_index['maxindex'])) return 0 ;
		else return $ROW_get_case_doc_index['maxindex'] ;
	}
	function bumpCaseDocIndex($case_id, $doc_name, $current_index, $full_path) {
		$SQL_bump_case_doc_index = 'INSERT INTO tCaseDocuments (petition_id, doc_name, doc_index, full_path)
			VALUES (
					' . $case_id . ' , "' . $doc_name . '", ' . ($current_index + 1) . ' , "' . $full_path . '"
				)
		  ' ;
		 $RES_bump_case_dox_index = runSQL($SQL_bump_case_doc_index, 'writer') ;
	}
	function listCaseDocs($case_id, $doc_name) {
		$SQL_list_case_docs = 'SELECT * FROM tCaseDocuments WHERE petition_id = ' . $case_id . ' AND doc_name="' . $doc_name . '" AND trashed != 1 ORDER BY date_created DESC ; ' ;
		$RES_list_case_docs = runSQL($SQL_list_case_docs, 'reader') ;
		if (mysqli_num_rows($RES_list_case_docs) > 0) {
			echo '<p>' . mysqli_num_rows($RES_list_case_docs) . ' version' ;
			if (mysqli_num_rows($RES_list_case_docs) != 1) echo 's' ;
			echo ' found</p>' ;
			echo '<ul>' ;
			while ($row = $RES_list_case_docs->fetch_assoc()) {
				echo '<li casedocid="' . $row['id'] . '">' ;
				echo '<a class="fake-link" href="' . $row['full_path'] . '" target="_blank">' ;
				echo '#' . $row['doc_index'] . ' - ' . $row['date_created'] . '</a>' ;
				echo ' &nbsp; <a class="delete-case-doc delete-link" title="Delete this version of the file">x</a>' ;
				echo '</li>' ;
			}
			echo '</ul>' ;
		}
	}
	function getCaseDocPath($id) {
		$SQL_get_case_doc_path = 'SELECT full_path FROM tCaseDocuments WHERE id = ' . $id . ' LIMIT 1 ;' ;
		$RES_get_case_doc_path = runSQL($SQL_get_case_doc_path, 'reader') ;
		$ROW_get_case_doc_path = $RES_get_case_doc_path->fetch_assoc() ;
		return $ROW_get_case_doc_path['full_path'] ;
	}
	function deleteCaseDoc($id) {
		$SQL_delete_case_doc = 'UPDATE tCaseDocuments SET trashed = 1 WHERE id = ' . $id . ' LIMIT 1 ;' ;
		$RES_delete_case_doc = runSQL($SQL_delete_case_doc, 'writer') ;
	}

	function setupCoverImage($case_id, $image_link_code, $image_title, $show_sections, $proportions = 'free')
	{
		GLOBAL $uploads_dir ;
		// Pull in any information about any existing step of given link code
		$SQL_existing_image = 'SELECT * FROM tPetitionSteps WHERE petition_id = ' . $case_id . ' AND link_code = "' . $image_link_code . '" LIMIT 1 ;' ;
		
		$RES_existing_image = runSQL($SQL_existing_image, 'reader') ;
		if (mysqli_num_rows($RES_existing_image) == 1)
		{
			$step = $RES_existing_image->fetch_assoc() ;
		}
		else 
		{
        	$SQL_insert_image_step = 'INSERT INTO tPetitionSteps
        		(petition_id, step_desc, step_type, section_type, link_code, step_notes)
        		VALUES
        		(
        			' . $case_id . ' ,
        			"' . $image_title . '" ,
        			12,
        			"' . $show_sections . '" ,
        			"' . $image_link_code . '",
        			"' . $proportions . '"
        		) ;
        	' ;
        	$step_id = runSQL($SQL_insert_image_step, 'writer', true) ;
        	$SQL_refetch_step = 'SELECT * FROM tPetitionSteps WHERE id = ' . $step_id ;
        	$RES_refetch_step = runSQL($SQL_refetch_step, 'reader') ;
        	$ROW_refetch_step = $RES_refetch_step->fetch_assoc() ;
        	$step = $ROW_refetch_step ;
		}
		// Render
		$case_id = $step['petition_id'] ;
		$step_id = $step['id'] ;
		$step_desc = $step['step_desc'] ;
		$step_notes = $step['step_notes'] ;
		$step_value = $step['value'] ;
		echo '
		    <div class="slim"
		    	data-push="true"
		    	data-service="file-upload-crop.php"
		    	data-meta-action="upload_file"
		    	data-meta-case-id="' . $case_id . '"
		    	data-meta-step-id="' . $step_id . '"
		    	data-meta-link-code="' . $image_link_code . '"
				data-meta-title="' . $step_desc . '"
				data-meta-step-notes="' . $step_notes . '"
				data-meta-section="' . $show_sections . '"
		    	data-post="output"
		    	data-instant-edit="true"
				data-ratio="' . $step_notes . '"
			>' ;
		// Existing image?
		if (False === empty($step_value))
		{
			echo '<img src="' . $uploads_dir . '/' . $step_value . '?' . rand() . '" alt crossorigin="anonymous">' ;
		}
		echo '<input type="file"/></div>' ;
		echo '<div style="text-align:center;"><span class="ovg-link">Build Cover</span></div>' ;
	}

















	/* 13. Hints (inline help) */
	$hint_categories = array('Page','Tab','Step') ;
	function listHints()
	{
		$SQL_list_hints = 'SELECT tHints.*, tVisaTypes.visa_code
			FROM tHints LEFT OUTER JOIN tVisaTypes ON tHints.visa_type = tVisaTypes.id
			ORDER BY category, code ; ' ;
		$RES_list_hints = runSQL($SQL_list_hints, 'reader') ;
		return $RES_list_hints ;
	}
	function getHint($id)
	{
		$SQL_get_hint = 'SELECT * FROM tHints WHERE id = ' . $id . ' ; ' ;
		$RES_get_hint = runSQL($SQL_get_hint, 'reader') ;
		$ROW_get_hint = $RES_get_hint->fetch_assoc() ;
		return $ROW_get_hint ;
	}
	function show_hint_basic($code, $visa_type = Null)
	{
		$SQL_show_hint = 'SELECT content FROM tHints WHERE code = "' . $code . '" ' ;
		if (False === is_null($visa_type))
		{
			$SQL_show_hint .= ' AND visa_type = ' . $visa_type ;
		}
		$RES_show_hint = runSQL($SQL_show_hint, 'reader') ;
		if (mysqli_num_rows($RES_show_hint) >0)
		{
			while ($hint = $RES_show_hint->fetch_assoc())
			{
				$content = crlf2br($hint['content']) ;
				echo '<div class="help help_block">' . $content . '</div>' ;
			}
		}
	}
	function displayTabHelp($mode, $case_id)
	{
		// First, get visa type
		$visa_type_info = getPetitionVisaTypeInfo($case_id) ;
		$visa_type_id = $visa_type_info['visa_type_id'] ;
		if (empty($visa_type_id)) return false ;

		// Get hint content
		$SQL_tab_help = 'SELECT content FROM tHints WHERE category="tab" AND code="' . $mode . '" ' ;

		if (False === empty($visa_type_id))
		{
			$SQL_tab_help .= 'AND visa_type = ' . $visa_type_id  ;
		}
		$RES_tab_help = runSQL($SQL_tab_help, 'reader') ;
		$output = '' ;
		while ($help = $RES_tab_help->fetch_assoc())
		{
			$output .= crlf2br($help['content']) ;
		}
		echo '<div class="help">' . $output . '</div>' ;
	}































	/* Generic Functions */

	function crlf2br($string)
	{
		return str_replace ( CRLF , '<br>' , $string) ;
	}

	function writeNull($value) {
		if (is_null($value)) return 'Null' ;
		else return $value ;
	}

	function logEvent($event_text, $user_id = Null) {
		if (True === is_null($user_id)) {
			$user_id = $_SESSION['user_id'] ;
		}
		else {
			settype($user_id, 'integer') ;
		}
		$SQL_Log = 'INSERT INTO tEventLog (event, user_id) VALUES (' ;
		$SQL_Log .= '"' . addslashes($event_text) . '", ' ;
		$SQL_Log .=	$user_id . ');' ;
		// myDebug($SQL_Log) ;
		$resultLog = runSQL($SQL_Log, 'writer') ;
	}

	function prioritizeText($ind) {
		if ($ind == 1) {
			return '<span class="ind-yes">Yes</span>' ;
		}
		else {
			return '<span class="ind-no">No</span>' ;
		}
	}

	function yesNoIcon($ind) {
		if ($ind == 1) {
			return '<img src="images/icon-yes-small.png" height="25" width="25" alt="Yes">' ;
		}
		else {
			return '<img src="images/icon-no-small.png" height="25" width="25" alt="No">' ;
		}
	}

	function showNull($text) {
		if (strlen($text)) {
			return $text ;
		}
		else {
			return '<span class="subtle">None</span>' ;
		}
	}

	function showYesNo($input) {
		if ($input != 0) {
			return 'Yes' ;
		}
		else {
			return '<span class="subtle">No</span>' ;
		}
	}

	function showBinary($input) {
		if (is_null($input) || $input == 0) {
			return '0' ;
		}
		else {
			return $input ;
		}
	}

	function myDebug($value, $addComments = NULL, $forceShow = False) {
		if ($forceShow === False && ( False === isSet($_SESSION['debugging']) || $_SESSION['debugging']== 0 ) ) {
			return ;
		}
		else {
			if ($addComments !== NULL) echo '<!-- ' ;
			echo '<hr>' ;
			echo '<pre>' ;
			if (@mysqli_num_rows($value) != 0) {
				while($row = $value->fetch_assoc())	{
					var_dump($row) ;
				}
			}
			else {
				var_dump($value) ;
			}
			echo '</pre>' ;
			if ($addComments !== NULL) echo '--> ' ;
		}
	}

	function runSQL($sql_statement, $db_user_OLD = 'reader',  $returnLastID = False) {

		// Options for $db_user are: reader / writer / cleaner
		global
			$db_host, 
			$db_db,
			$db_port,
			$db_user,
			$db_password
		;

		$link = mysqli_init();
		$success = mysqli_real_connect(
		   $link, 
		   $db_host, 
		   $db_user, 
		   $db_password, 
		   $db_db,
		   $db_port
		) ;

		$sqlResult = mysqli_query($link, $sql_statement) or die(mysqli_error($link)) ;

		if (FALSE === $sqlResult) {
			myDebug(mysql_error(), False, True) ;
			exit ;

		}
		if ($returnLastID === True) {
			return mysqli_insert_id($link) ;
			mysqli_close($link) ;
		}
		else {
			mysqli_close($link) ;
			return $sqlResult ;
		}
	}

	function checkUserPassword($user_id, $old_password) {
		settype($user_id, 'integer') ;
		global $hash_salt ;
		$SQL_check_password = 'SELECT pwd_hash FROM tUsers WHERE id = ' . $user_id . ';' ;
		$result_check_password = runSQL($SQL_check_password, 'reader') ;
		$row = $result_check_password->fetch_assoc() ;
		$current_hash = $row['pwd_hash'] ;
		if ($current_hash == Null || $current_hash == '') {
			// Current password is blank, so go ahead and allow the update
			return true ;
		}
		
		/*
		// Debugging
		echo 'User ID = ' . $user_id . '<br>' ;
		echo 'Input password = ' . $old_password . '<br>' ;
		echo 'Current hash = ' . $current_hash . '<br>' ;
		echo 'Check hash =  ' . md5($old_password . $hash_salt) . '<br>' ;
		exit ;
		*/

		if (md5($old_password . $hash_salt) == $current_hash) {
			return true ;
		}
		else {
			return false ;
		}
	}

	function sendEmail($recipient_name = False, $recipient_email, $email_subject, $email_content) {
		if ($_ENV['RDS_DB_NAME'] != 'ov-live') return false ;
	    $recipients = $recipient_email ;
	    $headers['From']    = 'gateway@onlinevisas.com' ;
	    $headers['To']      = $recipient_email ;
	    $headers['Subject'] = $email_subject ;
	    $body = $email_content ;
	    $smtpinfo["host"] = "smtp.fatcow.com" ;
	    $smtpinfo["port"] = "587" ;
	    $smtpinfo["auth"] = true ;
	    $smtpinfo["username"] = "gateway@onlinevisas.com" ;
	    $smtpinfo["password"] = "SanFrancisco49$" ;

	    // Create the mail object using the Mail::factory method
	    $mail_object =& Mail::factory("smtp", $smtpinfo) ;
	    $mail_object->send($recipients, $headers, $body) ;
	}

	function sendEmailHTML($to, $from, $subject, $text, $html)
	{
		if ($_ENV['RDS_DB_NAME'] != 'ov-live') return false ;
		$msg['api_key'] = 'api-45F5C2B2790C11E697F6F23C91BBF4A0' ;
		$msg['to'] = array($to) ;
		$msg['sender'] = $from ;
		$msg['subject'] = $subject ;
		$msg['text_body'] = $text ;
		$msg['html_body'] = addslashes($html) ;

		$url = 'https://api.smtp2go.com/v3/email/send' ;

		$options = array(
		  'http' => array(
		    'method'  => 'POST',
		    'content' => json_encode( $msg ),
		    'header'=>  "Content-Type: application/json\r\n" .
		                "Accept: application/json\r\n"
		    )
		) ;
		$context  = stream_context_create( $options ) ;
		$result = file_get_contents( $url, false, $context ) ;
		// $response = json_decode( $result ) ;
	}



	// OLD version!
	function sendEmailHTML_OLD($to, $from, $subject, $text, $html) {
		if ($_ENV['RDS_DB_NAME'] != 'ov-live') return false ;
		require(__DIR__.'/lib/PHPMailer/PHPMailerAutoload.php') ;
 
 		$mail = new PHPMailer;
 
 		//$mail->SMTPDebug = 3;                             // Enable verbose debug output
 
 		$mail->isSMTP();                                    // Set mailer to use SMTP
 		$mail->Host = $_SERVER['SMTP_HOST'] ;  				// Specify main and backup SMTP servers
 		$mail->SMTPAuth = true;                             // Enable SMTP authentication
 		$mail->Username = $_SERVER['SMTP_USERNAME'] ;       // SMTP username
 		$mail->Password = $_SERVER['SMTP_PASSWORD'] ;       // SMTP password
 		$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
 		$mail->Port = $_SERVER['SMTP_PORT'] ?: "587" ;      // TCP port to connect to
 		$mail->setFrom($from);
 		$mail->addAddress($to);     						// Add a recipient
 
 		$mail->isHTML(true);                                // Set email format to HTML
 
 		$mail->Subject = $subject;
 		$mail->Body    = $html;
 		$mail->AltBody = $text;
 
 		$mail->SMTPOptions = array(
 		    'ssl' => array(
 		        'verify_peer' => false,
 		        'verify_peer_name' => false,
 		        'allow_self_signed' => true
 		    )
 		);

 		@$mail->send() ;
 		return ;
 
 		if(!$mail->send())
 		{
 		    echo '<p>Message could not be sent.</p>';
 		    echo '<pre>Mailer Error: ' . $mail->ErrorInfo . '</pre>' ;
 		    exit ;
 		}
 		else
 		{
 		    echo 'Sent successfully to: ' . $to ;
 		}
	}

	function hoursAgo($event_time) {
		$start = new DateTime($event_time) ;
		$end = new DateTime() ;
		return round(($end->format('U') - $start->format('U')) / (60*60)) ;
	}
	function timeAgo($event_time)
	{
		$start = new DateTime($event_time) ;
		$end = new DateTime() ;
		$hours = round(($end->format('U') - $start->format('U')) / (60*60)) ;
		if ($hours < 1) return 'Less than an hour ago' ;
		// If < 2 days
		else if ($hours < 48) return $hours . ' hours ago' ;
		// If >2, < 14 days
		else if ($hours < 336) return floor($hours/24) . ' days ago' ;
		else return floor($hours/168) . ' weeks ago' ;
	}
	function gravatar($user_email, $size=20) {
		$default_image = "images/icon-user.png" ;
		return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($user_email))) . "?d=mm&s=" . $size ;
	}

	function unPunctuate($in_string) {
		$s2 = preg_replace("/(?![.@-])\p{P}/u", "", $in_string) ;
		return htmlspecialchars($s2) ;
	}

	function sortLink($sortBy) {
		$link = '?order=' . $sortBy ;
		if (isSet($_GET['order']) && $_GET['order'] == $sortBy && False === isSet($_GET['desc'])) {
			$link .= '&desc=true' ;
		}
		return $link ;
	}

	function countriesList() {
		$SQL_countries_list = 'SELECT * FROM tCountries ORDER BY country ; ' ;
		$result_countries_list = runSQL($SQL_countries_list, 'reader') ;
		return $result_countries_list ;
	}
	function countryFetch($id) {
		settype($id, 'integer') ;
		$SQL_country_fetch = 'SELECT * FROM tCountries WHERE id = ' . $id . ' ; ' ;
		$result_country_fetch = runSQL($SQL_country_fetch, 'reader') ;
		return $result_country_fetch->fetch_assoc() ;
	}

	function deleteFirm($id){
		if ($_SESSION['user_type'] == 'Superuser') {
			$SQL_delete_milestone = 'UPDATE tFirms SET trashed = 1 WHERE id = ' . $_GET['id'] ;
			$result_set_milestone = runSQL($SQL_delete_milestone, 'writer') ;
		}
	}	
	function deletePetition($petition_id) {
		if (
			($_SESSION['user_type'] == 'Superuser')
			||
			(	$_SESSION['user_type'] == 'Firm'
				&& isSet($petition_id)
				&& getFirmForPetition($petition_id) == $_SESSION['firm_id']
			)
		) {
			$SQL_delete_pet = 'UPDATE tPetitions SET trashed = 1 WHERE id = ' . $petition_id . ' LIMIT 1 ; ' ;
			$result_set_pet = runSQL($SQL_delete_pet, 'writer') ;
		}
	}	
	function deleteOrganizations($id) {
		if ($_SESSION['user_type'] == 'Superuser') {
			$SQL_delete_milestone = 'UPDATE tOrganizations SET trashed = 1 WHERE id = ' . $_GET['id'] ;
			$result_set_milestone = runSQL($SQL_delete_milestone, 'writer') ;
		}
	}
	function trimDDOption($selectOption) {
		// First trim whitespace
		// If first character is [ and fourth is ], cut off those four.
		$s1 = trim($selectOption) ;
		if (substr($s1, 0, 1) == '[' && substr($s1, 3, 1) == ']') {
			return substr($s1, 4) ;
		}
		else return $selectOption ;
	}
	function getDDOptionNumber($selectOption) {
		// First trim whitespace
		// If first character is [ and fourth is ], cut off those four.
		$s1 = trim($selectOption) ;
		if (substr($s1, 0, 1) == '[' && substr($s1, 3, 1) == ']') {
			return substr($s1, 1, 2) ;
		}
		else return $selectOption ;
	}
	function highlightSubstring($string, $substring)
	{
		// return preg_replace("/\b([a-z]*${substring}[a-z]*)\b/i","<strong>$1</strong>",$string);
		return preg_replace("/\w*?$substring\w*/i", "<b>$0</b>", $string) ;
	}

	function highlightSubstring2($haystack,$needle)
	{
	$haystack=preg_replace("/($needle)/i","<span style='color:#cc0000;'>\${1}</span>",$haystack);
	return $haystack;
	}

?>