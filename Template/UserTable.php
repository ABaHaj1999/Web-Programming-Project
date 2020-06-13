<?php
require_once('config/all.php');

$sqlStatement = 'SELECT * FROM `users`';

$result = mysqli_query($virtual_con, $sqlStatement);

$counter = 1;


?>

<form name="insertUser" action="insertUser.php" method="post">
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-default" name="newCar">New User</button>
    </div>
</form>

<form name="updateUser" action="updateUser.php" method="post">
    <div class="form-group" align="center">
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
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
                    <td><?php echo $row['UserID']; ?></td>
                    <td><?php echo $row['UserName']; ?></td>
                    <td><?php echo $row['UserEmail']; ?></td>
                    <td><a href="deleteUser.php?delete=<?php echo $row['UserID']; ?>">Delete</a></td>
                    <td><a href="updateUser.php?UserID=<?php echo $row['UserID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>