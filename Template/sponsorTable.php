<?php
require_once('config/all.php');

$sqlStatement = 'SELECT * FROM `sponsors`';

$result = mysqli_query($virtual_con, $sqlStatement);

$counter = 1;


?>

<form name="insertSponsor" action="insertSponsor.php" method="post">
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-default" name="newCar">New Sponsor</button>
    </div>
</form>

<form name="updateSponsor" action="updateSponsor.php" method="post">
    <div class="form-group" align="center">
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Sponsor ID</th>
                <th scope="col">Sponsor Picture</th>
                <th scope="col">Sponsor Name</th>
                <th scope="col">Delete</>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <tr>
                    <td><?php echo $counter;
                        $counter++;  ?></td>
                    <td><?php echo $row['SponsorID']; ?></td>
                    <td><img src="<?php echo $row['SponsorPic']; ?>" width="110" height="40"></td>
                    <td><?php echo $row['SponsorName']; ?></td>
                    <td><a href="deleteSponsor.php?delete=<?php echo $row['SponsorID']; ?>">Delete</a></td>
                    <td><a href="updateSponsor.php?SponsorID=<?php echo $row['SponsorID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>