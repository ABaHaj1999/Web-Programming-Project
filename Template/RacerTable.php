<?php
require_once('config/all.php');

$sqlStatement = 'SELECT * FROM `racers`';
$sqlStatement1 = 'SELECT CarName FROM allowablecars INNER JOIN racers on racers.CarID = allowablecars.CarID ';

$result = mysqli_query($virtual_con, $sqlStatement);
$result1 = mysqli_query($virtual_con, $sqlStatement1);

$counter = 1;


?>

<form name="insertRacer" action="insertRacer.php" method="post">
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-default" name="newRacer">New Racer</button>
    </div>
</form>

<form name="updateRacer" action="updateRacer.php" method="post">
    <div class="form-group" align="center">
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Racer ID</th>
                <th scope="col">Profile Picture</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Age</th>
                <th scope="col">Car Color</th>
                <th scope="col">Car Number</th>
                <th scope="col">Car Name</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $row1 = mysqli_fetch_assoc($result1);
            ?>
                <tr>
                    <td><?php echo $counter;
                        $counter++;  ?></td>
                    <td><?php echo $row['RacerID']; ?></td>
                    <td><img src="<?php echo $row['RacerPic']; ?>" width="60" height="60"></td>
                    <td><?php echo $row['RacerFirstName']; ?></td>
                    <td><?php echo $row['RacerLastName']; ?></td>
                    <td><?php echo $row['RacerAge']; ?></td>
                    <td><?php echo $row['RacerCarColor']; ?></td>
                    <td><?php echo $row['RacerCarNumber']; ?></td>
                    <td><?php echo $row1['CarName']; ?></td>
                    <td><a href="deleteRacer.php?delete=<?php echo $row['RacerID']; ?>">Delete</a></td>
                    <td><a href="updateRacer.php?RacerID=<?php echo $row['RacerID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>