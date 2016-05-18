<?php

/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 16.05.16
 * Time: 20:09
 */
include 'User_class.php';
class Messages
{
    private $massengesArray = array(); // масив повідомлень, для відтворення їх на сторінку
    public $photosArray = array(
        "senderPhoto"=>"",
        "recipientPhoto"=>""
    ); // для показу діалогу між двома користувачами

    function setPhotosArray ($idSender,$idRecipient){ // повертае фотографії користувачів які спілкуються
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($item['id'] == $idSender){
                        $this->photosArray['senderPhoto'] = $item['photo'];
                    };
                    if($item['id'] == $idRecipient){
                        $this->photosArray['recipientPhoto'] = $item['photo'];
                    }
                endforeach;
            };
        };
    }

    private function getPhoto($id){ // повертає фотографію користувача за id
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information WHERE id = '{$id}'";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach ($information_array as $item):
                    return $item['photo'];
                endforeach;
            };
        };
    }

    private function getName($id){
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information WHERE id = '{$id}'";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach ($information_array as $item):
                    return array(
                        "name" =>$item['user_name'],
                        "surename" => $item['surename']);
                endforeach;
            };
        };
    }

    function getLastMassage($idSender,$idRecipient){ //  виведення останнього повідомлення з заданим користувачем
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM messages WHERE ( idSender IN ('{$idSender}','{$idRecipient}')) AND (idRecipient IN ('{$idSender}','{$idRecipient}')) ORDER BY time ";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach ($information_array as $item):
                    return array(
                        "massage" => $item['message'],
                        "time" => $item['time']);
                endforeach;
            }
        }
    }

    private function setMassengesArray($idSender,$idRecipient){ // створення масиву повідомлень заданих користувачів
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

    function getMessengesList ($email,$password){ // виведення діалогів на сторінці dialogue.php
        $user = new User();
        $user->setDialogueArray($email,$password);
        $userId = $user->searchId($email,$password);
        foreach($user->dialogueArray as $item):
            $nameArray = $this->getName($item);
            $lastMassage = $this->getLastMassage($userId,$item);
           include 'html/getDialog.html';
        endforeach;
    }


}
//$masage = new Messages();
//// echo $masage->getLastMassage(1,2);
