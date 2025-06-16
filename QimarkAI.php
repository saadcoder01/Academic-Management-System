<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Marks</title>
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
    <h2>Quiz Marks</h2>

    <form action="" method="get" class="mb-4">
      <div class="row g-2">
        <div class="col-md-8">
          <input type="text" name="cID" value="<?php if(isset($_GET['cID'])) {echo $_GET['cID'];} ?>" class="form-control" placeholder="Enter CourseID">
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>
    </form>

    <?php
    include 'connect.php';

    if(isset($_GET['cID'])) {
        $Courseid = $_GET['cID'];
        $query = "SELECT * FROM quizmarks_ai WHERE CourseID = '$Courseid'";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0) {
            foreach($query_run as $row) {
    ?>

      <div class="mb-3">
        <label class="form-label">Quiz 1 Marks</label>
        <input type="text" value="<?= $row["QiMarks1"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Quiz 2 Marks</label>
        <input type="text" value="<?= $row["QiMarks2"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Quiz 3 Marks</label>
        <input type="text" value="<?= $row["QiMarks3"]; ?>" class="form-control" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Quiz 4 Marks</label>
        <input type="text" value="<?= $row["QiMarks4"]; ?>" class="form-control" readonly>
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
