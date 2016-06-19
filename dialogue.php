<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 17.05.16
 * Time: 19:32
 */
    include 'massages_class.php';
    $massage = new Messages();
    include "html/dialogueHTML.html";
?>

<script>
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    getCookie("idUserForDialogue");
    document.cookie = "idUserForDialogue" + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT"; // функція видалення кука
    document.cookie = "dialogueWithFrientFromDialogue" + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT"; // функція видалення кука

</script>


