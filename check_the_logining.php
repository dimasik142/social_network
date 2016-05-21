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
    setcookie("email", $email_logining);
    setcookie("password", $password_logining);
    //header('Location: my_page.php');
    require 'loginingPage.php';

} else{
    echo " нема користувача з таким емайл і пароль";
    require 'login.php';
}
?>

<script type="text/javascript">
    /*function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    function get_home_page(){
        if((getCookie("email_log") == getCookie("email")) && (getCookie("password_log") == getCookie("password"))) {
            if ((getCookie("email_log") != "") && (getCookie("password_log") != "")) {
                document.location.href = "my_page.php";
            }
        }
        else
            alert("Користувач з таким логіном і паролем не зареєстрований. Перевірте правильність вводу даних, або зареєструйтесь. ");
    }
    get_home_page();
</script>





