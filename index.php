<!-- <?php

?> -->

<?php
include 'partial/_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iDiscuss- is a codeing forum</title>
    <?php
    require 'partial/style.php';
    ?>
</head>
<body>
    <?php
    require 'partial/_header.php';
    ?>
    <?php
    require 'trail/forbackground.php';
    ?>
    <h2 class="center">iDiscuss-Browse Categores</h2>
    <div class="conta">
    <?php
            $sql="SELECT * FROM `category`";
            $resullt=mysqli_query($conn,$sql);
            $img=1;
            while($row=mysqli_fetch_assoc($resullt))
            {
                $catid=$row['category_id'];

                echo '
                
            <div class="card">
                <img src="trail/'.$img.'.jpeg" alt="df">
                <p> '.$row['category_name'].'</p>
                <p>'.substr($row['category_dec'],0,30).'...</p>
                <button><a href="threads.php?catid='.$catid.'">View More </a></button>
            </div>
    
                ';
                
                $img++;
            }

    ?>
    </div>
    
    <?php
    require 'partial/_footer.php';
    ?>
    
</body>
</html>