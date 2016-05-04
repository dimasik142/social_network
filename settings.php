<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 29.04.16
 * Time: 06:43
 */
    setcookie("new_password","");
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
           <form >
           <tr><td>Старий пароль:</td><td><input type="password" id="current_password"  value=""></td></tr>
           <tr><td>Новий пароль:</td><td><input type="password" id ="new_password"  value=""></td></tr>
           <tr><td>Повторіть пароль:</td><td><input type="password" id="new_password_repeat"  value=""></td></tr>
           <tr><td></td><td align="left"><input type="button" onclick="change_password()" value="Зберегти пароль"></td></tr>
           </form>
         </table>
        </div>
        <br>
      <h2> Адресa вашої електронної пошти </h2>
        <div class ="table_block">
        <br>
         <table >
           <form>
           <tr><td>Текущий адрес:</td><td><?php echo $_COOKIE["email"]; ?></td></tr>
           <tr><td>Новый адрес:</td><td><input type="text" name="" value=""></td></tr>
           <tr><td></td><td align="left"><input type="button" value="Изменить адрес"></td></tr>
           </form>
         </table>

    </div>
</div>
</div>
</body>

<script >

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function getXmlHttp(){
        var getXml;
        try {
            getXml = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                getXml = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                getXml = false;
            }
        }
        if (!getXml && typeof XMLHttpRequest!='undefined') {
            getXml = new XMLHttpRequest();
        }
        return getXml;
    }

    function change_password(){
        document.cookie = "new_password=" + document.getElementById('new_password').value;
        var req = getXmlHttp();
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                if(req.status == 200) {
                    alert(req.responseText);
                    document.cookie = "password=" + getCookie('new_password');
                    document.getElementById('current_password').value = "";
                    document.getElementById('new_password').value = "";
                    document.getElementById('new_password_repeat').value = "";
                }
            }
        };
        if(document.getElementById('new_password').value == document.getElementById('new_password_repeat').value) {
            if(document.getElementById('current_password').value == getCookie('password')) {
                req.open('GET', 'ajax/change_password.php', true);
            }
            else{
                alert ("Старий пароль не вірний!!! Повторіть будь ласка ввід");
                document.getElementById('current_password').value = "";
                document.getElementById('new_password').value = "";
                document.getElementById('new_password_repeat').value = "";
            }
        }
        else {
            alert("Паролі не співпадають!!! Повторіть будь ласка ввід");
            document.getElementById('new_password').value = "";
            document.getElementById('new_password_repeat').value = "";
        }
        req.send(null);  // отослать запрос
        statusElem.innerHTML = 'Ожидаю ответа сервера...'
    }

    function change_email(){

    }

</script>
















