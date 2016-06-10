<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 10.06.16
 * Time: 02:20
 */
include "../Friends_class.php";
$friend = new friends();
if($friend->addFriend($_COOKIE['idAdd'],$_COOKIE['email'],$_COOKIE['password']))
    echo "Тепер цей користувач є в вас в друзях";
else
    echo "Цей користувач вже є в вас в друзях";
