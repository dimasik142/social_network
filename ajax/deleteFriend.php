<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 15.05.16
 * Time: 12:14
 */

include '../User_class.php';
$user = new User();
$connect =  $user->connect_bd_MAMP(); // MAMP
//$connect = $user->connect_bd_OpenServer(); //OpenServer
$connect->set_charset("utf8");
$userId = $user->searchId($_COOKIE['email'],$_COOKIE['password']);
$friendsArray = array();
$sql = "SELECT * FROM user_information";
if ($res = $connect->query($sql)) {
    if ($res->num_rows > 0) {
        $information_array = $res->fetch_all(MYSQLI_ASSOC);
        foreach($information_array as $item):
            if($userId == $item['id']) {
                $friendsArray = explode(",", $item['friends']);
                $friendsArray = array_flip($friendsArray); //Меняем местами ключи и значения
                unset ($friendsArray[$_COOKIE['idDelete']]) ; //Удаляем элемент массива
                $friendsArray = array_flip($friendsArray); //Меняем местами ключи и значения
            }
        endforeach;
    }
}
$friendsString = implode(",",$friendsArray);
$sql = "UPDATE user_information SET friends = '{$friendsString}' WHERE id = '{$userId}'";
$connect->query($sql);









