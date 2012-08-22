<?php
/**
 * PullThePlug -- allows certain users to "pull the plug" on the wiki, stopping all editing except by certain users.
 *
 * @file
 * @ingroup Extensions
 * @version 0.0.0
 * @author iggyvolz <iggyvolz@aim.com>
 * @license Attribution 3.0 Unported http://creativecommons.org/licenses/by/3.0/
 * @link http://www.mediawiki.org/wiki/Extension:PullThePlug
 */

# Not a valid entry point, skip unless MEDIAWIKI is defined
if ( !defined( 'MEDIAWIKI' ) ) {
	echo <<<EOT
To install Pull The Plug, put the following line in LocalSettings.php:
require_once( "\$IP/extensions/PullThePlug/PullThePlug.php" );
EOT;
	exit( 1 );
}

// Extension credits that will show up on Special:Version
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'PullThePlug',
	'version' => '0.0.0',
	'author' => 'iggyvolz',
	'descriptionmsg' => 'Pull The Plug allows certain users to "pull the plug" on the wiki, stopping all editing except by certain users.',
	'url' => 'https://www.mediawiki.org/wiki/Extension:PullThePlug',
);

// Autoload classes, set up the special page and i18n
$dir = dirname( __FILE__ ) . '/';
$wgAutoloadClasses['PullThePlug'] = $dir . 'PullThePlug_body.php';
$wgSpecialPages['PullThePlug'] = 'PullThePlug';
$wgExtensionMessagesFiles['PullThePlug'] = $dir . 'PullThePlug.i18n.php';
$wgExtensionMessagesFiles['PullThePlugAlias'] = $dir . 'PullThePlug.alias.php';
