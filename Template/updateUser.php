<?php
include("config/all.php");

if (isset($_GET['UserID'])) {

    $UserId = $_GET['UserID'];
    $sql = "SELECT * FROM `users` WHERE (`UserID`= '$UserId')";
    $result = mysqli_query($virtual_con, $sql);
    $row = mysqli_fetch_assoc($result);

} else if (isset($_POST['but_update'])) {
    $insertsql = "UPDATE `users` SET `UserName`='" . $_POST['UserName'] . "', `UserEmail`='" . $_POST['UserEmail'] . "' WHERE `UserID`=".$_POST['UserID'];


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "UserTable.php";
    if ($result != NULL) {
        //delete  Success
        $msg = "Update was Success";
    } else {
        //delete failure
        $msg = "Update is not successful";
    }
    goto2($to, $msg);
}
?>

<form method="post" action="updateUser.php" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="UserID">User ID</label>
        <input readonly name="UserID" type="text" value="<?php echo $row['UserID']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="UserName">User Name</label>
        <input name="UserName" type="text" value="<?php echo $row['UserName']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="UserEmail">User Email</label>
        <input name="UserEmail" type="text" value="<?php echo $row['UserEmail']; ?>" />
    </div>
    <input type='submit' value='Update' name='but_update'>
</form>