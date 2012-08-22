<?php

class PullThePlug extends SpecialPage {

	/**
	 * Constructor -- set up the new special page
	 */
	public function __construct() {
		parent::__construct( 'PullThePlug' );
	}

	/**
	 * Show the special page
	 *
	 * @param $par Mixed: parameter passed to the special page or null
	 */
	public function execute( $par ) {
		global $wgRequest, $wgOut, $wgUser;

		/*If you want to make this special page a restricted special page,
		you can uncomment the following three checks and add 'permission-name'
		as the second parameter to parent::__construct in the __construct
		function.
		Note that you will not need the read-only check if your special page
		doesn't perform any write queries against the database.

		If the user doesn't have the required permission, display an error*/
		if( !$wgUser->isAllowed( 'sysop' ) ) {
			$wgOut->permissionRequired( 'sysop' );
			return;
		}

		// Show a message if the database is in read-only mode
		if ( wfReadOnly() ) {
			$wgOut->readOnlyPage();
			return;
		}

		// If the user is blocked, they don't need to access this page
		if ( $wgUser->isBlocked() ) {
			$wgOut->blockedPage();
			return;
		}

		// Set the page title and robot policies
		$this->setHeaders();

		# Get request data from, e.g.
		$param = $wgRequest->getText( 'param' );

		# Do stuff
		# ...

		# Output
//		$wgOut->setPageTitle( wfMsg( 'Pull The Plug' ) );
		if ($par=="sysop")
		  {
		$wgOut->addHTML( '<center>While this page is open, only sysops can edit.</center>' );
		$wgGroupPermissions['*']['edit'] = false;
		$wgGroupPermissions['user']['edit'] = false;
		$wgGroupPermissions['autoconfirmed']['edit'] = false;
		$wgGroupPermissions['bot']['edit'] = false;
		$wgGroupPermissions['sysop']['edit'] = false;
		$wgGroupPermissions['bureaucrat']['edit'] = false;
		  }
		else
		  {
		  $wgOut->addWikiText( '<center>To "Pull the Plug", use the options below.</center><br />
*[[Special:PullThePlug/users|Registered users only]]
*[[Special:PullThePlug/emailconfirmed|Email-confirmed users only]]
*[[Special:PullThePlug/sysop|Sysops only]]
*[[Special:PullThePlug/bureaucrat|Bureaucrats only]]
*[[Special:PullThePlug/noone|Noone]]' );
		  }
	}
}










