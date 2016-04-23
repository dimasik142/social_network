<?php
setcookie("password","1111adarep");
setcookie("email","dimasik1@mail.ua");
if ($_COOKIE['name'] !="" and $_COOKIE['password']!="")
    require ('login.php');
else
    require ('my_page.php');



