<?php
include('config/all.php');
$con = mysqli_connect("localhost", "root", "", "webproject");
if (isset($_GET['RacerID'])) {

    $RacerId = $_GET['RacerID'];
    $sql = "SELECT * FROM `racers` WHERE (`RacerID`= '$RacerId')";
    $result = mysqli_query($virtual_con, $sql);
    $row = mysqli_fetch_assoc($result);
} else if (isset($_POST['but_update'])) {

    $name = $_FILES['file']['name'];
    $target_dir = "assets\img\carPic";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
        // Insert record
        $query = "insert into racers(RacerPic) values('" . $image . "') where `RacerID` =" . $_POST['RacerID'];
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }

    $insertsql = "UPDATE `racers` SET `RacerFirstName`='" . $_POST['RacerFirstName'] . "', `RacerLastName`='" . $_POST['RacerLastName'] . "', `RacerAge`='" . $_POST['RacerAge'] . "', `RacerCarColor`='" . $_POST['RacerCarColor'] . "', `RacerCarNumber`='" . $_POST['RacerCarNumber'] . "', `CarID`='" . $_POST['CarID'] . "', `RacerPic`='" . $image . "' WHERE `RacerID`=" . $_POST['RacerID'];

    $result = mysqli_query($virtual_con, $insertsql);
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



<form name="updateRacer" action="updateRacer.php" method="post" enctype='multipart/form-data'>
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
        <input type='file' name='file' />
        <input type='submit' value='Update' name='but_update'>
    </div>
</form>