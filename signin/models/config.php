<?php
/*
UserCake Version: 2.0.1
http://usercake.com
*/
require_once("db-settings.php"); //Require DB connection

// Set Settings
$emailActivation             = true;
$mail_templates_dir          = 'models/mail-templates/';
$websiteName                 = $_SERVER['HTTP_HOST'];
$websiteUrl                  = $_SERVER['HTTP_HOST'].'/register';
$emailAddress                = 'noreply@ILoveUserCake.com';
$resend_activation_threshold = 0;
$emailDate                   = date('dmy');
$language                    = 'models/languages/en.php';
$template                    = 'models/site-templates/default.css';

$pass_min_len = 0;
$pass_max_len = 50;
$user_min_len = 3;
$user_max_len = 20;
$display_min_len = 1;
$display_max_len = 50;


$default_hooks = array("#WEBSITENAME#","#WEBSITEURL#","#DATE#");
$default_replace = array($websiteName,$websiteUrl,$emailDate);

if (!file_exists($language)) {
	$language = "models/languages/en.php";
}

if(!isset($language)) $langauge = "models/languages/en.php";

//Pages to require
require_once($language);
require_once("class.mail.php");
require_once("class.user.php");
require_once("class.newuser.php");
require_once("funcs.php");

session_start();

//Global User Object Var
//loggedInUser can be used globally if constructed
if(isset($_SESSION["userCakeUser"]) && is_object($_SESSION["userCakeUser"]))
{
	$loggedInUser = $_SESSION["userCakeUser"];
}

?>
