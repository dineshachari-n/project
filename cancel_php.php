<?php

		session_start();
		     $link= mysqli_connect("localhost", "root","","railway");
		        
		        if (mysqli_connect_error()) {
		            
		           die ("there was an error connecting to database");
		            
		        }
		        $pnr=$_SESSION['cancel'];
		        $query=" SELECT * from ticket3 where pnr='$pnr'";
		        if($result=mysqli_query($link,$query)){
		        	$row=mysqli_fetch_assoc($result);
		        	 $status=$row['pay'];
		        	$paid="Paid";
		        
				        $drop_query=" DELETE from ticket3 where pnr='$pnr'";
				        if($result=mysqli_query($link,$drop_query)){
				        	if($status==$paid){
				        		echo "<h1>Booking successfully cancelled<h1>";
				        		echo "<h2>Your money will be refunded</h2>";
				        		header("refresh:3;url=userportal.html");
				        	}else{
				        		echo "<h1>Booking successfully cancelled<h1>";
				        		header("refresh:3;url=userportal.html");
				        	}
				        }
		        }





?>