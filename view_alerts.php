<?php include('header.php');

$username = $_SESSION['Username'];
$home = mysql_query("SELECT State FROM users WHERE Username = '".$username."'");

$home = mysql_fetch_row($home);
$home = $home[0]

?>

<nav>
	<ul>
		<li><a href="#">All Alerts</a> |</li>
		<li><a href="#">Local Alerts</a></li>
	</ul>
</nav>
<div style="clear:left;"></div>
<div id="localAlerts">
	
	<?php

		echo "<p>Your state is set to: ".$home."</p><p>To change this, please <a href=\"#\">update your account.</a>";
	?>

	<table class="alerts">
		<th colspan="2">Local Alerts</th>

	<?php

		$result = mysql_query("SELECT * FROM alerts WHERE State ='".$home."'");

		// $fields_num = mysql_num_fields($result);

		while ($row = mysql_fetch_row($result)) {

			echo "<tr><td class=\"label\">Chopcult Username:</td><td>" . $row['1'] . "</td></tr>";
			echo "<tr><td class=\"label\">Name:</td><td>" . $row['2'] . "</td></tr>";
			echo "<tr><td class=\"label\">Phone:</td><td>" . $row['3'] . "</td></tr>";
			echo "<tr><td class=\"label\">City:</td><td>" . $row['4'] . "</td></tr>";
			echo "<tr><td class=\"label\">State:</td><td>" . $row['5'] . "</td></tr>";
			echo "<tr><td class=\"label\">Needs:</td><td>" . $row['8'] . "</td></tr>";
			echo "<tr><td class=\"label\">Email:</td><td>" . $row['9'] . "</td></tr>";

		}

	?>

	</table>

<?php include "footer.php"; ?>