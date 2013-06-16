<?php include "header.php"; ?>

<?php
// Next few lines are for populating 'state' field in registration form.
// TODO move to registration form. remove from alert page.
$query = "SELECT * FROM locations";

$result = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_assoc($result)) {
    $state = $row['state'];
    $options .="<option value=\"$state\">" . $state . "</option>";
}

if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) { ?>
    <section class="wrap">
        <h1>Travel Assistance</h1>

        <form method="post" action="create.php" name="alertform" id="alertform">
            <fieldset>
                <input type="text" name="username" id="username" placeholder="username" />
                <input type="text" name="name" id="name" placeholder="name" />
                <input type="text" name="email" id="email" placeholder="email" />
                <select name="state"><?php echo $options ?></select>
                <input type="text" name="phone" id="phone" placeholder="phone number" />
                <input type="text" name="needs" id="needs" placeholder="what do you need?" />
                <input type="button" class="button orange-button" id="getGeo" value="Get Location">
                <input type="hidden" name="lon" id="lon"><input type="hidden" name="lat" id="lat">
                <input class="button orange-button" type="submit" name="create_alert" id="create_alert" value="Create Alert" />
            </fieldset>
        </form>
    </section>

<?php
}
else
{
?>

   <h1>Travel Assistance</h1>
    
   <p>Please either login below, or <a href="register.php">click here to register</a>.</p>
    
    <form method="post" action="index.php" name="loginform" id="loginform">
    <fieldset>
        <input type="text" name="username" id="username" placeholder="username" />
        <input type="password" name="password" id="password" placeholder="password" />
        <input type="submit" name="login" id="login" value="Login" />
    </fieldset>
    </form>
    
   <?php
};

include "footer.php";

?>