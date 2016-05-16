<?php
class User
{
    private $id = 0;
    private $name = "Олена";
    private $surename = "Телеш";
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


    function get_age(){
        // Вивід віку
        return (2016 - $this->date_of_birth["year"]);
    }

    function set_information()
    {
        // Вивід основної інформації про користувача
        echo '
        Місто:          ' . $this->city . '           </p>
        Дата народження:    ' . $this->date_of_birth["data"] . '.' . $this->date_of_birth["month"] . '.' . $this->date_of_birth["year"] . ' ( ' . $this->get_age() . '  років )                        </p>
        Улюблені фільми: ';
        $this->set_films();
    }

    function set_films()
    {
        // Вивід фільмів
        echo "  ";
        for ($i = 0; $i < count($this->films); $i++) {
            echo $this->films[$i];
            if ($i != count($this->films) - 1)
                echo " , ";
        }
    }

    function set_name()
    {
        echo '<div class ="title">                        ' . $this->name . ' ' . $this->surename . '                                                			 </div>';
    }

    function set_photo($email,$password)
    {
        $connect =  $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $id = $this->searchId($email,$password);
        $sql = "SELECT * FROM user_information";
        if ($res = $connect->query($sql)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if($item["id"] == $id) {
                        return $item['photo'];
                    }
                endforeach;
            }
        }
    }

    function connect_bd_OpenServer(){
        // Зєданання з базою данних на Windows
        $connection = new mysqli('localhost', 'root', '', 'social_network');
        if ($connection->connect_error) {
            die('Connect Error :' . $connection->connect_error);
        }
        return $connection;
    }

    function connect_bd_MAMP(){
        // Зєданання з базою данних на MAC OS
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

    function get_information_from_db($email,$password){
        // Зчитування інформації з бази даних
        $connect = $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
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

    function searchId($email,$password){
        $connect =  $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $sql_login = "SELECT * FROM logining_data";
        if ($res = $connect->query($sql_login)) {
            if ($res->num_rows > 0) {
                $information_array = $res->fetch_all(MYSQLI_ASSOC);
                foreach($information_array as $item):
                    if(($email == $item['email']) && ($password == $item['password'])) {
                        return $item['id'];
                    }
                endforeach;
            }
        }
        return 0;
    }

    function set_information_to_database($name,$surename,$email,$password){
        // Дадавання користувача до бази даних
        $connect = $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $insert_sql_info = "INSERT INTO user_information (user_name, surename)" ."VALUES('{$name}', '{$surename}');";
        $insert_sql_login = "INSERT INTO logining_data (email, password)" ."VALUES('{$email}', '{$password}');";
        $connect->query($insert_sql_info);
        $connect->query($insert_sql_login);
    }

    function search_email_in_database($email){
        // Перевірка користувача по вказаному Email
        $connect = $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
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
        // Функція зміни паролю користувача
        $connect =  $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        if ($this->search_email_in_database($email) == 0) {
            $sql = "UPDATE logining_data SET password = '{$new_password}' WHERE email = '{$email}'";
            $connect->query($sql);
            return 1;
        }
        else
            return 0;
    }

    function change_email($email,$new_email){ // Функція зміни email користувача
        $connect =  $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        if ($this->search_email_in_database($new_email) == 1) {
            $sql = "UPDATE logining_data SET email = '{$new_email}' WHERE email = '{$email}'";
            $connect->query($sql);
            return 1;
        }
        else
            return 0;
    }

    function change_city($city,$email,$password){ // Функція зміни email користувача
        $connect =  $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $id = $this->searchId($email,$password);
        $sql = "UPDATE user_information SET city = '{$city}' WHERE id = '{$id}'";
        $connect->query($sql);
    }

    function changeNameAndSurename($name,$surename,$email,$password){
        $connect =  $this->connect_bd_MAMP(); // MAMP
        //$connect = $this->connect_bd_OpenServer(); //OpenServer
        $connect->set_charset("utf8");
        $id = $this->searchId($email,$password);
        if($name != ""){
            $sql = "UPDATE user_information SET user_name = '{$name}' WHERE id = '{$id}'";
            $connect->query($sql);
            echo "Імя змінене  ";
        }
        if($surename != ""){
            $sql = "UPDATE user_information SET surename = '{$surename}' WHERE id = '{$id}'";
            $connect->query($sql);
            echo "Фамілія змінена";
        }
        return true;
    }
}
?>