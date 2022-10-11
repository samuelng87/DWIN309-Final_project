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
                    <h1 class="">Employee Search</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="" action="employee_search.php" method="post">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter first name or last name">
                        </div>
                        <div class="form-group">
                            <label>Job Description</label>
                            <input type="text" name="job_title" class="form-control" placeholder="Enter Job title">
                        </div>
                        <div class="form-group"><br>
                            <label>Department</label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="department" for="flexCheckDefault" value="Sales and Marketing" <?php if ($department == 'Sales and Marketing') echo 'checked="checked"'; ?> />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Sales and Marketing
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="department" for="flexCheckDefault" value="Operations and Production" <?php if ($department == 'Operations and Production') echo 'checked="checked"'; ?> />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Operations and Production
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="department" for="flexCheckDefault" value="Finance and Administration" <?php if ($department == 'Finance and Administration') echo 'checked="checked"'; ?> />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Finance and Administration
                                </label>
                            </div>
                            <br>
                        </div>
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-primary">Search</button>
                        </div>

                    </form>
                    <br><br><br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Employee Number</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Job Description</th>
                                <th scope="col">Department</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, 'amaz');

                        if (isset($_POST['submit']) || $_POST['job_title'] || $_POST['department']) {

                            $name = $_POST['name'];
                            $job = $_POST['job_title'];
                            $department = $_POST['department'];


                            $query = "SELECT employee.emp_num,employee.first_name,employee.last_name,job.job_desc,department.dept_name 
                            FROM employee 
                            INNER JOIN department ON employee.dept_id = department.dept_id
                            INNER JOIN job ON employee.job_code = job.job_code
                            WHERE first_name='$name' OR last_name='$name' OR job_desc='$job' OR dept_name='$department'";


                            $query_run = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_array($query_run)) {

                                echo "<tr><td>" . $row['emp_num'] . "</td><td>" . $row['first_name'] . "</td><td>" . $row['last_name'] . "</td><td>" . $row['job_desc'] . "</td><td>" . $row['dept_name'] . "</td><td>";
                        ?>
                </div>
        <?php
                            }
                        }



        ?>
        </table>
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Employee number can <a href="view_emp.php"> View</a> or <a href="view_update_emp.php"> Update Employee</a> and search <a href="employee_history.php">Employee History</a> </p>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>