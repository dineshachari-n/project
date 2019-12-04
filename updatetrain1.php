<?php
    error_reporting('ALL');
?>
<html>
    <head>
        <title>Update Train Details</title>
        <style>
                        body {
                    margin:0;
                    padding:0;
                }
                .div1{
                    width: 500px;
                    height: 580px;
                    border-style: double;
                    border-color: solid black;
                    border-width: 4px;
                    border-radius: 10px;
                    box-sizing: border-box;
                    color:olive;
                    text-align: center;
                    position: absolute;
                    left: 10%;
                    top: 10%;
                }
            
                 button{
                    background-color: grey;
                    color: white;
                }
                h1{
                    text-align: center;
                }
                button{
                    height: 30px;
                    width: 80%;
                }

                td,th{
                    padding:10px;
                }
                td,th{
                    text-align: left;
                }
                 button:hover{
                    color: white;
                    background-color: black;
                    
                }
                #check{
                    background-color: grey;
                    width: 30%;
                    height: 20%;
                    position: relative;
                    left: 60%;
                    top: 20%;
                    padding: 10px;
                    border-radius: 100%;
                }
                #btn{
                    width: 150px;
                    color: white;
                    background-color: green;
                    border: none;
                    border-radius: 10%;
                }
                #input{
                    width: 200px;
                    border: none;
                    padding: 10px;
                    margin-top: 10px;
                    margin-bottom: 10px;

                }
                #btn:hover{
                    background-color: black;
                }
        </style>
        <script type="text/javascript">
    function redirect(){
    alert("redirecting to admin page");
    window.location="adminAcc1.html";
}
</script>
    
    </head>
    <body>
        <div id=check>
            <center>
            <form method="post">
                        <label>CHECK BY TRAIN-ID</label><br>
                        
                                <?php
                            
                                    $link= mysqli_connect("localhost", "root","","railway");
                                    
                                    if (mysqli_connect_error()) {
                                        die ("there was an error connecting to database");
                
                                    }
                                    
                                    $query="SELECT * from train1";
                                    if($result=mysqli_query($link,$query)){
                                        $count=mysqli_num_rows($result);
                                        

                                ?>
                        <select id="input"   name="id" required>
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

                        </select><br>
                        <button id="btn" type="submit" name="submit">submit</button>
            </form>
            </center>
        </div>
        
        <div class="div1">
        <h1 id="h1">update Train Details </h1>
        <?php
            if (array_key_exists('submit', $_POST)) {
                $link= mysqli_connect("localhost", "root","","railway");
        
                if (mysqli_connect_error()) {
                    die ("there was an error connecting to database");
            
                }
                $query="SELECT * from train1 where train_id='".mysqli_real_escape_string($link, $_POST['id'])."'";
                if($result=mysqli_query($link,$query)){
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['utid']=$row['train_id'];
                    $_SESSION['utname']=$row['train_name'];
                    $_SESSION['utsrc']=$row['source'];
                    $_SESSION['utdst']=$row['destination'];
                    $_SESSION['utarrival']=$row['arraival_time'];
                    $_SESSION['utdeparture']=$row['departure_time'];
                    $_SESSION['utcost']=$row['fare'];
                    $_SESSION['utcapacity']=$row['capacity'];
                    $_SESSION['uttype']=$row['train_type'];
                }


           // echo $_POST['id'];

        }
        ?>
            
        <form method="post" action="updatetrain.php">
                <center>
                <table >
                     <tr>
                        <th>Train ID</th>
                        <td><?php echo"<input type='number' placeholder='Enter train-id' name='trainid' value='$_SESSION[utid]' readonly required>";?></td>
                     </tr>
            
                     <tr><th> Train Name</th>
                         <td> <?php echo"<input type='text' placeholder='update train-name' name='trainname' value='$_SESSION[utname]'  required>";?></td>
                     </tr>   
                     <tr><th>Source Station</th>
                         <td> <?php echo"<input type='text' placeholder='update source' name='source' value='$_SESSION[utsrc]' required>";?></td>
                     </tr>   
            
                     <tr><th>Destination</th>
                         <td> <?php echo"<input type='text' placeholder='update destination' name='dest' value='$_SESSION[utdst]' required>";?></td>
                    </tr>
                    <tr><th>Arrival Time</th>
                         <td> <?php echo"<input type='time' placeholder='update arrival time' name='atime' value='$_SESSION[utarrival]' required>";?></td>
                    </tr>
                    <tr><th>Departure Time</th>
                         <td> <?php echo"<input type='time' placeholder='update departure time' name='dtime' value='$_SESSION[utdeparture]' required>";?></td>
                    </tr>
            
                    <tr><th>Train Type</th>
                        <td><?php echo"<input type='text' placeholder=' update train type' name='type' value='$_SESSION[uttype]' required>";?></td>
                    </tr>
                   <!-- <tr><th>Available On</th>
                        <td><input type="checkbox"  name="day[]" value="monday">M
                            <input type="checkbox"  name="day[]" value="tuesday">TU 
                            <input type="checkbox"  name="day[]" value="wednesday">W 
                            <input type="checkbox"  name="day[]" value="thursday">TH 
                            <input type="checkbox"  name="day[]" value="friday">F 
                            <input type="checkbox"  name="day[]" value="saturday">SA 
                            <input type="checkbox"  name="day[]" value="sunday">Su
                        </td>
                    </tr>-->

                
                    <tr><th>Cost</th>
                        <td> <?php echo"<input type='number' placeholder='update cost' name='cost' value='$_SESSION[utcost]' required>";?></td>
                    </tr>
                    <tr><th>Capacity</th>
                        <td><?php echo"<input type='number' placeholder='update Capacity' name='capacity' value='$_SESSION[utcapacity]' required>";?></td>
                    </tr>
                    <tr>
                        <td>
                            <button id="i1" name="submit" type="submit" id="submit">save</button>
                        </td>
                        <td>
                            <button id="i2"  id="cancel" onclick="redirect()">cancel</button>
                        </td>
                    </tr>
                </table>
                </center>
        </form>
        </div>  
        </body> 

    </body>
    
</html>