<?php
	session_start();
	error_reporting(E_ALL ^ E_NOTICE);

	?>


<!DOCTYPE html>
<html>
<head>
	<title>forgot</title>
</head>
<style type="text/css">
	label{
		width: 300px;
		padding: 10px;
		font-size: 25px;

	}
	input{
		width: 300px;
		padding: 5px;
		margin-bottom: 20px;
		border-style: none;
	}
	button{
		color: white;
		background-color:black;
		width: 150px;
		padding: 5px;
		border-radius: 40%;
		border-style: none;
	}

	button:hover{
		color: white;
		background-color: green;
	}
	form{
		width: 400px;
		height: 250px;
		border:2px double black;
		border-radius: 20%;
		background-color: grey;


	}

</style>
<body>
	<center>
	<form method="post">
	<label>ENTER USERNAME*</label><br>
	<input type="text" name="username" required placeholder="username"><br>
	<label>ENTER REGISTERED*</label><br>
	<input type="email" name="email" placeholder="email"><br>
	<button>submit</button>
	</form>
	</center>
</body>
</html>
<?php
	
	$link = mysqli_connect("localhost", "root", "", "railway");

	            	if (mysqli_connect_error()) {
	        
	                	die ("There was an error connecting to the database");
	        
	           		}

	           		
	           		$query="SELECT * from user where `name`='".mysqli_real_escape_string($link, $_POST['username'])."' and `email`='".mysqli_real_escape_string($link, $_POST['email'])."'";
	           		if($result=mysqli_query($link,$query)){
	           			if(mysqli_num_rows($result)==1){
	           				$row=mysqli_fetch_assoc($result);
	           				$_SESSION['hint_question']=$row['hint_question'];
	           				$_SESSION['fuser'] = $row['name'];
	           				header("location:forgot3.php");

	           				//echo "<br><br><br>";
	           				//echo "<form method='post' action='forgot_password1.php'>";
	           				//echo "<label>your hint question is:</label>";
	           				//echo "<input type='text' name='hint' value='{$row['hint_question']}' readonly><br>";
	           				//require("forgot3.php");
	           				//echo "<label>your hint answer:</label>";
	           				//echo "<input type='text' name='anser'><br>";
	           				//echo "<button type='submit'>submit</button></form>";

	           			}
	           		}else{
	           			echo "string";
	           		}

	?>