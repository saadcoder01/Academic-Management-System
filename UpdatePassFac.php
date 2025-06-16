<?php

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FacultyEmail = $_POST['fEmail'];
    $FacultyPassword = md5($_POST['fPassword']);

    $updateQuery = "UPDATE faculty 
                    SET Faculty_Password = '$FacultyPassword' 
                    WHERE Faculty_Email = '$FacultyEmail'";

    if ($conn->query($updateQuery) === TRUE) {
        echo "<h1>Password updated successfully.</h1><br>";
        echo 'Back to <a href="HomePageFac.php">Home Page</a>';
    } else {
        echo "Error updating password: " . $conn->error;
    }
}
?>
