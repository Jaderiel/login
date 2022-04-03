<?php 

include "config.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

$sql2 = "SELECT * FROM user_add";

$result2 = $conn->query($sql2);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>First Name</th>

        <th>Last Name</th>

        <th>Salutation</th>

        <th>Suffix</th>

        <th>Email</th>

        <th>Gender</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['firstname']; ?></td>

                    <td><?php echo $row['lastname']; ?></td>

                    <td><?php echo $row['salutation']; ?></td>

                    <td><?php echo $row['suffix']; ?></td>

                    <td><?php echo $row['email']; ?></td>

                    <td><?php echo $row['gender']; ?></td>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>
                                       

        <?php       }

            }

        ?>                

    </tbody>
    

</table>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Address Line 1</th>

        <th>Address Line 2</th>

        <th>Region</th>

        <th>Barangay</th>

        <th>Zip</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result2->num_rows > 0) {

                while ($row = $result2->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['addressline1']; ?></td>

                    <td><?php echo $row['addressline2']; ?></td>

                    <td><?php echo $row['region']; ?></td>

                    <td><?php echo $row['barangay']; ?></td>

                    <td><?php echo $row['zip']; ?></td>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>
                                       

        <?php       }

            }

        ?>                

    </tbody>
    

</table>

<a href="logout.php">Log Out</a>


    </div>

</body>

</html>
