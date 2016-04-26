<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 26.04.2016
 * Time: 0:29
 */
function connect_bd(){
    $connection = new mysqli('localhost', 'root', '', 'User');
    if ($connection->connect_error) {
        die('Connect Error :' . $connection->connect_error);
    }
    return $connection;
}

$connect = connect_bd();
$result = false;
$sql = "SELECT * FROM Information";
if ($res = $connect->query($sql)) {
    if ($res->num_rows > 0) {
        $information_array = $res->fetch_all(MYSQLI_ASSOC);
        foreach($information_array as $item ):
            $email = $item['email'];
            if(($email == $_COOKIE["email_registration"])){
                $result = true;
                //
            }
        endforeach;
        if($result == false){
            include 'User_class.php';
            $user = new User();
            if($user->search_email_in_databese($_COOKIE["email_registration"]) == 1) {
                $user->set_information_to_database($_COOKIE["name_registration"], $_COOKIE["surename_registration"],
                    $_COOKIE["email_registration"], $_COOKIE["password_registration"]);
                setcookie("email", $_COOKIE["email_registration"]);
                setcookie("password", $_COOKIE["password_registration"]);
                setcookie("name_registration", "");
                setcookie("email_registration", "");
                setcookie("surename_registration", "");
                setcookie("password_registration", "");
            }
        }
        else{
            require "registration.php";
        }
    }
}
?>
<script>
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    if (getCookie("name_registration") == null && getCookie("surename_registration") == null
    && getCookie("email_registration") == null&& getCookie("password_registration") == null){
        document.location.href = "my_page.php";
    }
    else{
        alert("Користувач з таким email вже зареєстрований!!!");
    }
</script>
