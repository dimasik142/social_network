<?php

include '../User_class.php';
$user = new User();
$result = $user->change_password($_COOKIE['email'],$_COOKIE['new_password']);
if($result == 1){
    echo "Пароль успішно змінено";
}
else{
    echo "Виникла помилка в зміні паролю";
}
