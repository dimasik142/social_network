<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 17.05.16
 * Time: 19:32
 */
include 'massages_class.php';
$massage = new Messages();

?>

<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Діалоги </title>
    <link rel="stylesheet" href="styles/index1.css" />
    <link rel="stylesheet" href="styles/dialogue.css" />
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
                <li><a href="friends.php">Друзі</a></li>
                <li><a href="dialogue.php">Повідомлення</a></li>
                <li><a href="login.php">Новини друзі</a></li>
                <li><a href="settings.php">Налаштування</a></li>
                <li><a href="exit.php">Вихід</a></li>
            </ul>
        </nav>
    </header>
    <div class="main_window">
        <ul class="dialog_menu">
            <li class="selected"><a href="#">Діалоги</a></li>
            <li><a href="#">Перегляд діалогів</a></li>
        </ul>
        <br>
        <?php $massage->getMessengesList($_COOKIE['email'],$_COOKIE['password'])?>

</div>
</body>
