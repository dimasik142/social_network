<?php
function connect_bd(){
    $connection = new mysqli('localhost', 'root', '', 'User');
    if ($connection->connect_error) {
        die('Connect Error :' . $connection->connect_error);
    }
    return $connection;
}

$connect = connect_bd();
$User_email = "dimasik1@mail.ua";
$User_password = "60adarep";
$sql = "SELECT * FROM Information";
if ($res = $connect->query($sql)) {
    if ($res->num_rows > 0) {
        $information_array = $res->fetch_all(MYSQLI_ASSOC);

        foreach($information_array as $item ):
            $email_1 = $item['email'];
            $password_1 = $item['password'];
            echo $email_1;
            echo $password_1;
            if(($email_1 == $User_email) and ($password_1 == $User_password)){
                //setcookie('email', $email);
                //setcookie('password', $password);
                echo '1';
                exit;
            }
            else
                echo '0';
        endforeach;
    }
}