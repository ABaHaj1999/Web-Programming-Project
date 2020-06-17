<?php
require_once('config/all.php');

$sqlStatement = 'SELECT * FROM `experts`';

$result = mysqli_query($virtual_con, $sqlStatement);

$counter = 1;


?>

<form name="insertExpert" action="insertExpert.php" method="post">
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-default" name="newCar">New Expert</button>
    </div>
</form>

<form name="updateExpert" action="updateExpert.php" method="post">
    <div class="form-group" align="center">
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Expert ID</th>
                <th scope="col">Expert Picture</th>
                <th scope="col">Expert Name</th>
                <th scope="col">Expert Position</th>
                <th scope="col">Expert Words</th>
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
                    <td><?php echo $row['ExpertID']; ?></td>
                    <td><img src="<?php echo $row['ExpertPic']; ?>" width="100" height="90"></td>
                    <td><?php echo $row['ExpertName']; ?></td>
                    <td><?php echo $row['ExpertPosition']; ?></td>
                    <td><?php echo $row['ExpertWords']; ?></td>
                    <td><a href="deleteExpert.php?delete=<?php echo $row['ExpertID']; ?>">Delete</a></td>
                    <td><a href="updateExpert.php?ExpertID=<?php echo $row['ExpertID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>