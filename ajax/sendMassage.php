<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 00:38
 */
session_start();
include '../User_class.php';
$user = new User();
$connect = $user->connect_bd_MAMP(); // MAMP
//$connect = $usering->connect_bd_OpenServer(); //OpenServer
$connect->set_charset("utf8");
$idSender = $user->searchId($_COOKIE['email'],$_COOKIE['password']);
$idRecipient = $_SESSION['idRecipient'];
//echo $idRecipient;
$today = date("Y-m-d H:i");
$today['12'] = $today['12'] + 1;
ini_set('date.timezone' , "Europe/Kiev");
date($today);
echo $today;
$sql = "INSERT INTO messages VALUES ('{$idSender}', '{$idRecipient}', '{$_COOKIE['newMassage']}','{$today}')";
$connect->query($sql);
