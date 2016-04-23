<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 22.04.2016
 * Time: 23:25
 */

function connect_bd(){
    $connection = new mysqli('localhost', 'root', '', 'User');
    if ($connection->connect_error) {
        die('Connect Error :' . $connection->connect_error);
    }
    return $connection;
}

$email_logining = $_COOKIE["email_log"];
$password_logining = $_COOKIE["password_log"];
$connect = connect_bd();
$result = false;
$sql = "SELECT * FROM Information";
if ($res = $connect->query($sql)) {
    if ($res->num_rows > 0) {
        $information_array = $res->fetch_all(MYSQLI_ASSOC);
        foreach($information_array as $item ):
            $email = $item['email'];
            $password = $item['password'];
            if(($email == $email_logining) and ($password == $password_logining)){
                setcookie('email', $email);
                setcookie('password', $password);
                $result = true;
            }
        endforeach;
        if($result == false){
            require('login.php');
        }
    }
}
?>

<script type="text/javascript">

    function getCookie(name) {
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





