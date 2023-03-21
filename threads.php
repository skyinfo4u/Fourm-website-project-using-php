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
        .ask{
            margin: 15px 0px;
        }
        a{
            text-decoration:none;
        }
        .height{
            
            height: 150px;
            background: rgb(183 189 178);
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php
    require 'partial/_header.php';
    ?>

    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `category` WHERE `category_id` = $id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $catname=$row['category_name'];
        $catdec=$row['category_dec'];
    }
    ?>
    <div class="container">
        <div class="box">
            
                <h1>Welcome to <?php echo $catname ?> forums </h1>
                <p><?php echo $catdec ?></p>
                <hr>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi saepe voluptatibus nam pariatur consequuntur quae.</p>
                <!-- <button>learn more</button>/ -->
                <p></p>
                <p></p>
                <p></p>
                <br>
        </div>
<!-- for question input -->
<?php
if(!isset($_SESSION['loggedin']))
{
    echo'
    <button class="ask" ><a href="login.php">Ask a Question</a></button>
    ';

}

if(isset($_SESSION['loggedin']))
{
    echo '
    
    
        <form action="" method="post">
            <div class="ques-box">
                <label for="title">Question Title</label>
                <input type="text" name="Qtitle" id="title">
            </div>
            <div class="ques-box">
                <label for="desc">Question Description</label>
                <textarea name="Qdesc" id="desc" cols="88" rows="10"></textarea>
            </div>
            <button>Submit</button>
        </form>
        ';

}
else
{
    echo
    '
    <div class="box height">
    Please Login to Ask a Question!! <a href="login.php">Click Here For Login</a>
    </div>
    ';
}
?>
    <!-- for input questin data in database -->
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $Qtitle=$_POST['Qtitle'];
            $Qdesc=$_POST['Qdesc'];
            $id=$_GET['catid'];
            $user_id=$_SESSION['user_id'];

            $sql="INSERT INTO `threads` (`threads_title`, `threads_desc`, `threads_cat_id`, `threads_user_id`, `timestamp`) VALUES ('$Qtitle', '$Qdesc', '$id', '$user_id', current_timestamp())";

            $result=mysqli_query($conn,$sql);
        }
    ?>
        <?php
        $id=$_GET['catid'];
        $sql="SELECT * FROM `threads` WHERE `threads_cat_id` = $id ORDER BY `threads`.`threads_id` DESC";
        
        $result=mysqli_query($conn,$sql);
        $num= mysqli_num_rows($result);
        echo"
        <h2>Browse Your Question | Total Question :  ".$num."  </h2>
        
        ";
        while($row=mysqli_fetch_assoc($result))
        {
            $tname=$row['threads_title'];
            $tdec=$row['threads_desc'];
            $ti=$row['threads_id'];
            echo '
            
            <div class="tt">
                <img src="trail/1.jpeg" alt="php">
                <nav>
                    <h4> <a href="threads_q.php?thid='.$ti.'"> '.$tname.'</a></h4>
                    <p>'.$tdec.'</p>
                </nav>
            </div>
            
            ';

        
        }

    ?>

    </div>
</body>
</html>