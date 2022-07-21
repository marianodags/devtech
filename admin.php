<?php
include 'config.php';
session_start();

if (!isset($_SESSION['adminusername'])) {
    header("Location: adminlogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>ADMIN</title>
</head>

<body>

<div class="container-fluid justify-content-sm-center" id="admin-container">
    
    <?php echo "<h4>Welcome  " . $_SESSION['adminusername'] . "</h4>"; ?>
    <table class="admin-table">
        <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>Email</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Student ID</th>
        <th>Date</th>
        <th>Delete User</th>

        </tr>
<?php
$sql = "SELECT * FROM users ";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. " </td><td>" . $row["email"].
        "</td><td>" . $row["given_name"]. "</td><td>" . $row["family_name"].
         "</td><td>" . $row["id_student"]. "</td><td>" . $row["p_date"].
         "</td><td> <span><a href='delete.php?del=".$row['id']."'>DELETE</a></span>" .
        "</td></tr>";

    }
    echo "</table>";

} else {
    echo "0 results";
}



  ?>
  <br><br><br>
 <center> 
  <a href="logout.php"><button class="btn btn-dark" type="button" name="button">LOGOUT</button></a>
 <a href="update.php"><button class="btn btn-dark" type="button" name="button">UPDATE</button></a>

<a href="newpass.php"><button class="btn btn-dark" type="button" name="button">CHANGE PASSWORD</button></a>
 </div>

</center>

</body>
</html>
