<?php


     $link= mysqli_connect("localhost", "root","","railway");
        
        if (mysqli_connect_error()) {
            
           die ("there was an error connecting to database");
            
        }

      if(isset($_POST["submit"]) )
        {           
                    $query = "SELECT * FROM `station1` WHERE station_id = '".mysqli_real_escape_string($link, $_POST['st-id'])."'";
                    $result = mysqli_query($link, $query);
                    $query1 = "SELECT * FROM `station1` WHERE station_name = '".mysqli_real_escape_string($link, $_POST['st-name'])."'";
                    $result1 = mysqli_query($link, $query1);
                    if(mysqli_num_rows($result) > 0) {
                      echo "<p>That station-id has already been taken.</p>";
                        echo "please try again";
                        header("Refresh:3;url=adstation.html");
                    }elseif (mysqli_num_rows($result1) > 0) {
                      echo "<p>That station-name has already been taken.</p>";
                        echo "please try again";
                        header("Refresh:3;url=adstation.html");
                    }else{
             
                    $query = "INSERT INTO `station1` (`station_id`,`station_name`) VALUES ('".mysqli_real_escape_string($link, $_POST['st-id'])."', '".mysqli_real_escape_string($link, $_POST['st-name'])."')";
                    
                    if (mysqli_query($link, $query))
    				          { 
                        echo "station details added successfully!!";
    					         header("refresh:1;url=adminAcc1.html");
                     }
                     else{
                        
                        echo "<p>There was a problem adding station details - please try again later.</p>";
                        header("refresh:1;url=adstation.html");

                        
                    }
                  }
                    
                
            
        }
      
?>

