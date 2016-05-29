<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 00:38
 */

if($_COOKIE['newMassage'] != "") {
    session_start();
    include '../massages_class.php';
    $user = new User();
    $massage = new Messages();
    $connect = $user->connect_bd_MAMP(); // MAMP
    //$connect = $user->connect_bd_OpenServer(); //OpenServer
    $connect->set_charset("utf8");
    $idSender = $user->searchId($_COOKIE['email'], $_COOKIE['password']);
    $idRecipient = $_SESSION['idRecipient'];
    $today = date("Y-m-d H:i:s");
    if($today['11'] == "2" && $today['12'] == "3"){
        $today['12'] = 0;
        $today['11'] = 0;
    }
    else
        $today['12'] = $today['12'] + 1;
    ini_set('date.timezone', "Europe/Kiev");
    date($today);
    $sql = "INSERT INTO messages VALUES ('{$idSender}', '{$idRecipient}', '{$_COOKIE['newMassage']}','{$today}')";
    $connect->query($sql);
    array_push($_SESSION['newMassagesArray'], $_COOKIE['newMassage']);
    array_push($_SESSION['newMassagesTimeArray'], $today);
    array_push($_SESSION['newMassagesIdSenderArray'], $idSender);
    for ($i = 0;$i<count($_SESSION['newMassagesArray']);$i++){
        $massage->writeMassage($_SESSION['newMassagesIdSenderArray'][$i], $_SESSION['newMassagesArray'][$i],$_SESSION['newMassagesTimeArray'][$i] );
    }

}