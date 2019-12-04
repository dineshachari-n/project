<?php

	
	
	if(isset($_POST["login"]))
	{
		$link= mysqli_connect("localhost","root","","railway");
		if(mysqli_connect_error())
		{
			die("connection failed");
		}	
		
		
		$query= "SELECT `eid` FROM `employee` WHERE email = '".mysqli_real_escape_string($link, $_POST['mail'])."' and password='".mysqli_real_escape_string($link,$_POST["password"])."'";
			
			$result= mysqli_query($link,$query);

		if(mysqli_num_rows($result)>0)
		{
			echo "sucessfully loged in!!";
			header("refresh:2;url=eportal.html");
		}
		else
		{
			echo "there was a problem logging you in try after sometime";
			header("refresh:2;url=emp_login.html");

		}

	}
?>
