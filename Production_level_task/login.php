<?php
include('config.php');
header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: POST'); // use api POST method


$data = json_decode(file_get_contents("php://input"),true); //Clean retrieve data from db or html form //php:input use what we get data in any fromat it read that data
    $bytes=random_bytes(15);
    $tokenval=bin2hex($bytes);
    $useremail=$data["userEmail"];
    $password=$data["userPasword"];
    $encrpasw=sha1($password);
    $sql="SELECT userEmail, userPasword FROM userdata
    WHERE userEmail='$useremail' and userPasword='$encrpasw'";
    $result=mysqli_query($conn, $sql);
    //die(print_r($result));
    $fetch=mysqli_fetch_assoc($result);
    
        if(mysqli_num_rows($result)>0)
        {
            //$fetch=mysqli_fetch_assoc($result);
            // if($fetch['userEmail'] == $useremail && $fetch['userPasword']==$encrpasw)
            // {
                if(!isset($_COOKIE['token']))
                {
                    setcookie('token', $tokenval, time() +30, "/");
                    setcookie('email', $email=$fetch['userEmail'], time() +30, "/");
                    // to convert in accociated array for json format
                    echo json_encode(array('message' => 'logIn', 'status' => 'true'));
                }
                else
                {
                    echo json_encode(array('message' => 'You are already login!','status' => 'false'));
                }
            // }
            // else
            // {
            //     echo json_encode(array('message' => 'Email/pasword is incorrect','status' => 'false'));
            // }
        }
        else 
        {
        //to convert in accociated array for json format
        echo json_encode(array('message' => 'No Data Available! Email/Pasword incorrect', 'status' => 'false'));
        }         
?>