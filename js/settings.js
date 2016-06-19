/**
 * Created by dmitro on 19.06.16.
 */
if(getCookie("email") == null || getCookie("password") == null)
    document.location.href = "index.php";

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

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

function change_password(){
    document.cookie = "new_password=" + document.getElementById('new_password').value;
    var req = getXmlHttp();
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if(req.status == 200) {
                alert(req.responseText);
                document.cookie = "password=" + getCookie('new_password');
                document.getElementById('current_password').value = "";
                document.getElementById('new_password').value = "";
                document.getElementById('new_password_repeat').value = "";
                document.location.href = "settings.php";
            }
        }
    };
    if(document.getElementById('new_password').value == document.getElementById('new_password_repeat').value) {
        if(document.getElementById('current_password').value == getCookie('password')) {
            req.open('GET', 'ajax/change_password.php', true);
        }
        else{
            alert ("Старий пароль не вірний!!! Повторіть будь ласка ввід");
            document.getElementById('current_password').value = "";
            document.getElementById('new_password').value = "";
            document.getElementById('new_password_repeat').value = "";
        }
    }
    else {
        alert("Паролі не співпадають!!! Повторіть будь ласка ввід");
        document.getElementById('new_password').value = "";
        document.getElementById('new_password_repeat').value = "";
    }
    req.send(null);
}

function change_email(){
    document.cookie = "new_email=" + document.getElementById('email_input').value;
    var reg = getXmlHttp();
    reg.onreadystatechange = function() {
        if (reg.readyState == 4) {
            if(reg.status == 200) {
                alert(reg.responseText);
                document.getElementById('email_input').value = "";
                document.cookie = "email=" + getCookie('new_email');
                document.location.href = "settings.php";
            }
        }
    };
    reg.open('GET', 'ajax/change_email.php', true);
    reg.send(null);
}

function change_city() {
    document.cookie = "new_city=" + document.getElementById('new_city').value;
    var reg = getXmlHttp();
    reg.onreadystatechange = function() {
        if (reg.readyState == 4) {
            if(reg.status == 200) {
                alert(reg.responseText);
                document.getElementById('new_city').value = "";
            }
        }
    };
    reg.open('GET', 'ajax/change_city.php', true);
    reg.send(null);
}

function changeNameAndSurename() {
    document.cookie = "name=" + document.getElementById('userName').value;
    document.cookie = "surename=" + document.getElementById('userSurename').value;
    var reg = getXmlHttp();
    reg.onreadystatechange = function() {
        if (reg.readyState == 4) {
            if(reg.status == 200) {
                alert(reg.responseText);
                document.getElementById('userName').value = "";
                document.getElementById('userSurename').value = "";
            }
        }
    };
    reg.open('GET', 'ajax/changeNameAndSurename.php', true);
    reg.send(null);
}