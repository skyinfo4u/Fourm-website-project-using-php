<?php
require 'partial/_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
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
    <div class="container">
       
    </div>
    <div class="form-section">
        <form action="" method="post">
            <h1>Welcome to Sign Up Page!</h1>
            <div class="from-group">
                <label for="name">Name: </label>
                <input type="text" maxlength="50" name="name" id="name">
                <small>Maxmimum Length of character is 100;</small>
            </div>
            <div class="from-group">
                <label for="email">Email id: </label>
                <input type="email" maxlength="50" name="email" id="email">
                <small>Maxmimum character of Email is 100; </small>
            </div>
            <div class="from-group">
                <label for="pass">Password: </label>
                <input type="password" name="pass" id="pass">
            </div>
            <div class="from-group">
                <label for="pass">Comfirm Password: </label>
                <input type="password" name="cpass" id="cpass">
                <small>Make Sure! You're Enter same password. </small>
            </div>
            <div class="from-group">
                <input type="submit" value="Submit">
            </div>


        </form>
    </div>
</body>
</html>
<!-- for enter the data  -->
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    $exist=false;
    $sql="SELECT * FROM `user420` WHERE `user_email` LIKE '$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num>0)
    {
        $exist = true;
        echo "Email already Used Try New Email";
    }
    else{
        if($pass==$cpass&& $exist==false)
        {
            $hash=password_hash($pass,PASSWORD_DEFAULT);  //convert to hash code all password
            $sql="INSERT INTO `user420` (`user_name`, `user_email`, `user_pass`, `timestamp`) VALUES ('$name', '$email', '$hash', current_timestamp())";
            $result=mysqli_query($conn,$sql);
            if(!$result)
            {
                echo "unable to insert data";
            }
            else
            {
                echo "Your accout has been created now you can login using this link <a href='#'>click here</a>";
            }
        }
        else{
            echo "Doesn't match password";
            
        }


    }

}
?>
