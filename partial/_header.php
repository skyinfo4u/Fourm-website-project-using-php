<?php
$showlog=0;
// echo "hello world checkl";
session_start();
if(isset($_SESSION['loggedin']))
{
    $showlog=1;
    // echo "hello world";
}

?>
    <style>
        body{
            /* margin:0;
            padding:0; */
            font-family:ubuntu;
        }
        .header
        {
            display : flex;
            background-color :#262424;
            border-radius:5px;
        }
        .header .nav-left ul
        {
            display : flex;
        }
        .header .nav-left ul li
        {
            margin: 0px 10px;
            list-style: none;
        }
        .header .nav-left ul li a
        {
            text-decoration:none;
            color :white;
        }
        .header .nav-right
        {
            display: flex;
            position: absolute;
            right: 50px;
            top: 20px;
        }
        #drop{
            display: none;
            
        }
        #drop1 :hover > #drop{
            display: block;
            position: relative;
        }
        .btn{
            background: green;
            /* outline-color: green; */
            font-size: 15px;
            padding: 5px 5px;
            margin: 0px 10px;
            border-radius: 5px;
            border: none;
            color: black;
        }
        .search{
            top: -1px;
    position: absolute;
    left: -77px;
        }
    </style>

<body>
    <div class="header">
        <div class="nav-left">
            <ul>
                <li><a href="index.php">iDiscuss</a></li>
                <li><a href="index.php">Home</a></li>
                <li id="drop1"><a href="">javascript</a></li>
                <li id="drop1"><a href="">Python</a></li>
                    <ul id="drop">
                        <li><a href="">cpp</a></li>
                        <li><a href="">javascript</a></li>
                        <li><a href="">Python</a></li>
                        <li><a href="">linux</a></li>
                    </ul>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <form action="Search.php" method="get">
            <input type="search" name="" id="" placeholder="Search">
            <div > <a href="#"><button class="btn search">Search</button> </a></div>
            </form>
            <?php
            // session_start();
                if($showlog)
                {   
                    
                    $emailid=$_SESSION['email'];
                    $sql="SELECT * FROM `user420` WHERE `user_email` LIKE '$emailid'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);
                    echo '<div > <a href="dasboard/dasboard.php"><button class="btn">Dasboard</button> </a></div>';
                    
                    echo "
                    <img src='trail/1.jpeg' alt=''
                    style='
                    border-radius: 50%;
                    height: 30px;
                    margin-right: 7px;
                    width: 30px;
                    '
                    >
                    <div class='user-box'style='
                    margin: 5px 0px;
                    color:white;
                ' ><a href='dasboard/dasboard.php'>".$row['user_name']."</a></div>
                    ";
                    echo '
                    <div > <a href="logout.php"><button class="btn">Logout</button> </a></div>
                    ';
                    
                }
                else
                {
                    echo '
                    <div > <a href="#"><button class="btn">Admin Login</button> </a></div>
                    <div > <a href="login.php"><button class="btn">log in</button> </a></div>
                    <div > <a href="signup.php"><button class="btn">Sign up</button> </a></div>
                    
                    ';
                }

            ?>
        </div>
    </div>
</body>
</html>