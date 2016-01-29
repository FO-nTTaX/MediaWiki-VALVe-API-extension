<?php

// Take credit for your work, in the "api" category.
$wgExtensionCredits['api'][] = array(

	'path' => __FILE__,

	// The name of the extension, which will appear on Special:Version.
	'name' => 'Valve Prize Pool Api',

	// A description of the extension, which will appear on Special:Version.
	'description' => 'valveapi-shortdesc',

	// Alternatively, you can specify a message key for the description.
	'descriptionmsg' => 'valveapi-desc',

	// The version of the extension, which will appear on Special:Version.
	// This can be a number or a string.
	'version' => '1.0.0', 

	// Your name, which will appear on Special:Version.
	'author' => 'Alex &quot;FO-nTTaX&quot; Winkler',

	// The URL to a wiki page/web page with information about the extension,
	// which will appear on Special:Version.
	'url' => 'http://FO-nTTaX.de',

);

// Map class name to filename for autoloading
$wgAutoloadClasses['ValveApi'] = __DIR__ . '/ApiValveApi.php';
$wgAutoloadClasses['ExtValveApi'] = __DIR__ . '/ExtValveApi.php';

// Map module name to class name
$wgAPIModules['valveapi'] = 'ValveApi';

// Load the internationalization file
$wgExtensionMessagesFiles['myextension'] = __DIR__ . '/ValveApi.i18n.php';

$wgHooks['ParserFirstCallInit'][] = 'wfRegisterValveApi';
function wfRegisterValveApi( $parser ) {
	$parser->setFunctionHook( 'valvedota2prizepool', 'ExtValveApi::putvalvedota2prizepool' );
	$parser->setFunctionHook( 'valvedota2rawprizepool', 'ExtValveApi::putvalvedota2rawprizepool' );
	$parser->setFunctionHook( 'valvecsgoweaponprice', 'ExtValveApi::putvalvecsgoweaponprice' );
}

// Return true so that MediaWiki continues to load extensions.
return true;