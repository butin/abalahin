<html>
    <head>
        <title>Register Now!!</title>
    </head>
    <body>
        <h2>Registration Page</h2>
       
       <tr><form>

           Enter Username: <tr><input type="text" name="username" required="required" /> </tr><br>
           Enter Password: <input type="password" name="password" required="required" /><br/>
           <input type="submit" value="Register"/>
        </form></tr>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$Username = mysql_real_escape_string($_POST['Username']);
	$Password = mysql_real_escape_string($_POST['Password']);
	$bool = true;
	mysql_connect("locohost", "root", "") or die(mysql_error());
	$query = mysql_query("Select * from users");
	while ($row = mysql_fetch_array($query)) 
	{
		$stable_users = $row['Username'];
		if($Username == $table_users)
		{
			$bool = false;
			print '<script>alert("Username is taken!!");</script>';
			print '<script>window.location.assign(registrationfrm.php);</script>';
		}	
	}

	if ($bool)
	{
		mysql_query("INSERT INTO register (Username, Password) VALUES ('$Username', '$Password')");
		print '<script>alert("Registration Completed");</script>';
		print '<script>window.location.assign(registrationfrm.php);</script>';
	}
}
?>