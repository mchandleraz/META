<?php

include "header.php";

if(!empty($_POST['username']) && !empty($_POST['password']))
{
	$username = mysql_real_escape_string($_POST['username']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $city = mysql_real_escape_string($_POST['city']);
    $state = mysql_real_escape_string($_POST['state']);
    $resources = mysql_real_escape_string($_POST['resources']);
    
    $checkusername = mysql_query("SELECT * FROM users WHERE Username = '".$username."'");
     
    if(mysql_num_rows($checkusername) == 1)
    {

?>
     	<section class="wrap">
     		<h1>Error</h1>
        	<p>Sorry, that username is taken. Please go back and try again.</p>
        </section>
<?php
    
    }
    else
    {
     	$registerquery = mysql_query("INSERT INTO users (Username, Password, Name, EmailAddress, Phone, City, State, Resources) VALUES('".$username."', '".$password."', '".$name."', '".$email."', '".$phone."', '".$city."', '".$state."', '".$resources."')");
        if($registerquery)
        {
?>        
        	<section class="wrap">
     			<h1>Success</h1>
	        	<p>Your account was successfully created.</p><p>Please <a href="index.php">click here to login</a>.</p>
	        </section>
<?php 
        }
        else
        {
?>     		
            <section class="wrap">
	     		<h1>Error</h1>
	        	<p>Sorry, your registration failed. Please go back and try again.</p>
	        </section>
<?php        
        }    	
     }
}
else
{
	?>
   
   <section class="wrap"> 
	   <h1>Register</h1>
	    
	   <p>Please enter your details below to register.</p>
	    
		<form method="post" action="register.php" name="registerform" id="registerform">
		<fieldset>
			<input type="text" name="username" id="username" placeholder="username" />
			<input type="password" name="password" id="password" placeholder="password"/>
	        <input type="name" name="name" id="name" placeholder="name" />
	        <input type="email" name="email" id="email" placeholder="email" />
	        <input type="tel" name="phone" id="phone" placeholder="phone" />
	        <input type="text" name="city" id="city" placeholder="city" />
	        <input type="text" name="state" id="state" placeholder="state" />
	        <textarea name="resources" id="resources" placeholder="resources"></textarea>
			<input class="button orange-button" type="submit" name="register" id="register" value="Register" />
		</fieldset>
		</form>
    </section>

   <?php
}
?>

<?php include "footer.php" ?>
