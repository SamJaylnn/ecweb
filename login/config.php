<?php
$currency = '$'; //Currency Character or code

$db_username = 'chenshuzhongs';
$db_password = '';
$db_name = 'ecweb';
$db_host = 'localhost';

$shipping_cost      = 1.50; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'VAT' => 12, 
                            'Service Tax' => 5
                            );                      
//connect to MySql                      
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);                        
if ($mysqli->connect_error) {
    echo "error";
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
?>