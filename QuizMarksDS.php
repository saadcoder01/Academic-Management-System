<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $StudentID = $_POST['sID'];
    $QuizMarks1 = $_POST['qMarks1'];
    $QuizMarks2 = $_POST['qMarks2'];
    $QuizMarks3 = $_POST['qMarks3'];
    $QuizMarks4 = $_POST['qMarks4'];
    $CourseID = $_POST['cID'];

    $sql = "INSERT INTO quizmarks_ds (StudentID,QiMarks1,QiMarks2,QiMarks3,QiMarks4,CourseID)
            VALUES ('$StudentID','$QuizMarks1','$QuizMarks2','$QuizMarks3','$QuizMarks4','$CourseID')";

    if (mysqli_query($conn, $sql)) {
        echo "<h1 style='color: green; text-align: center; font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; border-radius: 10px;'>
                Quiz marks added successfully.
              </h1>";
    } else {
        echo "<h1 style='color: red; text-align: center; font-family: Arial, sans-serif; background-color: #ffe0e0; padding: 20px; border-radius: 10px;'>
                Error: " . mysqli_error($conn) . "
              </h1>";
    }
}
?>
