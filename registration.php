<!DOCTYPE html>
<html >
<head>
    <script src="js/registrationJS.js" type="text/javascript" ></script>
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

