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

		echo "<p><strong>Your state is set to: ".$home."</strong></p><p>To change this, please <a href=\"#\">update your account.</a></p>";
	?>

	<table class="alerts" id="local-alerts">
		<th colspan="2">Local Alerts</th>

	<?php

		$result = mysql_query("SELECT * FROM alerts WHERE State ='".$home."'");

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

	<table class="alerts" id="all-alerts">
		<th colspan="2">All Alerts</th>

	<?php

		$result = mysql_query("SELECT * FROM alerts");

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