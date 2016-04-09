<?php
class User
{
    private $name = "Олена";
    private $surename = "Телеш";
    private $sex = "girl";
    private $activity = true;
    private $city = "Київ";
    private $password = "pass";
    private $email = "email";

    private $date_of_birth = array(
        "data" => 5,
        "month" => "03",
        "year" => 1997
    );

    private $films = array(
        '0'=>"Spiderman",
        '1'=>"Superman",
        '2'=>"Aroneman",
        '3'=>"Speadman",
        '4'=>"Lolman"
    );

    function get_age(){
        return (2016 - $this->date_of_birth["year"]);
    }

    function get_information_by_registration($user_name,$user_surename,$user_email,$user_password){
        $this->name = $user_name;
        $this->surename = $user_surename;
        $this->email = $user_email;
        $this->password = $user_password;
    }

    function set_information(){
        echo'
        Місто:          '.$this->city.'           </p>
        Дата народження:    '.$this->date_of_birth["data"].'.'.$this->date_of_birth["month"].'.'.$this->date_of_birth["year"].' ( '.$this->get_age().'  років )                        </p>
        Улюблені фільми: ';
        $this->set_films();
    }

    function set_films(){
        echo "  ";
        for ($i = 0;$i<count($this->films);$i++){
            echo $this->films[$i];
            if ($i != count($this->films)-1)
                echo " , ";
        }
    }

    function set_name(){
        if ($this->activity)
            echo'<div class ="title">                              '.$this->name.' '.$this->surename.'                                                                                      		 Online</div>';
        else
            echo'<div class ="title">                              '.$this->name.' '.$this->surename.'                                                                                  			 </div>';
    }

    function set_photo(){
        $photo_file = "photo/lena3.jpg";
        $imsize = getimagesize($photo_file);
        $height = $imsize[1];
        $width = $imsize[0];
        if ($width < 250) {
            echo '<p id ="lena"><img src="photo/lena3.jpg" id ="photo_low_quality"></p>';
        }
        else
            echo '<p id ="lena"><img src="photo/lena3.jpg" id ="photo"></p>';
        }
    }
?>