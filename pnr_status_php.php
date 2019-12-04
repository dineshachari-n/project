<?php
            session_start();
            if(array_key_exists('status', $_POST)  ){

                     $link= mysqli_connect("localhost", "root","","railway");
            
                    if (mysqli_connect_error()) {
                
                         die ("there was an error connecting to database");
                
                     }

                     ($pnr=$_SESSION['PNR']);
                    $query=" UPDATE `ticket3` set `status`='".mysqli_real_escape_string($link, $_POST['status'])."' WHERE `pnr`='$pnr'  ";
                                 $result= mysqli_query($link,$query);
                                if ($result) {
                        
                                    echo "<h2>BOOKING updated successfully</h2>";
                                   header("refresh:2;url=adminAcc1.html");
                                }else{
                                    echo "<h2>something went wrong try again</h2>";
                                    header("refresh:1;url=adminAcc1.html");
                             }  
             }else{
                echo "string";
            }

        ?>
