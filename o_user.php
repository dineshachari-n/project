 <?php
 		session_start();
 		
	       


       if (array_key_exists('user', $_POST) or array_key_exists('password', $_POST)) {	

       		$link = mysqli_connect("localhost", "root", "", "railway");

	        if (mysqli_connect_error()) {
	        
	            die ("There was an error connecting to the database");
	        
	        }

       		$name=mysqli_real_escape_string($link, $_POST['user']);
       		$password=mysqli_real_escape_string($link, $_POST['password']);

       		$query = "SELECT * FROM `user` WHERE name = '$name' and password='$password'";
	            
	        $result = mysqli_query($link, $query);

	        if (mysqli_num_rows($result) == 1) {
	                
	                	echo "you are successfully logged in!";
	                	 $query1= "SELECT * FROM `user` WHERE name = '$name'";
	        $result1 = mysqli_query($link, $query1);
	        $row=mysqli_fetch_assoc($result1);

 		echo($_SESSION['name']=$row['name']);
	                	//echo "<script type='javascript'>window.location=\"home.html\";</script>";
	                	header('location:userportal.html');
	        } else {
	        	echo "<h2>username/password combination incorrect!</h2><br>please try again";
	        	header("Refresh:2;url=sag_prac.html");
	        //	header('Location:sag_iframes.html');

	        }     
	           		

       }

?>