<?php

/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 16.05.16
 * Time: 20:09
 */

class Messages
{
    private $massengesArray = array();

    private function setMassengesArray($idSender,$idRecipient){
        include 'User_class.php';
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM messages WHERE ( idSender IN ('{$idSender}','{$idRecipient}')) AND (idRecipient IN ('{$idSender}','{$idRecipient}')) ORDER BY time ";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                return $res->fetch_all(MYSQLI_ASSOC);
            }
        }
    }

    function getMessenges ($idSender,$idRecipient){
        $mass = array();
        $mass = $this->setMassengesArray($idSender,$idRecipient);
        foreach($mass as $item):

            echo  $item['idSender']. " ->  " .$item['message']. "   " .$item['time'] . "<br>";
        endforeach;
    }
}

$massenge = new Messages();
$massenge->getMessenges(1,2);