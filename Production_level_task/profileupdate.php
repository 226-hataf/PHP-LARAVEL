<?php
include('config.php');
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Methods:POST');
header('Access-Control-Headers:Access-Control-Headers, Content-Type,Access-Control-Allow-Origin,Access-Control-Methods, Authorization, X-Requested-With');
if(isset($_COOKIE['token']) && $_COOKIE['email'])
{
    $email = $_COOKIE['email'];
    if (is_uploaded_file($_FILES['userProfile']['tmp_name'])) {
        $tmp_file = $_FILES['userProfile']['tmp_name'];
        $imgName = $_FILES['userProfile']['name'];
        $newImageName  = time() . "-" . $imgName;
        $upload_dir = "./images/" . $newImageName;
        // query
        $sql="UPDATE userdata set userProfile='$newImageName'
                where userEmail='$email'";
        if (move_uploaded_file($tmp_file, $upload_dir) && mysqli_query($conn, $sql)) {
            echo "Successfully uploaded of " . $email ;
            echo json_encode(array('message' => 'Profile Picture Update', 'status' => 'true'));
        } else {
            echo json_encode(array('message' => 'Something went wrong', 'status' => 'false'));
        }
    } else {
        echo json_encode(array('message' => 'Error (Path-Issue)', 'status' => 'false'));
    }
}
else
    {
        echo json_encode(array('message' => 'User not exist','status' => 'false'));
    }  
?>