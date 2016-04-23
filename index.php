<script type="text/javascript">

    function getCookie(name) {
        var matches = document.cookie.match(new RegExp(
            "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
        ));
        return matches ? decodeURIComponent(matches[1]) : undefined;
    }

    function get_home_page(){
        if ((getCookie("email") != null) && (getCookie("password") != null))
            document.location.href = "my_page.php";
        else
            document.location.href = "login.php";
    }
    get_home_page();
</script>




