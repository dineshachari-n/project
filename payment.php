<?php
	session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<title>payment</title>
</head>
<style type="text/css">
	input{
		padding: 5px;
	}
</style>
<body>
	<center><h1>MAKE YOUR PAYMENT HERE....</h1></center>
	<form method="post" action=""> 
	<center><table>
				<!--<tr>	
					<th>Select your card type</th>
					<td>
						<input type="radio" name="card_type" value="CREDIT">CREDIT
						<input type="radio" name="card_type" value="DEBIT">DEBIT
						<select name="card_type"><option name="card_type">CREDIT</option><OPTION name="card_type">DEBIT</OPTION></select>
					</td>
				</tr>-->
				<tr>
					<th>ENTER CREDIT CARD NUMBER</th>
					<td><input type="text" name="card_number"></td>
				</tr>
				<tr>
					<th>Enter CVV</th>
					<td><input type="text" name="cvv"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="PAY"></td>
				</tr>
			</table>
		</center>
		</form>

</body>
</html>

<?php
	
	if( array_key_exists('card_number', $_POST) and array_key_exists('cvv', $_POST)){
			$name=$_SESSION['name'];
			$pnr=$_SESSION['PNR'];
			//$card_type=$_POST['card_type'];
			$card_number=$_POST['card_number'];
			$cvv=$_POST['cvv'];
					$link=mysqli_connect("localhost","root","","railway");
					if(mysqli_connect_error())
					{
						die ("connection failed");
					}
					$query="INSERT into payment1 (u_namer,pnr_number,card_number,cvv) values('$name','$pnr',$card_number,$cvv) ";
					if($result=mysqli_query($link,$query)){
						
						echo "<h2>PAYMENT SUCCESSFULLY MADE</h2>";
						echo "<h2>GO to user portal to get the ticket</h2>";
						$query1="SELECT * FROM ticket3 where pnr='$pnr' ";
						if($result1=mysqli_query($link,$query1)){
							$row=mysqli_fetch_assoc($result1);
							$_SESSION['PAY']=$row['pay'];
						}
						header("refresh:2;url=userportal.html");

					}

				}
?>