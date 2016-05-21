<?php
include 'User_class.php';
$user = new User();
if(isset($_POST['enter'])){
    $e_login = $_POST['e_login'];
    $e_password = $_POST['e_password'];
    $result = false;
    $user->connect_bd_MAMP();
    $sql = "SELECT * FROM logining_data WHERE email = '$e_login'";
    if ($res = $connect->query($sql)) {
        if ($res->num_rows > 0) {
            $information_array = $res->fetch_all(MYSQLI_ASSOC);
            foreach($information_array as $item):
                if($item['password'] == $e_password){
                    $result = true;
                }
            endforeach;
        }
    };
    if ($result)
        echo "true";
    else
        echo "false";
}

?>
        <form class="bl_form">
            <input type="email" name="e_login" value = "dimasik1@mail.ua" size="15" maxlength="40" required placeholder="Eлектронна скринька"></p><br>
            <input type="password" id="e_password" value = "" size="15" maxlength="40" required placeholder="Пароль"></p><br>
            <input type="button" class="login_button" name = "enter" value="Вхід"></p><br>
            <input type="button" class="other_button"  onclick='location.href="registration.php"' value="Реєстрація" >
        </form>

