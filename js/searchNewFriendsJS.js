/**
 * Created by dmitro on 19.06.16.
 */
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