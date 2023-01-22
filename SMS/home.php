<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-8">
          <!-- <a href="add_record.php" class="btn btn-primary">Add New Record</a> -->
<!-- Define Table -->
            <table class="table">
                    <thead>
<!-- Table Headders -->
                      <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Student Contact</th>
                        <th scope="col">Student CNIC</th>
                        <th scope="col">Register Course</th>
                        <th scope="col">Grade</th>
                        <?php
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
?>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <?php
                        } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'normal') {
                        ?>
                        <th scope="col">Edit</th>
                        <?php    
                        }
                        ?>
                      </tr>
                    </thead>
                    <?php
//Connection Request
                    include('config.php');
//Generate SQL statement to Show All Records
                    $sql="SELECT StuID,StuName, StuContact, StuCNIC, CourseName, Grades  FROM students
                    INNER JOIN courses ON students.CourseID = courses.CourseID
                    INNER JOIN grades ON students.GradeID = grades.GradeID";
                    $result=mysqli_query($conn,$sql) or die("Unable to find any records");
                    ?>  
                    <?php
                    
// Foreeach loop to display Fetch All Records                    
                    foreach($result as $stu){   
                    ?>
                    <tbody>
                    <tr>
                    <td><?php echo $stu['StuID'] ?></td>
                    <td><?php echo $stu['StuName'] ?></td>
                    <td><?php echo $stu['StuContact'] ?></td>
                    <td><?php echo $stu['StuCNIC'] ?></td>
                    <td><?php echo $stu['CourseName'] ?></td>
                    <td><?php echo $stu['Grades'] ?></td>
<!-- Buttons EDIT & DELETE -->
<?php
//session_start();
//$check= $_SESSION['role'];
//echo $check;
if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    // echo $check;
    // die();
    
?>
    <td><a href="edit.php?stuid=<?php echo $stu['StuID'] ?>"  class="btn btn-success">Edit</a></td>
    <td><a href="delete.php?stuid=<?php echo $stu['StuID']?>" class="btn btn-danger">Delete</a></td>
<?php
}
else if (isset($_SESSION['role']) && $_SESSION['role'] == 'normal')
{
?>
    <td><a href="edit.php?stuid=<?php echo $stu['StuID'] ?>"  class="btn btn-success">Edit</a></td>
<?php
} 
else{
    
}
    ?>     
                    </tr>
                    </tbody>
                    <?php                 
                    }
                ?>
            </table>
        </div>
    </div>
</div>
<!-- Footer File Include -->
<?php
 include_once 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>