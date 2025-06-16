<?php

include 'connect.php';

if(isset($_POST['Register'])){
   $FacultyName = $_POST['facName'];
   $FacultyAge = $_POST['fAge'];
   $FacultyContact = $_POST['facContact'];
   $FacultyCNIC = $_POST['fCNIC'];
   $FacultyCity = $_POST['fCity'];
   $FacultyEmail = $_POST['fEmail'];
   $FacultySalary = $_POST['fSalary'];
   $FacultyPassword = $_POST['fPassword'];
   $FacultyPassword = md5($FacultyPassword); 

   $checkEmail = "SELECT * FROM faculty where Faculty_Email = '$FacultyEmail'";
   $result = $conn->query($checkEmail);
   if($result->num_rows > 0){
    echo "Email Address Already Exists !";
   }
   else{
    $insertQuery = "INSERT INTO faculty(Faculty_Name,Faculty_Age,Faculty_Contact,Faculty_CNIC,Faculty_City,Faculty_Email,Faculty_Salary,Faculty_Password)
    VALUES('$FacultyName','$FacultyAge','$FacultyContact','$FacultyCNIC','$FacultyCity','$FacultyEmail','$FacultySalary','$FacultyPassword')";
    
    if($conn->query($insertQuery)==TRUE){
        header("location: index.php");
    }
    else{
        echo "Error:".$conn->error;
    }
   }
}

if(isset($_POST['signin'])){
    $FacultyEmail = $_POST['fEmail'];
    $FacultyPassword = $_POST['fPassword'];
    $FacultyPassword = md5($FacultyPassword);

    $sql = "SELECT * FROM faculty WHERE Faculty_Email = '$FacultyEmail' and Faculty_Password = '$FacultyPassword'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['fEmail'] = $row['Faculty_Email'];
        header("location: HomePageFac.php");
        exit();
    }   
    else{
        echo "Not Found, Incorrect Email or Password";
    }
}
?>