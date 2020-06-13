<?php
require_once('config/all.php');

$UserId = $_GET['delete'];

$sqldelete = "DELETE FROM `users` WHERE (`UserID`='$UserId')";
$result = mysqli_query($virtual_con, $sqldelete);

$to = "UserTable.php";
if (isset($result)) {

    $msg = "Delete was Success";
} else {

    $msg = "Delete is not successful";
}
goto2($to, $msg);
?>