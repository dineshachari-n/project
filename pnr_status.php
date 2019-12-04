<?php
    session_start(); 
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>pnr status</title>
</head>
<style type="text/css">
    .reserve{
            background-color: #FBFBFB ;
        }
    .id1{
                width: 100%;
                height: 25px;
                margin-bottom: 10px;
            }
            .div1{
            width: 380px;
            height: 600px;
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
        table{
            text-align: left;
        }
        input:invalid{
            box-shadow: 0 0 5px 1px red;
        }
        input:valid{
            box-shadow: 0 0 5px 1px green;
        }
        button{
            color: white;
            background-color: grey;
            border: none;
            width: 100px;
            height: 28px;
        }
</style>
<script type="text/javascript">
  
function redirect(){
  alert("redirecting to admin portal");
  window.location="adminAcc1.html";
}


</script>

<body>
<form name="railway" method="post" action="pnr_status_php.php">
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
                                <td class="reserve"><?php
                                            if($_SESSION['Pname'])
                                                echo "<input class='id1' type='text' name='pname' required value='".$_SESSION["Pname"]."' readonly>";
                                            ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">AGE:</td>
                                <td class="reserve"><?php
                                            if($_SESSION['Page'])
                                                echo "<input class='id1' type='text' name='age' required value='".$_SESSION["Page"]."' readonly>";
                                            ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">GENDER:</td>
                                <td class="reserve"><?php
                                            if($_SESSION['Pname'])
                                                echo "<input class='id1' type='text' name='gender' list='gen' required value='".$_SESSION["Pgender"]."' readonly>";
                                            ?>
                                                        <datalist id="gen">
                                                            <option>male</option>
                                                            <option>female</option>
                                                        </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">TRAIN-ID:</td>
                                <td class="reserve"><?php
                                            if($_SESSION['Ttrain_id'])
                                                echo "<input class='id1' type='number' name='train_id' required value='".$_SESSION["Ttrain_id"]."' readonly>";
                                            ?>
                                </td>
                            </tr>
                            <!--<tr>
                                <td class="reserve">From:</td>
                                <td class="reserve"><?php
                                           // if($_SESSION['Tsrc'])
                                               // echo "<input class='id1' type='text' name='src' list='opt' required value='".$_SESSION["Tsrc"]."' readonly>";
                                            ?>
                                        
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
                                <td class="reserve"><?php
                                            //if($_SESSION['Tdest'])
                                             //   echo "<input class='id1' type='text' name='dest' required value='".$_SESSION["Tdest"]."' readonly>";
                                            ?>
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
                            </tr>
                            <tr>
                                <td class="reserve">Train Type:</td>
                                <td class="reserve"><?php
                                           // if($_SESSION['Ttype'])
                                               // echo "<input class='id1' type='text' name='type' list='li' required value='".$_SESSION["Ttype"]."' readonly>";
                                            ?>
                                    <datalist id="li">
                                        <option >passenger</option>
                                        <option >express</option>
                                    </datalist>
                                </td>
                            </tr> -->
                            <tr>
                                <td class="reserve">Date:</td>
                                <td class="reserve"><?php
                                            if($_SESSION['Tdate'])
                                                echo "<input class='id1' type='date' name='date' required value='".$_SESSION["Tdate"]."' readonly>";
                                            ?>
                                </td>
                            </tr> 

                            <tr>
                                <td class="reserve">payment:</td>
                                <td class="reserve"><?php
                                            if($_SESSION['PAY'])
                                                echo "<input class='id1' type='text' name='pay' required value='".$_SESSION["PAY"]."' readonly>";
                                            ?>
                                </td>
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
                                <td class="reserve">STATUS:</td>
                                <td class="reserve"><select class="id1"  name="status" required="">
                                                        <option value="pending">PENDING</option>
                                                        <option value="approved">APPROVED</option>

                                                    </select>
                                </td>
                            </tr>
          
                            <tr>
                                <td ><button  type="submit" name="submit">submit</button></td>
                                <td > <button onclick="redirect()">cancel</button></td>
                            </tr>   
                        </table>   
                    </div>
                </form>

                
    

        
</body>
</html>
