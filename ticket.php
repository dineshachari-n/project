<?php
	session_start();
	?>

<!DOCTYPE html>
<html>
<head>
	<title>ticket</title>
</head>
<style type="text/css">
            .id1{
                width: 100%;
                height: 25px;
                margin-bottom: 10px;
            }
            .div1{
            width: 450px;
            height: 680px;
            border-style: double;
            border-color: solid black;
             border-width: 4px;
            border-radius: 10px;
            margin-top: 20px;
            margin-left: 10px;
            padding: 15px;
            box-sizing: border-box;
            background-color: #FBFBFB;
        }
       body{
            margin: 0;
            padding: 0;
        }
        .reserve{
            background-color: #FBFBFB ;
        }
</style>

<body>


	<marquee><h1><pre>Railway Reservation System      Railway Reservation System      Railway Reservation System</pre></h1></marquee>
                    <!--<button id="find" onclick="direct()">find train availability</button>-->
                    <form name="railway" method="post" action="reservation_table.php">
                    <div class="div1">
                        <h1>Book your Ticket</h1>
                        <table>
                            <tr>
                                <td class="reserve">User Name:</td>
                                <td class="reserve"><?php
                                           if($_SESSION['name'])
                                                echo "<input class='id1' type='text' name='uname' required value='".$_SESSION["name"]."' readonly>";
                                            ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">PASSENGER Name:</td>
                                <td class="reserve"><input class="id1" type="text" name="pname" required="" pattern="[a-zaA-Z]*"s></td>
                            </tr>
                            <tr>
                                <td class="reserve">AGE:</td>
                                <td class="reserve"><input class="id1" type="text" name="age" required="" pattern="[0-9]*"></td>
                            </tr>
                            <tr>
                                <td class="reserve">GENDER:</td>
                                <td class="reserve"><input class="id1" type="text" name="gender" list="gen" required="">
                                                        <datalist id="gen">
                                                            <option>male</option>
                                                            <option>female</option>
                                                        </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">TRAIN-ID:</td>
                                <td class="reserve"><input class="id1" type="text" name="train-id" required="" pattern="[a-zaA-Z0-9]*"></td>
                            </tr>

                            <!--<tr>
                                <td class="reserve">From:</td>
                                <td class="reserve"><input class="id1" type="text" name="src" list="opt" required="">
                                        
                                    <datalist id="opt">
                                        <option value="Bengaluru">Bengaluru</option>
                                        <option value="Manglore">Manglore</option>
                                        <option value="Hyderabad">Hyderabad</option>
                                        <option value="Chennai">Chennai</option>
                                        <option value="Kochi">Kochi</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="patna">patna</option>
                                    </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">To:</td>
                                <td class="reserve"><input class="id1" type="text" name="dest" list="opt1" required="">
                                     <datalist id="opt1">    
                                         <option value="Bengaluru">Bengaluru</option>
                                         <option value="Manglore">Manglore</option>
                                         <option value="Hyderabad">Hyderabad</option>
                                         <option value="Chennai">Chennai</option>
                                         <option value="Kochi">Kochi</option>
                                         <option value="Mumbai">Mumbai</option>
                                         <option value="Pune">Pune</option>
                                         <option value="Goa">Goa</option>
                                         <option value="Delhi">Delhi</option>
                                    </datalist>
                                </td>
                            </tr>-->
                            <?php

                            	
                            		$link= mysqli_connect("localhost", "root","","railway");
    
            						if (mysqli_connect_error()) {
        
                 					die ("there was an error connecting to database");
        
             						}

             						$query = "SELECT * FROM `train1` WHERE train_id='".mysqli_real_escape_string($link, $_POST['train_id'])."'";

             						if($result=mysqli_query($link,$query)){
             							$row=mysqli_fetch_assoc($result);
             							$_SESSION['cost']=$row['fare'];
             							$_SESSION['type']=$row['train_type'];
             						}


                        

                            ?>
                            <tr>
                                <td class="reserve">Train Type:</td>
                                <td class="reserve"><?php
                                           if($_SESSION['type'])
                                                echo "<input class='id1' type='text' name='type' required value='".$_SESSION["type"]."' readonly>";
                                            ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">Ticket cost:</td>
                                <td class="reserve"><?php
                                           if($_SESSION['cost'])
                                                echo "<input class='id1' type='text' name='type' required value='".$_SESSION["cost"]."' readonly>";
                                            ?>

                                </td>
                            </tr> 
                            <tr>
                                <td class="reserve">Date:</td>
                                <td class="reserve"><input class="id1" type="Date" name="date" required=""></td>
                            </tr> 
                            <!--<tr>
                                <td class="reserve">Payment options:</td>
                                <td class="reserve"> 
                                    <input  type="radio" name="payment" value="cc" required="">Credit Card <br />
                                    <input type="radio" name="payment" value="dc" required="">Debit card <br /> 
                                    input type="radio" name="payment" value="wallet">wallet<br/>
                                </td>
                            </tr>-->
          
                            <tr>
                                <td class="reserve"><button  type="submit">submit</button></td>
                                <td class="reserve"><button>cancel</button></td>
                            </tr>   
                        </table>   
                    </div>
                </form>



</body>
</html>