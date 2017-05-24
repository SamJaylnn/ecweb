<?php
    include_once("config.php");
    $debug = 0;

    // Connect to MySQL
    try {
          $results = $mysqli->query("SELECT * FROM user");
          $i=0;
          while($obj = $results->fetch_object()) {
            $UserArray[$i++]=array(
        	    'username'=>$obj->username,
        		'password'=>$obj->password
        		);
            }
        echo json_encode($UserArray);
    } catch(PDOException $ex) {
    echo 'ERROR: '.$ex->getMessage();
    }
?>