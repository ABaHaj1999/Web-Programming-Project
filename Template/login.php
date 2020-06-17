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

        <form METHOD='GET' ACTION='index.php' style="margin: 5%;">
            <div style="background-color:antiquewhite; height: 300px; width: 400px; margin:auto; align-content:center">
                <div style="margin-left:50px; margin-top:50px;">
                    <div class="group-form">
                        Username
                        &nbsp;
                        <input type="text" value="" id="UserName" name="UserName">
                    </div>
                    <br>
                    <div>
                        Password
                        &nbsp;
                        <input type="password" id="UserPasswd" name="UserPasswd">
                        <a href="index.php?UserName=<?php echo $row['UserName']; ?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" value="Login"></a>
                        &nbsp;
                        <input type="reset" value="Clear">
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>


</body>

</html>