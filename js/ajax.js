function getXmlHttp(){
    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function check_password_1 () {
    var req = getXmlHttp()
    var pass = document.getElementById('pass')
    var pass_repeat = document.getElementById('pass_repeat')
    req.onreadystatechange = function() {
        if (req.readyState == 4) {
            if(req.status == 200  ) {
                if (pass.value != pass_repeat.value) {

                }
                else{
                }
            }
        }
    }
    req.open('GET', 'vote.php', true);
    req.send(null);  // отослать запрос
}
