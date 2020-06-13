<?php
require_once('config/all.php');

$SponsorId = $_GET['delete'];

$sqldelete = "DELETE FROM `sponsors` WHERE (`SponsorID`='$SponsorId')";
$result = mysqli_query($virtual_con, $sqldelete);

$to = "SponsorTable.php";
if (isset($result)) {

    $msg = "Delete was Success";
} else {

    $msg = "Delete is not successful";
}
goto2($to, $msg);
?>