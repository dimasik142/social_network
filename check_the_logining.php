<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 22.04.2016
 * Time: 23:25
 */

include 'User_class.php';
$user = new User();
//header('Location: my_page.php');
$email_logining = $_COOKIE["email_log"];
$password_logining = $_COOKIE["password_log"];
if($user->checkEmailAndPassword($email_logining,$password_logining)){
    setcookie("email", $email_logining,time()+3600000);
    setcookie("password", $password_logining,time()+3600000);
    //header('Location: my_page.php');
    require 'loginingPage.php';

} else{
    setcookie("email","");
    setcookie("password","");
    echo " нема користувача з таким емайл і пароль";
    require 'login.php';
}
?>






