<?php

$config = array();

// Class loading
$config['autoload_dir'] = array('core', 'lib', 'application/controllers', 'application/models');
$config['preload_libs'] = array();

// System security / Web Application Firewall (WAF)
$config['sanitize'] = true; // Do only set to false if you're insane! (you don't want to do that!)
$config['invalid_chars'] = "";
$config['invalid_keywords'] = array("union", "select");

require('/../config/route.php');

?>