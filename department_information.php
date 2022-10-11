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
          <li class="nav-item"> <a class="nav-link" href="employee_history.php">Employee History</a> </li>
          <li class="nav-item"> <a class="nav-link active" href="department_information.php">Department Information</a> </li>
        </ul>

      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="">Department Information</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Department History
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                  <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "amaz";
                  $conn = new mysqli($servername, $username, $password, $dbname);

                  if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                  }
                  $sql = "SELECT d.dept_name, e.first_name, e.last_name, COUNT(e2.emp_num) AS numEmployees
FROM employee AS e 
JOIN department AS d ON e.emp_num = d.emp_num 
JOIN employee AS e2 ON d.dept_id = e2.dept_id 
GROUP BY d.dept_name;";
                  $result = $conn->query($sql);
                  if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Department Name</th>";
                    echo "<th>Manager</th>";
                    echo "<th>Number of Employees</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $row["dept_name"] . "</td>";
                      echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                      echo "<td>" . $row["numEmployees"] . "</td>";
                      echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                  } else {
                    echo "0 results";
                  }
                  $conn->close();
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- get the input dept_id and when submitting call the query -->
          <form action="department_information.php" method="post">
            <div class="form-group">
              <label for="dept_id">Department ID</label>
              <input type="text" class="form-control" id="dept_id" name="dept_id" placeholder="Enter Department ID">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <?php
            if (isset($_POST['dept_id'])) {
              $dept_id = $_POST['dept_id'];
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "amaz";
              $conn = new mysqli($servername, $username, $password, $dbname);

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT a.emp_num, a.dept_id, a.date_assign
FROM mgr_history a
LEFT JOIN employee b ON a.emp_num = b.emp_num
WHERE a.dept_id = '$dept_id';";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                echo "<table class='table'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Employee Number</th>";
                echo "<th>Department ID</th>";
                echo "<th>Date Assigned</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["emp_num"] . "</td>";
                  echo "<td>" . $row["dept_id"] . "</td>";
                  echo "<td>" . $row["date_assign"] . "</td>";
                  echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
              } else {
                echo "0 results";
              }
              $conn->close();
            }
            ?>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>