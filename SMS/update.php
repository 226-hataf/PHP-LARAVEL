<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<?php
//Connection Request
    include('config.php');
//Get Variables from ADD-Record Fields from POST Mthod 
    $name=$_POST['stuName'];
    $contact=$_POST['stuContact'];
    $courseid=$_POST['course'];
    $gradeid=$_POST['grade'];
    $id=$_POST['stuid'];
//Generate SQL statement
    $sql="UPDATE students set StuName='$name', StuContact='$contact', CourseID='$courseid',
    GradeID='$gradeid' 
    where StuID='$id'";
//If Request statement ADD
    $result=mysqli_query($conn,$sql);
    if($result){
//Get Result Success Go To Index Page
        header("location:home.php");
    }
//Generate Error Message
    else{
        echo "Something went wrong";
    }
?>