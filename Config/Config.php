<?php 
define('APPROOT',dirname(dirname(__FILE__)));
define('BASEURL',str_replace('index.php','',$_SERVER['PHP_SELF']));
define('URLROOT','http://localhost'.BASEURL);
define('URL',str_replace(BASEURL,'',$_SERVER['REQUEST_URI']));
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);