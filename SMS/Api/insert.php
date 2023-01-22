<?php

header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: POST'); // use api POST method


$formData = stripcslashes(file_get_contents("php://input")); //Clean retrieve data from db or html form //php:input use what we get data in any fromat it read that data
//echo $formData;
$data = json_decode($formData, true);
//print_r($data);

include('config.php');
    $name=$data['stuname'];
    $contact=$data['stucontact'];
    $cnic=$data['stucnic'];
    $courseid=$data['course'];
    $gradeid=$data['grade'];
    $sql="INSERT INTO students(StuName,StuContact,StuCNIC,CourseID,GradeID) 
    VALUES('{$name}','{$contact}',{$cnic},{$courseid},{$gradeid})";

if (mysqli_query($conn, $sql)) {
    // to convert in accociated array for json format
    echo json_encode(array('message' => 'Student Record inserted', 'status' => 'true'));
} else {
     // to convert in accociated array for json format
    echo json_encode(array('message' => 'Student Record not inserted', 'status' => 'false'));
}
