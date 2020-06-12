<?php
require_once('config/all.php');

$RacerId = $_GET['delete'];

$sqldelete = "DELETE FROM `racers` WHERE (`RacerID`='$RacerId')";
$result = mysqli_query($virtual_con, $sqldelete);

$to = "RacerTable.php";
if (isset($result)) {

    $msg = "Delete was Success";
} else {

    $msg = "Delete is not successful";
}
goto2($to, $msg);
?>