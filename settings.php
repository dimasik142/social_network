<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 29.04.16
 * Time: 06:43
 */

?>
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
                <li>
                    <form name="search">
                    <input type="search" placeholder="Пошук друзів" size="15" style="margin-top: 10px">
                    </form>
                </li>
                <li><a href="biografi.php">Друзі</a></li>
                <li><a href="mgu.php">Повідомлення</a></li>
                <li><a href="photo.php">Спільноти</a></li>
                <li><a href="registration.php">Новини</a></li>
                <li><a href="forum.php">Налаштування</a></li>
            </ul>
        </nav>
    </header>
<div class="main_window">
    <div class="main_block">
      <h2> Изменить пароль</h2>
        <div class ="table_block">
        <br>
         <table >
           <form>
           <tr><td>Старый пароль:</td><td><input type="text" name="" value=""></td></tr>
           <tr><td>Новый пароль:</td><td><input type="text" name="" value=""></td></tr>
           <tr><td>Повторите пароль:</td><td><input type="text" name="" value=""></td></tr>
           <tr><td></td><td align="left"><input type="button" value="Сохранить пароль"></td></tr>
           </form>
         </table>
        </div>
        <br>
      <h2> Адрес вашей електронной почты </h2>
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
        <br>
        <h2> Номер вашего телефона </h2>
        <div class ="table_block">
        <br>
         <table >
           <form>
           <tr><td>Текущий номер:</td><td>067*****43</td></tr>
           <tr><td></td><td align="left"><input type="button" value="Изменить номер"></td></tr>
           </form>
         </table>
        </div>
    </div>
</div>
</div>


</body>