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
                $mass = $this->getInformationAboutFriend($item);
                include 'html/getFriend.html';
            endforeach;
        }
    }

    
}












