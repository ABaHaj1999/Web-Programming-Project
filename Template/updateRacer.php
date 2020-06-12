<?php
include('config/all.php');

if (isset($_GET['RacerID'])) {

    $RacerId = $_GET['RacerID'];
    $sql = "SELECT * FROM `racers` WHERE (`RacerID`= '$RacerId')";
    $result = mysqli_query($virtual_con, $sql);
    $row = mysqli_fetch_assoc($result);
} else if (isset($_POST['update'])) {

    $sqlupdate = "UPDATE `racers` SET `RacerFirstName`='" . $_POST['RacerFirstName'] . "', `RacerLastName`='" . $_POST['RacerLastName'] . "', `RacerAge`='" . $_POST['RacerAge'] . "', `RacerCarColor`='" . $_POST['RacerCarColor'] . "', `CarID`='" . $_POST['CarID'] . "', `RacerPic`='" . $_POST['RacerPic'] . "', `RacerCarNumber`='" . $_POST['RacerCarNumber'] . "' WHERE `RacerID`=".$_POST['RacerID'];

    $result = mysqli_query($virtual_con, $sqlupdate);
    $to = "RacerTable.php";
    if (isset($result)) {
        //delete  Success
        $msg = "Update was a success";
    } else {
        //delete failure
        $msg = "Update is not successful";
    }
    goto2($to, $msg);
}



?>



<form name="updateRacer" action="updateRacer.php" method="post">
    <div class="form-group">
        <label for="RacerID">Racer ID</label>
        <input readonly name="RacerID" type="text" value="<?php echo $row['RacerID']; ?>" />
    </div>
    <div class="form-group">
        <label for="RacerFirstName">First Name</label>
        <input name="RacerFirstName" type="text" value="<?php echo $row['RacerFirstName']; ?>" />
    </div>
    <div class="form-group">
        <label for="RacerLastName">Last Name</label>
        <input name="RacerLastName" type="text" value="<?php echo $row['RacerLastName']; ?>" />
    </div>
    <div class="form-group">
        <label for="RacerAge">Age</label>
        <input name="RacerAge" type="text" value="<?php echo $row['RacerAge']; ?>" />
    </div>
    <div class="form-group">
        <label for="RacerCarColor">Car Color</label>
        <input name="RacerCarColor" type="text" value="<?php echo $row['RacerCarColor']; ?>" />
    </div>
    <div class="form-group">
        <label for="RacerCarNumber">Car Number</label>
        <input name="RacerCarNumber" type="text" value="<?php echo $row['RacerCarNumber']; ?>" />
    </div>
    <div class="form-group">
        <label for="CarID">Car ID</label>
        <input name="CarID" type="text" value="<?php echo $row['CarID']; ?>" />
    </div>
    <div class="form-group">
        <label for="RacerPic">Profile Picture</label>
        <input name="RacerPic" type="text" value="<?php echo $row['RacerPic']; ?>" />
    </div>

    <button type="submit" class="btn btn-default" name="update">Update</button>
</form>