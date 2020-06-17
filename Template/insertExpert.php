<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "", "webproject");
if (isset($_POST['but_upload'])) {

    $name = $_FILES['file']['name'];
    $target_dir = "assets\img\clients";
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
        $query = "insert into experts(ExpertPic) values('" . $image . "') where `ExpertID` = '" . $_POST['ExpertID'] . "'";
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
    }

    $insertsql = "insert into experts (ExpertID, ExpertName, ExpertPic, ExpertPosition, ExpertWords) Values ('" . $_POST['ExpertID'] . "', '" . $_POST['ExpertName'] . "', '" . $image . "', '".$_POST['ExpertPosition']."', '".$_POST['ExpertWords']."')";


    $result = mysqli_query($virtual_con, $insertsql);
    $to = "ExpertTable.php";
    if ($result != NULL) {
        //delete  Success
        $msg = "Insert was Success";
    } else {
        //delete failure
        $msg = "Insert is not successful";
    }
    goto2($to, $msg);
} else {
    $sqlchkrow = "select max(ExpertID) as m from experts";
    $result = mysqli_query($virtual_con, $sqlchkrow);
    $row = mysqli_fetch_assoc($result);
    $maxval = $row['m'];
?>

    <form method="post" action="" enctype='multipart/form-data'>
        <div class="form-group">
            <label for="ExpertID">Expert ID</label>
            <input readonly name="ExpertID" type="text" value="<?php echo ($maxval + 3); ?>" />
        </div>
        </div>
        <div class="form-group">
            <label for="ExpertName">Expert Name</label>
            <input name="ExpertName" type="text" />
        </div>
        <div class="form-group">
            <label for="ExpertPosition">Expert Position</label>
            <input name="ExpertPosition" type="text" />
        </div>
        <div class="form-group">
            <label for="ExpertWords">Expert Words</label>
            <input name="ExpertWords" type="text" />
        </div>
        <input type='file' name='file' />
        <input type='submit' value='Save' name='but_upload'>
    </form>

<?php } ?>