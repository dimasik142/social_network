<?php
    include 'Friends_class.php';
    $friend = new friends();
    include 'html/searchNewFriendsHTML.html';
?>

<<<<<<< HEAD
=======
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Пошук друзів</title>
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
        <ul class="nav clearfix">
            <li><a href="index.php">Моя сторінка</a></li>
            <li><a href="friends.php">Друзі</a></li>
            <li><a href="dialogue.php">Повідомлення</a></li>
            <li><a href="settings.php">Налаштування</a></li>
            <li><a href="exit.php">Вихід</a></li>
        </ul>
    </header>
    <div class="main_window">
        <div class="light">
            <form>
                <span><input type="text" id="searchButton" class="search rounded" placeholder="Пошук друга..."></span>
                <input type="button"  value="Шукати" onclick="searchFriend()"></span>
            </form>
        </div>
        <div id = "newFriends">
            <?php
            $friend->getNewFriendsOnThePage($_COOKIE['email'],$_COOKIE['password']);
            ?>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    if(getCookie("email") == null || getCookie("password") == null)
        document.location.href = "index.php";

    function getXmlHttp(){
        var getXml;
        try {
            getXml = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                getXml = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                getXml = false;
            }
        }
        if (!getXml && typeof XMLHttpRequest!='undefined') {
            getXml = new XMLHttpRequest();
        }
        return getXml;
    }

    function searchFriend() {
        document.cookie = "nameAndSurename=" + document.getElementById("searchButton").value;
        var reg = getXmlHttp();
        reg.onreadystatechange = function() {
            if (reg.readyState == 4) {
                if(reg.status == 200) {
                    //alert(reg.responseText);
                    document.getElementById('newFriends').innerHTML = reg.responseText;
                    document.cookie = "nameAndSurename=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
                }
            }
        };
        reg.open('GET', 'ajax/searchNewFriends.php', true);//В роботі з safari використовувати false
        reg.send(null);
    }

    function addFriend(id) {
        document.cookie = "idAdd=" + id;
        var reg = getXmlHttp();
        reg.onreadystatechange = function() {
            if (reg.readyState == 4) {
                if(reg.status == 200) {
                    alert(reg.responseText);
                    document.cookie = "idAdd=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
                }
            }
        };
        reg.open('GET', 'ajax/addFriend.php', false);//В роботі з safari використовувати false
        reg.send(null);
    }


</script>
>>>>>>> 89b18c4c0d3c44e58a3b2b5a73eed3b746e55955
