<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "", "webproject");

if (isset($_GET['SponsorID'])) {

    $SponsorId = $_GET['SponsorID'];
    $sql = "SELECT * FROM `sponsors` WHERE (`SponsorID`= '$SponsorId')";
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
        $query = "insert into sponsors(SponsorPic) values('" . $image . "') where `SponsorID`=".$_POST['SponsorID'];
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }

    $insertsql = "UPDATE `sponsors` SET `SponsorName`='" . $_POST['SponsorName'] . "', `SponsorPic`='" . $image . "' WHERE `SponsorID`=".$_POST['SponsorID'];


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "SponsorTable.php";
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

<form method="post" action="updateSponsor.php" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="SponsorID">Sponsor ID</label>
        <input readonly name="SponsorID" type="text" value="<?php echo $row['SponsorID']; ?>" />
    </div>
    </div>
    <div class="form-group">
        <label for="SponsorName">Sponsor Name</label>
        <input name="SponsorName" type="text" value="<?php echo $row['SponsorName']; ?>" />
    </div>
    <input type='file' name='file' />
    <input type='submit' value='Update' name='but_update'>
</form>