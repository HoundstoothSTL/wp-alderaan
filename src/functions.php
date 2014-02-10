<?php

/*************
	** Use functions.php as a class __autoloader
	**************/
	require_once(dirname(__FILE__).'/lib/classes/Render.php');
	//require_once(dirname(__FILE__).'/lib/classes/SiteInfo.php');

/*************
	** Some helper functions
	**************/
require_once('lib/include_functions/constants.php');
require_once('lib/include_functions/init.php');
require_once('lib/include_functions/admin.php');
require_once('lib/include_functions/cleanup.php');
require_once('lib/include_functions/utilities.php');
require_once('lib/include_functions/scripts.php');
require_once('lib/include_functions/custom.php');