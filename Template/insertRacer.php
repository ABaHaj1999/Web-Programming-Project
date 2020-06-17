<?php
include("config/all.php");
$con = mysqli_connect("localhost", "root", "", "webproject");
if (isset($_POST['but_upload'])) {

  $name = $_FILES['file']['name'];
  $target_dir = "assets\img\racerPic";
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
    $query = "insert into racers(RacerPic) values('" . $image . "')";
    mysqli_query($con, $query);

    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
  }

  $insertsql = "insert into racers (RacerID, CarID, RacerFirstName, RacerLastName, RacerAge, RacerCarColor, RacerPic, RacerCarNumber) Values ('" . $_POST['RacerID'] . "', '" . $_POST['CarID'] . "', '" . $_POST['RacerFirstName'] . "', '" . $_POST['RacerLastName'] . "', '" . $_POST['RacerAge'] . "', '" . $_POST['RacerCarColor'] . "', '" . $image . "', '" . $_POST['RacerCarNumber'] . "')";


  $result = mysqli_query($virtual_con, $insertsql);
  $to = "RacerTable.php";
  if ($result != NULL) {
    //delete  Success
    $msg = "Insert was Success";
  } else {
    //delete failure
    $msg = "Insert is not successful";
  }
  goto2($to, $msg);
} else {
  $sqlchkrow = "select max(RacerID) as m from racers";
  $result = mysqli_query($virtual_con, $sqlchkrow);
  $row = mysqli_fetch_assoc($result);
  $maxval = $row['m'];
?>

  <form method="post" action="" enctype='multipart/form-data'>
    <div class="form-group">
      <label for="RacerID">Racer ID</label>
      <input readonly name="RacerID" type="text" value="<?php echo $maxval + 3; ?>" />
    </div>
    <div class="form-group">
      <label for="CarID">Car ID</label>
      <input name="CarID" type="text" />

    </div>
    <div class="form-group">
      <label for="RacerFirstName">First Name</label>
      <input name="RacerFirstName" type="text" />
    </div>
    <div class="form-group">
      <label for="RacerLastName">Last Name</label>
      <input name="RacerLastName" type="text" />
    </div>
    <div class="form-group">
      <label for="RacerAge">Age</label>
      <input name="RacerAge" type="text" />
    </div>
    <div class="form-group">
      <label for="RacerCarColor">Car Color</label>
      <input name="RacerCarColor" type="text" />
    </div>
    <div class="form-group">
      <label for="RacerCarNumber">Car Number</label>
      <input name="RacerCarNumber" type="text" />
    </div>
    <input type='file' name='file' />
    <input type='submit' value='Save' name='but_upload'>
  </form>

<?php } ?>