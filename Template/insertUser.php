<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "123", "webproject");

if (isset($_POST['but_upload'])) {
    
    $insertsql = "insert into users (UserID, UserName, UserPasswd, UserEmail) Values ('" . $_POST['UserID'] . "', '" . $_POST['UserName'] . "', '" . $_POST['UserPasswd'] . "', '" . $_POST['UserEmail'] . "')";
    $result = mysqli_query($virtual_con, $insertsql);
    $to = "UserTable.php";
    if ($result != NULL) {
        //delete  Success
        $msg = "Insert was Success";
    } else {
        //delete failure
        $msg = "Insert is not successful";
    }
    goto2($to, $msg);
} else {
    $sqlchkrow = "select max(UserID) as m from users";
    $result = mysqli_query($virtual_con, $sqlchkrow);
    $row = mysqli_fetch_assoc($result);
    $maxval = $row['m'];
?>

    <form method="post" action="">
        <div class="form-group">
            <label for="UserID">User ID</label>
            <input readonly name="UserID" type="text" value="<?php echo ($maxval + 1); ?>" />
        </div>
        <div class="form-group">
            <label for="UserName">User Name</label>
            <input name="UserName" type="text" />
        </div>
        <div class="form-group">
            <label for="UserPasswd">User Password</label>
   or         <input name="UserPasswd" type="text" />
        </div>
        <div class="form-group">
            <label for="UserEmail">User Email</label>
            <input name="UserEmail" type="text" />
        </div>
        <input type='submit' value='Save' name='but_upload'>
    </form>

<?php } ?>