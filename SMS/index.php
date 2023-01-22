<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>signin</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' href='style.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php

?>
<!-- Sigh in Form -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<?php
include("config.php");
if(isset($_POST["submit"]))
{
    $username=$_POST["email"];
    $password=$_POST["password"];
    $sql="SELECT Email, Pasword, Role FROM login WHERE Email='$username' AND Pasword='$password'";
    $result=mysqli_query($conn, $sql);
    $fetch=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0){
    session_start();
    $_SESSION["username"]=$username;
    $_SESSION["role"]=$fetch['Role'];
    // echo $fetch['Role'];
    // die();
    header("location: home.php");
    }
    else{
        echo "<script>alert('Invalid username or password')</script>";
    }
    

}
?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>