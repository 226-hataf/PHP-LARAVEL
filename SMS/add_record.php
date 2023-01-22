<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='style.css'>
    <title>Add New Users</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!-- Navigation Bar IncludeOnce -->
<?php
 include_once 'navbar2.php';
?>
<!-- class  container -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
<!-- Form Class Having Action name & POST Method -->
                <form action="add.php" method="POST">
<!-- Form stuname -->
                    <div class="form-group">
                        <!-- <label for="formGroupExampleInput"><h4>Full Name:</h4></label> -->
                        <input type="text"  name="stuname" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Name">
                    </div>
<!-- Form stuname -->
                    <div class="form-group">
                        <!-- <label for="formGroupExampleInput"><h4>Full Name:</h4></label> -->
                        <input type="text"  name="stucontact" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Contact">
                    </div>
                    <div class="form-group">
<!-- Form stuname -->
                        <!-- <label for="formGroupExampleInput"><h4>Full Name:</h4></label> -->
                        
                        <input type="text"  name="stucnic" class="form-control" id="formGroupExampleInput" placeholder="Enter Your CNIC">
                        
                    </div>
<!-- Form stuname -->
                    <div class="form-group">
                    <label class="form-label">Student Course:</label>
                    <select class="form-select" name="course">
                        <option selected>Courses</option>
                        <?php
//Connection Request
                        include "config.php";
//Generate SQL statement
                        $sql = "SELECT * FROM courses";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <option value="<?= $value['CourseID']; ?>"><?= $value['CourseName']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    </div>
<!-- Form stuname -->
                    <div class="form-group">
                    <label class="form-label">Student Grade:</label>
                    <select class="form-select" name="grade">
                        <option selected>Grades</option>
                        <?php
//Connection Request

                        include "config.php";
//Generate SQL statement
                        $sql = "SELECT * FROM grades";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <option value="<?= $value['GradeID']; ?>"><?= $value['Grades']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    </div>
<!-- Button type submit -->
                    <input type="submit" class="form-control btn btn-success" id="formGroupExampleInput2" value="Save" ></input>
                </form>
              
             </div>
        </div>
    </div>
<!-- Footer File Include -->
<?php
 include_once 'footer.php';
?>
</body>
</html>



