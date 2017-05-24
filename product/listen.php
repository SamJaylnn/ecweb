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
        		'price'=>$obj->price,
        		'description'=>$obj->description
        		);
            }
        echo json_encode($UserArray);
    } catch(PDOException $ex) {
    echo 'ERROR: '.$ex->getMessage();
    }
?>