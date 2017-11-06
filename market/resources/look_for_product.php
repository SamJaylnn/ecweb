<?php
  function lookForProduct($product_id) {
      $found = 0;
      $urlArray = array("ecweb"=>"https://ecwebsjsu.herokuapp.com/market/listen.php");
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