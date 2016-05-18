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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Налаштування </title>
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

    <script type="text/javascript"> 
    
                      
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
                <li><a href="registration.php">Повідомлення</a></li>
                <li><a href="login.php">Новини друзі</a></li>
                <li><a href="settings.php">Налаштування</a></li>
                <li><a href="exit.php">Вихід</a></li>
            </ul>
        </nav>
    </header>
<div class="main_window">
    <div class="main_block">
         <h3> Змінити пароль</h3><br><br>
           <form class="bl_form" >
            <input type="password" id="current_password"  value="" required placeholder="Старий пароль"><p><br>
            <input type="password" id ="new_password"  value="" required placeholder="Новий пароль"><p><br>
            <input type="password" id="new_password_repeat"  value="" required placeholder="Повторіть пароль"><p><br>
            <input type="button" id="button" onclick="change_password()" value="Зберегти пароль">
           </form>
        <br>
      
      <div id="part_settings">
          <br><h3> Адресa вашої електронної пошти </h3><br><br>
           <form class="bl_form">
                Поточна адреса:<?php echo $_COOKIE["email"]; ?><p><br>
                <input type="text" id="email_input" value="" required placeholder="Нова адреса"><p><br>
                <input type="button" id="button" onclick="change_email()" value="Змінити адресу">
           </form>

      <div id="part_settings">
          <br><br><h3> Змінити місто </h3><br>
           <form class="bl_form">
                <input type="text" name="" value="" id="new_city" required placeholder="Нове місто(село)"><p><br>
                <input type="button" id="button" onclick="change_city()" value="Змінити місто"><p>
           </form>
      </div>

      <div id="part_settings">
           <h3> Змінити Ім'я </h3><br>
           <form class="bl_form">
               <input type="text" name="" value="" id="userName" required placeholder="Ім'я"><p><br>
                   <input type="text" name="" value="" id="userSurename" required placeholder="Фамілія"><p><br>

                   <input type="button" id="button" onclick="changeNameAndSurename()" value="Змінити "><p>
           </form>
      </div>

</div>
</body>

<script >
    if(getCookie("email") == null || getCookie("password") == null)
        document.location.href = "index.php";

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
                    document.location.href = "settings.php";
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
        req.send(null);
    }

    function change_email(){
        document.cookie = "new_email=" + document.getElementById('email_input').value;
        var reg = getXmlHttp();
        reg.onreadystatechange = function() {
            if (reg.readyState == 4) {
                if(reg.status == 200) {
                    alert(reg.responseText);
                    document.getElementById('email_input').value = "";
                    document.cookie = "email=" + getCookie('new_email');
                    document.location.href = "settings.php";
                }
            }
        };
        reg.open('GET', 'ajax/change_email.php', true);
        reg.send(null);
    }

    function change_city() {
        document.cookie = "new_city=" + document.getElementById('new_city').value;
        var reg = getXmlHttp();
        reg.onreadystatechange = function() {
            if (reg.readyState == 4) {
                if(reg.status == 200) {
                    alert(reg.responseText);
                    document.getElementById('new_city').value = "";
                }
            }
        };
        reg.open('GET', 'ajax/change_city.php', true);
        reg.send(null);
    }
    
    function changeNameAndSurename() {
        document.cookie = "name=" + document.getElementById('userName').value;
        document.cookie = "surename=" + document.getElementById('userSurename').value;
        var reg = getXmlHttp();
        reg.onreadystatechange = function() {
            if (reg.readyState == 4) {
                if(reg.status == 200) {
                    alert(reg.responseText);
                    document.getElementById('userName').value = "";
                    document.getElementById('userSurename').value = "";
                }
            }
        };
        reg.open('GET', 'ajax/changeNameAndSurename.php', true);
        reg.send(null);
    }
    
</script>
















