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

    function getFriends(){
        $this->getFriendsFromDataBase("dimasik1@mail.ua","60adarep");
        
        
        
        
        echo $this->userFriends[1];
    }


}

$frend = new friends();
$frend->getFriends();