

<?php


include_once("inc/connection.php");

   
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
     
      
        $signupUserName = mysqli_real_escape_string($dbConnection, $_POST['signupUserName']);
  
       

        $query = "SELECT * FROM users WHERE userName = '$signupUserName';";

        $result = mysqli_query($dbConnection, $query);
        $results = mysqli_num_rows($result);
        if (!$result) {
            echo 'result error'."<br />";
            echo "test=".$test."<br />";
        }
        if ($results > 0) {
            $error .= "email already used.<br />";
        } else {
            $hashSignupPassword = md5(md5($signupUserName) . $signupPassword);

            $query = "INSERT INTO users (userName, email, password) VALUES('$signupUserName', '$signupEmail',  '$hashSignupPassword')";
            //$query = "INSERT INTO users (name, email, password) VALUES('xxx', 'xx',  'xxx')";
            mysqli_query($dbConnection, $query);
            //maybe login from here in cse db fails and useer unaware
            $_SESSION['id'] = mysqli_insert_id($dbConnection);
            $_SESSION['email'] = $signupEmail;


            //header('Location:index.php');
        }
    }



?>