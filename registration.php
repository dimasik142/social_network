<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Реэстрація </title>
    <link rel="stylesheet" href="styles/registration.css" />
</head>
<body>
<div class="container">
    <div class="main_window">
        Реєстрація </p><br>
        <form class="bl_form">
            <input type="text" name="User_name" size="15" maxlength="35" required placeholder="Iм'я"></p><br>
            <input type="text" name="User_surename" size="15" maxlength="35" required placeholder="Прізвище"></p><br>
            <input type="email" name="User_email" size="15" maxlength="35" required placeholder="Eлектронна скринька"></p><br>
            <input type="password" name="User_password" id="pass" size="15" maxlength="35" required placeholder="Пароль"></p><br>
            <input type="password" name="User_password" id="pass_repeat" size="15" maxlength="35" required placeholder="Повторіть пароль"></p><br>
            <input type="button"  id="button_registration" value="Зареєструватись" onclick="check_password_1()" >
        </form>

    </div>
</div>


</body>

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
    function check_password_1 () {
        var req = getXmlHttp()
        var pass = document.getElementById('pass')
        var pass_repeat = document.getElementById('pass_repeat')
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                if(req.status == 200  ) {
                    if (pass.value != pass_repeat.value) {
                        pass.value = "";
                        pass_repeat.value = "";
                        alert("Паролі не співпадають! Повторіть будь ласка ввід паролю. ")
                    }
                    else{
                        if(pass.value == ""){
                            alert("Пароль не введений! Введіть будь ласка пароль. ")
                            pass.value = "";
                            pass_repeat.value = "";
                        }
                        if(pass.value.length <6 && pass.value.length != 0) {
                            alert("Пароль занадто котокий, пароль повинен містити більше 6 знаків. Введіть будь ласка пароль. ");
                            pass.value = "";
                            pass_repeat.value = "";
                        }
                        if(pass.value.length >20) {
                            alert("Пароль занадто довгий, пароль повинен містити менше 20 знаків. Введіть будь ласка пароль. ");
                            pass.value = "";
                            pass_repeat.value = "";
                        }
                        if(pass.value.length <=20 && pass.value.length >=6 && pass.value != "") {
                            document.location.href = "index.php";
                        }
                    }
                }
            }
        }
        req.open('GET', 'ajax/vote.php', true);
        req.send(null);  // отослать запрос
    }
</script>

<?php
include 'User_class.php';
$user = new User();
$user->get_information_by_registration( $_POST["User_name"], $_POST["User_surename"], $_POST["User_email"], $_POST["User_password"]);
?>