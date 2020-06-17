<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<?php
include('config/setting.php');
include('config/dbcon.php');
include('config/function.php');

session_start();
session_destroy();
?>

<?php
$to = 'index.php';
gotoInterface($to);
?>