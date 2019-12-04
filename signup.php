

  <?php

  		//$name=mysqli_real_escape_string($link, $_POST['uname']);
  
       if (array_key_exists('uname', $_POST) or array_key_exists('phone', $_POST) or array_key_exists('email', $_POST) or array_key_exists('answer', $_POST) or array_key_exists('password', $_POST) or array_key_exists('psw-repeat', $_POST)) {

       		if($_POST["psw"]==$_POST["psw-repeat"]){
        
	        		$link = mysqli_connect("localhost", "root", "", "railway");

	            	if (mysqli_connect_error()) {
	        
	                	die ("There was an error connecting to the database");
	        
	           		} 

	           		$uname=mysqli_real_escape_string($link, $_POST['uname']);

					  $uphone=mysqli_real_escape_string($link, $_POST['phone']);
					  $uemail=mysqli_real_escape_string($link, $_POST['email']);
					  $uhint=mysqli_real_escape_string($link, $_POST['answer']);
					  $uanswer=mysqli_real_escape_string($link,$_POST['hint']);
					  $upassword=mysqli_real_escape_string($link, $_POST['psw']);


	        		$query = "SELECT * FROM `user` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
	        		//$query1 = "SELECT * FROM `user` WHERE phonenumber = '".mysqli_real_escape_string($link, $_POST['phone'])."'";
	        		///$query2 = "SELECT * FROM `user` WHERE hint = '".mysqli_real_escape_string($link, $_POST['answer'])."'";
	        		//$query3 = "SELECT * FROM `user` WHERE password = '".mysqli_real_escape_string($link, $_POST['psw'])."'";
	            
	            	$result = mysqli_query($link, $query);
	            	//$result1 = mysqli_query($link, $query1);
	            	//$result2 = mysqli_query($link, $query2);
	            	//$result3 = mysqli_query($link, $query3);
	            
	            	if (mysqli_num_rows($result) > 0) {
	                
	                	echo "<p>That email address has already been taken.</p>";
	                	echo "please try again";
	                	header("Refresh:3;url=signup1.html");  

	                
	           		}/*elseif (mysqli_num_rows($query1)>0) {
	           			echo "<p>phone number has already been taken</p>";
	           			echo "please try again";
	           			header("Refresh:2;url=signup1.html");
	           		}elseif (mysqli_num_rows($query2)>0) {
	           			echo "<p>hint has already been taken</p>";
	           			echo "please try again";
	           			header("Refresh:2;url=signup1.html");
	           		}elseif (mysqli_num_rows($query3)>0) {
	           			echo "<p>password has already been taken</p>";
	           			echo "please try again";
	           			header("Refresh:2;url=signup1.html");
	           		}*/

	           		 else {
	                
	                	$query = "call sign('$uname',$uphone,'$uemail','$uhint','$uanswer','$upassword') ";
	                
	                		if (mysqli_query($link, $query)) {
	                    
	                    		echo (" your account has been created successfully!");
	                    		echo "redirecting to login page.";
					 			header("Refresh:1; url=home.html");  

	                    
	               			} else {
	                    
	                    		echo "<p>There was a problem in signing you up - please try again later.</p>";
	                    		header("Refresh:2;url=signup1.html");  
	                    	}
	                
	            	}
            }else {
            	echo "<h1>your password did not match!</h1> <br> please try again";
            	header("Refresh:2;url=signup1.html");
            }
       
        
        
   		}

    


?>
             
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
