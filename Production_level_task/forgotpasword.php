<?php
header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: POST'); // use api POST method


$data = json_decode(file_get_contents("php://input"),true); //Clean retrieve data from db or html form //php:input use what we get data in any fromat it read that data
//echo $formData;
// $data = json_decode($formData, true);
// //print_r($data);

include('config.php');
    $ExisEmail=$data["userEmail"];
    $NewPas=$data["newPasword"];
    $RetypePas=$data["retypePasword"];
    $NewEncPas=sha1($NewPas);
    $RetypeNewEncPas=sha1($RetypePas);
    $sql="SELECT * FROM userdata WHERE userEmail='$ExisEmail'";
        $result=mysqli_query($conn, $sql);
        $fetch=mysqli_fetch_assoc($result);
        // echo "<pre>";
        // print_r($fetch);
        // die();
        if(mysqli_num_rows($result)>0 && $NewEncPas==$RetypeNewEncPas)
        {
        
            $sql="UPDATE userdata set userPasword='$NewEncPas' 
            where userEmail='$ExisEmail'";
            //echo json_encode(array('message' => 'Pasword Change', 'status' => 'true'));
            $result1=mysqli_query($conn, $sql);
            //$fetch=mysqli_fetch_assoc($result);
            // if(mysqli_num_rows($result)>0)
            if($result1)
            {
            // to convert in accociated array for json format
            echo json_encode(array('message' => 'Pasword Change', 'status' => 'true'));
            } else {
            //to convert in accociated array for json format
            echo json_encode(array('message' => 'Cannot Exist  User', 'status' => 'false'));
            }
        }
        else
        {
            echo json_encode(array('message' => 'Email/New pasword Not match','status' => 'false'));
        }  
?>