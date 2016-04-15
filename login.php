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
       <input type="email" name="User_email" size="15" maxlength="40" required placeholder="Eлектронна скринька"></p><br>
       <input type="password" name="User_password" size="15" maxlength="40" required placeholder="Пароль"></p><br>
       <input type="button" class="login_button" onclick="check_email_and_password_js()" value="Вхід"></p><br>
       <input type="button" class="other_button"  onclick='location.href="registration.html"' value="Реєстрація" >
       </form>
    </div>
</div>
</body>

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



/*   function check_email_and_password_php(){
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
   }*/
?>



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

    function check_email_and_password_js() {
        alert("Зайшли в check_email_and_password_js ");
        var req = getXmlHttp();
        var email = document.getElementsByName('User_email');
        var password = document.getElementsByName('User_password');
        var check_data = check_email_and_password_php(email.value,password.value);
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
