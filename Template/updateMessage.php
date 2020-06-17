<?php
include("config/all.php");

if (isset($_GET['mUserID'])) {

    $mUserId = $_GET['mUserID'];
    $sql = "SELECT * FROM `messages` WHERE (`mUserID`= '$mUserId')";
    $result = mysqli_query($virtual_con, $sql);
    $row = mysqli_fetch_assoc($result);

} else if (isset($_POST['but_update'])) {
    $insertsql = "UPDATE `messages` SET `mUserName`='" . $_POST['mUserName'] . "', `mUserEmail`='" . $_POST['mUserEmail'] . "', `mUserSubject`='" . $_POST['mUserSubject'] . "', `mUserMessage`='" . $_POST['mUserMessage'] . "' WHERE `mUserID`=".$_POST['mUserID'];


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "MessageTable.php";
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

<form method="post" action="updateMessage.php" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="mUserID">User ID</label>
        <input readonly name="mUserID" type="text" value="<?php echo $row['mUserID']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="mUserName">User Name</label>
        <input name="mUserName" type="text" value="<?php echo $row['mUserName']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="mUserSubject">Message Subject</label>
        <input name="mUserSubject" type="text" value="<?php echo $row['mUserSubject']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="mUserEmail">User Email</label>
        <input name="mUserEmail" type="text" value="<?php echo $row['mUserEmail']; ?>" />
    </div>
    <div class="form-group">
        <label for="mUserMessage">User Message</label>
        <input name="mUserMessage" type="text" value="<?php echo $row['mUserMessage']; ?>" />
    </div>
    <input type='submit' value='Update' name='but_update'>
</form>