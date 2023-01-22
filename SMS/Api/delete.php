<?php

header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: DELETE'); // use api POST method

$data = json_decode(file_get_contents("php://input"), true);
// it return data in json format
//php:input use what we get data in any fromat it read that data

$id = $data['stuid'];

include "config.php";

$sql="DELETE FROM students WHERE StuID='$id'";

if (mysqli_query($conn, $sql)) {
    // to convert in accociated array for json format  
    echo json_encode(array('message' => 'Record Deleted', 'status' => 'true')); 
} else {
    // to convert in accociated array for json format
    echo json_encode(array('message' => 'Record not Deleted', 'status' => 'false')); 
}
