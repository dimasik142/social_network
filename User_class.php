<?php
class User
{
    private $id = 0;
    private $name = "Олена";
    private $surename = "Телеш";
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
        '0' => "Spiderman",
        '1' => "Superman",
        '2' => "Aroneman",
        '3' => "Speadman",
        '4' => "Lolman"
    );

    function get_age()
    {
        return (2016 - $this->date_of_birth["year"]);
    }

    function set_information()
    {
        echo '
        Місто:          ' . $this->city . '           </p>
        Дата народження:    ' . $this->date_of_birth["data"] . '.' . $this->date_of_birth["month"] . '.' . $this->date_of_birth["year"] . ' ( ' . $this->get_age() . '  років )                        </p>
        Улюблені фільми: ';
        $this->set_films();
    }

    function set_films()
    {
        echo "  ";
        for ($i = 0; $i < count($this->films); $i++) {
            echo $this->films[$i];
            if ($i != count($this->films) - 1)
                echo " , ";
        }
    }

    function set_name()
    {
        if ($this->activity)
            echo '<div class ="title">                              ' . $this->name . ' ' . $this->surename . '                                                                                      		 Online</div>';
        else
            echo '<div class ="title">                              ' . $this->name . ' ' . $this->surename . '                                                                                  			 </div>';
    }

    function set_photo()
    {
        $photo_file = "photo/lena3.jpg";
        $imsize = getimagesize($photo_file);
        $height = $imsize[1];
        $width = $imsize[0];
        if ($width < 250) {
            echo '<p id ="lena"><img src="photo/lena3.jpg" id ="photo_low_quality"></p>';
        } else {
            echo '<p id ="lena"><img src="photo/lena3.jpg" id ="photo"></p>';
        }
    }

    function connect_bd_OpenServer(){
        $connection = new mysqli('localhost', 'root', '', 'social_network');
        if ($connection->connect_error) {
            die('Connect Error :' . $connection->connect_error);
        }
        return $connection;
    }

    function connect_bd_MAMP(){
        $hostname = "localhost";
        $username="root";
        $password="root";
        $db="social_network";
        $connection = mysqli_connect(
            $hostname,
            $username,
            $password,
            $db
        ) or die('Error connecting to databse');
        return $connection;
    }

    private function get_information_from_db1($email,$password){
        $connect = $this->connect_bd();
        $sql = "SELECT * FROM Information";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if(($email == $item['email']) && ($password == $item['password'])) {
                        $this->name = $item['name'];
                        $this->surename = $item['surename'];
                        $this->sity = $item['sity'];
                        $this->email = $item['email'];
                        $this->password = $item['password'];
                        return true;
                    }
                endforeach;
            }
        }
    }

    private function set_information_to_database1($name,$surename,$email,$password){
        $connect = connect_bd();
        $insert_sql = "INSERT INTO Information (name, surename, email, password)" ."VALUES('{$name}', '{$surename}', '{$email}', '{$password}');";
        $connect->query($insert_sql);
    }

    private function search_email_in_databese1($email){
        $connect = $this->connect_bd();
        $sql = "SELECT * FROM Information";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if ($email == $item['email'])
                        return 0;
                endforeach;
            }
        }
        return 1;
    }

    function get_information_from_db($email,$password){

        //$connect = $this->connect_bd_MAMP(); // MAMP
        $connect = $this->connect_bd_OpenServer(); //OpenServer
        $sql_login = "SELECT * FROM logining_data";

        $id = 0;
        if ($res = $connect->query($sql_login)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if(($email == $item['email']) && ($password == $item['password'])) {
                        $id = $item['id'];
                        break;
                    }
                endforeach;
            }
        }
        if($id == 0)
            return false;
        $sql_information = "SELECT * FROM user_information";
        $connect->set_charset("utf8");
        if ($res = $connect->query($sql_information)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($id == $item['id']) {
                        //echo  $item['name'];
                        $this->name = $item['user_name'];
                        $this->surename = $item['surename'];
                        $this->city = $item['city'];
                        $this->id = $item['id'];
                        // день народження
                        // фільми
                        return true;
                    }
                endforeach;
            }
        }
    }

    function set_information_to_database($name,$surename,$email,$password){
        //$connect = $this->connect_bd_MAMP(); // MAMP
        $connect = $this->connect_bd_OpenServer(); //OpenServer

        $connect->set_charset("utf8");
        $insert_sql_info = "INSERT INTO user_information (user_name, surename)" ."VALUES('{$name}', '{$surename}');";
        $insert_sql_login = "INSERT INTO logining_data (email, password)" ."VALUES('{$email}', '{$password}');";
        $connect->query($insert_sql_info);
        $connect->query($insert_sql_login);
    }

    function search_email_in_databese($email){
        //$connect = $this->connect_bd_MAMP(); // MAMP
        $connect = $this->connect_bd_OpenServer(); //OpenServer
        $sql = "SELECT * FROM logining_data";
        $connect->set_charset("utf8");
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if ($email == $item['email'])
                        return 0;
                endforeach;
            }
        }
        return 1;
    }

    function change_password($email,$new_password){
        //$connect =  $this->connect_bd_MAMP(); // MAMP
        $connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");

        if ($this->search_email_in_databese($email) == 0) {
            $sql = "UPDATE logining_data SET password = '{$new_password}' WHERE email = '{$email}'";
            $connect->query($sql);
            return 1;
        }
        else
            return 0;
    }





}
?>