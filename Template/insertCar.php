<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "", "webproject");
if (isset($_POST['but_upload'])) {

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
        $query = "insert into allowablecars(CarPic) values('" . $image . "')";
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }

    $insertsql = "insert into allowablecars (CarID, CarName, CarCompanyName, CarModel, CarPic) Values ('" . $_POST['CarID'] . "', '" . $_POST['CarName'] . "', '" . $_POST['CarCompanyName'] . "', '" . $_POST['CarModel'] . "', '" . $image . "')";


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "CarTable.php";
    if ($result != NULL) {
        //delete  Success
        $msg = "Insert was Success";
    } else {
        //delete failure
        $msg = "Insert is not successful";
    }
    goto2($to, $msg);
} else {
    $sqlchkrow = "select max(CarID) as m from allowablecars";
    $result = mysqli_query($virtual_con, $sqlchkrow);
    $row = mysqli_fetch_assoc($result);
    $maxval = $row['m'];
?>

    <form method="post" action="" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="CarID">Car ID</label>
            <input readonly name="CarID" type="text" value="<?php echo $maxval + 3; ?>" />
        </div>
        </div>
        <div class="form-group">
            <label for="CarName">Car Name</label>
            <input name="CarName" type="text" />
        </div>
        <div class="form-group">
            <label for="CarCompanyName">Car Company Name</label>
            <input name="CarCompanyName" type="text" />
        </div>
        <div class="form-group">
            <label for="CarModel">Car Model</label>
            <input name="CarModel" type="text" />
        </div>
        <input type='file' name='file' />
        <input type='submit' value='Save' name='but_upload'>
    </form>

<?php } ?>