<?php
header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: POST'); // use api POST method


$data = json_decode(file_get_contents("php://input"),true); //Clean retrieve data from db or html form //php:input use what we get data in any fromat it read that data
//echo $formData;
// $data = json_decode($formData, true);
// //print_r($data);

include('config.php');

if(isset($_COOKIE['token']) && $_COOKIE['email'])
{
    $ExisPas=$data["userPasword"];
    $EncrExistPas=sha1($ExisPas);
    $NewPas=$data["newPasword"];
    $ReTyePas=$data["retypePasword"];
    $NewEncrPas=sha1($NewPas);
    $ReNewEncPas=sha1($ReTyePas);
    $sql="SELECT * FROM userdata where userPasword='$EncrExistPas'";
        $result=mysqli_query($conn, $sql);
        $fetch=mysqli_fetch_assoc($result);
        // echo "<pre>";
        // print_r($fetch);
        //die($fetch['userPasword']);
        if($fetch['userPasword']==$EncrExistPas && $NewEncrPas==$ReNewEncPas)
        {
        
            $sql="UPDATE userdata set userPasword='$NewEncrPas' 
            where userPasword='$EncrExistPas'";
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
            echo json_encode(array('message' => 'Pasword Not Match','status' => 'false'));
        }
    }
    else
    {
        echo json_encode(array('message' => 'User not exist','status' => 'false'));
    }        
?>