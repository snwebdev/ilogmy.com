<?php
session_start();

if ($_GET["logout"] == 1 AND $_SESSION['id']) {
    session_destroy();

    $message = "You are logged out.";
}
require_once("inc/connection.php");

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

        $query = "SELECT * FROM users WHERE userName='$loginUserName' && password='$hashLoginPassword' LIMIT 1";
        $result = mysqli_query($dbConnection, $query);
        $row = mysqli_fetch_array($result);

        if ($row) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['loggedin'] = TRUE;
            echo "logged in";
           
        } else {
           
            $error .= "User with that email and password not found!";
             echo $error;
        }
    }

?>
