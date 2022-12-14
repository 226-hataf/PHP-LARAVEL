<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];

$name = $data['name'];
$email = $data['email'];
$age = $data['age'];
$gender = $data['gender'];
$image = $data['image'];
$password = $data[(sha1('password'))];


include "config.php";


if (isset($_COOKIE['token'])) {
    $sql = "UPDATE users SET name='$name', email='$email', password='$password', age=$age, gender='$gender' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('message' => 'Updated', 'status' => 'true')); 
    } else {
        echo json_encode(array('message' => ' ant update', 'status' => 'false')); 
} else {
    echo json_encode(array('message' => 'You Are Not Autheticated', 'status' => 'false'));
}
}