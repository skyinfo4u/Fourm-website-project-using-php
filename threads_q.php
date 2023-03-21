<?php
include 'partial/_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss- threads category</title>
    <style>
        .container{
            margin:10px 270px;
            /* background-color: rgb(180, 174, 174); */
            padding: 10px 30px ;
            /* border-radius: 5px; */
            /* height: 240px; */
        }
        .box{
            /* margin:10px 270px; */
            background-color: rgb(180, 174, 174);
            padding: 10px 30px ;
            border-radius: 5px;
            /* height: 240px; */
        }
        button
        {
            padding: 8px 10px;
            border-radius: 4px;
            border: none;
            background: green;
            color: white;
            cursor: pointer;
        }
        img{
            /* display: inline; */
            border: 2px solid black;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .user{
            display: inline;
            border: 2px solid black;
        }
        .tt{
            display: flex;
            margin-bottom: 10px;
        }
        nav{
            margin: -10px 9px;
        }
        #title{
            width:98%;
        }
        /*
        .ques-box{
            margin: 10px;
        } */
        .tt nav h4{
            margin: 0;
    margin-top: 20px;
        }
        .tt nav p{
            margin: 0;
        }
        .height{
            
            height: 150px;
            background: rgb(183 189 178);
            display: flex;
            justify-content: center;
            align-items: center;
            margin:10px 0px;
        }
    </style>
</head>
<body>
    <?php
    require 'partial/_header.php';
    ?>

    <?php
    $id=$_GET['thid'];
    $sql="SELECT * FROM `threads` WHERE `threads_id` = $id";

    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $tname=$row['threads_title'];
        $tdec=$row['threads_desc'];
        $tuser=$row['threads_user_id'];
    
    }

    $sql="SELECT * FROM `user420` WHERE `user_id` = $tuser";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $name=$row['user_name'];
    ?>
    <div class="container">
        <div class="box">
            
                <h1><?php echo $tname ?></h1>
                <p><?php echo  $tdec ?></p>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi saepe voluptatibus nam pariatur consequuntur quae.</p>
                <p>Post By : <strong><?php echo  $name ?></strong></p>
                <p></p>
                <p></p>
                <p></p>
                <br>
        </div>
        
<!-- for question input -->
<?php
if(isset($_SESSION['loggedin']))
{
    echo'
    
    <h1>Post a Comments</h1>
        <form action="" method="post">
            
            <div class="ques-box">
                <label for="desc">Type your Comment</label>
                <textarea name="cdesc" id="desc" cols="88" rows="10"></textarea>
            </div>
            <button Type="submit" >Post Comment</button>
        </form>
    
    ';
}
else
{
    echo
    '
    <div class="box height">
    Please Login to Start Your Discussion... <a href="login.php">Click Here For Login</a>
    </div>
    ';
}
?>



    <h2>Discussion</h2>
    <!-- for input questin data in database -->
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            $cdesc=$_POST['cdesc'];
            $id=$_GET['thid'];
            
            $username=$_SESSION['user_name'];
            $sql="INSERT INTO `comments` (`comments_desc`, `threads_id`, `comments_date`, `comments_by`) VALUES ('$cdesc', '$id', current_timestamp(), '$username')";

            $result=mysqli_query($conn,$sql);
        }
    ?>
        
        <?php
        $id=$_GET['thid'];
        $sql="SELECT * FROM `comments` WHERE `threads_id` =$id";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $cdate=$row['comments_date'];
            $cdec=$row['comments_desc'];
            $cname=$row['comments_by'];
            
            echo '
            
            <div class="tt">
                <img src="trail/1.jpeg" alt="php">
                <nav>
                    <h4>'.$cname.' at '.$cdate.'</h4>
                    <p>'.$cdec.'</p>
                </nav>
            </div>
            
            ';

        
        }

    ?>

    </div>
</body>
</html>