<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentEmail = $_POST['sEmail'];
    $StudentPassword = md5($_POST['Password']);

    $updateQuery = "UPDATE student_ds 
                    SET Student_Password = '$StudentPassword' 
                    WHERE Student_Email = '$StudentEmail'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "<h1>Password updated successfully.</h1><br>";
        echo 'Back to <a href="HomePageStdDS.php">Home Page</a>';
    } else {
        echo "Error updating password: " . $conn->error;
    }
}
?>
