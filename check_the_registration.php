<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 26.04.2016
 * Time: 0:29
 */

header('Location: my_page.php');
setcookie("email", $_COOKIE["email_registration"]);
setcookie("password", $_COOKIE["password_registration"]);
include 'User_class.php';
$user = new User();
if($user->search_email_in_database($_COOKIE["email_registration"]) == 1) {
    $user->set_information_to_database($_COOKIE["name_registration"], $_COOKIE["surename_registration"],$_COOKIE["email_registration"], $_COOKIE["password_registration"]);
    setcookie("email", $_COOKIE["email_registration"]);
    setcookie("password", $_COOKIE["password_registration"]);
    setcookie("name_registration","");
    setcookie("email_registration","");
    setcookie("surename_registration","");
    setcookie("password_registration","");
}
else{
    require "registration.php";
}
?>
