<?php

////////////////////////////////////////////////////////////////////////////////
// autoloading setup ///////////////////////////////////////////////////////////

/*
for this example we will follow the "framework outside of public web root"
style of directory layout to greater exaggerate the effect of autoloading for
the demo.

lets pretend this directory contains the framework codebase:
	/home/catch404/project/framework
	/home/catch404/project/framework/loader.php
	... etc.

lets pretend this directory contains the web root, as in this is the folder
apache pulls from when someone hits our website:
	/home/catch404/project/www
	/home/catch404/project/www/index.php
	... etc.

the goal is then to get this directory into the include path:
	/home/catch404/project

this will create the base for accessing our framework by namespace and also for
structuring the application's codebase as well.

*/

set_include_path(sprintf(
	'%s%s%s',
	get_include_path(),
	PATH_SEPARATOR,
	dirname(dirname(__FILE__))
));

// on a windows system the path now looks something like this:
//	.;C:\php\pear;C:\Users\catch404\project
// on a unix type system, something like this:
//	.:/usr/lib/php/pear:/home/catch404/project

/* now we can define an autoloader, in this case i am going to use the default
one that PHP supplies as i do not plan to do any fancy dancing in the demo.
however i will use a try block to catch the exception spl_autoload throws if
it failed to do the autoloading to allow my router to do the work of 404'ing
instead. */


spl_autoload_register(function($c){
	try { spl_autoload($c); }
	catch(Exception $e) { }
});


////////////////////////////////////////////////////////////////////////////////
// below here is just frameworky stuff /////////////////////////////////////////

/* not going to go about writing a config file system for this demonstration,
but some of the stuff below here is config file territory for sure. */

// framework version. do not touch.
define('FW_VERSION','1.0');

// set this to the name of your application's namespace.
define('FW_APP_NS','Demo');
