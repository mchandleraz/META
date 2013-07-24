<?php
session_start();

$dbhost = "localhost";
$dbname = "meta";
$dbuser = "root";
$dbpass = "duaphl3x2";

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<!-- iOS home screen icon -->
	<link rel="apple-touch-icon" href="img/icon.jpg"/>

	<!-- iOS 'splash' page -->
	<link rel="apple-touch-startup-image" href="img/splash.jpg" />
	<title>META - Motoring Enthusiasts Travel Assistance</title>

	<!-- We will get our jQuery from google -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<!-- Loading main stylesheet -->
	<link rel="stylesheet" type="text/css" href="lib/css/style.css">

</head>

<body>
	<header class="wrap">
		<hgroup id="logo">
			<a href="index.php"><h1>META</h1></a>
			<h2>Motoring Enthusiasts Travel Assistance</h2>
		</hgroup>
	</header>
