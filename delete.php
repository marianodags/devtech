<?php

include_once('config.php');


$sql = "DELETE FROM users WHERE id='" . $_GET["del"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}


$sql2 = "DELETE FROM message WHERE user='" . $_GET["del"] . "'";
if (mysqli_query($conn, $sql2)) {
    echo "<meta http-equiv='refresh' content='0;url=admin.php'>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
