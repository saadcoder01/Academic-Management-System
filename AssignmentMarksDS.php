<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentID = $_POST['sID'];
    $AssignmentMarks1 = $_POST['aMarks1'];
    $AssignmentMarks2 = $_POST['aMarks2'];
    $AssignmentMarks3 = $_POST['aMarks3'];
    $AssignmentMarks4 = $_POST['aMarks4'];
    $CourseID = $_POST['cID'];

    $sql = "INSERT INTO assignmentmarks_ds (StudentID,AssignMarks1,AssignMarks2,AssignMarks3,AssignMarks4,CourseID)
            VALUES ('$StudentID','$AssignmentMarks1','$AssignmentMarks2','$AssignmentMarks3','$AssignmentMarks4','$CourseID')";

    if (mysqli_query($conn, $sql)) {
        echo "<h1 style='color: green; text-align: center; font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; border-radius: 10px;'>
                Assignment Marks added successfully.
              </h1>";
    } else {
        echo "<h1 style='color: red; text-align: center; font-family: Arial, sans-serif; background-color: #ffe0e0; padding: 20px; border-radius: 10px;'>
                Error: " . mysqli_error($conn) . "
              </h1>";
    }
}
?>
