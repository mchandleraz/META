<?php
session_start();

$dbhost = "localhost";
$dbname = "";
$dbuser = "";
$dbpass = "";

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
	<script src="https://www.google.com/jsapi" type="text/javascript"></script>
	<script type="text/javascript">
		google.load('jquery', '1.4.1');
	</script>

	<!-- Hide address bars in iOS and Android -->
	<script type="text/javascript">

		/*
		  * Normalized hide address bar for iOS & Android
		  * (c) Scott Jehl, scottjehl.com
		  * MIT License
		*/
		(function( win ){
			var doc = win.document;

			// If there's a hash, or addEventListener is undefined, stop here
			if( !location.hash && win.addEventListener ){

				//scroll to 1
				window.scrollTo( 0, 1 );
				var scrollTop = 1,
					getScrollTop = function(){
						return win.pageYOffset || doc.compatMode === "CSS1Compat" && doc.documentElement.scrollTop || doc.body.scrollTop || 0;
					},

					//reset to 0 on bodyready, if needed
					bodycheck = setInterval(function(){
						if( doc.body ){
							clearInterval( bodycheck );
							scrollTop = getScrollTop();
							win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
						}	
					}, 15 );

				win.addEventListener( "load", function(){
					setTimeout(function(){
						//at load, if user hasn't scrolled more than 20 or so...
						if( getScrollTop() < 20 ){
							//reset to hide addr bar at onload
							win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
						}
					}, 0);
				} );
			}
		})( this );

	</script>

	<!-- Geolocation handling -->
	<script type="text/javascript">
		$(window).ready(function() {
			$("#getGeo").click(initiate_geolocation);
		});
		function initiate_geolocation() {
			navigator.geolocation.getCurrentPosition(handle_geolocation_query);
		}
		function handle_errors(error) {
			switch(error.code) {
				case error.PERMISSION_DENIED: alert("User did not share geolocation data.");
				break;
				case error.POSITION_UNAVAILABLE: alert("Position Unavailable.");
				break;
				case error.TIMEOUT: alert("Geolocation Time Out.");
				break;
				default: alert("Unknown Error.");
				break;
			}
		}

		function handle_geolocation_query(position) {

			// assign output of getCurrentPosition to vars
			// so we can work with them easier
			var lat = position.coords.latitude;
			var lon = position.coords.longitude;

			// Send lat & lon vars to hidden
			document.getElementById('lat').value = lat;
			document.getElementById('lon').value = lon;

		}

	</script>

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
