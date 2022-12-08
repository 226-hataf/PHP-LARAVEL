<!DOCTYPE html>
<html>
<body>

<?php
$array = array ( 
        0 => array ( "product_id" => 33 , "amount" => 1 ) ,
        1 => array ( "product_id" => 34  , "amount" => 3 ) ,
        2 => array ( "product_id" => 10  , "amount" => 1 ),
);

echo "<pre>";
echo "Product ID\tAmount";
foreach ( $array as $var ) 
{
    echo "\n", $var['product_id'], "\t\t", $var['amount'];
}
$array2= array( "product_id" => 55 , "amount" => 10 );
array_push($array,$array2);
echo "<pre>";
print_r($array3);

// foreach($array3 as $key=>$value)
// { 
//     foreach($value as $key2=>$value2)
//     {
//     echo $value2;
//     }
// }

// foreach ( $array3 as $var ) 
// {
//     echo "\n", $var['product_id'], "\t\t", $var['amount'];
// }

foreach ($array as $key => $v1) {
    foreach ($v1 as $key => $v2) {
        echo $v2 . " | " . " ";
    }
    echo "<br>";
}

?>

</body>
</html>
