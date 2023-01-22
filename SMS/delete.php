<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<?php
//Connection Request
    include('config.php');
//Get ID from Record Fields from GET Mthod 
    $id=$_GET['stuid'];
    //echo $id;
    //die();
//Generate SQL statement
    $sql="DELETE FROM students WHERE StuID='$id'";
    $result=mysqli_query($conn,$sql);
//Get Result Success Go To Index Page
    if($result){
        header("location:home.php");
    }
    else{
//Generate Error Message
        echo "Something went wrong";
    }
?>