<?php include("header.php"); ?>

		<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
	 ?>

	<section class="wrap">
		<h1>Dashboard</h1>
	    <a href="create_alert.php"><input type="button" class="button green-button" value="Create an Alert"></a>
	    <a href="#"><input type="button" class="button blue-button" value="View Alerts"></a>

	    <a href="logout.php"><input type="button" class="button red-button" value="Log Out"></a>
	</section>
    
    <?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    
	$checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
    
    if(mysql_num_rows($checklogin) == 1)
    {
    	$row = mysql_fetch_array($checklogin);
        $email = $row['EmailAddress'];
        
        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
    ?>
    <section class="wrap"><h1>Dashboard</h1>
        <a href="create_alert.php"><input type="button" class="button green-button" value="Create an Alert"></a>
        <a href="view_alerts.php"><input type="button" class="button blue-button" value="View Alerts"></a>
        <a href="logout.php"><input type="button" class="button red-button" value="Log Out"></a>
    </section>

    <?php } else { ?>
    
    <h1>Error</h1>
    <p>Sorry, your account could not be found. Please <a href="index.php">click here</a> to try again or register.</p>

    <?php }
    } else { ?>
    
	<section class="wrap">
	   <p>Please either login below, or <a href="register.php">register</a>.</p>
	    
		<form method="post" action="index.php" name="loginform" id="loginform">
			<fieldset>
				<input type="text" name="username" id="username" placeholder="username" />
				<input type="password" name="password" id="password" placeholder="password" />
				<input class="button orange-button" type="submit" name="login" id="login" value="Log In" />
			</fieldset>
		</form>
    </section>


<?php } ?>

<?php include "footer.php"; ?>