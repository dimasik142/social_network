<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 11.05.16
 * Time: 03:27
 */

include '../User_class.php';
$user = new User();
$user->changeNameAndSurename($_COOKIE['name'],$_COOKIE['surename'],$_COOKIE['email'],$_COOKIE['password']);

