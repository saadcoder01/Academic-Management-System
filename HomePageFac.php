<?php
session_start();
include 'connect.php';
?>

<html>
<head>
    <title>College Management System</title>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    /* Top Bar */
    .top-bar {
        width: 100%;
        background-color: #0056b3;
        color: white;
        text-align: center;
        padding: 40px;
        font-size: 40px;
        font-weight: bold;
    }
    /* Layout Wrapper */
    .container {
        display: flex;
        flex-grow: 1;
    }
    /* Left Sidebar */
    .sidebar {
        width: 20%;
        height: 100%;
        position: relative;
        overflow-y: auto; /* Scrollable */
        background-color: #333;
        color: white;
        padding: 15px;
    }
    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 10px;
        cursor: pointer;
        border-bottom: 1px solid white;
    }
    .sidebar ul li:hover {
        background-color: #444;
    }
    .sidebar ul li a{
        color: white;
        text-decoration: none;
    }
    /* Main Content */
    .main-content {
        flex-grow: 1;
        padding: 20px;        
    }
    .submenu {
        list-style-type: none;
        padding-left: 15px;
        display: none; /* Hidden by default */
        margin-left: 20px;
    }
    .submenu li {
        background-color: #444;
        padding: 8px;
        border-bottom: 1px solid #555;
    }
    .submenu li:hover {
        background-color: #555;
    }
    form {
    background-color:rgb(98, 155, 230);
    padding: 20px;
    max-width: 500px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    }
    form label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    form input[type="text"],
    form input[type="number"],
    form input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
    }
    form input[type="submit"] {
        background-color: #0056b3;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    form input[type="submit"]:hover {
        background-color: #004090;
    }
    form h2 {
        color: #0056b3;
        margin-bottom: 20px;
    }
    
    </style>
</head>
<body>

    <div class="top-bar">Welcome to College Management System</div>

    <div class="container">
        <div class="sidebar">
            <ul>
                <li onclick="toggleSubMenu('students-submenu')">Students</li>
                <ul id="students-submenu" class="submenu">

                <li onclick="toggleSubMenu('add-quiz-submenu')">➤ Add Student Quiz-Marks</li>
                <ul id="add-quiz-submenu" class="submenu">
                    <li onclick="openContent('quizmarks-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('quizmarks-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('update-quiz-submenu')">➤ Update Student Quiz-Marks</li>
                <ul id="update-quiz-submenu" class="submenu">
                    <li onclick="openContent('update-quizmarks-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('update-quizmarks-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('add-assignment-submenu')">➤ Add Student Assignment-Marks</li>
                <ul id="add-assignment-submenu" class="submenu">
                    <li onclick="openContent('assignmentmarks-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('assignmentmarks-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('update-assignment-submenu')">➤ Update Student Assignment-Marks</li>
                <ul id="update-assignment-submenu" class="submenu">
                    <li onclick="openContent('update-assignmentmarks-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('update-assignmentmarks-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('add-finalgrade-submenu')">➤ Add Student Final-Grade</li>
                <ul id="add-finalgrade-submenu" class="submenu">
                    <li onclick="openContent('finalgrade-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('finalgrade-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('update-finalgrade-submenu')">➤ Update Student Final-Grade</li>
                <ul id="update-finalgrade-submenu" class="submenu">
                    <li onclick="openContent('update-finalgrade-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('update-finalgrade-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('add-attendence-submenu')">➤ Add Student Attendance</li>
                <ul id="add-attendence-submenu" class="submenu">
                    <li onclick="openContent('attendence-ai')">Artificial Intelligence</li>
                    <li onclick="openContent('attendence-ds')">Data Science</li>
                </ul>
                <li onclick="toggleSubMenu('update-attendence-submenu')">➤ Update Student Attendance</li>
                <ul id="update-attendence-submenu" class="submenu">
                   <li onclick="openContent('update-attendence-ai')">Artificial Intelligence</li>
                   <li onclick="openContent('update-attendence-ds')">Data Science</li>
                </ul>
             </ul>
                <!-- <li onclick="openContent('courses')">Courses</li>
                <li onclick="openContent('faculty')">Faculty</li> -->
                <li onclick="openContent('change-password')">Change Password</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content" id="content">
            <h2>Welcome Dear Faculty Member!</h2>
            <p>Select an option from the left menu.</p>
        </div>
    </div>

