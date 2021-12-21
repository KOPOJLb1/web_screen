<?php
session_start();
require_once('require/db.php');

$mail = $_SESSION['mail'];
$password = $_SESSION['password'];

if(!empty($mail AND $password)){
    $query_users = mysqli_query($db, "SELECT * FROM `users` WHERE `mail` = '$mail' and `password` = '$password'");
    $result_users = mysqli_fetch_assoc($query_users);
}


$query_sum = mysqli_query($db, "SELECT SUM(sum) sum FROM `image` WHERE `user` = '$mail'");
$result_sum = mysqli_fetch_assoc($query_sum);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Title</title>
</head>
<body>

<?php require_once('require/modal.php') ?>

<?php require_once('require/header.php') ?>

    <section class="screenshot">
        <div class="container">
            <div class="content">
                <div class="left">
                    <?php 
                    if(!empty($result_users['mail'])){?>
                        <form action="add.php" class="add_form" method="POST" enctype="multipart/form-data">    
                            <input type="file" name="file" style="display: none" id="file" accept=".jpg, .jpeg" onchange="this.form.submit ()">
                            <label for="file" class="add"><p>Нажмите или перетащите изображение для <br> загрузки файла</p></label>

                            <label for="private"><input type="checkbox" name="private" value="2" id="private"> Доступно только по ссылке </label>
                        </form>
                    <?php }
                    ?>

                    <div class="title"><h2>Скриншоты других пользователей</h2></div>

                    <div class="content_photo">
                

                        <?php 
                            $image = mysqli_query($db, "SELECT * FROM `image` WHERE `private` = '1' ORDER BY id DESC ");
                            while($row = mysqli_fetch_assoc($image)){?>
                                <a href="article.php?id=<?php echo $row['id']; ?>" class="photo"><img src="image/<?php echo $row['image']; ?>" alt=""></a>

                            <?}?>
                    </div>
                </div>

                <div class="right">
                    <?php 
                    if(empty($result_users['mail'])){?>
                    <div class="information">
                        <h2>4 000 000 000</h2>
                        <h3>Скриншотов сделано <br> начиная с 20 декабря 2021</h3>
                    </div>
                    <?php }else{ ?>
                    <div class="profile">
                        <div class="user_img"><img src="img/user.png" alt=""></div>
                        <div class="user_text"><h2><?php echo $result_users['name']; ?></h2><h3><?php echo $result_users['mail'] ?></h3></div>
                        <div class="user_info">
                            <div class="info"><h2><?php if($result_sum['sum'] === null){echo "0";}else{echo $result_sum['sum'];} ?></h2><h3>Скриншотов</h3></div>
                            <div class="us_hr"></div>
                            <div class="info"><h2>100</h2><h3>Просмотров</h3></div>
                        </div>

                        <div class="user_btn_container">
                            <a href="logout.php" class="user_btn">Выйти</a>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

    <!-- js -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>

</html>