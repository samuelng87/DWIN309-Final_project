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
          <li class="nav-item"> <a class="nav-link" href="new_emp.php">New Employee</a> </li>
          <li class="nav-item"> <a class="nav-link" href="view_emp.php">View/Update Employee</a> </li>
          <li class="nav-item"> <a class="nav-link" href="employee_search.php">Employee Search</a> </li>
          <li class="nav-item"> <a class="nav-link active" href="employee_history.php">Employee History</a> </li>
          <li class="nav-item"> <a class="nav-link" href="department_information.php">Department Information</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="">Employee History</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="" action="employee_history.php" method="post">
            <div class="form-group">
              <label>Employee Number</label>
              <input type="number" name="emp_num" class="form-control" placeholder="Enter employee number">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>Employee Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Date Assign</th>
                <th>Job Position</th>
                <th>Salary</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_POST['submit'])) {
                $emp_num = $_POST['emp_num'];
                $conn = mysqli_connect('localhost', 'root', '', 'amaz');
                if (!$conn) {
                  die('Connection Failed: ' . mysqli_connect_error());
                }
                $sql = "SELECT employee.emp_num, employee.first_name, employee.last_name, department.dept_name, job_history.date_assign, job.job_desc, job_history.emp_salary
FROM employee
INNER JOIN department ON employee.dept_id = department.dept_id
INNER JOIN job_history ON employee.emp_num = job_history.emp_num
INNER JOIN job ON job_history.job_code = job.job_code
WHERE employee.emp_num = '$emp_num'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row['emp_num'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['dept_name'] . "</td><td>" . $row['date_assign'] . "</td><td>" . $row['job_desc'] . "</td><td>" . $row['emp_salary'] . "</td></tr>";
                  }
                }
                mysqli_close($conn);
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>