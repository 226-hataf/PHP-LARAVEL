<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='style.css'>
    <title>Update Record</title>
</head>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<?php
//Connection Request
include('config.php');
//Get ID from Edit-Record Fields from Get Mthod 
$id=$_GET['stuid'];
//Generate SQL statement
$sql="SELECT * FROM students where StuID=$id";
$result=mysqli_query($conn,$sql);
//Fetch Record
$data=mysqli_fetch_assoc($result);
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-3">
                <form action="update.php" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput"><h4>ID</h4></label>
                        <input type="hidden"  name="stuid" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Name" value = "<?php echo $id;  ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput"><h4>Name:</h4></label>
                        <input type="text"  name="stuName" class="form-control" id="formGroupExampleInput" placeholder="Enter Your Name" value = "<?php echo $data['StuName'];  ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2"><h4>Phone:</h4></label>
                        <input type="text"  name="stuContact" class="form-control" id="formGroupExampleInput2" placeholder="Enter Your Email" value = "<?php echo $data['StuContact'];  ?>">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Student Course:</label>
                        <select class="form-select" name="course">
                        <option selected>Courses</option>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM courses";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <option value="<?= $value['CourseID']; ?>" ><?= $value['CourseName'];?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label class="form-label">Student Grade:</label>
                    <select class="form-select" name="grade">
                        <option selected>Grades</option>
                        <?php
                        include "config.php";
                        $sql = "SELECT * FROM grades";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            foreach ($result as $value) {
                        ?>
                                <option value="<?= $value['GradeID']; ?>" ><?= $value['Grades']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    </div>
                    <input type="submit" class="form-control btn btn-success" id="formGroupExampleInput2"></input>
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