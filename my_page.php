<?php
    include 'User_class.php';
    $user = new User();
    setcookie("email_log","");
    setcookie("password_log","");
    $user->get_information_from_db($_COOKIE["email"],$_COOKIE["password"]);
?>
<script>
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    if(getCookie("email") == null || getCookie("password") == null)
        document.location.href = "index.php"
</script>

<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Моя сторінка </title>
    <link rel="stylesheet" href="styles/index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" ></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var touch = $('#touch-menu');
            var menu = $('.nav');

            $(touch).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
            $(window).resize(function(){
                var wid = $(window).width();
                if(wid > 760 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
        $(document).ready(function(){

        });
    </script>

</head>
<body>
<div class="container">
    <header>
        <a href="#" id="touch-menu">Меню</a>
        <nav>
            <ul class="nav clearfix">
                <li><a href="index.php">Моя сторінка</a></li>
                <li><a href="biografi.php">Друзі</a></li>
                <li><a href="mgu.php">Повідомлення</a></li>
                <li><a href="login.php">Новини друі</a></li>
                <li><a href="registration.php">Налаштування</a></li>
                <li><a href="exit.php">Вихід</a></li>
            </ul>
        </nav>
    </header>
    <div class="main_window">
        <?php
        $user->set_name();
        ?>
        <div>
            <div class ="div_photo">
                <?php
                $user->set_photo();
                ?>
            </div>
            <div class="information">
                <?php
                $user->set_information();
                ?>
            </div>
        </div>
    </div>
    <button type="submit" class ="button_play">
        <image src="photo/play.png">
    </button>

</div>
</body>


