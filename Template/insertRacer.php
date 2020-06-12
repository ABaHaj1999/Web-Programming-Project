<?php
require_once('config/all.php');

if (isset($_POST['insert'])) {
    $insertsql = "INSERT INTO `racers` (`RacerID`, `CarID`, `RacerFirstName`, `RacerLastName`, `RacerAge`, `RacerCarColor`, `RacerPic`, `RacerCarNumber`) 
    VALUES ('".$_POST['RacerID']."', '".$_POST['CarID']."', '".$_POST['RacerFirstName']."', '".$_POST['RacerLastName']."', '".$_POST['RacerAge']."', '".$_POST['RacerCarColor']."', '".$_POST['RacerPic']."', '".$_POST['RacerCarNumber']."')";

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
    <form name="insertRacer" action="insertRacer.php" method="post">
    <div class="form-group">
      <label for="RacerID">Racer ID</label>
      <input readonly name="RacerID" type="text" value="<?php echo $maxval + 1; ?>" />
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
    <div class="form-group">
      <label for="RacerPic">Profile Picture</label>
      <input name="RacerPic" type="text" />
    </div>
    <button type="submit" class="btn btn-default" name="insert">Insert</button>
    
  </form>
<?php } ?>
