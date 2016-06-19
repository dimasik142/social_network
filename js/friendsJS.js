/**
 * Created by dmitro on 19.06.16.
 */

document.cookie = "idUserForDialogue" + "=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT"; // функція видалення кука
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

function deleteFriend(id) {
    document.cookie = "idDelete=" + id;
    var reg = getXmlHttp();
    reg.onreadystatechange = function() {
        if (reg.readyState == 4) {
            if(reg.status == 200) {
                document.cookie = "idDelete=" + "; expires=Thu, 01 Jan 1970 00:00:01 GMT";
            }
        }
    };

    reg.open('GET', 'ajax/deleteFriend.php', false);//В роботі з safari використовувати false
    reg.send(null);
}