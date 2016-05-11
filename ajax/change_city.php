<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 11.05.16
 * Time: 02:36
 */

include '../User_class.php';
$user = new User();
$user->change_city($_COOKIE['new_city'],$_COOKIE['email'],$_COOKIE['password']);
echo "Місто змінене";
