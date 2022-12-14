<?php

header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Contro-Allow-Methods: POST'); 


$formData = stripcslashes(file_get_contents("php://input")); 
$data = json_decode($formData, true);

include "config.php";

$name = $data['name'];
$email = $data['email'];
$age = $data['age'];
$gender = $data['gender'];
$image = $data['image'];
$password = $data[(sha1('password'))];


$token = "token";
$id = "id";
$bytes = random_bytes(20);
$tokenvalue = bin2hex($bytes);


$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $sql) or die("Check Login Query Failed");

if (!isset($_COOKIE['token'])) {
    $sql = "SELECT id,email, password FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql) or die("Check Login Query Failed");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $idValue = $row['id'];

        echo json_encode(array('message' => 'LOGGED IN ' . $email, 'status' => 'true'));
        setcookie($token, $tokenvalue, time() + 180, "/"); 
        setcookie($id, $idValue, time() + 180, "/"); 
        echo json_encode(array('token' => $token, 'tokenvalue' => $tokenvalue));
    } else {
        echo json_encode(array('message' => ' doesnt exit', 'status' => 'false'));
    }
} else {
    echo json_encode(array('message' => ' Alraedy Login', 'status' => 'false'));
}