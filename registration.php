<script >
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    if (getCookie("email") != null || getCookie("password" != null))
        alert("Для того щоб зареєструватись потрібно вийти зі своєї сторінки!!!");
        document.location.href = "my_page.php"
</script>

<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Реєстрація </title>
    <link rel="stylesheet" href="styles/registration.css" />
</head>
<body>
<div class="container">
    <div class="main_window">
        <p> Реєстрація </p><br>
        <form class="bl_form">
            <input type="text" name="User_name"id ="name" size="15" maxlength="35" required placeholder="Iм'я"></p><br>
            <input type="text" name="User_surename" id ="surename" size="15" maxlength="35" required placeholder="Прізвище"></p><br>
            <input type="email" name="User_email" id="email" size="15" maxlength="35" required placeholder="Eлектронна скринька"></p><br>
            <input type="password" name="User_password" id="pass" size="15" maxlength="35" required placeholder="Пароль"></p><br>
            <input type="password" name="User_password" id="pass_repeat" size="15" maxlength="35" required placeholder="Повторіть пароль"></p><br>
            <input type="button"  id="button_registration" value="Зареєструватись" onclick="check_password()" >
        </form>
    </div>
</div>
</body>

<script type="text/javascript">
    function check_password() {
        var pass = document.getElementById('pass');
        var pass_repeat = document.getElementById('pass_repeat');

        if (pass.value != pass_repeat.value) {
            pass.value = "";
            pass_repeat.value = "";
            alert("Паролі не співпадають! Повторіть будь ласка ввід паролю. ")
        }
        else{
            if(pass.value == ""){
                alert("Пароль не введений! Введіть будь ласка пароль. ");
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
                document.location.href = "check_the_registration.php";
                document.cookie = "name_registration =" + document.getElementById('name').value ;
                document.cookie = "surename_registration =" + document.getElementById("surename").value;
                document.cookie = "email_registration =" + document.getElementById('email').value ;
                document.cookie = "password_registration =" + document.getElementById("pass").value;
            }
        }
    }
</script>
