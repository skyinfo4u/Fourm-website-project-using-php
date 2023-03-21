<?php
require 'partial/_connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
         .form-section{
            /* border: 2px solid black; */
            display:flex;
            justify-content:center;
            align-iteam:center;
        }
        .from-group{
            display:block;
            /* border: 2px solid yellow; */
            /* width:100%; */
            align-iteam:center;
            margin:10px 0;
        }
        .from-group input{
            /* display:block; */
            /* border: 2px solid yellow; */
            padding:10px 10px;
            width:100%;
        }
        .from-group input[type=submit]{
            /* display:block; */
            /* border: 2px solid yellow; */
            width:20%;
        }
    </style>
</head>
<body>
<?php
    require 'partial/_header.php';
    ?>
    
    <div class="form-section">
        <form action="" method="post">
            <h1>Welcome to Login Page!</h1>
            <div class="from-group">
                <label for="email">email: </label>
                <input type="text" name="email" id="email">
            </div>
            <div class="from-group">
                <label for="pass">Password: </label>
                <input type="password" name="pass" id="pass">
            </div>
            
            <div class="from-group">
                <input type="submit" value="Login">
            </div>


        </form>
    </div>
</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{

    
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="SELECT * FROM `user420` WHERE `user_email` LIKE '$email'";
    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);

    if($num==1)
    {
        $row=mysqli_fetch_assoc($result);
        $id=$row['user_id'];
        $uname=$row['user_name'];
        
            if(password_verify($pass,$row['user_pass']))
            {

                // session_start();
                $_SESSION['loggedin']="true";
                $_SESSION['email']=$email;
                $_SESSION['user_id']=$id;
                $_SESSION['user_name']=$uname;

                header("location: index.php");
            }
            else
            {
                echo "Invalid password";
            }
            
        
    }
    else{
        
        
        echo "Invalid email";
        
    }

}