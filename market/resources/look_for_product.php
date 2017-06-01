<?php
  function lookForProduct($product_id) {
      $found = 0;
      $urlArray = array("ecweb"=>"https://ecwebsjsu.herokuapp.com/market/listen.php",
        "vision"=>"http://54.193.91.74/public/Lab/final/productjson.php",
        "smile"=>"http://www.open7smile.us/sendproduct.php",
        "yuwei"=>"http://52.52.18.143/jasonproduct.php",
        "srivasa"=>"https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php");
      foreach($urlArray as $Name =>$Name_value) {
      	$url = $Name_value;
      
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);  
          curl_setopt($ch, CURLOPT_HEADER, 0);  
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
          $output = curl_exec($ch);
          curl_close($ch);
          $arr = json_decode($output,1);
  
          
          foreach ($arr as $row) { // search the json data by id
              if ($row['id'] == $product_id) {
                 $found = 1;
                  break;
              }
          }
          if ($found == 1) {
            break;
          }
      }
      return $row;
  }
?>