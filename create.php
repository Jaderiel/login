<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $salutation = $_POST['salutation'];

    $suffix = $_POST['suffix'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $username = $_POST['username'];

    $gender = $_POST['gender'];

    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `salutation`, `suffix`, `email`, `password`, `username`, `gender`) VALUES ('$first_name','$last_name', '$salutation', '$suffix','$email','$password','$username','$gender')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Signup Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    First name:<br>

    <input type="text" name="firstname">

    <br>

    Last name:<br>

    <input type="text" name="lastname">

    <br>

    Salutation:<br>

    <input type="radio" name="salutation" value="Mr">Mr.

    <input type="radio" name="salutation" value="Ms">Ms.

    <input type="radio" name="salutation" value="Mrs">Mrs.

    <input type="radio" name="salutation" value="Dr">Dr.

    <br><br>

    Suffix:<br>

    <input type="radio" name="suffix" value="Jr">Jr

    <input type="radio" name="suffix" value="Sr">Sr

    <input type="radio" name="suffix" value="II">II

    <input type="radio" name="suffix" value="III">III

    <input type="radio" name="suffix" value="MD">MD

    <br><br>

    Email:<br>

    <input type="email" name="email">

    <br>

    Password:<br>

    <input type="password" name="password">

    <br>

    Username:<br>

    <input type="text" name="username">

    <br>

    Gender:<br>

    <input type="radio" name="gender" value="Male">Male

    <input type="radio" name="gender" value="Female">Female

    <br><br>

    <input type="submit" name="submit" value="submit">

    <p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>

  </fieldset>

</form>

</body>

</html>