<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 19:38
 */
include 'massages_class.php';
$massange = new Messages();
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
				<li ><a href="html/dialogue.html">Діалоги</a></li>
				<li class="selected"><a href="#">Перегляд діалогів</a></li>
			</ul>
			<br><br>
			<hr>
			<div class="history">
				<?php $massange->get25Massages(1,2);?>
			</div>


			<hr>
			<div class="form_block">
				<img src="<?php echo $massange->photosArray['senderPhoto']?>" class="dialog_photo">
				<form>
					<textarea name="comment" cols="60" rows="4"> </textarea><br>


					<input type="button"  onclick="sendMassage()" value="Отправить" name="send" class="button">



				</form>
			</div>
		</div>

</div>

</body>

<script>
	function sendMassage() {
    }
</script>
</body>
