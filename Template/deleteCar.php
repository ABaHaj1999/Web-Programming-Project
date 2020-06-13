<?php
require_once('config/all.php');

$CarId = $_GET['delete'];

$sqldelete = "DELETE FROM `allowablecars` WHERE (`CarID`='$CarId')";
$result = mysqli_query($virtual_con, $sqldelete);

$to = "CarTable.php";
if (isset($result)) {

    $msg = "Delete was Success";
} else {

    $msg = "Delete is not successful";
}
goto2($to, $msg);
?>