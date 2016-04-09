<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 02.04.2016
 * Time: 12:58
 */
class User
{
    private $name = "Олена";
    private $surename = "Телеш";
    private $sex = "girl";
    private $activity = true;
    private $city = "Київ";

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

<?php
    $user = new User();
?>
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Моя сторінка </title>
    <link rel="stylesheet" href="styles/index.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" ></script>

    <script type="text/javascript">
        $(document).ready(function(){
            var touch = $('#touch-menu');
            var menu = $('.nav');

            $(touch).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
            $(window).resize(function(){
                var wid = $(window).width();
                if(wid > 760 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
        $(document).ready(function(){

        });
    </script>

</head>
<body>
<div class="container">
    <header>
        <a href="#" id="touch-menu">Меню</a>
        <nav>
            <ul class="nav clearfix">
                <li><a href="index.php">Моя сторінка</a></li>
                <li><a href="biografi.php">Друзі</a></li>
                <li><a href="mgu.php">Повідомлення</a></li>
                <li><a href="photo.php">Спільноти</a></li>
                <li><a href="bibliotek.php">Новини</a></li>
                <li><a href="forum.php">Налаштування</a></li>
            </ul>
        </nav>
    </header>
    <div class="main_window">
         <?php
            $user->set_name();
        ?>
        <div>
            <div class ="div_photo">
                <?php
                    $user->set_photo();
                ?>
            </div>
            <div class="information">
                <?php
                    $user->set_information();
                ?>
            </div>
        </div>
    </div>
    <button type="submit" class ="button_play">
        <image src="photo/play.png">
    </button>

</div>
</body>




