<?php 
session_start();
require_once('require/db.php');


if(isset($_POST['submit_login'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $password_md5 = md5($password);

    if(!empty($mail AND $password)){
        $query = mysqli_query($db, "SELECT * FROM `users` WHERE `mail` = '$mail' AND `password` = '$password_md5'");
        $result = mysqli_fetch_array($query);

        if(!empty($result['mail'])){
            $_SESSION['mail'] = $mail;
            $_SESSION['password'] = $password_md5;

            ?><script>window.location = "index.php";</script><?php
        }
    }
}


if(isset($_POST['submit_reg'])){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];
    $password_md5 = md5($password);

    if(!empty($name AND $mail AND $tel AND $password)){
        $query = mysqli_query($db, "SELECT * FROM `users` WHERE `mail` = '$mail'");
        $result = mysqli_fetch_assoc($query);

        if($result){
            $msg = "Введенный вами логин зарегистрирован";
        }else{
            $sql = "INSERT INTO `users` (`name`, `mail`, `tel`, `password`) VALUES ('$name', '$mail', '$tel', '$password_md5')";
            mysqli_query($db, $sql);

            $_SESSION['mail'] = $mail;
            $_SESSION['password'] = $password_md5;
    
            ?><script>window.location = "index.php";</script><?php
        }
    }

}

?>
<link rel="stylesheet" href="css/modal.css">

<div id="modal_login">
    <div class="close" id="close_login"></div>
    
    <div class="modal_window" id="login_form">
        <div class="modal_title"><h2>Авторизация</h2></div>
        <form action="" method="POST" class="modal_form">
            <input type="text" name="mail" placeholder="Введите email">
            <input type="password" name="password" placeholder="Введите пароль">
            <div class="modal_btn"><input type="submit" name="submit_login" class="submit" value="Войти"> <a href="#" id="regForm_button_2">Регистрация</a>  </div>
        </form>  
    </div>
</div>

<div id="modal_reg">
    <div class="close" id="close_reg"></div>

    <div class="modal_window" id="reg_form">
        <div class="modal_title"><h2>Регистрация</h2></div>
        <form action="" method="POST" class="modal_form">
            <input type="text" name="name" placeholder="Введите имя">
            <input type="text" name="mail" placeholder="Введите email">
            <input type="text" name="tel" placeholder="Введите телефон">
            <input type="password" name="password" placeholder="Введите пароль">
            <div class="modal_btn"><input type="submit" name="submit_reg" class="submit" value="Зарегистрироваться"> <a href="#" id="loginForm_button_2">Авторизация</a></div>
        </form> 
    </div>
</div>