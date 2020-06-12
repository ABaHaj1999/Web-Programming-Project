<?php
require_once('config/all.php');

$sqlStatement = 'SELECT * FROM `allowablecars`';

$result = mysqli_query($virtual_con, $sqlStatement);

$counter = 1;


?>

<form name="insertCar" action="insertCar.php" method="post">
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-default" name="newCar">New Car</button>
    </div>
</form>

<form name="updateCar" action="updateCar.php" method="post">
    <div class="form-group" align="center">
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Car ID</th>
                <th scope="col">Car Picture</th>
                <th scope="col">Car Name</th>
                <th scope="col">Car Company</th>
                <th scope="col">Car Model</th>
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
                    <td><?php echo $row['CarID']; ?></td>
                    <td><img src="<?php echo $row['CarPic']; ?>" width="120" height="40"></td>
                    <td><?php echo $row['CarName']; ?></td>
                    <td><?php echo $row['CarCompanyName']; ?></td>
                    <td><?php echo $row['CarModel']; ?></td>
                    <td><a href="deleteCar.php?delete=<?php echo $row['CarID']; ?>">Delete</a></td>
                    <td><a href="updateCar.php?CarID=<?php echo $row['CarID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>