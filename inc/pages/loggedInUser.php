<!doctype html>

<?php session_start();
$_SESSION['logName'] = "";
?>

<head>
 <meta charset="utf-8">
    <title>i log my</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-2.0.0.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once("inc/login.php"); ?>
    <?php include_once("inc/navbar.php"); ?>

    <div id="page-content" class="container">

        <a href="weight/page/main.php">
            <div class="log-option">Weight <img src="img/icon-weight.gif" style="width:80px;height:80px;"></div>     
        </a>
        
        <a href="foodDrink/main.php">
            <div class="log-option">Food & Drink</div>
        </a>
        
        <a href="#">
            <div class="log-option">More stuff later</div>
        </a>
    </div>

</body>
</html>