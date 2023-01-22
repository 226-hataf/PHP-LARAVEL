<?php
//Connection Request
    include('config.php');
//Get Variables from ADD-Record Fields from POST Mthod 
    $name=$_POST['stuname'];
    $contact=$_POST['stucontact'];
    $cnic=$_POST['stucnic'];
    $courseid=$_POST['course'];
    $gradeid=$_POST['grade'];
//Generate SQL statement
    $sql="INSERT INTO students(StuName,StuContact,StuCNIC,CourseID,GradeID) 
    VALUES('{$name}','{$contact}',{$cnic},{$courseid},{$gradeid})";
//If Request statement ADD
    $result=mysqli_query($conn,$sql);
//Get Result Success Go To Index Page
    if($result){
    header("location: home.php");
    }
    else{
//Generate Error Message
    echo "Result insert error";
    }
?>