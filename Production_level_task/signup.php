<?php
include('config.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');
    $name=$_POST['userName'];
    $email=$_POST['userEmail'];
    $age=$_POST['userAge'];
    $gender=$_POST['userGender'];
    $paswrod=$_POST['userPaswrod'];
    //$profile=$_POST['userProfile'];
    $encpaswrod=sha1($paswrod);
    if (is_uploaded_file($_FILES['userProfile']['tmp_name'])) {
        $tmp_file = $_FILES['userProfile']['tmp_name'];
        $imgName = $_FILES['userProfile']['name'];
        $newImageName  = time() . "-" . $imgName;
        $upload_dir = "./images/" . $newImageName;
        // query
        $sql="INSERT INTO userdata (userName, userEmail, userAge, userGender, userPasword, userProfile)
        VALUES('$name','$email','$age','$gender', '$encpaswrod','$newImageName')";
        if (move_uploaded_file($tmp_file, $upload_dir) && mysqli_query($conn, $sql)) {
            echo json_encode(array('message' => 'Student Record inserted', 'status' => 'true'));
        } else {
            echo json_encode(array('message' => 'User not sign up successfull', 'status' => 'false'));
        }
    } else {
        echo json_encode(array('message' => 'Student Record not inserted(Path-Issue)', 'status' => 'false'));
    }
?>