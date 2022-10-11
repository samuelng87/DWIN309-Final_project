<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light">
    <div class="container"> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar6">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar6">
        <a class="navbar-brand text-primary d-none d-md-block" href="index.php">
          <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          <b> Amazing Engineers</b>
        </a>
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>
          <li class="nav-item"> <a class="nav-link active" href="new_emp.php">New Employee</a> </li>
          <li class="nav-item"> <a class="nav-link" href="view_emp.php">View/Update Employee</a> </li>
          <li class="nav-item"> <a class="nav-link" href="employee_search.php">Employee Search</a> </li>
          <li class="nav-item"> <a class="nav-link" href="employee_history.php">Employee History</a> </li>
          <li class="nav-item"> <a class="nav-link" href="department_information.php">Department Information</a> </li>
        </ul>

      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="">New Employee</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="" action="new_emp.php" method="post">
            <div class="form-group">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" placeholder="Enter first name">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" placeholder="Enter last name">
            </div>
            <div class="form-group">
              <label>Gender</label>
              <input type="radio" name="gender" value="M"> Male
              <input type="radio" name="gender" value="F"> Female
            </div>
            <div class="form-group">
              <label>Date of Birth</label>
              <input type="date" name="birth_date" class="form-control">
            </div>
            <div class="form-group">
              <label>Department</label>
              <select class="form-control" name="dept_id">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'amaz');
                if (!$conn) {
                  die('Connection Failed: ' . mysqli_connect_error());
                }
                $sql = "SELECT * FROM department";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Job Description</label>
              <select class="form-control" name="job_code">
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'amaz');
                if (!$conn) {
                  die('Connection Failed: ' . mysqli_connect_error());
                }
                $sql = "SELECT * FROM job";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['job_code'] . "'>" . $row['job_desc'] . "</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Salary</label>
              <input type="number" name="emp_salary" class="form-control" placeholder="Enter salary">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $gender = $_POST['gender'];
  $birth_date = $_POST['birth_date'];
  $dept_id = $_POST['dept_id'];
  $job_code = $_POST['job_code'];
  $emp_salary = $_POST['emp_salary'];

  $conn = mysqli_connect('localhost', 'root', '', 'amaz');
  if (!$conn) {
    die('Connection Failed: ' . mysqli_connect_error());
  }

  $sql = "INSERT INTO employee (first_name, last_name, sex, birth_date, job_code, dept_id, emp_salary) VALUES ('$first_name', '$last_name', '$gender', '$birth_date', '$job_code', '$dept_id', '$emp_salary')";

  if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>