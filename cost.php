<!DOCTYPE html>
<html>
<head>
	<title>cost</title>
</head>

<script type="text/javascript">
  
function redirect(){
  alert("redirecting to home page");
  window.location="home.html";
}
</script>
<style type="text/css">
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
	.div{
		width: 400px;
		border:2px solid black;
		border-style: double;
		border-radius: 5%;
	}
	button,input[type=submit]{
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
	select{
            width: 170px;
            height: 25px;
          }


</style>

<body>

		<div class="div">
			<form method="post" action="cost.php">
				<table class="table">
					<tr>
						<th class="col">Source Sattion</th>
						<td class="col"><!--<input type="text" name="src" required="" pattern="[a-zaA-Z]*">-->
								 <?php
                            
                                    $link= mysqli_connect("localhost", "root","","railway");
                                    
                                    if (mysqli_connect_error()) {
                                        die ("there was an error connecting to database");
                
                                    }
                                    
                                    $query="SELECT * from station1";
                                    if($result=mysqli_query($link,$query)){
                                        $count=mysqli_num_rows($result);
                                        

                                    ?>
                            <select name="src" required>
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
					<tr>
						<th class="col">Destination Station</th>
						<td class="col"><!--<input type="text" name="dest" required="" pattern="[a-z-A-Z">-->
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
					<tr>
						<th class="col">Train Type</th>
						<td class="col"><!--input type="text" name="type" required="" list="li">-->
							<select name="type">
								<option>--</option>
								<option value="passenger">passenger</option>
								<option value="express">express</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="col"><input type="submit" name="submit"> </td>
						<td class="col"><button onclick="redirect()">cancel</button></td>
					</tr>
				</table>
			</form>
		</div><br><br>


			</body>
</html>






<?php  

	if (array_key_exists('src', $_POST) and array_key_exists('dest', $_POST) and array_key_exists('type', $_POST)) {

		 $link= mysqli_connect("localhost", "root","","railway");
    
            if (mysqli_connect_error()) {
        
                 die ("there was an error connecting to database");
        
             }

           	 $query = "SELECT * FROM `train1` WHERE source = '".mysqli_real_escape_string($link, $_POST['src'])."' and destination= '".mysqli_real_escape_string($link, $_POST['dest'])."' and train_type='".mysqli_real_escape_string($link, $_POST['type'])."'";
            
           if($result = mysqli_query($link, $query)){
           	if(mysqli_num_rows($result)>0 ) {
           		echo "<center><table border='1'>";
           		echo "<tr><th>TRAIN-ID</th><th>TRAIN-NAME</th><th>FROM</th><th>TO</th><th>TRAIN-TYPE</th><th>FARE</th></tr>";

            	while($cost=mysqli_fetch_assoc($result)){
            		echo "<tr><td>{$cost['train_id']}</td><td>{$cost['train_name']}</td><td>{$cost['source']}</td><td>{$cost['destination']}</td><td>{$cost['train_type']}</td><td>{$cost['fare']}</td></tr>";

            	}
            }else{
            	echo "<center><h2>NO such information available for given details</h2></center>";
            }

	        }else{
	        	echo "some technical fault in finding cost";
	        }
	}

?>