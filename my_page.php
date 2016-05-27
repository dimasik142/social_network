<?php
include 'User_class.php';
$user = new User();
setcookie("email_log","");
setcookie("password_log","");
$user->get_information_from_db($_COOKIE["email"],$_COOKIE["password"]);
include 'html/myPageHTML.html';
?>

<script>

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    if(getCookie("email") == null && getCookie("password") == null)
        document.location.href = "login.php"
</script>


