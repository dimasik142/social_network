<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 19:38
 */



?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title> Діалог з користувачем </title>

	<title> Моя сторінка </title>

	<link rel="stylesheet" href="styles/index1.css" />
	<link rel="stylesheet" href="styles/dialogue.css" />
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
				<li><a href="friends.php">Друзі</a></li>
				<li><a href="dialogue.php">Повідомлення</a></li>
				<li><a href="settings.php">Налаштування</a></li>
				<li><a href="exit.php">Вихід</a></li>
			</ul>
		</nav>
	</header>
		<div class="main_window">
			<ul class="dialog_menu">
				<li ><a href="dialogue.html">Діалоги</a></li>
				<li class="selected"><a href="#">Перегляд діалогів</a></li>
			</ul>
			<br><br>
			<hr>
			<div class="history">


			  <div class="message">
			    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div>
			  <div class="data"> 25.04.97</div><br></p>

			  <div class="message">
			    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div><br>
			  <div class="data"> 25.04.97</div><br></p>

			  <div class="message">
                    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div><br>
			  <div class="data"> 25.04.97</div><br></p>
			  <div class="message">
                    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div><br>
			  <div class="data"> 25.04.97</div><br></p>
			  <div class="message">
                    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div><br>
			  <div class="data"> 25.04.97</div><br></p>
			  <div class="message">
                    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div><br>
			  <div class="data"> 25.04.97</div><br></p>
			  <div class="message">
                    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст
</div><br>
			  <div class="data"> 25.04.97</div><br></p>
			  <div class="message">
                    <img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
			  <div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>
				<div class="message">
					<img src="photo/avatar.png" class="dialog_photo_small">
текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текст текстd
</div><br>
				<div class="data"> 25.04.97</div><br></p>

			</div>


			<hr>
			<div class="form_block">
				<img src="photo/avatar.png" class="dialog_photo">
				<form>
					<textarea name="comment" cols="60" rows="4"> </textarea><br>


					<input type="button"  onclick="sendMassage()" value="Отправить" name="send" class="button">


					<a href="#" class="button">
					<input type="button" value="Отправить" name="send" class="button">

					</a>
				</form>
			</div>
		</div>

</div>

</body>

<script>
	function sendMassage() {
        alert ("123");
    }
</script>
</body>
