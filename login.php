<script>
    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }
    if (getCookie("email") != null || getCookie("password" != null))
        alert("Ви вже увійшли на свій акаунт, якщо ви хочете змінити користувача, то вийдіть будь ласка зі сторіки!!!!!!!");
    document.location.href = "my_page.php"
</script>

<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> Вхід </title>
    <link rel="stylesheet" href="styles/registration1.css" />
</head>
<body>
<div class="container">
    <div class="login">
    <h1>Вхід</h1> </p><br>
      <form class="bl_form">
       <input type="email" id="User_email" size="15" maxlength="40" required placeholder="Eлектронна скринька"></p><br>
       <input type="password" id="User_password" size="15" maxlength="40" required placeholder="Пароль"></p><br>
       <input type="button" class="login_button" onclick= "check_login()" value="Вхід"></p><br>
       <input type="button" class="other_button"  onclick='location.href="registration.php"' value="Реєстрація" >
       </form>
    </div>
</div>
</body>

<script type="text/javascript">
    function check_login(){
        document.cookie = "password_log =" + document.getElementById('User_password').value ;
        document.cookie = "email_log =" + document.getElementById("User_email").value;
        document.location.href = "check_the_logining.php";
    }
</script>
