<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 02.06.16
 * Time: 22:20
 */
include "../Friends_class.php";
$friend = new friends();
//echo "1lol";
$friend->searchSriendAsNameOrSurename($_COOKIE['nameAndSurename'],$_COOKIE['email'],$_COOKIE['password']);
