<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/database.php");

    if($_POST['act'] == 'rate'){
        session_start();
        $_SESSION["rating"][$_POST['product_id']] = 1;
        
    	$therate = $_POST['rate'];
    	$thepost = $_POST['product_id'];
    	$comment = $_POST['comment'];

        $query = "SELECT * FROM product WHERE id = ". $thepost ;  
        $result = mysqliConnect($query);
        
    	$row = mysqli_fetch_array($result);
        $ratetimes = $row["rating_times"];
        $ratetimes = $ratetimes + 1;

        $rate = $row["rating"];
        $rate = $rate + $therate;
        $rate_ave = $rate / $ratetimes;


    	$query = "UPDATE product SET rating_times= ' $ratetimes ' WHERE id = ". $thepost;
    	$result = mysqliConnect($query);
    	
    	$query = "UPDATE product SET rating= ' $rate ' WHERE id = ". $thepost;
    	$result = mysqliConnect($query);
    	
    	$query = "UPDATE product SET rating_ave= ' $rate_ave ' WHERE id = ". $thepost;
    	$result = mysqliConnect($query);
    	session_start(); 
    	$user = "Guest";
    	if (isset($_SESSION["user"])) {
    	    $user = $_SESSION["user"];
    	}
    	$today = date("Y-m-d H:i:s");
    	$query = "INSERT INTO user_rate (username, rating, review, date, product_id) VALUES ('$user','$therate','$comment','$today', '$thepost')";
    	$result = mysqliConnect($query);
    	
    } 
    $return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
    header('Location:'.$return_url);
?>