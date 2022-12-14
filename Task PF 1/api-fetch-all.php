<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";



 
 

include "config.php";

$sql = "SELECT id ,name,email,password,age, gender, image FROM users";
$result = mysqli_query($conn, $sql) or die("Failure");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'ERROR', 'status' => 'false')); 
}

?>
