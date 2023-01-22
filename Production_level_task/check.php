<?php
$pas="zain_3693";
$encpas=sha1($pas);
echo $encpas;
// if($encpasw=sha1($pas)==$encpas)
// {
//     echo "login successful";
// }
// else
// {
//     echo "login failed<br>Pasword not Match";
// }
?>

<?php

header('Content-Type: application/json'); //3 party who access this api 
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: POST'); // use api POST method


$formData = stripcslashes(file_get_contents("php://input")); //Clean retrieve data from db or html form //php:input use what we get data in any fromat it read that data
$data = json_decode($formData, true);

include "config.php";

// LOGIN CREDENTIALS
$email = $data['email'];
$password = $data['password'];
$encryptPassword = md5($password);

// FOR Token
$token = "token";
$id = "id";
$bytes = random_bytes(20);
$tokenValue = bin2hex($bytes);

$sql = "SELECT id,email, password FROM users WHERE email = '$email' AND password = '$encryptPassword'";
$result = mysqli_query($conn, $sql) or die("Check Login Query Failed");

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idValue = $row['id'];
    $DBemail = $row['email'];
    if (isset($_COOKIE['token']) && $_COOKIE['token'] == $tokenValue && $email == $DBemail) {
        echo json_encode(array('message' => 'You Are Alraedy Login', 'status' => 'false'));
    } else {
        echo json_encode(array('message' => 'User Found', 'status' => 'true'));
        setcookie($token, $tokenValue, time() + 60, "/"); // 7200
        setcookie($id, $idValue, time() + 60, "/"); //
        echo json_encode(array('token' => $token, 'tokenValue' => $tokenValue));
    }
} else {
    echo json_encode(array('message' => 'User Not found', 'status' => 'false'));
}