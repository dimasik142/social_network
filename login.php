<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Вхід </title>
    <link rel="stylesheet" href="styles/registration1.css" />
</head>
<body>
<div class="container">
    <div class="login">
    <h1>Вхід</h1> </p><br>
      <form class="bl_form">
       <input type="email" id="User_email" size="15" maxlength="40" required placeholder="Eлектронна скринька"></p><br>
       <input type="password" id="User_password" size="15" maxlength="40" required placeholder="Пароль"></p><br>
       <input type="button" class="login_button" onclick= "check_login()" value="Вхід"></p><br>
       <input type="button" class="other_button"  onclick='location.href="registration.php"' value="Реєстрація" >
       </form>
    </div>
</div>
</body>

<script type="text/javascript">
    function check_login(){
        document.cookie = "password_log =" + document.getElementById('User_password').value ;
        document.cookie = "email_log =" + document.getElementById("User_email").value;
        document.location.href = "check_the_logining.php";
    }
</script>

<?php

/*
<?php
function connect_bd(){
    $connection = new mysqli('localhost', 'root', '', 'User');
    if ($connection->connect_error) {
        die('Connect Error :' . $connection->connect_error);
    }
    return $connection;
}

function check_email_and_password_php($User_email , $User_password){
    $connect = connect_bd();
    $sql = "SELECT * FROM Information";
    if ($res = $connect->query($sql)) {
        if ($res->num_rows > 0) {
            $information_array = $res->fetch_all(MYSQLI_ASSOC);
            foreach($information_array as $item ):
                $email = $item['email'];
                $password = $item['password'];
                if(($email == $User_email) and ($password == $User_password)){
                    setcookie('email', $email);
                    setcookie('password', $password);
                    return 0;
                }
            endforeach;
            return 1;
        }
    }
}

   function check_email_and_password_ph1p(){
       $connect = connect_bd();
       $User_email = $_POST['User_email'];
       $User_password = $_POST['User_password'];
       $sql = "SELECT * FROM Information";
       if ($res = $connect->query($sql)) {
           if ($res->num_rows > 0) {
               $information_array = $res->fetch_all(MYSQLI_ASSOC);

               foreach($information_array as $item ):
                   $email = $item['email'];
                   $password = $item['password'];
                   if(($email == $User_email) and ($password == $User_password)){
                       setcookie('email', $email);
                       setcookie('password', $password);
                       require('index.php');
                       return 0;
                   }
               endforeach;
                   require('login.php');
           }
       }
   }
?>
*/



/*
<script type="text/javascript">

    function getXmlHttp(){
        var xmlhttp;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        return xmlhttp;
    }

    function check_email_and_password_js(){
        var xmlhttp = getXmlHttp();
        var email = document.getElementById('User_email');
        var password = document.getElementById('User_password');
        xmlhttp.open('GET', 'ajax/login_ajax.php',true,email.value,password.value);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
                if(xmlhttp.status == 200) {
                    alert(xmlhttp.responseText);
                    var ajax_response = xmlhttp.responseXML.getElementById("ajax_response");    // getElementById('ajax_response');
                    alert(ajax_response.value);
                    if(ajax_response.value == "1") {
                        document.location.href = "my_page.php";
                        alert(xmlhttp.responseText);
                    }
                    if(ajax_response.value == "0"){
                        alert(xmlhttp.responseText);
                        alert("Ви ввели не вірний логін або пароль!!! Повторіть будь ласка ввід");
                        email.value ="";
                        password.value="";
                    }
                }
            }
        };
        xmlhttp.send(null);
    }



    function check_email_and_password_js() {
        alert("Зайшли в check_email_and_password_js");
        var req = getXmlHttp();
        var email = document.getElementsByName('User_email');
        var password = document.getElementsByName('User_password');
        //var check_data = check_email_and_password_php(email.value,password.value);
        alert("Пройшли check_email_and_password_php");
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                if(req.status == 200  ) {
                    if ( check_data == 1) {
                        alert("Пароль введено не вірно. Повторіть будь ласка ввід паролю.");
                        email.value = "";
                        password.value = ""
                    }
                    else{
                        document.location.href = "my_page.php";
                    }
                }
            }
        };
        alert("Вийшли з check_email_and_password_js ");
        req.open('GET', 'vote.php', true);
        req.send(null);
    }

</script>
*/