<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Мої друзі</title>
    <link rel="stylesheet" href="styles/index1.css" />
    <link rel="stylesheet" href="styles/friends.css" />
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
                <li>

                </li>
                <li><a href="biografi.php">Друзі</a></li>
                <li><a href="mgu.php">Повідомлення</a></li>
                <li><a href="photo.php">Спільноти</a></li>
                <li><a href="bibliotek.php">Новини</a></li>
                <li><a href="forum.php">Налаштування</a></li>
            </ul>
        </nav>
    </header>
    <div class="main_window">

        <div id="friend_block">

            <div id="picture">

            </div>

            <div id="activity">
                <form>
                    <button id="border"><img src="photo\remove_button.png" alt="Удолить" > </button>
                    <a href="my_page.php"><img src="photo/mail.png" width="62" height="60" alt="Написать"></a>
                    <button id="border"><img src="photo\play_button.png" alt="Смотреть" > </button>
                </form>
            </div>

        </div>

    </div>

</div>
</body>