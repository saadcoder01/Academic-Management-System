<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentID = $_POST['sID'];
    $FinalGrade = $_POST['fGrade'];
    $CourseID = $_POST['cID'];

    $updateSql = "UPDATE finalmarks_ai
                  SET Grade = '$FinalGrade'
                  WHERE CourseID = '$CourseID'
                  AND StudentID = '$StudentID'";

    if (mysqli_query($conn, $updateSql)) {
        echo "<h1 style='color: green; text-align: center; font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; border-radius: 10px;'>
                Final Grade updated successfully.
              </h1>";
    } else {
        echo "<h1 style='color: red; text-align: center; font-family: Arial, sans-serif; background-color: #ffe0e0; padding: 20px; border-radius: 10px;'>
                Error: " . mysqli_error($conn) . "
              </h1>";
    }
}
?>
