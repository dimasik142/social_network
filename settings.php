<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 29.04.16
 * Time: 06:43
 */
    setcookie("new_password","");
    include "ajax/connect_bd.php";
?>

<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
      

      <div id ="part_settings">
         <h3> Змінити пароль</h3>
         <br>
           <form class="bl_form" >
           <input type="password" id="current_password"  value="" required placeholder="Старий пароль"><p><br>
           <input type="password" id ="new_password"  value="" required placeholder="Новий пароль"><p><br>
           <input type="password" id="new_password_repeat"  value="" required placeholder="Повторіть пароль"><p><br>  
           <input type="button" id="button" onclick="change_password()" value="Зберегти пароль">
           </form>
      </div>
        <br>
      
      
      <div id="part_settings">
      <h3> Адресa вашої електронної пошти </h3>
           <br>
           <form class="bl_form">
           Поточна адреса:<?php echo $_COOKIE["email"]; ?><p><br>
          <input type="text" name="" value="" required placeholder="Нова адреса"><p><br>
           <input type="button" id="button" value="Змінити адресу"><p><br>
           </form>
      </div>
      
      
      <div id="part_settings">
      <h3> Змінити місто </h3><br>
           <form class="bl_form">
           Поточнe мicто:
           <?php                                                                      //Пошук id користувача
              $emails =  $_COOKIE["email"];
              $ids = "SELECT id FROM logining_data where email = '$emails' ";
              $result = mysql_query($ids); 
              $id=mysql_result($result, 0);
              $citys = "SELECT city FROM user_information where id = '$id' ";         //Пошук міста користувача (щоб видати на сторінці налашувань)
              $result = mysql_query($citys);
              $city = mysql_result($result, 0);         
              echo "$city";
           ?><p><br>
          <input type="text" name="" value="" id="new_city" required placeholder="Нове місто(село)"><p><br>
         <?php
          echo '<input hidden type="button" id="ids" value='.$id.'>';
          ?>
           <input type="button" id="button" onclick="substitute('city',document.getElementById('new_city').value)" value="Змінити місто"><p><br>
           </form>
      </div>
      

      <div id="part_settings">
      <h3> Змінити Ім'я </h3><br>
           <form class="bl_form">
           <?php                                                                      
              $names = "SELECT user_name FROM user_information where id = '$id' ";         //Пошук імені користувача (щоб видати у формі)
              $result = mysql_query($names);
              $name = mysql_result($result, 0);         
              echo '<input type="text" name="" value="" id="new_name" required placeholder='.$name.'><p><br>';
           ?><p><br>
           <input type="button" id="button" onclick="substitute('user_name',document.getElementById('new_name').value)" value="Змінити І'мя"><p><br>
           </form>
      </div>

      
      <div id="part_settings">
      <h3> Змінити прізвище </h3><br>
           <form class="bl_form">
           <?php                                                                      
              $surenames = "SELECT surename FROM user_information where id = '$id' ";         //Пошук імені користувача (щоб видати у формі)
              $result = mysql_query($surenames);
              $surename = mysql_result($result, 0);         
              echo '<input type="text" name="" value="" id="new_surename" required placeholder='.$surename.'><p><br>';
           ?><p><br>
           <input type="button" id="button" onclick="substitute('surename',document.getElementById('new_surename').value)" value="Змінити прізвище"><p><br>
           </form>
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

    function substitute(columns, new_values){   //Ф-ція зміни міста(поки лише міста)
        ids=document.getElementById('ids').value
        $.ajax(
            {
                type: "GET",
                url: "ajax/substitute.php",
                data: "id="+ids+"&new_value="+new_values+"&column="+columns
            });
        document.getElementById('new_city').value = ""
        document.getElementById('new_name').value = ""
        document.getElementById('new_surename').value = ""   
    }
</script>
















