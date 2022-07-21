<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['adminusername'])) {
    header("Location: admin.php");
}

if (isset($_POST['submit'])) {
	$adminemail = $_POST['adminemail'];
	$adminpassword = ($_POST['adminpassword']);

	$sql = "SELECT * FROM admin WHERE adminemail='$adminemail' AND adminpassword='$adminpassword'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['adminusername'] = $row['adminusername'];
		header("Location: admin.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login</title>
</head>


<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800; color:white;">LOGIN</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="adminemail" value="<?php echo $adminemail; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="adminpassword" value="<?php echo $_POST['adminpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</body>
</html>
