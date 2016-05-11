<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 26.04.2016
 * Time: 0:29
 */
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
    header('Location: my_page.php');
}
else{
    require "registration.php";
}
?>

<script type="text/javascript">
    /*
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    window.onload=function chenck_registration() {
        if (getCookie("name_registration") == null && getCookie("surename_registration") == null
            && getCookie("email_registration") == null && getCookie("password_registration") == null){
            document.location.href = "my_page.php";
        }
        else{
            alert("Користувач з таким email вже зареєстрований!!!");
        }
    };
    //chenck_registration();
</script>
