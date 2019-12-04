<?php

 $link= mysqli_connect("localhost", "root","","railway");
    
    if (mysqli_connect_error()) {
        
       die ("there was an error connecting to database");
        
    }

    if(isset($_POST["sumbit"]) ){
        
       
            
            $query = "SELECT `id` FROM `employee` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
                echo "<p>That email address has already been taken.</p>";
                
            } else {
                
                $query = "INSERT INTO `employee` (`ename`, `email`,`phone_no`,`job`,`salary`,`gender`,`age`,`password`) VALUES ('".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['phone'])."','".mysqli_real_escape_string($link, $_POST['job'])."','".mysqli_real_escape_string($link, $_POST['salary'])."','".mysqli_real_escape_string($link, $_POST['gender'])."','".mysqli_real_escape_string($link, $_POST['age'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
                    echo "<p>You have been signed up!";
					header("#");
                    
                } else {
                    
                    echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                }
                
            }
        
    }
?>


		<!--$age=mysql_real_escape_string($link,$_POST["age"]);
		$name=mysql_real_escape_string($link,$_POST["name"]);
		$email=mysql_real_escape_string($link,$_POST["email"]);
		$phone=mysql_real_escape_string($link,$_POST["phone"]);
		$job=mysql_real_escape_string($link,$_POST["job"]);
		$salary=mysql_real_escape_string($link,$_POST["salary"]);
		$gender=mysql_real_escape_string($link,$_POST["gender"]);
		$password=mysql_real_escape_string($link,$_POST["password"]);
	-->
		