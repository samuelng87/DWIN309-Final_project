<!DOCTYPE html>

<html lang="en">

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
                    <h1 class="">View Employee</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="" action="view_emp.php" method="post">
                        <div class="form-group">
                            <label>Employee Number</label>
                            <input type="number" name="id" class="form-control" placeholder="Enter employee number" autocomplete="on">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="search">Search</button>
                        </div>
                    </form>

                    <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'amaz');

                    if (isset($_POST['search'])) {

                        $id = $_POST['id'];

                        $query = "SELECT employee.emp_num, employee.first_name,employee.last_name,employee.birth_date,employee.sex,employee.date_assign,department.dept_name,job.job_desc,employee.emp_salary FROM employee INNER JOIN department ON employee.dept_id = department.dept_id
                        INNER JOIN job ON employee.job_code = job.job_code
                        WHERE employee.emp_num = '$id'";

                        $query_run = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($query_run)) {
                    ?>

                            <div class="py-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <h1 class="">View</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="py-5">
                                            <div class="container">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <form class="" action="view_update_emp.php" method="post">
                                                <div class="form-group">
                                                    <label>Employee Number</label><br>
                                                    <b><?php echo $row['emp_num']; ?><br></b>
                                                    <input type="hidden" value="<?php echo $row['emp_num']; ?>" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label>First Name: </label>
                                                    <b><?php echo $row['first_name']; ?><br></b>
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name: </label>
                                                    <b><?php echo $row['last_name']; ?><br></b>
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of Birth</label><br>
                                                    <b> <?php echo $row['birth_date']; ?></b><br><br>
                                                    <div class="form-group">
                                                        <label>Gender</label>: <b><?php echo $row['sex']; ?><br></b>
                                                    </div>
                                                    <div class=" form-group">
                                                        <label>Date assigned for the job position: </label><br>
                                                        <b><?php echo $row['date_assign']; ?></b><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Salary</label>: <b><?php echo $row['emp_salary']; ?><br></b>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Department</label>: <b><?php echo $row['dept_name']; ?><br></b>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Job Description</label> : <b><?php echo $row['job_desc']; ?><br></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary" name="search">Update</button>
                                                </div>
                                        </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                </div>
        <?php
                        }
                        echo '<div class="py-5"><p>If the employee number not found please go to <a href="employee_search.php">Employee Search</a></p></div>';
                    }
        ?>
            </div>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>