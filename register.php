<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

  $given_name   = $_POST['given_name'];
  $family_name  = $_POST['family_name'];
  $id_student      = $_POST['id_student'];


	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password, given_name, family_name,id_student)
      VALUES ('$username', '$email', '$password', '$given_name ','$family_name','$id_student')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<meta http-equiv='refresh' content='0;url=login.php'>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}

	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">


	<title>Register</title>
</head>

<body>

	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="register-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>





            <div class="input-group">
				<input type="text" placeholder="First Name" name="given_name" value="<?php echo $_POST['given_name']; ?>" required>
			</div>
      <div class="input-group">
  <input type="text" placeholder="Last Name" name="family_name" value="<?php echo $_POST['family_name']; ?>" required>
</div>
<div class="input-group">
<input type="text" placeholder="Student ID" name="id_student" value="<?php echo $_POST['id_student']; ?>" required>
</div>






<div class="input-group">
  <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
      </div>
<div class="input-group">
<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
</div>

			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
