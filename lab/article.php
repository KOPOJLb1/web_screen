<?php 
session_start();
require_once('require/db.php');

$mail = $_SESSION['mail'];



if($_GET['id']){
    $id = $_GET['id'];

    $query = mysqli_query($db, "SELECT * FROM `image` WHERE `id` = '$id'");
    $result = mysqli_fetch_array($query);  
    
    if($result['private'] === "2"){
        if($result['user'] === $mail){

        }else{
            exit("У вас нет доступа");
        }
    }else{
    }



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('require/header.php'); ?>

    <div class="img"><img  style="width: 200px;" src="image/<?php echo $result['image']; ?>" alt=""><p>дата: <?php echo $result['date']; ?></p></div>
</body>
</html>