<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Моя сторінка </title>
    <link rel="stylesheet" href="styles/registration1.css" />
</head>
<body>
<div class="container">
    <div class="main_window">
        Реєстрація </p><br>
        <form class="bl_form">
            <input type="text" name="User_name" size="15" maxlength="35" required placeholder="Iм'я"></p><br>
            <input type="text" name="User_surename" size="15" maxlength="35" required placeholder="Прізвище"></p><br>
            <input type="email" name="User_email" size="15" maxlength="35" required placeholder="Eлектронна скринька"></p><br>
            <input type="password" name="User_password" size="15" maxlength="35" required placeholder="Пароль"></p><br>
            <input type="password" name="User_password" size="15" maxlength="35" required placeholder="Повторіть пароль"></p><br>
            <input type="submit" value="Зареєструватися">
        </form>
    </div>
</div>
</body>

<?php
    include 'User_class.php';

    $user = new User();
   // Перевіка правильності вводу паролю

    if (($_POST["password"] == $_POST["password_repeat"]) and (strlen($_POST["password"]) >= 6 and strlen($_POST["password"]) <= 15))
        $user->get_information_by_registration( $_POST["User_name"], $_POST["User_surename"], $_POST["User_email"], $_POST["User_password"]);

    if (strlen($_POST["password"]) < 6 or strlen($_POST["password"]) > 15)
        echo "Пароль повинен містити від 6 до 20 символів";
    else
        echo "Пароль хороший";





    $user->get_information_by_registration( $_POST["User_name"], $_POST["User_surename"], $_POST["User_email"], $_POST["User_password"]);
?>