<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f9fc;
    }
    .container-box {
      max-width: 700px;
      margin: auto;
      margin-top: 50px;
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    h2 {
      margin-bottom: 30px;
      text-align: center;
      color: #0d6efd;
    }
    .form-label {
      font-weight: 500;
    }
    .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body>

  <div class="container-box">
    <h2>Personal Information</h2>

    <form action="" method="get" class="mb-4">
      <div class="row g-2">
        <div class="col-md-8">
          <input type="text" name="sEmail" value="<?php if(isset($_GET['sEmail'])) {echo $_GET['sEmail'];} ?>" class="form-control" placeholder="Enter Student Email">
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>

    <?php
    include 'connect.php';

    if(isset($_GET['sEmail'])) {
        $StudentEmail = $_GET['sEmail'];
        $query = "SELECT * FROM student_ai WHERE Student_Email = '$StudentEmail'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $row) {
    ?>

      <div class="mb-3">
        <label class="form-label">Student ID</label>
        <input type="text" value="<?= $row["StudentID"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Student Name</label>
        <input type="text" value="<?= $row["Student_Name"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Father Name</label>
        <input type="text" value="<?= $row["Father_Name"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Student Age</label>
        <input type="text" value="<?= $row["Student_Age"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Student Contact</label>
        <input type="text" value="<?= $row["Student_Contact"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Father Contact</label>
        <input type="text" value="<?= $row["Father_Contact"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Student CNIC</label>
        <input type="text" value="<?= $row["Student_CNIC"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Student City</label>
        <input type="text" value="<?= $row["Student_City"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Student Email</label>
        <input type="text" value="<?= $row["Student_Email"]; ?>" class="form-control" readonly>
      </div>

    <?php
            }
        } else {
            echo '<div class="alert alert-warning text-center">No Record Found</div>';
        }
    }
    ?>
  </div>

</body>
</html>
