<?php
session_start();
ob_start();
define("PATH", dirname(__FILE__));
define("APP_PATH", realpath(PATH . '/app'));
define("CONFIG", realpath(PATH . '/config'));
define("LIBRARY", realpath(PATH . '/library'));
define("PUBLIC_PATH", realpath(PATH . '/public'));
require_once(APP_PATH.'/Bootstraps.php');
$bootstraps = new Bootstraps();
$bootstraps->run();
