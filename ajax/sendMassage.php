<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 00:38
 */
$usering = new User();
$connect = $usering->connect_bd_MAMP(); // MAMP
//$connect = $usering->connect_bd_OpenServer(); //OpenServer
echo  "22";
$connect->set_charset("utf8");
$idSender = $usering->searchId($_COOKIE['email'],$_COOKIE['password']);

$today = date("Y-m-d H:i:s");
date($today);
echo $today;
$sql = "INSERT INTO messages ('idSender', 'idRecipient', 'message' , 'time') VALUES ('{$idSender}', '{$idRecipient}', '{$_COOKIE['newMassage']}','{$today}')";
$connect->query($sql);
