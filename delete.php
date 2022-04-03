<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    $sql2 = "DELETE FROM `user_add` WHERE `id`='$user_id'";

    $result2 = $conn->query($sql2);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header ("Location: view.php");

        if ($result2 == TRUE) {

            echo "Record deleted successfully.";
            header ("Location: view.php");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}
}

?>
