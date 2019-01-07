<?php

$identifier = 'websitemaker_f323d5b20528904cac0afb6058d78ed48f9a';
$salt = 'nW}})r7,e!';
$baseurl = 'https://config.websitemaker.hostnet.nl/cm4all-admin';
$user = 'admin';
$pwhash = '70147c9d1ce0d1b85be335d807866db6';
$host = 'hulsenbeek.com';

if (empty($salt)) {
	trigger_error('unconfigured');
	exit(1);
}
if (empty($pwhash)) {
	trigger_error('unconfigured');
	exit(1);
}

if (!isset($_REQUEST['user']) || !is_string($_REQUEST['user']) || empty($_REQUEST['user']) || $_REQUEST['user'] != $user) {
	trigger_error('unauthorized');
	exit(1);
}

if (!isset($_POST['password']) || !is_string($_POST['password']) || empty($_POST['password'])) {
	trigger_error('unauthorized');
	exit(1);
}

$cmphash = md5($salt.$_POST['password']);
if ($cmphash != $pwhash) {
	trigger_error('unauthorized');
	exit(1);
}


$url = $baseurl . '/createLogin?identifier=' . $identifier . '&appParam.externalToken=' . $host;
$response = file_get_contents($url);
if (!is_string($response) || empty($response)) {
	trigger_error('failure');
	exit(1);
}
if (!preg_match("/^M I;OK;;\s+V ([^ ]+)$/",$response,$matches)) {
	trigger_error('failure');
	exit(1);
}
$loginurl = urldecode($matches[1]);

header('Location: '.$loginurl);
echo "goto ".$loginurl;
