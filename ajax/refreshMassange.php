<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 28.05.16
 * Time: 20:20
 */
include "../massages_class.php";
$massage = new Messages();
$user = new User();
session_start();
$idSender = $user->searchId($_COOKIE['email'],$_COOKIE['password']);
if($_COOKIE['dialogueWithFrientFromDialogue'])
    $idRecipient = $_COOKIE['dialogueWithFrientFromDialogue'];
if($_COOKIE['idUserForDialogue'])
    $idRecipient = $_COOKIE['idUserForDialogue'];
$massage->searchNewMassangeFromFriend($idSender ,$idRecipient ,$_SESSION['lastMassagesTime'] );
for ($i = 0;$i<count($_SESSION['newMassagesArray']);$i++){
    $massage->writeMassage($_SESSION['newMassagesIdSenderArray'][$i], $_SESSION['newMassagesArray'][$i], $_SESSION['newMassagesTimeArray'][$i] );
    echo "<script> scrollBottom(); </script>";
}









