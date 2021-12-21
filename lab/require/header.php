<link rel="stylesheet" href="css/header.css">

<header>
    <div class="container_menu">
        <div class="menuToggle">
            <img src="img/icon.png" height="40px;" style="outline: none;" alt="">
        </div>
                    
        <div class="logo">
            <h2>LOGO</h2>
        </div>

        <nav>
            <div class="menu_center">
                <?php
                    if(empty($result_users['mail'])){
                ?>
                    <ul id="menu" class="menu clearfix">
                        <li><a class="" href="#">Главная</a></li>
                        <li><a class="" href="#">Контакты</a></li>
                        <li><a class="" href="#" id="loginForm_button">Авторизация</a></li>
                        <li><a class="menu_btn" href="#" id="regForm_button">Регистрация</a></li>
                    </ul>
                <?php }else{ ?>
                    <ul id="menu" class="menu clearfix">
                        <li><a class="" href="#">Главная</a></li>
                        <li><a class="" href="#">Контакты</a></li>
                        <li><a class="menu_btn" href="logout.php">Выйти</a></li>
                    </ul>
                <?php } ?>
            </div>
        </nav>
    </div>
</header>