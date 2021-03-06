<?php 

include 'config.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

if (isset($_POST['submit'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$salutation = $_POST['salutation'];
	$suffix = $_POST['suffix'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$addressline1 = $_POST['addressline1'];
	$addressline2 = $_POST['addressline2'];
	$barangay= $_POST['barangay'];
	$region = $_POST['region'];
	$zip = $_POST['zip'];
	$gender = $_POST['gender'];
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);
    $timestamp = date('Y-m-d H:i:s');

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (firstname, lastname, salutation, suffix,  username,  email, gender, password, date) 
					VALUES ('$firstname', '$lastname', '$salutation', '$suffix', '$username', '$email', '$gender','$password', '$timestamp')";
			$result = mysqli_query($conn, $sql);
			if ($result) {

                $sql2 = "INSERT INTO user_add (addressline1, addressline2, barangay, region, zip) VALUES ('$addressline1', '$addressline2', '$barangay', '$region', '$zip')";
                $result2 = mysqli_query($conn, $sql2);

				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$firstname = "";
				$lastname = "";
				$salutation = "";
				$suffix = "";
				$username = "";
				$email = "";
				$addressline1 = "";
				$addressline2 = "";
				$barangay = "";
				$region = "";
				$zip = "";
				$gender = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>


<style>
	.container .login-email .input-group-3 {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    padding: 2px 10px;
	color: #463022;

}

/* .input-group-3 input[type=radio]:after { 
  color: #463022; 
}  */




</style>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="registration.css">
	<title>Register</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Personal Information</p>
			<div class="input-group-1">
				<input type="text" placeholder="Firstname" name="firstname" value="<?php echo $firstname; ?>" required>
                <input type="text" placeholder="Lastname" name="lastname" value="<?php echo $lastname; ?>" required>
			</div>
			<div class="input-group-3">
            Salutation:<br>

                <input type="radio" name="salutation" value="Mr">Mr.

                <input type="radio" name="salutation" value="Ms">Ms.

                <input type="radio" name="salutation" value="Mrs">Mrs.

                <input type="radio" name="salutation" value="Dr">Dr.

                <br>
			</div>
			<div class="input-group-3">
                Suffix:<br>

                <input type="radio" name="suffix" value="Jr">Jr

                <input type="radio" name="suffix" value="Sr">Sr

                <input type="radio" name="suffix" value="I">I

                <input type="radio" name="suffix" value="II">II

                <input type="radio" name="suffix" value="III">III

                <input type="radio" name="suffix" value="MD">MD

                <br>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Street and number, P.O. box, c/o " name="addressline1" value="<?php echo $addressline1; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Apartment, suite, unit, building, floor, etc." name="addressline2" value="<?php echo $addressline2; ?>" required>
			</div>
			<div class="input-group-1">
			<input type="text" placeholder="Barangay" name="barangay" value="<?php echo $barangay; ?>" required>
			<input type="text" placeholder="Region" name="region" value="<?php echo $region; ?>" required>
			</div>
			<div class="input-group-1">
			<input type="text" placeholder="Zip code" name="zip" value="<?php echo $zip; ?>" required>
			<input type="date" placeholder="Entry date" name="entrydate" value="<?php echo $entrydate; ?>" required>
			</div>
			<div class="input-group-3">
            Gender:<br>

            <input type="radio" name="gender" value="Male">Male

            <input type="radio" name="gender" value="Female">Female

            <br>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Submit</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>