<?php
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$name = $_POST['sname'];
$email = $_POST['semail'];
$age = $_POST['sage'];
$gender = $_POST['sgender'];
$password=$_POST(sha1('password'));


f (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $tmp_file = $_FILES['profilepic']['tmp_name'];
    $imgName = $_FILES['profilepic']['name'];
    $N_image  = time() . "-" . $imgName;
    $upload_dir = "./images/" . $N_image;
    // query
    $sql = "INSERT INTO users (name, email, age, gender, image, password)
    VALUES ('$name','$email', $age,'$gender', '{$N_image}','password')";
    if (move_uploaded_file($tmp_file, $upload_dir) && mysqli_query($conn, $sql)) {
        echo json_encode(array('message' => ' Registered ', 'status' => 'true'));
    } else {
        echo json_encode(array('message' => 'Already Exist', 'status' => 'false'));
    }
} 
