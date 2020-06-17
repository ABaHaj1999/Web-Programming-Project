<?php
require_once('config/all.php');

$ExpertId = $_GET['delete'];

$sqldelete = "DELETE FROM `experts` WHERE (`ExpertID`='$ExpertId')";
$result = mysqli_query($virtual_con, $sqldelete);

$to = "ExpertTable.php";
if (isset($result)) {

    $msg = "Delete was Success";
} else {

    $msg = "Delete is not successful";
}
goto2($to, $msg);
?>