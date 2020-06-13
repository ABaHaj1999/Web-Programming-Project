<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "", "webproject");

if (isset($_GET['CarID'])) {

    $CarId = $_GET['CarID'];
    $sql = "SELECT * FROM `allowablecars` WHERE (`CarID`= '$CarId')";
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
        $query = "insert into allowablecars(CarPic) values('" . $image . "') where `CarID`=".$_POST['CarID'];
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }

    $insertsql = "UPDATE `allowablecars` SET `CarName`='" . $_POST['CarName'] . "', `CarCompanyName`='" . $_POST['CarCompanyName'] . "', `CarModel`='" . $_POST['CarModel'] . "', `CarPic`='" . $image . "' WHERE `CarID`=".$_POST['CarID'];


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "CarTable.php";
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

<form method="post" action="updateCar.php" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="CarID">Car ID</label>
        <input readonly name="CarID" type="text" value="<?php echo $row['CarID']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="CarName">Car Name</label>
        <input name="CarName" type="text" value="<?php echo $row['CarName']; ?>" />
    </div>
    <div class="form-group">
        <label for="CarCompanyName">Car Company Name</label>
        <input name="CarCompanyName" type="text" value="<?php echo $row['CarCompanyName']; ?>"/>
    </div>
    <div class="form-group">
        <label for="CarModel">Car Model</label>
        <input name="CarModel" type="text" value="<?php echo $row['CarModel']; ?>"/>
    </div>
    <input type='file' name='file' />
    <input type='submit' value='Update' name='but_update'>
</form>