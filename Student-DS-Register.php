<?php

include 'connect.php';

if(isset($_POST['Register'])){
   $StudentName = $_POST['sName'];
   $FatherName = $_POST['fName'];
   $StudentAge = $_POST['age'];
   $StudentContact = $_POST['sContact'];
   $FatherContact = $_POST['fContact'];
   $StudentCNIC = $_POST['sCNIC'];
   $StudentCity = $_POST['sCity'];
   $StudentEmail = $_POST['sEmail'];
   $StudentPassword = $_POST['password'];
   $StudentPassword = md5($StudentPassword); 

   $checkEmail = "SELECT * FROM student_ds where Student_Email = '$StudentEmail'";
   $result = $conn->query($checkEmail);
   if($result->num_rows > 0){
    echo "Email Address Already Exists !";
   }
   else{
    $insertQuery = "INSERT INTO student_ds(Student_Name,Father_Name,Student_Age,Student_Contact,Father_Contact,Student_CNIC,Student_City,Student_Email,Student_Password)
    VALUES('$StudentName','$FatherName','$StudentAge','$StudentContact','$FatherContact','$StudentCNIC','$StudentCity','$StudentEmail','$StudentPassword')";
    
    if($conn->query($insertQuery)==TRUE){
        header("location: index.php");
    }
    else{
        echo "Error:".$conn->error;
    }
   }
}

if(isset($_POST['signin'])){
    $StudentEmail = $_POST['sEmail'];
    $StudentPassword = $_POST['password'];
    $StudentPassword = md5($StudentPassword);

    $sql = "SELECT * FROM student_ds WHERE Student_Email = '$StudentEmail' and Student_Password = '$StudentPassword'";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['sEmail'] = $row['sEmail'];
        header("location: HomePageStdDS.php");
        exit();
    }   
    else{
        echo "Not Found, Incorrect Email or Password";
    }
}
?>