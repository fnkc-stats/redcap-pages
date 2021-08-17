<?php
// Prevent view from being called directly
require_once APP_PATH_DOCROOT . '/Config/init_functions.php';
System::init();

// Need to call survey functions file to utilize a function
require_once APP_PATH_DOCROOT . "Surveys/survey_functions.php";

// Begin HTML
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title><?php echo strip_tags(remBr(br2nl($app_title))) ?> | REDCap</title>
	<meta name="googlebot" content="noindex, noarchive, nofollow, nosnippet">
	<meta name="robots" content="noindex, noarchive, nofollow">
	<meta name="slurp" content="noindex, noarchive, nofollow, noodp, noydir">
	<meta name="msnbot" content="noindex, noarchive, nofollow, noodp">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo APP_PATH_IMAGES ?>favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon-precomposed" href="<?php echo APP_PATH_IMAGES ?>apple-touch-icon.png">
	<link rel="stylesheet" type="text/css" href="<?php echo APP_PATH_CSS ?>jquery-ui.min.css" media="screen,print">
	<link rel="stylesheet" type="text/css" href="<?php echo APP_PATH_CSS ?>style.css" media="screen,print">
	<script type="text/javascript" src="<?php echo APP_PATH_JS ?>base.js"></script>
	<script type="text/javascript" src="<?php echo APP_PATH_JS ?>velocity-min.js"></script>
	<script type="text/javascript" src="<?php echo APP_PATH_JS ?>velocity-ui-min.js"></script>	
	<script type="text/javascript" src="<?php echo APP_PATH_JS ?>ReportFolders.js"></script>
    <script type="text/javascript" src="<?php echo APP_PATH_JS ?>tinymce/tinymce.min.js"></script>
	<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo APP_PATH_CSS ?>bootstrap-ie9.min.css">
	<script type="text/javascript">$(function(){ie9FormFix()});</script>
	<![endif]-->
</head>
<body>
<?php

// REDCap Hook injection point: Pass PROJECT_ID constant (if defined).
Hooks::call('redcap_every_page_top', array(defined('PROJECT_ID') ? PROJECT_ID : null));

// iOS CSS Hack for rendering drop-down menus with a background image
if ($isIOS)
{
	print  '<style type="text/css">select { padding-right:14px !important;background-image:url("'.APP_PATH_IMAGES.'arrow_state_grey_expanded.png") !important; background-position:right !important; background-repeat:no-repeat !important; }</style>';
}

// Render Javascript variables needed on all pages for various JS functions
renderJsVars();
