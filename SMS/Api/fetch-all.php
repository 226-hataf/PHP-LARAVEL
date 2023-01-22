<?php
header('Content-Type: application/json'); //3 party who access this api to tell them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: GET'); // use api POST method

include "config.php";

$sql="SELECT StuID,StuName, StuContact, StuCNIC, CourseName, Grades  FROM students
                    INNER JOIN courses ON students.CourseID = courses.CourseID
                    INNER JOIN grades ON students.GradeID = grades.GradeID";
$result = mysqli_query($conn, $sql) or die("Fetch All Query Failed");

if (mysqli_num_rows($result) > 0) {
    // to convert in accociated array for json format
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    echo json_encode($output);
} else {
    // to convert in accociated array for json format
    echo json_encode(array('message' => 'No Record found', 'status' => 'false'));
}
