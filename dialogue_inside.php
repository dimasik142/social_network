<?php
/**
 * Created by PhpStorm.
 * User: dmitro
 * Date: 19.05.16
 * Time: 19:38
 */
include 'massages_class.php';
$massange = new Messages();
$user = new User();
session_start();
?>

<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title> Діалог з користувачем </title>

	<link rel="stylesheet" href="styles/index1.css" />
	<link rel="stylesheet" href="styles/dialogue_inside.css" />
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
			<div class="block_button_dialog"><ul class="dialog_menu">
				<li ><a href="dialogue.php">Діалоги</a></li>
				<li class="selected"><a href="#">Перегляд діалогів</a></li>
			</ul></div>
			
			<hr>
			<div class="history">
				<?php
					$idRecipient = 2;
					$_SESSION['idRecipient'] = $idRecipient;
					$idSender = $user->searchId($_COOKIE['email'],$_COOKIE['password']);
					$massange->get25Massages($idSender,$idRecipient);
				?>
				<div id = "newWriteMassageXML">

				</div>
			</div>
			<input type="button" value="Едим вниз" onClick="scroldown()">

			<hr>
			<div class="form_block">
				<img src="<?php echo $massange->photosArray['senderPhoto']?>" class="dialog_photo">
				<form name = "newMassageForm">
					<textarea  cols="60" id ="newMassage" name = "newMassage" rows="4"> </textarea><br>


					<input type="button"  onclick="sendMassage()" value="Отправить" name="send" class="button">
				</form>
			</div>
		</div>
</div>

</body>

<script>

	document.onkeyup = function (e) {
		e = e || window.event;
		if (e.keyCode === 13) {
			sendMassage();
		}
		// Отменяем действие браузера
		return false;
	};

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


	function sendMassage() {
		document.cookie = "newMassage=" + document.getElementById('newMassage').value;
		var reg = getXmlHttp();
		reg.onreadystatechange = function() {
			if (reg.readyState == 4) {
				if(reg.status == 200) {
					document.getElementById('newMassage').value = "";
					document.getElementById('newWriteMassageXML').innerHTML = reg.responseText;
					scroldown();
				}
			}
		};
		reg.open('GET', 'ajax/sendMassage.php', true);
		reg.send(null);

	}
</script>

