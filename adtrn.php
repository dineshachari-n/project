<?php
  
  session_start();
     $link= mysqli_connect("localhost", "root","","railway");
        
        if (mysqli_connect_error()) {
            
           die ("there was an error connecting to database");
            
        }

      if(isset($_POST["submit"]) )
        {
             
                    $query = "INSERT INTO `train1` (`train_id`, `train_name`,`train_type`,`source`,`destination`,`arraival_time`,`departure_time`,`capacity`,`fare`) VALUES ('".mysqli_real_escape_string($link, $_POST['trainid'])."', '".mysqli_real_escape_string($link, $_POST['trainname'])."','".mysqli_real_escape_string($link, $_POST['type'])."','".mysqli_real_escape_string($link, $_POST['source'])."','".mysqli_real_escape_string($link, $_POST['dest'])."','".mysqli_real_escape_string($link, $_POST['atime'])."','".mysqli_real_escape_string($link, $_POST['dtime'])."','".mysqli_real_escape_string($link, $_POST['capacity'])."','".mysqli_real_escape_string($link, $_POST['cost'])."')";

                    
                    if (mysqli_query($link, $query))
    			         	{   
                        if (array_key_exists('day', $_POST)) {
                            $count=count($_POST['day']);
                            for ($i=0; $i <$count; $i++) { 
                                $query1="INSERT INTO `train_days`(`train_id`,`days`) VALUES('".mysqli_real_escape_string($link, $_POST['trainid'])."', '".mysqli_real_escape_string($link, $_POST['day'][$i])."')";
                                if (mysqli_query($link,$query1)) {
                                    $flag=1;
                                 }else{
                                      $flag=0;
                                 } 
                            }
                            if($flag==1){
                              echo "train details added successfully!!";
                              $_SESSION['adtrainid']=$_POST['trainid'];
                             header("refresh:1;url=adminAcc1.html");

                            }else{
                              echo "problem in days";
                              header("refresh:1;url=adtrn.html");
                            }
                        }
                      
                         
                    }
                    else{
                        
                        echo "<p>There was a problem adding train details - please try again later.</p>";
                        header("refresh:1;url=adtrn.html");

                        
                    }
                
            
        }

      
?>


		