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
    <input type="text" name="User_name" size="15" maxlength="30" required>
    Введыть прізвище:
    <input type="text" name="User_surename" size="15" maxlength="30" required>
    Ведіть емейл
    <input type="email" name="User_email" size="15" maxlength="30" required>
    Введіть пароль
    <input type="password" name="User_password" size="15" maxlength="30" required>
    Повторіть пароль
    <input type="password_repeat" name="User_password" size="15" maxlength="30" required>
    <a href="index.php"><input type="image" src="photo/play.png"></a>
</body>

<?php
    include 'User_class.php';

    $user = new User();
   // Перевіка правильності вводу паролю

    if ($_POST["password"] == $_POST["password_repeat"])
       echo "Паролі співпадають";
    else
        echo" Паролі не співпадають";
    if (strlen($_POST["password"]) < 6 or strlen($_POST["password"]) > 15)
        echo "Пароль повинен містити від 6 до 20 символів";
    else
        echo "Пароль хороший";
    




    $user->get_information_by_registration( $_POST["User_name"], $_POST["User_surename"], $_POST["User_email"], $_POST["User_password"]);
?>