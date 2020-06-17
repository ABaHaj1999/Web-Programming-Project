<?php
require_once('config/all.php');

$sqlStatement = 'SELECT * FROM `Messages`';

$result = mysqli_query($virtual_con, $sqlStatement);

$counter = 1;


?>

<form name="insertMessage" action="insertMessage.php" method="post">
    <div class="form-group" align="center">
        <button type="submit" class="btn btn-default" name="newCar">New Message</button>
    </div>
</form>

<form name="updateMessage" action="updateMessage.php" method="post">
    <div class="form-group" align="center">
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Message Subject</th>
                <th scope="col">User Email</th>
                <th scope="col">Message</th>
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
                    <td><?php echo $row['mUserID']; ?></td>
                    <td><?php echo $row['mUserName']; ?></td>
                    <td><?php echo $row['mUserSubject']; ?></td>
                    <td><?php echo $row['mUserEmail']; ?></td>
                    <td><?php echo $row['mUserMessage']; ?></td>
                    <td><a href="deleteMessage.php?delete=<?php echo $row['mUserID']; ?>">Delete</a></td>
                    <td><a href="updateMessage.php?mUserID=<?php echo $row['mUserID']; ?>">Update</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>