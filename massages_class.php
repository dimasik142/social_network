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
    public $massengesArray = array(); // масив всіх повідомлень, які показуються в діалозі з користувачем
    private $massagesTimesArray = array(); // масив часу написання всіх повідомлень, які показуються в діалозі з користувачем
    private $massagesWriters = array(); // масив з відправниками всіх повідомлень, які показуються в діалозі з користувачем
    public $photosArray = array(
        "senderPhoto"=>"",
        "recipientPhoto"=>""
    ); // фото косристувачів для показу діалогу між двома користувачами
    public $newMassagesArray = array(); // масив только что написаних сообщений


    private function setPhotosArray ($idSender,$idRecipient){ // повертае фотографії користувачів які спілкуються
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
        $sql = "SELECT * FROM messages WHERE ( idSender IN ('{$idSender}','{$idRecipient}')) AND (idRecipient IN ('{$idSender}','{$idRecipient}')) ORDER BY time DESC ";
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
        $sql = "SELECT * FROM messages WHERE ( idSender IN ('{$idSender}','{$idRecipient}')) AND (idRecipient IN ('{$idSender}','{$idRecipient}')) ORDER BY time ASC ";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    array_push($this->massengesArray,$item['message']);
                    array_push($this->massagesTimesArray,$item['time']);
                    array_push($this->massagesWriters,$item['idSender']);
                endforeach;
            }
        }
    }

    function get25Massages($idSender,$idRecipient){
        $this->setPhotosArray($idSender,$idRecipient);
        $this->setMassengesArray($idSender,$idRecipient);
        $numberMassage = 0;
        $numberElementsArray = count($this->massengesArray);
        for ($i  = 0; $i < 25 ;$i++) {
            if ($idSender == $this->massagesWriters[$i])
                $picture = $this->photosArray['senderPhoto'];
            if ($idRecipient == $this->massagesWriters[$i])
                $picture = $this->photosArray['recipientPhoto'];
            if ($numberMassage == $numberElementsArray) {
                return true;
            } else {
                include 'html/getMassenge.html';
            }
            $numberMassage++;
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

    function writeMassage($idSender,$massage,$time){ // виводить на сторінку повідомлення щойно написане користуваччем
        $picture = $this->getPhoto($idSender);
        include 'html/getNewMassage.html';
    }

    function checkTheDialogueWithFriend($idRecipient,$email,$password){
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $idSender = $user->searchId($email, $password);
        $sql = "SELECT * FROM user_information WHERE id = '{$idSender}'";
        $dialogue = array();
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    $dialogue = explode(",",$item['dialogue']);
                    break;
                endforeach;
            }
        }
        foreach ($dialogue as $item):
            if($item == $idRecipient)
                return true;
        endforeach;

        return false;
    }

    function addUserToTheDialogue($idRecipient,$email,$password){
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $idSender = $user->searchId($email, $password);
        $sql = "SELECT * FROM user_information WHERE id = '{$idSender}'";
        $dialogueArray = array();
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    $dialogueArray = explode(",",$item['dialogue']);
                    break;
                endforeach;
            }
        }
        array_push($dialogueArray,$idRecipient );
        $dialogueString =  implode(",",$dialogueArray);
        $sql = "UPDATE user_information SET dialogue = '{$dialogueString}' WHERE id = '{$idSender}'";
        $connect->query($sql);
    }


}
?>

