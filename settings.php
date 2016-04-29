<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 29.04.16
 * Time: 06:43
 */

?>
<script>alert(document.cookie);</script>
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Моя сторінка </title>
    <link rel="stylesheet" href="styles/index.css" />
    <link rel="stylesheet" href="styles/settings.css" />
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
                <li><a href="registration.php">Повідомлення</a></li>
                <li><a href="login.php">Новини друзі</a></li>
                <li><a href="settings.php">Налаштування</a></li>
                <li><a href="exit.php">Вихід</a></li>
            </ul>
        </nav>
    </header>
<div class="main_window">
    <div class="main_block">
      <h2> Змінити пароль</h2>
        <div class ="table_block">
        <br>
         <table >
           <form>
           <tr><td>Старий пароль:</td><td><input type="text" id="$current_password" name="" value=""></td></tr>
           <tr><td>Новий пароль:</td><td><input type="text" id ="$new_password" name="" value=""></td></tr>
           <tr><td>Повторіть пароль:</td><td><input type="text" id="$new_password_repeat" name="" value=""></td></tr>
           <tr><td></td><td align="left"><input type="button" value="Сохранить пароль"></td></tr>
           </form>
         </table>
        </div>
        <br>
      <h2> Адресa вашої електронної пошти </h2>
        <div class ="table_block">
        <br>
         <table >
           <form>
           <tr><td>Текущий адрес:</td><td>qwerty@bigmir.net</td></tr>
           <tr><td>Новый адрес:</td><td><input type="text" name="" value=""></td></tr>
           <tr><td></td><td align="left"><input type="button" value="Изменить адрес"></td></tr>
           </form>
         </table>

    </div>
</div>
</div>
</body>

<script>
    function change_password(){
        if()
    }
</script>
















