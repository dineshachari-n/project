                            
                             

<?php
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);

    ?>

        <style type="text/css">
            
        label{
        width: 300px;
        padding: 10px;
        font-size: 25px;

    }
    input{
        width: 300px;
        padding: 5px;
        margin-bottom: 20px;
        border-style: none;
    }
    button{
        color: white;
        background-color:black;
        width: 150px;
        padding: 5px;
        border-radius: 40%;
        border-style: none;
    }

    button:hover{
        color: white;
        background-color: green;
    }
    form{
        width: 450px;
        height: 300px;
        border:2px double black;
        border-radius: 20%;
        background-color: grey;


    }

        </style>
                            <center> <form method="post">                               
                               <label>YOUR HINT QUESTION IS:</label>
                               <?php
                                            if($_SESSION['hint_question'])
                                                echo "<input  type='text' name='hint' required value='".$_SESSION["hint_question"]."' readonly>";
                                            ?><br>
                            <label>ENTER HINT ANSWER*</label>
                            <input type='text' name='answer' required placeholder="hint answer" ><br>
                            <label>ENTER NEW PASSWORD*</label><br>
                <input type="password" name="newpass"  maxlength="12" placeholder="enter new password" required pattern="[a-z0-9A-Z!@#$%^&*()]*[A-Z]+[a-z0-9A-Z!@#$%^&*()]*"><br>
                
                            <button type='submit' onclick="get()">submit</button></form></center>


<?php  
        /*if(array_key_exists("user",$_POST) and array_key_exists("password",$_POST)){
            $link = mysqli_connect("localhost", "root", "", "railway");

                    if (mysqli_connect_error()) {
            
                        die ("There was an error connecting to the database");
            
                    }

                    $query = "SELECT * FROM `user` WHERE email = '".mysqli_real_escape_string($link, $_POST['user'])."' and hint='".mysqli_real_escape_string($link, $_POST['password'])."' ";
               
                    $result = mysqli_query($link, $query);
                    if (@mysqli_num_rows($result) ==1){
                        echo "<h2>your account has been found</h2>";
                            $query1 = "SELECT `id` FROM `user` WHERE password = '".mysqli_real_escape_string($link, $_POST['newpass'])."'";
                            $result1=mysqli_query($link,$query1);
                            if(@mysqli_num_rows($result1)==1){
                                echo "password already taken please try with another new password";
                                header("refresh:2;url=forgot3.html");
                            }else{
                                 $query=" UPDATE `user` set `password`='".mysqli_real_escape_string($link, $_POST['newpass'])."' WHERE `email`= '".mysqli_real_escape_string($link, $_POST['user'])."' and `hint`='".mysqli_real_escape_string($link, $_POST['password'])."' ";
                                 $result= mysqli_query($link,$query);
                                if ($result) {
                        
                                    echo "<h2>password updated successfully</h2>";
                                    header("refresh:1;url=sag_prac.html");
                                }else{
                                    echo "<h2>something went wrong try again</h2>";
                                    header("refresh:1;url=forgot3.html");
                             }   }
                    } else{
                        echo "<h2>your account unable to find! please try again </h2>";
                        header("refresh:1;url=forgot3.html");
                     }
          }*/

          $link = mysqli_connect("localhost", "root", "", "railway");

                    if (mysqli_connect_error()) {
            
                        die ("There was an error connecting to the database");
            
                    } 
                    if(array_key_exists('answer', $_POST)){

                    $query="SELECT * from user where `name`='".mysqli_real_escape_string($link, $_SESSION['fuser'])."' and `hint_question`='".mysqli_real_escape_string($link, $_POST['hint'])."' and `hint`='".mysqli_real_escape_string($link, $_POST['answer'])."'";
                    if($result=mysqli_query($link,$query)){
                        echo "<h2>your account has been found</h2>";
                        
                           // $query1 = "SELECT * FROM `user` WHERE password = '".mysqli_real_escape_string($link, $_POST['newpass'])."'";
                            //$result1=mysqli_query($link,$query1);
                            /*if(@mysqli_num_rows($result1)==1){
                                echo "password already taken please try with another new password";
                                header("refresh:2;url=forgot3.php");
                            }else{*/
                                 $query2=" UPDATE `user` set `password`='".mysqli_real_escape_string($link, $_POST['newpass'])."' WHERE `name`= '".mysqli_real_escape_string($link, $_SESSION['fuser'])."' ";
                                if ($result2=mysqli_query($link,$query2)) {
                        
                                    echo "<h2>password updated successfully</h2>";
                                    header("refresh:1;url=sag_prac.html");
                                }else{
                                    echo "<h2>something went wrong try again</h2>";
                                    header("refresh:1;url=forgot3.php");
                             }   
                         

                        
                    }else{
                        echo "string";
                    }
                }

          
?>

                            
                         