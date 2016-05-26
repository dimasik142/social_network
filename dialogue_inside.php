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
include "html/dialogueInsedeHTML.html";

//продовжити написатння діалогу з користувачем зі сторінки друзів







