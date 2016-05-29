<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 19:38
 */
include 'massages_class.php';
$massange = new Messages();
$user = new User();

session_start();
	$newMassagesArray = array();
	$newMassagesTimeArray = array();
	$newMassagesIdSenderArray = array();
	$_SESSION['newMassagesArray'] =$newMassagesArray;
	$_SESSION['newMassagesTimeArray'] =$newMassagesTimeArray;
	$_SESSION['newMassagesIdSenderArray'] =$newMassagesIdSenderArray;
if($_COOKIE['idUserForDialogue']) {
	$idRecipient = $_COOKIE['idUserForDialogue'];
	if(!$massange->checkTheDialogueWithFriend($idRecipient,$_COOKIE['email'] ,$_COOKIE['password'] )){
		$massange->addUserToTheDialogue($idRecipient,$_COOKIE['email'] ,$_COOKIE['password']);
	}
}
if ($_COOKIE['dialogueWithFrientFromDialogue']){
	$idRecipient = $_COOKIE['dialogueWithFrientFromDialogue'];
}
if(!$idRecipient)
	echo "Виникла помилка з пошуком друга для діалогу";
$_SESSION['idRecipient'] = $idRecipient;

$idSender = $user->searchId($_COOKIE['email'],$_COOKIE['password']);
if($idRecipient)
	include "html/dialogueInsedeHTML.html";
else
	require 'my_page.php';

//написати можливіть додавання повідолень зверху в діалозі з користувачем

?>


