<?php
    include_once("config.php");
    $debug = 0;

    // Connect to MySQL
    try {
          $results = $mysqli->query("SELECT * FROM product");
          $i=0;
          while($obj = $results->fetch_object()) {
            $UserArray[$i++]=array(
        	    'id'=>$obj->id,
        		'name'=>$obj->name,
        		'image'=>$obj->image,
        		'price'=>$obj->price,
        		'description'=>$obj->description,
        		'rating'=>$obj->rating,
        		'rating_times'=>$obj->rating_times,
        		'rating_ave'=>$obj->rating_ave
        		);
            }
        echo json_encode($UserArray);
    } catch(PDOException $ex) {
    echo 'ERROR: '.$ex->getMessage();
    }
?>