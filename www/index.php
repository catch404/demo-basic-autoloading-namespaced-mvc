<?php

// load the framework which we know is in a directory below the application
// web root. using absolute paths because i can.
require(sprintf(
	'%s/framework/loader.php',
	dirname(dirname(__FILE__))
));

// checking the framework for grins. you don't really want to echo things out
// here usually, just doing it for demonstration.
if(!defined('FW_VERSION')) die('the framework did not seem to load?');
else echo '<p>Framework v', FW_VERSION, ' Loaded</p>', PHP_EOL;

////////////////////////////////////////////////////////////////////////////////
// super basic routing /////////////////////////////////////////////////////////

$page = null;
if(array_key_exists('page',$_GET))
	$page = preg_replace('/[^a-z0-9_]/i','',$_GET['page']);

if(!$page) $page = 'Home';

////////////////////////////////////////////////////////////////////////////////
// controller autoload /////////////////////////////////////////////////////////

$cname = sprintf('%s\Controller\%s',FW_APP_NS,$page);
if(class_exists($cname,true)) {
	// does the app have a controller for this request?
	$controller = new $cname;
} else {
	// does the app have a custom 404 controller?
	$cname = sprintf('%s\Controller\Error404',FW_APP_NS);
	if(class_exists($cname,true)) $controller = new $cname;
	else $controller = new Framework\Controller\Error404;
}

// control.
$controller->run();

?>