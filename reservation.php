<?php
    session_start(); 
 ?>
 <html>
    <head>
        <title>railway reservation form </title>
        <style type="text/css">
            .id1{
                width: 100%;
                height: 25px;
                margin-bottom: 10px;
            }
            .div1{
            width: 380px;
            height: 550px;
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

        #div{
            float: right;
            position: absolute;
            top: 130px;
            left: 650px;
            width: 400px;
            border:2px solid black;
            border-style: double;
            border-radius: 5%;
            display: none;
        }
        #tab{
            float: right;
            position: absolute;
            top: 400px;
            left: 450px;
        }

        th,td{
            text-align: left;
        }

        input:invalid{
            box-shadow: 0 0 5px 1px red;
        }
        input:valid{
            box-shadow: 0 0 5px 1px green;
        }
        .col{
            padding: 5px;
            padding-bottom: 10px;
            background-color: white;
            color: black;

        }
        button{
            color: white;
            background-color: grey;
            border: none;
            width: 100px;
            height: 28px;
        }
        th,td{
            width: 150px;
        }
        th{
            background-color: grey;
            color: white;
        }
        td{
            background-color: pink;

        }
   /* .echo{
        float: right;
            position: absolute;
            top: 330px;
            left: 600px;
    }*/
        .reserve{
            background-color: #FBFBFB ;
        }
        #find{
            width: 200px;
            color: white;
            background-color: black;
            margin-left: 40px;
            margin-top:-10px;
        }

        #back{
            position: relative;left: 170px;top:-55px;
        }

        </style>
        <script type="text/javascript">
  
            function direct(){
                var x=document.getElementById('div');
               

                if (x.style.display==="none") {
                    x.style.display="block";
                }else{
                    x.style.display="none";
                }

                

            }


            function hidetable(){

                
                var z=document.getElementById('tab');

                if (z.style.display==="none" ) {
                    z.style.display="block";
                }else{
                    z.style.display="none";
                }

            }

function redirect(){
    alert("redirecting to user page");
    window.location="userportal.html";
}

        </script>
    </head>
    <body >
        
                    <marquee><h1><pre>Railway Reservation System      Railway Reservation System      Railway Reservation System</pre></h1></marquee>
                    <button id="find" onclick="direct()">find train availability</button>
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
                                <td class="reserve"><select class="id1"  name="gender" required="">
                                                            <option value="male">MALE</option>
                                                            <option value="female">FEMALE</option>
                                                    </select>
                                                        
                                </td>
                            </tr>
                            <tr>
                                <td class="reserve">TRAIN-ID:</td>
                                <td class="reserve"><!--<input class="id1" type="number" name="train_id" required="">-->
                                             <?php
                            
                                                    $link= mysqli_connect("localhost", "root","","railway");
                                                    
                                                    if (mysqli_connect_error()) {
                                                        die ("there was an error connecting to database");
                                
                                                    }
                                                    
                                                    $query="SELECT * from train1";
                                                    if($result=mysqli_query($link,$query)){
                                                        $count=mysqli_num_rows($result);
                                                        

                                            ?>
                                            <select name="train_id" required class="id1">
                                                <option>--</option>
                                                    <?php
                                                        while ($row=mysqli_fetch_assoc($result) and $count>0) {
                                                    ?>
                                                            <option value="<?php echo $row['train_id'];?>"><?php echo $row['train_id'];?></option>
                                                    <?php 
                                                                $count--; 
                                                        } 
                                                    } 
                                                    ?> 
                                            </select>

                            




                                </td>
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
                            </tr>
                            <tr>
                                <td class="reserve">Train Type:</td>
                                <td class="reserve"><input class="id1" type="text" name="type" required="" list="li">
                            <datalist id="li">
                                <option >passenger</option>
                                <option >express</option>
                            </datalist>
                        </td>-->
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
                                <td class="reserve" onclick="redirect()"><button ">cancel</button></td>
                            </tr>   
                        </table>   
                    </div>
                </form>


                <div id="div">

            <form method="post" action="">
                <table >
                    <tr>
                        <th class="col">Source Sattion</th>
                        <td class="col"><input type="text" name="src" required="" pattern="[a-zaA-Z]*"></td>
                    </tr>
                    <tr>
                        <th class="col">Destination Station</th>
                        <td class="col"><input type="text" name="dest" required="" pattern="[a-z-A-Z"></td>
                    </tr>
                    <tr>
                        <th class="col">Train Type</th>
                        <td class="col"><input type="text" name="type" required="" list="li">
                            <datalist id="li">
                                <option >passenger</option>
                                <option >express</option>
                            </datalist>
                        </td>
                    </tr>
                    <tr>
                        <td class="col"><button type="submit">submit</button> </td>
                        
                    </tr>
                </table>
            </form>
            <button onclick="hidetable()" id="back">back</button>
        </div><br><br>

                
<?php  

    if (array_key_exists('src', $_POST) and array_key_exists('dest', $_POST) and array_key_exists('type', $_POST)) {

         $link= mysqli_connect("localhost", "root","","railway");
    
            if (mysqli_connect_error()) {
        
                 die ("there was an error connecting to database");
        
             }

             $query = "SELECT * FROM `train1` WHERE source = '".mysqli_real_escape_string($link, $_POST['src'])."' and destination= '".mysqli_real_escape_string($link, $_POST['dest'])."' and train_type='".mysqli_real_escape_string($link, $_POST['type'])."'";
            
           if($result = mysqli_query($link, $query)){
            echo "<script type='text/javascript'>document.getElementById('div').style.display='block'</script>";
            if(mysqli_num_rows($result)>0 ) {
                echo "<script type='text/javascript'>document.getElementById('div').style.display='block'</script>";
                echo "<div id='tab'><center><table border='1'>";
                echo "<tr><th>TRAIN-ID</th><th>TRAIN-NAME</th><th>FROM</th><th>TO</th><th>TRAIN-TYPE</th><th>FARE</th></tr>";

                while($cost=mysqli_fetch_assoc($result)){
                    echo "<tr><td>{$cost['train_id']}</td><td>{$cost['train_name']}</td><td>{$cost['source']}</td><td>{$cost['destination']}</td><td>{$cost['train_type']}</td><td>{$cost['fare']}</td></tr>";

                }
            }else{
                echo "<script type='text/javascript'>document.getElementById('id').style.display='block'</script>";
                echo "<div id='tab' class='echo'><h2>NO such information available for given details</h2></div>";
            }

            }else{
                echo "some technical fault in finding cost";
            }
    }

?>

    </body>
</html>