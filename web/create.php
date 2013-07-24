<?php include "header.php" ?>
<meta http-equiv='refresh' content='1;index.php' />
<?php

	$username = mysql_real_escape_string($_POST['username']);
	$name = mysql_real_escape_string($_POST['name']);
	$email = mysql_real_escape_string($_POST['email']);
	$phone = mysql_real_escape_string($_POST['phone']);
	$location = mysql_real_escape_string($_POST['location']);
	$needs = mysql_real_escape_string($_POST['needs']);
	$lat = mysql_real_escape_string($_POST['lat']);
	$lon = mysql_real_escape_string($_POST['lon']);

	$sql = "INSERT INTO alerts (Username, Name, EmailAddress, Phone, Needs, Lat, Lon) VALUES ('$username', '$name', '$email', '$phone', '$needs', '$lat', '$lon')";

	if (!mysql_query($sql)) {
		die(mysql_error());
	}
	else{
?>
		<section class="wrap">
			<p>Your Alert has been created. ChopCult members in your area will be notified.</p><br><p>Please do not refresh this page.</p>
		</section>
<?php

	}

include "footer.php";

?>