<script>
    function openContent(option) {
        const contentDiv = document.getElementById('content');
        let content = '';

        if (option === 'dashboard') {
            content = '<h2>Dashboard</h2><p>Overview of system.</p>';
        } else if (option === 'quizmarks-ai') {
            content = `
         <h2>Add Student Quiz Marks Ai</h2>
         <form action="QuizMarksAI.php" method="POST"> 

         <label for="sID">Student ID:</label><br>
         <input type="text" id="sID" name="sID" required><br><br>

         <label for="cID">Course ID:</label><br>
         <input type="text" id="cID" name="cID" required><br><br>

         <label for="qMarks1">Quiz 1 Marks:</label><br>
         <input type="number" id="qMarks1" name="qMarks1" required><br><br>

         <label for="qMarks2">Quiz 2 Marks:</label><br>
         <input type="number" id="qMarks2" name="qMarks2" required><br><br>

         <label for="qMarks3">Quiz 3 Marks:</label><br>
         <input type="number" id="qMarks3" name="qMarks3" required><br><br>

         <label for="qMarks4">Quiz 4 Marks:</label><br>
         <input type="number" id="qMarks4" name="qMarks4" required><br><br>

         <input type="submit" value="Submit">
         </form>
          `;
         } else if (option === 'quizmarks-ds') {
            content = `
         <h2>Add Student Quiz Marks Ds</h2>
         <form action="QuizMarksDS.php" method="POST"> 

         <label for="sID">Student ID:</label><br>
         <input type="text" id="sID" name="sID" required><br><br>

         <label for="cID">Course ID:</label><br>
         <input type="text" id="cID" name="cID" required><br><br>

         <label for="qMarks1">Quiz 1 Marks:</label><br>
         <input type="number" id="qMarks1" name="qMarks1" required><br><br>

         <label for="qMarks2">Quiz 2 Marks:</label><br>
         <input type="number" id="qMarks2" name="qMarks2" required><br><br>

         <label for="qMarks3">Quiz 3 Marks:</label><br>
         <input type="number" id="qMarks3" name="qMarks3" required><br><br>

         <label for="qMarks4">Quiz 4 Marks:</label><br>
         <input type="number" id="qMarks4" name="qMarks4" required><br><br>

         <input type="submit" value="Submit">
         </form>
          `;
         } else if (option === 'update-quizmarks-ai') {
            content = `
         <h2>Update Student Quiz Marks Ai</h2>
         <form action="UpdateQ-Mark-AI.php" method="POST"> 

         <label for="sID">Student ID:</label><br>
         <input type="text" id="sID" name="sID" required><br><br>

         <label for="cID">Course ID:</label><br>
         <input type="text" id="cID" name="cID" required><br><br>

         <label for="qMarks1">Quiz 1 Marks:</label><br>
         <input type="number" id="qMarks1" name="qMarks1" required><br><br>

         <label for="qMarks2">Quiz 2 Marks:</label><br>
         <input type="number" id="qMarks2" name="qMarks2" required><br><br>

         <label for="qMarks3">Quiz 3 Marks:</label><br>
         <input type="number" id="qMarks3" name="qMarks3" required><br><br>

         <label for="qMarks4">Quiz 4 Marks:</label><br>
         <input type="number" id="qMarks4" name="qMarks4" required><br><br>

         <input type="submit" value="Submit">
         </form>
          `;
         } else if (option === 'update-quizmarks-ds') {
            content = `
         <h2>Update Student Quiz Marks Ds</h2>
         <form action="UpdateQ-Mark-DS.php" method="POST"> 

         <label for="sID">Student ID:</label><br>
         <input type="text" id="sID" name="sID" required><br><br>

         <label for="cID">Course ID:</label><br>
         <input type="text" id="cID" name="cID" required><br><br>

         <label for="qMarks1">Quiz 1 Marks:</label><br>
         <input type="number" id="qMarks1" name="qMarks1" required><br><br>

         <label for="qMarks2">Quiz 2 Marks:</label><br>
         <input type="number" id="qMarks2" name="qMarks2" required><br><br>

         <label for="qMarks3">Quiz 3 Marks:</label><br>
         <input type="number" id="qMarks3" name="qMarks3" required><br><br>

         <label for="qMarks4">Quiz 4 Marks:</label><br>
         <input type="number" id="qMarks4" name="qMarks4" required><br><br>

         <input type="submit" value="Submit">
         </form>
          `;
         } else if (option === 'assignmentmarks-ai') {
            content = `
           <h2>Add Student Assignment Marks Ai</h2>
           <form action="AssignmentMarksAI.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="aMarks1">Assignment 1 Marks:</label><br>
            <input type="number" id="aMarks1" name="aMarks1" required><br><br>

            <label for="aMarks2">Assignment 2 Marks:</label><br>
            <input type="number" id="aMarks2" name="aMarks2" required><br><br>

            <label for="aMarks3">Assignment 3 Marks:</label><br>
            <input type="number" id="aMarks3" name="aMarks3" required><br><br>

            <label for="aMarks4">Assignment 4 Marks:</label><br>
            <input type="number" id="aMarks4" name="aMarks4" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'assignmentmarks-ds') {
            content = `
           <h2>Add Student Assignment Marks Ds</h2>
           <form action="AssignmentMarksDS.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="aMarks1">Assignment 1 Marks:</label><br>
            <input type="number" id="aMarks1" name="aMarks1" required><br><br>

            <label for="aMarks2">Assignment 2 Marks:</label><br>
            <input type="number" id="aMarks2" name="aMarks2" required><br><br>

            <label for="aMarks3">Assignment 3 Marks:</label><br>
            <input type="number" id="aMarks3" name="aMarks3" required><br><br>

            <label for="aMarks4">Assignment 4 Marks:</label><br>
            <input type="number" id="aMarks4" name="aMarks4" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'update-assignmentmarks-ai') {
            content = `
           <h2>Update Student Assignment Marks Ai</h2>
           <form action="UpdateA-Mark-AI.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="aMarks1">Assignment 1 Marks:</label><br>
            <input type="number" id="aMarks1" name="aMarks1" required><br><br>

            <label for="aMarks2">Assignment 2 Marks:</label><br>
            <input type="number" id="aMarks2" name="aMarks2" required><br><br>

            <label for="aMarks3">Assignment 3 Marks:</label><br>
            <input type="number" id="aMarks3" name="aMarks3" required><br><br>

            <label for="aMarks4">Assignment 4 Marks:</label><br>
            <input type="number" id="aMarks4" name="aMarks4" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'update-assignmentmarks-ds') {
            content = `
           <h2>Update Student Assignment Marks Ds</h2>
           <form action="UpdateA-Mark-DS.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="aMarks1">Assignment 1 Marks:</label><br>
            <input type="number" id="aMarks1" name="aMarks1" required><br><br>

            <label for="aMarks2">Assignment 2 Marks:</label><br>
            <input type="number" id="aMarks2" name="aMarks2" required><br><br>

            <label for="aMarks3">Assignment 3 Marks:</label><br>
            <input type="number" id="aMarks3" name="aMarks3" required><br><br>

            <label for="aMarks4">Assignment 4 Marks:</label><br>
            <input type="number" id="aMarks4" name="aMarks4" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'finalgrade-ai') {
            content = `
           <h2>Add Student Final Grade Ai</h2>
           <form action="FinalGradeAI.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fGrade">Final Grade:</label><br>
            <input type="text" id="fGrade" name="fGrade" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'finalgrade-ds') {
            content = `
           <h2>Add Student Final Grade Ds</h2>
           <form action="FinalGradeDS.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fGrade">Final Grade:</label><br>
            <input type="text" id="fGrade" name="fGrade" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'update-finalgrade-ai') {
            content = `
           <h2>Update Student Final Grade Ai</h2>
           <form action="UpdateF-Grade-AI.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fGrade">Final Grade:</label><br>
            <input type="text" id="fGrade" name="fGrade" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'update-finalgrade-ds') {
            content = `
           <h2>Update Student Final Grade Ds</h2>
           <form action="UpdateF-Grade-DS.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fGrade">Final Grade:</label><br>
            <input type="text" id="fGrade" name="fGrade" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'attendence-ai') {
            content = `
           <h2>Add Student Attendence Ai</h2>
           <form action="AttendanceAI.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fID">Faculty ID:</label><br>
            <input type="text" id="fID" name="fID" required><br><br>

            <label for="Atten1">Attendence 1:</label><br>
            <input type="text" id="Atten1" name="Atten1" required><br><br>

            <label for="Atten2">Attendence 2:</label><br>
            <input type="text" id="Atten2" name="Atten2" required><br><br>

            <label for="Atten3">Attendence 3:</label><br>
            <input type="text" id="Atten3" name="Atten3" required><br><br>

            <label for="Atten4">Attendence 4:</label><br>
            <input type="text" id="Atten4" name="Atten4" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'attendence-ds') {
            content = `
           <h2>Add Student Attendence Ds</h2>
           <form action="AttendanceDS.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fID">Faculty ID:</label><br>
            <input type="text" id="fID" name="fID" required><br><br>

            <label for="Atten1">Attendence 1:</label><br>
            <input type="text" id="Atten1" name="Atten1 " required><br><br>

            <label for="Atten2 ">Attendence 2:</label><br>
            <input type="text" id="Atten2" name="Atten2 " required><br><br>

            <label for="Atten3 ">Attendence 3:</label><br>
            <input type="text" id="Atten3" name="Atten3 " required><br><br>

            <label for="Atten4 ">Attendence 4:</label><br>
            <input type="text" id="Atten4" name="Atten4 " required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'update-attendence-ai') {
            content = `
           <h2>Update Student Attendence Ai</h2>
           <form action="UpdateAtt-AI.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fID">Faculty ID:</label><br>
            <input type="text" id="fID" name="fID" required><br><br>

            <label for="Atten1">Attendence 1:</label><br>
            <input type="text" id="Atten1" name="Atten1" required><br><br>

            <label for="Atten2">Attendence 2:</label><br>
            <input type="text" id="Atten2" name="Atten2" required><br><br>

            <label for="Atten3">Attendence 3:</label><br>
            <input type="text" id="Atten3" name="Atten3" required><br><br>

            <label for="Atten4">Attendence 4:</label><br>
            <input type="text" id="Atten4" name="Atten4" required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'update-attendence-ds') {
            content = `
           <h2>Update Student Attendence Ds</h2>
           <form action="UpdateAtt-DS.php" method="POST">

            <label for="sID">Student ID:</label><br>
            <input type="text" id="sID" name="sID" required><br><br>

            <label for="cID">Course ID:</label><br>
            <input type="text" id="cID" name="cID" required><br><br>

            <label for="fID">Faculty ID:</label><br>
            <input type="text" id="fID" name="fID" required><br><br>

            <label for="Atten1">Attendence 1:</label><br>
            <input type="text" id="Atten1" name="Atten1 " required><br><br>

            <label for="Atten2 ">Attendence 2:</label><br>
            <input type="text" id="Atten2" name="Atten2 " required><br><br>

            <label for="Atten3 ">Attendence 3:</label><br>
            <input type="text" id="Atten3" name="Atten3 " required><br><br>

            <label for="Atten4 ">Attendence 4:</label><br>
            <input type="text" id="Atten4" name="Atten4 " required><br><br>

            <input type="submit" value="Submit">
           </form>
          `;
        } else if (option === 'courses') {
            content = '<h2>Courses</h2><p>Available courses list.</p>';
        } else if (option === 'change-password') {
            content = `
           <h2>Change Password</h2>
           <form action="UpdatePassFac.php" method="POST">

            <label for="fEmail">Faculty Email:</label><br>
            <input type="text" id="fEmail" name="fEmail" required><br><br>

            <label for="fPassword">New Password:</label><br>
            <input type="text" id="fPassword" name="fPassword" required><br><br>

            <input type="submit" value="Change Password">
           </form>
          `;
        }

        contentDiv.innerHTML = content;
    }

    // function toggleSubMenu(id) {
    //    const submenu = document.getElementById(id);
    //    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    // }
    
       function toggleSubMenu(id) {
          const submenu = document.getElementById(id);
          if (submenu) {
              submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
          }
      }
    </script>

</body>
</html> 