<?php

header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: PUT'); // use api PUT method

$data = json_decode(file_get_contents("php://input"), true);

// it return data in json format
//php:input use what we get data in any fromat it read that data
include('config.php');

    $name=$data['stuName'];
    $contact=$data['stuContact'];
    $courseid=$data['course'];
    $gradeid=$data['grade'];
    $id=$data['stuid'];

    $sql="UPDATE students set StuName='$name', StuContact='$contact', CourseID='$courseid',
    GradeID='$gradeid' 
    where StuID='$id'";
if (mysqli_query($conn, $sql)) {
    // to convert in accociated array for json format
    echo json_encode(array('message' => 'Student Record updated', 'status' => 'true')); 
} else {
     // to convert in accociated array for json format
    echo json_encode(array('message' => 'Student Record not updated', 'status' => 'false'));
}
