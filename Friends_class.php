<?php

/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 13.05.16
 * Time: 18:36
 */
include 'User_class.php';

class friends
{
    private $userFriends = array();
    
    private function getFriendsFromDataBase($email,$password){
        $user = new User();
        $friendsArrayFromDB = "";
        $connect =  $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer

        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information";
        $id = $user->searchId($email,$password);
        if( $id == 0 )
            return false;

        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($id == $item['id']) {
                        $friendsArrayFromDB = $item['friends'];
                        break;
                    }
                endforeach;
            }
        }
        $this->userFriends = explode(",", $friendsArrayFromDB);
        return true;
    }

    private function getInformationAboutFriend($id){
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($id == $item['id']) {
                        return array(
                            'id' => $item['id'],
                            'name' => $item['user_name'],
                            'surename' => $item['surename'],
                            'birthday' => $item['birthday'],
                            'city' => $item['city'],
                            'photo' => $item['photo']
                        );
                    }
                endforeach;
            }
        }
    }

    function getFriendsOnThePage($email,$password){
        $this->getFriendsFromDataBase($email,$password);
        if($this->userFriends[0] != "") {
            foreach ($this->userFriends as $item):
                $notPhoto = "photo/notPhoto.jpg";
                $mass = $this->getInformationAboutFriend($item);
                include 'html/getFriend.html';
            endforeach;
        }
    }

    private function checkTheFriends($id){
        foreach ($this->userFriends as $item):
            if($item == $id)
                return false;
        endforeach;
        return true;
    }

    function getNewFriendsOnThePage($email,$password){
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information";
        //$this->getFriendsFromDataBase($email,$password);
        $numberFriendsOnthePage = 0;
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($this->checkTheFriends($item)) {
                        if($numberFriendsOnthePage == 30)
                            return true;
                        $notPhoto = "photo/notPhoto.jpg";
                        $mass = $this->getInformationAboutFriend($item['id']);
                        include 'html/searchNewFriends.html';
                        $numberFriendsOnthePage++;
                    }
                endforeach;
            }
        }
    }

    private function checkInformationAboutFriend($bdName,$bdSurename,$inputName,$inputSurename){
        if($bdName == $inputName || $bdName == $inputSurename)
            return true;
        if($bdSurename == $inputName || $bdSurename == $inputSurename)
            return true;
        return false;
    }

    function searchSriendAsNameOrSurename($nameString,$email,$password){// функція для пошуку друзів за іменем чи фамілією
        $mass = array();
        $mass = explode(" ",$nameString);
        $nameOrSurenameArray = array();
        foreach ($mass as $item):
            if ($item != "")
                array_push($nameOrSurenameArray, $item);
        endforeach;
        $user = new User();
        $connect = $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql = "SELECT * FROM user_information";
        $this->getFriendsFromDataBase($email,$password);
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($this->checkInformationAboutFriend($item['user_name'],$item['surename'] ,$nameOrSurenameArray[0] , $nameOrSurenameArray[1])){
                        $notPhoto = "photo/notPhoto.jpg";
                        $mass = $this->getInformationAboutFriend($item['id']);
                        include 'html/searchNewFriends.html';
                    }
                endforeach;
            }
        }
    }

    function addFriend($idFriend,$email,$password){
        //include 'User_class.php';
        $user = new User();
        $connect =  $user->connect_bd_MAMP(); // MAMP
        //$connect = $user->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $userId = $user->searchId($email,$password);
        if($idFriend == $userId)
            return false;
        $friendsArray = array();
        $sql = "SELECT * FROM user_information";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($userId == $item['id']) {
                        $friendsArray = explode(",", $item['friends']);
                        foreach ($friendsArray as $i):
                            if($i == $idFriend )
                                return false;
                        endforeach;
                        array_push($friendsArray,$idFriend );
                    }
                endforeach;
            };
        }
        if(count($friendsArray) == 1){
            $friendsString = implode("",$friendsArray);
            $sql = "UPDATE user_information SET friends = '{$friendsString}' WHERE id = '{$userId}'";
            $connect->query($sql);
            return true;
        }
        $friendsString = implode(",",$friendsArray);
        $sql = "UPDATE user_information SET friends = '{$friendsString}' WHERE id = '{$userId}'";
        $connect->query($sql);
        return true;
    }

}











