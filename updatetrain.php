
<?php
  


     $link= mysqli_connect("localhost", "root","","railway");
        
        if (mysqli_connect_error()) {
           die ("there was an error connecting to database");
            
        }

      if(isset($_POST["submit"]) )
        {
             
                    $query = "UPDATE train1 SET train_name='".mysqli_real_escape_string($link, $_POST['trainname'])."',source='".mysqli_real_escape_string($link, $_POST['source'])."', destination='".mysqli_real_escape_string($link, $_POST['dest'])."',arraival_time='".mysqli_real_escape_string($link, $_POST['atime'])."',departure_time='".mysqli_real_escape_string($link, $_POST['dtime'])."', capacity='".mysqli_real_escape_string($link, $_POST['capacity'])."', fare='".mysqli_real_escape_string($link, $_POST['cost'])."',train_type='".mysqli_real_escape_string($link, $_POST['type'])."'    WHERE train_id='".mysqli_real_escape_string($link, $_POST['trainid'])."'";
                    
                    if (mysqli_query($link, $query))
                    {   
                       /* if (array_key_exists('day', $_POST)) {
                            $count=count($_POST['day']);
                            for ($i=0; $i <$count; $i++) { 
                                $query1="UPDATE `train_days` SET days='".mysqli_real_escape_string($link, $_POST['day'][$i])."'  WHERE train_id='".mysqli_real_escape_string($link, $_POST['trainid'])."' ";
                                if (mysqli_query($link,$query1)) {
                                    $flag=1;
                                 }else{
                                      $flag=0;
                                 } 
                            }
                            if($flag==1){
                              echo "train details updated successfully!!";
                             header("refresh:1;url=adminAcc1.html");

                            }else{
                              echo "problem in days";
                              header("refresh:1;url=updatetrain.html");
                            }
                        }*/
                        echo "updated successfully";
                        header("refresh:1;url=adminAcc1.html");

                      
                         
                    }
                    else{
                        
                        echo "<p>There was a problem adding train details - please try again later.</p>";
                        header("refresh:1;url=updatetrain1.php");

                        
                    }
                
            
        }else{
          echo "string";
        }
  
?>


		