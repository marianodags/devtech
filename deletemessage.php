<?php

include_once('config.php');


$sql = "DELETE FROM message WHERE id_message='" . $_GET["del"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "<meta http-equiv='refresh' content='0;url=usermessagehistory.php'>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
