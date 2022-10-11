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
                    <h1 class="">Update Employee</h1>
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
                                            <h1 class="">Edit</h1>
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
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" class="form-control" placeholder="Enter first name" value="<?php echo $row['first_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control" placeholder="Enter last name" value="<?php echo $row['last_name']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date of Birth</label><br>
                                                    <b> <?php echo $row['birth_date']; ?></b><br><br>
                                                    <div class="form-group">
                                                        <label>Gender</label>: <b><?php echo $row['sex']; ?><br></b>
                                                        <input checked="checked" type="radio" name="sex" value="M" /> Male
                                                        <input type="radio" name="sex" value="F" /> Female
                                                    </div>
                                                    <div class=" form-group">
                                                        <label>Date assigned for the job position</label><br>
                                                        <b><?php echo $row['date_assign']; ?></b><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Salary</label>
                                                        <input type="number" name="emp_salary" class="form-control" placeholder="Enter Salary" value="<?php echo $row['emp_salary']; ?>"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Department</label>: <b><?php echo $row['dept_name']; ?><br></b>
                                                        <div class="form-check">
                                                            <input checked="checked" type="radio" class="form-check-input" name="dept_name" for="flexCheckDefault" value="200" />
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Sales and Marketing
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="dept_name" for="flexCheckDefault" value="201" />
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Operations and Production
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" name="dept_name" for="flexCheckDefault" value="202" />
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Finance and Administration
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <br> <label>Job Description</label>: <b><?php echo $row['job_desc']; ?><br></b>
                                                            <select class="form-control" name="job_code">
                                                                <option value="500">System Analysis</option>
                                                                <option value="501">Programmer</option>
                                                                <option value="502">Database Designer</option>
                                                                <option value="503">Electrical Engineer</option>
                                                                <option value="504">Mechanical Engineer</option>
                                                                <option value="505">Civil Engineer</option>
                                                                <option value="506">Clerical Support</option>
                                                                <option value="507">DSS Analyst</option>
                                                                <option value="508">Application Designer</option>
                                                                <option value="509">Bio Technician</option>
                                                                <option value="510">General Support</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary" name="update" value="Update Data">Save</button>
                                                        <button type="submit" class="btn btn-primary" name="cancel" value="Cancel Data">Cancel</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        echo '<div class="py-5"><p> If the employee number not found please go to <a href="employee_search.php">Employee Search</a></p></div>';
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





<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'amaz');

if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sex = $_POST['sex'];
    $emp_salary = $_POST['emp_salary'];
    $dept_name = $_POST['dept_name'];
    $job_code = $_POST['job_code'];



    $query = "UPDATE employee 
    SET employee.first_name='$_POST[first_name]',employee.last_name='$_POST[last_name]',employee.sex='$_POST[sex]',employee.emp_salary='$_POST[emp_salary]',employee.dept_id='$_POST[dept_name]',employee.job_code='$_POST[job_code]'
    WHERE employee.emp_num='$_POST[id]'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <b><p> New record update successfully</p></b>
                <p>You can also search <a href="employee_history.php">Employee History</a> or <a href="view_emp.php">View Employee</a>.</p>
                </div>
            </div>
        </div>
    </div>';
    }
} else if (isset($_POST['cancel'])) {
    echo '<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <b><p>Data record is not update</p></b>
            <p>You can also search <a href="employee_history.php">Employee History</a> </p>
            </div>
        </div>
    </div>
</div>';
}
?>