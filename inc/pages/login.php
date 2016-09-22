<?php
session_start();
?>

<h1 class="heading">Login to your i log my account</h1>


<div class="container">
    <div class="jumbotron col-md-6 col-md-offset-3">         
        <div class="col-md-10 col-md-offset-1">
            <form id="form-signin" method="post" class="form-signin">
                <div class="form-group">
                    <label for="logInUserName">user name:</label>
                    <input type="text" class="form-control" name="loginUserName" id="loginUserName"  required autofocus>
                </div>
                <div class="form-group">
                    <label for="logInPassword">password:</label>
                    <input type="password" class="form-control" name="loginPassword" id="loginPassword" required >
                </div>
                <input id="button-login" class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">                       
            </form>
            <a id="link-create-account" href="#" class="pull-right new-account">Create an account </a>
        </div>
    </div>
</div>

<script>

    $("#link-create-account").on("click", function () {
        $("#content").load("inc/pages/createNewAccountPage.html");

    });

    var form = $("#form-signin");
    $(form).submit(function (e) {
        e.preventDefault();
        var formData = $(form).serialize();

        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: formData
        }).done(function (response) {

            if (response === "logged in") {

                $.get("loggedInUserName.php", function (data) {
                    $("#navbar-logged-in-name").html(data);
                    $("#logout-text").show();

                });

               
              $("#content").load("inc/pages/mainChoice.php");
            } else {
                alert("Can't log you in. \n "+response);
            }
        });
    });


</script>