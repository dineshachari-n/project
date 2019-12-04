
<!DOCTYPE html>
<html>
<head>
	<title>pnr</title>
</head>
<body>
	<style type="text/css">
	table{
		border:3px double black; 
		border-radius: 10px;
	}
		th,td{
			text-align: left;
			width: 180px;
			padding: 6px;
		}
		th{
			background-color: black;
			color: white;
		}
		td{
			color: white;
			background-color: grey;
			font-weight: bold;
		}
		td a{
			text-decoration: none;
			color: black;
			
		}
		#a{
			background-color: green;
		}

	</style>
	<script type="text/javascript">
		function redirect(){
	alert("redirecting to user page");
	window.location="userportal.html";
}
	</script>
	<button onclick="redirect()">BACK TO USER PAGE</button>

<?php
	session_start();
	
		$name=$_SESSION['name'];
		//$pnr=$_SESSION['PNR'];
			$link=mysqli_connect("localhost","root","","railway");
			if(mysqli_connect_error())
			{
				die ("connection failed");
			}
			/*$query= "SELECT * FROM train1 ";
			 if($result = mysqli_query($link, $query)){
			 	$row=mysqli_fetch_assoc($result);
			 }*/	
			 $now=date("Y-m-d");
			/* $query1="SELECT `status` FROM ticket1 where now='$now' ";
			 if($result1 = mysqli_query($link, $query1)){
			 	$row1=mysqli_fetch_assoc($result1);
			 	if($row1['status']=="approved"){*/



					 $query2="SELECT pnr,passenger_name,p_age,p_gender,source,destination,train_type,fare,t_date,pay,status from train1 t,ticket3 ti,user u where ti.train_id=t.train_id and u.name='$name' and ti.u_namer ='$name' and ti.now='$now' ";
					 if($result2 = mysqli_query($link, $query2)){
					 	while($row2=mysqli_fetch_assoc($result2))
					 	{
							 	
							 	echo("<center><h1>BOOKING DETAILS</h1></center>");
							 	echo "<center><table id='table'>";
							 	echo "<tr><th>PNR NUMBER:</th><td>{$row2['pnr']}</td></tr>";
							 	echo "<tr><th>PASSENGER NAME:</th><td>{$row2['passenger_name']}</td></tr>";
							 	echo "<tr><th>PASSENGER AGE:</th><td>{$row2['p_age']}</td></tr>";
							 	echo "<tr><th>PASSENGER GENDER:</th><td>{$row2['p_gender']}</td></tr>";
							 	echo "<tr><th>TRAIN TYPE:</th><td>{$row2['train_type']}</td></tr>";
							 	echo "<tr><th>SOURCE:</th><td>{$row2['source']}</td></tr>";
							 	echo "<tr><th>DESTINATION:</th><td>{$row2['destination']}</td></tr>";
							 	echo "<tr><th>TICKET COST:</th><td>{$row2['fare']}</td></tr>";
							 	echo "<tr><th>TRAIN DATE:</th><td>{$row2['t_date']}</td></tr>";
							 	echo "<tr><th>PAYMENT:</th><td>{$row2['pay']}</td></tr>";
							 	echo "<tr><th>STATUS:</th><td>{$row2['status']}</td></tr>";
							 	echo "<tr><td id='a'><a href='cancel_php.php'>CANCEL BOOKING</a></td></tr>";
							 	echo "</table></center>";
							 	$_SESSION['cancel']=$row2['pnr'];

							 	echo "<hr>";
						}
					 }else
					 {
					 	echo "string";
					 }
				/*}else{
					echo "<script type='text/javascript'>alert('YOUR BOOKING STATUS IS STILL PENDING');</script>";
					header("refresh:1;url=userportal.html");
				}
			}*/



?>

	



</body>
</html>