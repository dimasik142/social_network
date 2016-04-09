<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Реєстрація </title>
    <link rel="stylesheet" href="styles/index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" ></script>
</head>
<body>
    Введіть імя:
    <input type="text" name="username" size="15" maxlength="30" required>
    Введыть прізвище:
    <input type="text" name="ConfirmPassword" size="15" maxlength="30" required>
    Ведіть емейл
    <input type="email" name="ConfirmPassword" size="15" maxlength="30" required>
    Введіть пароль
    <input type="password" name="ConfirmPassword" size="15" maxlength="30" required>
    повторіть пароль
    <input type="password" name="ConfirmPassword" size="15" maxlength="30" required>

    <input type="image" src="photo/play.png">
</body>

<?php
    echo $_POST["username"];
?>