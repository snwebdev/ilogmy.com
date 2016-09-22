<?php
session_start();
if(!isset($_SESSION['userName'])){
    echo "you need to be logged in to get here";
header("Location:login.php");
}
?>

<div id="page-content" class="container">
    <a href="#">
        <div id="a-weight" data-logsub="weight" data-text="Weight" class="log-option">Weight</div>     
    </a>
    <a  href="#">
        <div id="a-food-and-drink" data-logsub="calories" data-text="Calories"class="log-option">Calories</div>
    </a>
    <a href="#">
        <div class="log-option" data-logsub="moreStuffLater" data-text="">More stuff later</div>
    </a>
    <a href="#">
        <div class="log-option" data-logsub="" data-text="help">Help</div>
    </a>
</div>

<script>

    $(".log-option").on("click", function () {
        
        var text = $(this).attr("data-text");
        if (text==="help") $("#content").load("inc/pages/help.html");
        $("#navbar-logName-text").html(text);
        var data = $(this).attr("data-logsub");
        $("#navbar-logName-text").attr("data-logsub", data);
        var file = "logsubs/" + data + "/page/main.html";
        $("#content").load(file);
    });

</script>
