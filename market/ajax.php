<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/database.php");

    if($_POST['act'] == 'rate'){
        session_start();
        $_SESSION["rating"][$_POST['product_id']] = 1;
        
    	$therate = $_POST['rate'];
    	$thepost = $_POST['product_id'];
    	$comment = $_POST['comment'];
        $company = $_POST['company'];

    	session_start(); 
    	$user = "Guest";
    	if (isset($_SESSION["user"])) {
    	    $user = $_SESSION["user"];
    	}
    	$today = date("Y-m-d H:i:s");
    	$query = "INSERT INTO user_rate (username, rating, review, date, product_id, company) VALUES ('$user','$therate','$comment','$today', '$thepost', '$company')";
    	$result = mysqlConnect($query);
    	
    } 

?>