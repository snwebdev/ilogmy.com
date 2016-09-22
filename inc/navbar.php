<nav class="navbar navbar-custom navbar-fixed-top ">
    <div class="container-fluid"> 
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#login-info" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <p class="navbar-text">
                <a id="navbar-i-log-my" href="#">
                    i log my
                </a>
                <a id="navbar-logName-anchor" href="#">
                    <span id="navbar-logName-text" data-logsub="mince"></span>
                </a>
            </p>               
        </div>
        <div class="collapse navbar-collapse pull-right" id="login-info">
            <p class="navbar-text">
                <span id="navbar-logged-in-name" >
                </span>
                <a  id="a-logout" href="#">
                    <span id="logout-text" class="text-small  collapse">
                        logout
                    </span>
                </a>
            </p>            
        </div>
    </div>
</nav>

<script>
    $(document).on("click", "#navbar-i-log-my", function () {

        $("#navbar-logName-text").html("");
        $("#content").load("inc/pages/mainChoice.php");
    });

    $(document).on("click", "#navbar-logName-text", function () {
        var log = $(this).attr("data-logsub");
        var file = "logsubs/" + log + "/page/main.html";
        $("#content").load(file);
    });

    $(document).on("click", "#a-logout", function () {
        $.get("logout.php", function () {
            $("#navbar-logName-text").html("");
            $("#navbar-logged-in-name").html("");
            $("#logout-text").hide();
            $("#content").load("inc/pages/login.php");
        });
    });
</script>

