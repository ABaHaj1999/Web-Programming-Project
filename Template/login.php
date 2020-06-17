<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<?php
include('config/setting.php');
include('config/dbcon.php');
include('config/function.php');
session_start();


?>
    <html>
    <title><?php echo $title; ?>
    </title>

    <body>
        <?php if ((!isset($_SESSION['UserName']))) { ?>

            <form METHOD='GET' ACTION='index.php'>
                Username
                <input type="text" value="" id="UserName" name="UserName">
                Password
                <input type="password" id="UserPasswd" name="UserPasswd">
                <a href="index.php?UserName=<?php echo $row['UserName']; ?>"><input type="submit" value="Login"></a>
                <input type="reset" value="Clear">
            </form>
    <?php }?>


    </body>

    </html>