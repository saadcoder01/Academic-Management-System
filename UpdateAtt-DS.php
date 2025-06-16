<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentID = $_POST['sID'];
    $CourseID = $_POST['cID'];
    $FacultyID = $_POST['fID'];
    $Attendence1 = $_POST['Atten1'];
    $Attendence2 = $_POST['Atten2'];
    $Attendence3 = $_POST['Atten3'];
    $Attendence4 = $_POST['Atten4'];
    
    $updateSql = "UPDATE attendance_ds 
              SET Atten1 = '$Attendence1',
                  Atten2 = '$Attendence2',
                  Atten3 = '$Attendence3',
                  Atten4 = '$Attendence4'
              WHERE CourseID = '$CourseID' 
              AND StudentID = '$StudentID' 
              AND FacultyID = '$FacultyID'";

    if (mysqli_query($conn, $updateSql)) {
        echo "<h1 style='color: green; text-align: center; font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; border-radius: 10px;'>
                Attendance updated successfully.
              </h1>";
    } else {
        echo "<h1 style='color: red; text-align: center; font-family: Arial, sans-serif; background-color: #ffe0e0; padding: 20px; border-radius: 10px;'>
                Error: " . mysqli_error($conn) . "
              </h1>";
    }
}
?>
