
<?php

session_start();

if ($_GET["logout"] == 1 AND $_SESSION['id']) {
    session_destroy();

    $message = "You are logged out.";
}
include_once("inc/connection.php");




if ($_POST['submit'] == 'Sign Up') {
    echo("login.php");
    if (!$_POST['signupUserName']) {
        $error .= "You need to put in a User Name. <br />";
    }

    if (!$_POST['signupEmail']) {
        $error .= "You need to put in an email address. <br />";
    }

    if (!$_POST['signupPassword']) {
        $error .= "You need to put in a password. <br />";
    }

    if ($error) {
        $error .= "There was something wrong with your signup details.<br />" . $error;
    } else {
        if (mysqli_connect_error()) {
            die("Couldn't connect to the database!");
        }

        $signupEmail = mysqli_real_escape_string($dbConnection, $_POST['signupEmail']);
        $signupPassword = mysqli_real_escape_string($dbConnection, $_POST['signupPassword']);
        ;
        $signupUserName = mysqli_real_escape_string($dbConnection, $_POST['signupUserName']);
        ;

        $query = "SELECT * FROM users WHERE email = '$signupEmail';";
        $result = mysqli_query($dbConnection, $query);
        $results = mysqli_num_rows($result);
        if ($results > 0) {
            $error .= "email already used.<br />";
        } else {
            $hashSignupPassword = md5(md5($signupUserName) . $signupPassword);

            $query = "INSERT INTO users (name, email, password) VALUES('$signupUserName', '$signupEmail',  '$hashSignupPassword')";
            //$query = "INSERT INTO users (name, email, password) VALUES('xxx', 'xx',  'xxx')";
            mysqli_query($dbConnection, $query);
            //maybe login from here in cse db fails and useer unaware
            $_SESSION['id'] = mysqli_insert_id($dbConnection);
            $_SESSION['email'] = $signupEmail;


            header('Location:index.php');
        }
    }
}

if ($_POST['submit'] == 'Login') {

    if (mysqli_connect_error()) {
        die("Couldn't connect to the database!");
    }

    if (!$_POST['loginUserName']) {
        $error .= "No User Name entered.<br />";
    }

    if (!$_POST['loginPassword']) {
        $error .= "No password entered.<br />";
    }

    if ($_POST['loginUserName'] && $_POST['loginPassword']) {

        $loginUserName = mysqli_real_escape_string($dbConnection, $_POST['loginUserName']);
        $loginPassword = $_POST['loginPassword'];
        mysqli_real_escape_string($dbConnection, $_POST['loginPassword']);
        $hashLoginPassword = md5(md5($loginUserName) . $loginPassword);

        $query = "SELECT * FROM users WHERE name='$loginUserName' && password='$hashLoginPassword' LIMIT 1";
        $result = mysqli_query($dbConnection, $query);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            header("Location:loggedInUser.php");
        } else {
            $error .= "user with that email and password not found!";
        }
    }
}
?>
