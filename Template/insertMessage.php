<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "123", "webproject");

if (isset($_POST['but_upload'])) {

    $insertsql = "insert into messages (mUserID, mUserName, mUserSubject, mUserEmail, mUserMessage) Values ('" . $_POST['mUserID'] . "', '" . $_POST['mUserName'] . "', '" . $_POST['mUserSubject'] . "', '" . $_POST['mUserEmail'] . "', '" . $_POST['mUserMessage'] . "')";
    $result = mysqli_query($virtual_con, $insertsql);
    $to = "MessageTable.php";
    if ($result != NULL) {
        //delete  Success
        $msg = "Your message has been sent. Thank you!";
    } else {
        //delete failure
        $msg = "Somthing went wrong";
    }
    goto2($to, $msg);
} else {
    $sqlchkrow = "select max(mUserID) as m from messages";
    $result = mysqli_query($virtual_con, $sqlchkrow);
    $row = mysqli_fetch_assoc($result);
    $maxval = $row['m'];
?>

    <form method="post" action="">
        <div class="form-group">
            <label for="mUserID">User ID</label>
            <input readonly name="mUserID" type="text" value="<?php echo ($maxval + 1); ?>" />
        </div>
        <div class="form-group">
            <label for="mUserName">User Name</label>
            <input name="mUserName" type="text" />
        </div>
        <div class="form-group">
            <label for="mUserSubject">Message Subject</label>
            <input name="mUserSubject" type="text" />
        </div>
        <div class="form-group">
            <label for="mUserEmail">User Email</label>
            <input name="mUserEmail" type="text" />
        </div>
        <div class="form-group">
            <label for="mUserMessage">User Message</label>
            <input name="mUserMessage" type="text" />
        </div>
        <input type='submit' value='Save' name='but_upload'>
    </form>

<?php } ?>