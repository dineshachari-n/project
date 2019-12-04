<?php
  
      session_start();
     $link= mysqli_connect("localhost", "root","","railway");
        
        if (mysqli_connect_error()) {
            
           die ("there was an error connecting to database");
            
        }

      /*if(array_key_exists('submit', $_POST) )
        {
          */

                    /*$query2= "SELECT * FROM `train1` WHERE train_id ='".mysqli_real_escape_string($link, $_POST['train_id'])."' ";
                        if($result2 = mysqli_query($link, $query2)){
                            $row1=mysqli_fetch_assoc($result2);
                            $_SESSION['cost']=$row1['fare'];
                            $_SESSION['type']=$row1['train_type'];
                            $_SESSION['source']=$row1['destination'];
                            $_SESSION['destination']=$row1['train_type'];
                        }*/

                    $fname=substr($_POST['pname'],0,2);
                    $u=substr($_POST['uname'],0,2);
                    $num=rand(100,999);
                    $pnrs=$fname.$u.$num;
                    $status="pending";
                    $time=date("Y-m-d");



                    $query = "INSERT INTO `ticket3`(`pnr`, `u_namer`, `passenger_name`, `p_age`, `p_gender`, `train_id`, `t_date`,`status`,`now`) VALUES ('".mysqli_real_escape_string($link, $pnrs)."','".mysqli_real_escape_string($link, $_POST['uname'])."','".mysqli_real_escape_string($link, $_POST['pname'])."','".mysqli_real_escape_string($link, $_POST['age'])."','".mysqli_real_escape_string($link, $_POST['gender'])."','".mysqli_real_escape_string($link,$_POST['train_id'])."','".mysqli_real_escape_string($link, $_POST['date'])."','".mysqli_real_escape_string($link, $status)."','$time')";

                    
                    if (mysqli_query($link, $query)) {



                        $query1= "SELECT * FROM `ticket3` WHERE pnr = '$pnrs'";
                        $result1 = mysqli_query($link, $query1);
                        $row=mysqli_fetch_assoc($result1);

                            $_SESSION['PNR']=$row['pnr'];
                            $_SESSION['Pname']=$row['passenger_name'];
                            $_SESSION['Page']=$row['p_age'];
                            $_SESSION['Pgender']=$row['p_gender'];
                            /*$_SESSION['Tsrc']=$row['t_from'];
                            $_SESSION['Tdest']=$row['t_to'];*/
                            $_SESSION['Ttrain_id']=$row['train_id'];
                            $_SESSION['Tdate']=$row['t_date'];
                            $_SESSION['PAY']=$row['pay'];
                            
                            echo "<h2>your booking information recieved make payment to confirm your booking......</h2>";
                            echo "<script type='text/javascript'>alert('your PNR number is: $pnrs');</script>";
                            header("refresh:2;url=userportal.html");
                            
                        } else {
                            
                            echo "<p>There was a problem in booking - please try again later.</p>";
                            header("refresh:1;url=reservation.php");
                            
                        }
                
            
        /*}else{
          echo "string";
        }*/

      
?>


		