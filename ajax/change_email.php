<?php

include '../User_class.php';
$user = new User();
$result = $user->change_email($_COOKIE['email'],$_COOKIE['new_email']);
if($result == 1){
    echo "Email успішно змінено";
}
else{
    echo "Виникла помилка в зміні email";
}
