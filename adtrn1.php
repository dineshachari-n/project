
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
                    left: 35%;
                    top: 5%;
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
                select{
                    width: 170px;
                    height: 25px;
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
        <div class="div1">
        <h1 id="h1">ADD Train Details </h1>
        <form method="post" action="adtrn.php">
                <center>
                <table >
                     <tr>
                        <th>Train ID</th>
                        <td><input type="number" placeholder="Enter train-id" name="trainid" required></td>
                     </tr>
            
                     <tr><th> Train Name</th>
                         <td> <input type="text" placeholder="Enter train-name" name="trainname" required></td>
                     </tr>   
                     <tr><th>Source Station</th>
                         <td> <!--<input type="text" placeholder="Enter source" name="source" required>-->
                             
                                <?php
                            
                                    $link= mysqli_connect("localhost", "root","","railway");
                                    
                                    if (mysqli_connect_error()) {
                                        die ("there was an error connecting to database");
                
                                    }
                                    
                                    $query="SELECT * from station1";
                                    if($result=mysqli_query($link,$query)){
                                        $count=mysqli_num_rows($result);
                                        

                                ?>
                            <select    name="source" required>
                                <option>--</option>
                                <?php
                                        while ($row=mysqli_fetch_assoc($result) and $count>0) {
                                ?>
                                            <option value="<?php echo $row['station_name'];?>"><?php echo $row['station_name'];?></option>
                                <?php 
                                                $count--; 
                                        } 
                                    } 
                                ?> 

                            </select>

                         </td>
                     </tr>   
            
                     <tr><th>Destination</th>
                         <td> <!--<input type="text" placeholder="Enter destination" name="dest" required>-->
                             
                                    <?php
                            
                                    $link= mysqli_connect("localhost", "root","","railway");
                                    
                                    if (mysqli_connect_error()) {
                                        die ("there was an error connecting to database");
                
                                    }
                                    
                                    $query="SELECT * from station1";
                                    if($result=mysqli_query($link,$query)){
                                        $count=mysqli_num_rows($result);
                                        

                                    ?>
                            <select name="dest" required>
                                <option>--</option>
                                    <?php
                                        while ($row=mysqli_fetch_assoc($result) and $count>0) {
                                    ?>
                                            <option value="<?php echo $row['station_name'];?>"><?php echo $row['station_name'];?></option>
                                    <?php 
                                                $count--; 
                                        } 
                                    } 
                                    ?> 
                            </select>

                            

                         </td>
                    </tr>
                    <tr><th>Arrival Time</th>
                         <td> <input type="time" placeholder="Enter arrival time" name="atime" required></td>
                    </tr>
                    <tr><th>Departure Time</th>
                         <td> <input type="time" placeholder="Enter departure time" name="dtime" required></td>
                    </tr>
            
                    <tr><th>Train Type</th>
                        <td><!--<input type="text" placeholder=" Enter train type" name="type" required>-->
                            <select name="type">
                                <option>--</option>
                                <option value="passenger">PASSENGER</option>
                                <option value="express">EXPRESS</option>
                            </select>
                        </td>
                    </tr>
                    <tr><th>Available On</th>
                        <td><input type="checkbox"  name="day[]" value="monday">M
                            <input type="checkbox"  name="day[]" value="tuesday">TU 
                            <input type="checkbox"  name="day[]" value="wednesday">W 
                            <input type="checkbox"  name="day[]" value="thursday">TH 
                            <input type="checkbox"  name="day[]" value="friday">F 
                            <input type="checkbox"  name="day[]" value="saturday">SA 
                            <input type="checkbox"  name="day[]" value="sunday">Su
                        </td>
                    </tr>

                
                    <tr><th>Cost</th>
                        <td> <input type="number" placeholder="Enter cost" name="cost" required></td>
                    </tr>
                    <tr><th>Capacity</th>
                        <td><input type="number" placeholder="Enter Capacity" name="capacity" required></td>
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