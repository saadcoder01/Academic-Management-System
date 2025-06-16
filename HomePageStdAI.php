<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </style>
</head>
<body>

    <div class="top-bar">Welcome to College Management System</div>

    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="PersInfoAI.php">Personal Information</a></li>
                <li onclick="openContent('dashboard')">Quiz Marks</li>
                <li onclick="openContent('students')">Assignment Marks</li>
                <li onclick="openContent('attendance')">Attendance</li>
                <li onclick="openContent('final-grade')">Final Grade</li>
                <li onclick="openContent('change-password')">Change Password</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="main-content" id="content">
            <h2>Welcome Dear Student!</h2>
            <p>Select an option from the left menu.</p>
        </div>
    </div>

    <script>
        function openContent(option) {
            const contentDiv = document.getElementById('content');
            let content = '';

            if (option === 'dashboard') {
                content = `
                <h2>Quiz Marks</h2>
                <a href="QimarkAI.php">Click here to check marks</a>
                
                `;
            } else if (option === 'students') {
                content = `
                <h2>Assignment Marks</h2>
                <a href="AsmarksAI.php">Click here to check marks</a>
                `;
            } else if (option === 'attendance') {
                content = `
                <h2>Attendance</h2>
                <a href="AttAI.php">Click here to check Attendance</a>
                `;
            } else if (option === 'final-grade') {
                content = `
                <h2>Final Graade</h2>
                <a href="FmarksAI.php">Click here to check Final Grade</a>
                `;
            } else if (option === 'change-password') {
  content = `
    <style>
      .form-container {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      }
      .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #0d6efd;
      }
      .form-container label {
        font-weight: 500;
        display: block;
        margin-bottom: 8px;
      }
      .form-container input[type="text"],
      .form-container input[type="email"],
      .form-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ced4da;
        border-radius: 5px;
      }
      .form-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #0d6efd;
        border: none;
        border-radius: 5px;
        color: white;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      .form-container input[type="submit"]:hover {
        background-color: #0b5ed7;
      }
    </style>

    <div class="form-container">
      <h2>Change Password</h2>
      <form action="UpdatePassAI.php" method="POST">
        <label for="sEmail">Student Email:</label>
        <input type="text" id="sEmail" name="sEmail" required>

        <label for="Password">New Password:</label>
        <input type="text" id="Password" name="Password" required>

        <input type="submit" value="Change Password">
      </form>
    </div>
  `;
}


            contentDiv.innerHTML = content;
        }
    </script>

</body>
</html> 