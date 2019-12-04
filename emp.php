<?php

            if(isset($_POST["sumbit"]) ){

                     $link= mysqli_connect("localhost", "root","","railway");
            
                    if (mysqli_connect_error()) {
                
                         die ("there was an error connecting to database");
                
                     }

            
                
                    
                    $query = "SELECT * FROM `employee` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
                    
                    $result = mysqli_query($link, $query);
                    
                    
                    if (mysqli_num_rows($result) > 0) {
                        
                        echo "<p>That email address has already been taken.</p>";
                        header("refresh:1;url=emp.html");
                        
                    } else {
                         $eid=mysqli_real_escape_string($link, $_POST['e_id']);
                         $ename=mysqli_real_escape_string($link, $_POST['name']);
                         $email=mysqli_real_escape_string($link, $_POST['email']);
                         $ephone=mysqli_real_escape_string($link, $_POST['phone']);
                         $ejob=mysqli_real_escape_string($link, $_POST['job']);
                         $esalary=mysqli_real_escape_string($link, $_POST['salary']);
                         $egender=mysqli_real_escape_string($link, $_POST['gender']);
                         $eage=mysqli_real_escape_string($link, $_POST['age']);
                         $epass=mysqli_real_escape_string($link, $_POST['password']);
                       // $query1 = "INSERT into employee(`eid`,`ename`, `email`,`phone_no`,`job`,`salary`,`gender`,`age`,`password`)  values('".mysqli_real_escape_string($link, $_POST['e_id'])."','".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['phone'])."','".mysqli_real_escape_string($link, $_POST['job'])."','".mysqli_real_escape_string($link, $_POST['salary'])."','".mysqli_real_escape_string($link, $_POST['gender'])."','".mysqli_real_escape_string($link, $_POST['age'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
                        $query1="call emp_sign($eid,'$ename','$email',$ephone,'$ejob',$esalary,'$egender','$eage','$epass')";
                        
                        if (mysqli_query($link, $query1)) {
                            
                            echo "<p>You have been  successfully signed up!";
        				    header("refresh:1;url=adminAcc1.html");
                            
                        } else {
                            
                            echo "<p>There was a problem signing you up - please try again later.</p>";
                            header("refresh:1;url=emp.html");
                            
                        }
                        
                    }
        }
                
            
?>



		