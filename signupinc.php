<?php
include 'config.php';

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

      $given_name   = $_POST['given_name'];
      $family_name  = $_POST['family_name'];
      $id_student      = $_POST['id_student'];

    if (emptyInputSignup($username,$email,$password,$cpassword,$given_name ,$family_name,$id_student) !== false) {
    	 header("Location: register.php?error=emptyinput");
    	 exit();
    }
    if (invalidUid($username) !== false) {
    	 header("Location: register.php?error=invaliduid");
    	 exit();
    }
    if (invalidEmail($email) !== false) {
    	 header("Location: register.php?error=invalidemail");
    	 exit();
    }
    if (pwdMatch($password,$cpassword) !== false) {
    	 header("Location: register.php?error=passworddontmatch");
    	 exit();
    }
    if (uidExist($conn,$username,$email) !== false) {
    	 header("Location: register.php?error=usernametaken");
    	 exit();
    }
    
    createUser($conn,$username,$email,$password,$given_name ,$family_name,$id_student);


}else{
	header("Location: register.php");
	 exit();

}



 ?>
 <?php
function emptyInputSignup($username,$email,$password,$cpassword,$given_name ,$family_name,$id_student) {
	$result;
	if (empty($username)||empty($email)||empty($password)||empty($cpassword)||empty($given_name)||empty($family_name)||empty($id_student)) {
		$result=true;
		// code...
	}else{
		$result=false;
	}
return $result;
}

function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		$result=true;
		// code...
	}else{
		$result=false;
	}
return $result;
}

function invalidEmail($email) {
	$result;
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$result=true;
		// code...
	}else{
		$result=false;
	}
return $result;
}

function pwdMatch($password,$cpassword) {
	$result;
	if ($password !== $cpassword) {
		$result=true;

	}else{
		$result=false;
	}
return $result;
}


function uidExist($conn,$username,$email) {
		$sql = "SELECT * FROM users WHERE username=? or email=?;";
		$stmt=mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location: register.php?error=stmtfailed");
	 	 	exit();
		}
		mysqli_stmt_bind_param($stmt,"ss",$username,$email);
		mysqli_stmt_execute($stmt);


		$resultData=mysqli_stmt_get_result($stmt);

		if ($row=mysqli_fetch_assoc($resultData)) {
			return $row;
		}else{
			$result=false;
			return $result;
		}

			mysqli_stmt_close($stmt);
}









function createUser($conn,$username,$email,$password,$given_name ,$family_name,$id_student) {
	$sql = "INSERT INTO users (username, email, password, given_name, family_name, status, p_date)
	VALUES ('$username', '$email', '$password', '$given_name ','$family_name','$status','$p_date')";

		$stnmt=mysqli_stmt_init($conn);
		if (!$mysqli_stmt_prepare($stnmt,$sql)) {
			header("Location: register.php?error=stmtfailed");
	 	 	exit();
		}

		mysqli_stmt_bind_param($stmt,"ssssss",$username,$email,$password,$given_name ,$family_name,$id_student);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("Location: register.php?error=stmtfailed");
		exit();

}

   ?>


