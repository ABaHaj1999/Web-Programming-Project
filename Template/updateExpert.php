<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "", "webproject");

if (isset($_GET['ExpertID'])) {

    $ExpertId = $_GET['ExpertID'];
    $sql = "SELECT * FROM `experts` WHERE (`ExpertID`= '$ExpertId')";
    $result = mysqli_query($virtual_con, $sql);
    $row = mysqli_fetch_assoc($result);

} else if (isset($_POST['but_update'])) {

    $name = $_FILES['file']['name'];
    $target_dir = "assets\img\clientsPic";
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
        $query = "insert into experts(ExpertPic) values('" . $image . "') where `ExpertID`=".$_POST['ExpertID'];
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }

    $insertsql = "UPDATE `experts` SET `ExpertName`='" . $_POST['ExpertName'] . "', `ExpertPic`='" . $image . "', `ExpertPosition`='" . $_POST['ExpertPosition'] . "', `ExpertWords`='" . $_POST['ExpertWords'] . "' WHERE `ExpertID`=".$_POST['ExpertID'];


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "ExpertTable.php";
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

<form method="post" action="updateExpert.php" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="ExpertID">Expert ID</label>
        <input readonly name="ExpertID" type="text" value="<?php echo $row['ExpertID']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="ExpertName">Expert Name</label>
        <input name="ExpertName" type="text" value="<?php echo $row['ExpertName']; ?>" />
    </div>
    <div class="form-group">
        <label for="ExpertPosition">Expert Position</label>
        <input name="ExpertPosition" type="text" value="<?php echo $row['ExpertPosition']; ?>" />
    </div>
    <div class="form-group">
        <label for="ExpertWords">Expert Words</label>
        <input name="ExpertWords" type="text" value="<?php echo $row['ExpertWords']; ?>" />
    </div>
    <input type='file' name='file' />
    <input type='submit' value='Update' name='but_update'>
</form>