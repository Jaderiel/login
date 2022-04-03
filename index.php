<?php

    session_start();
    include "config.php";

    if(isset($_POST['uname'])) {
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '".$uname."' AND password = '".$password."' limit 1";  
            $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $_SESSION['uname'] = $uname;
            header("Location: view.php");
        } else {
            echo "Invalid username or password";
        }
    }

?>

<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="index.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Login</button>

     </form>

     <p>don't have an account? <a href="register2.php">Register Here</a>.</p>

</body>

</html>
