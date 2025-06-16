<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentID = $_POST['sID'];
    $QuizMarks1 = $_POST['qMarks1'];
    $QuizMarks2 = $_POST['qMarks2'];
    $QuizMarks3 = $_POST['qMarks3'];
    $QuizMarks4 = $_POST['qMarks4'];
    $CourseID = $_POST['cID'];

    $updateSql = "UPDATE quizmarks_ai 
              SET QiMarks1 = '$QuizMarks1',
                  QiMarks2 = '$QuizMarks2',
                  QiMarks3 = '$QuizMarks3',
                  QiMarks4 = '$QuizMarks4'
              WHERE CourseID = '$CourseID' 
              AND StudentID = '$StudentID'";


    if (mysqli_query($conn, $updateSql)) {
        echo "<h1 style='color: green; text-align: center; font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; border-radius: 10px;'>Quiz marks updated successfully.</h1>";
    } else {
        echo "<h1 style='color: red; text-align: center; font-family: Arial, sans-serif;'>Error: " . mysqli_error($conn) . "</h1>";
    }
}
?>
