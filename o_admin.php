<?php
$name="admin";
$pass="password";
if($_POST["password"]==$pass)
{	
	if ($_POST["user"]==$name) {
		echo "success";
		header("Refresh:2;url=adminAcc1.html");
	}
}
else{
	echo "<h3>wrong password</h3>";
	echo "<h3>please try again</h3>";
	header("Refresh:1;url=sag_admin_login.html");
}



?>