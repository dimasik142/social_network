/**
 * Created by Home on 01.05.2016.
 */
/*
if (document.getElementsByName('new_password').value == document.getElementsByName('new_password_repeat').value) {

    if (1) {
        // alert("222");
    }
    else {
        alert("Паролі не співпадають!!! Повторить будь ласка ввід");
        document.getElementsByName('new_password').value = "";
        document.getElementsByName('new_password_repeat').value = "";
    }
};

<?php

    include '../User_class.php';
$user = new User();
$result = $user->change_password($_COOKIE['email'],$_POST['new_password']);
if($result == 1){
    //echo "<script type='text/javascript'> alert('1'); </script>";
    echo "1";
}
else{
    echo "0";
    //echo "<script type='text/javascript'> alert('0'); </script>";
}
?>