<!DOCTYPE html>
<html>
<head>
	<title>Time Table</title>
	<style type="text/css">
	table{
			border-collapse: collapse;
			width: 100%;
			color: blue;
			font-family: monospace;
			font-size: 20px;
			text-align: left;
		}
		th
		{
			background-color: green;
			color: white;

		}
		tr:nth-child(even)
		{
			background-color: #f2f2f2;
			width: 100%;
		}
	</style>

</head>
<body>
	
		
		<?php
			$link=mysqli_connect("localhost","root","","railway");
			if(mysqli_connect_error())
			{
				die ("connection failed");
			}
			$query= "call time_table()";
			 $result = mysqli_query($link, $query);	

			 if(@mysqli_num_rows($result)>0)
			 {
			 	echo "<center><table border='1'>";
			 	echo "<tr><th>TRAIN-ID</th><th>TRAIN-NAME</th><th>FROM</th><th>TO</th><th>TRAIN-TYPE</th><th>CAPACITY</th><th>FARE</th></tr>";

			 	while($row=mysqli_fetch_assoc($result))
			 	{
			 		echo "<tr><td>".$row["train_id"]."</td><td>   ".$row["train_name"]."</td><td>".$row["train_type"]."</td><td>".$row["source"]."</td><td>".$row["destination"]."</td><td>".$row["capacity"]."</td><td>".$row["fare"]."</td></tr>";
			 	}
			 	echo "</table>";
			 }
			 else
			 {
			 	echo "no data found";
			 }


		?>
</body>
</html>