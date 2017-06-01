<?php
session_start();
include_once("config.php");

//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
	foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//remove unecessary vars
	unset($new_product['type']);
	unset($new_product['return_url']); 
	
	
	
                  $found = 0;
                  $urlArray = array("ecweb"=>"https://ecwebsjsu.herokuapp.com/market/listen.php",
                    "vision"=>"http://54.193.91.74/public/Lab/final/productjson.php",
                    "smile"=>"http://www.open7smile.us/sendproduct.php",
                    "yuwei"=>"http://52.52.18.143/jasonproduct.php",
                    "srivasa"=>"https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php",
                    "naser", "http://thenaser.com/productjson.php"
                  );
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
                          if ($row['id'] == $new_product['product_code']) {
                             $found = 1;
                              break;
                          }
                      }
                      if ($found == 1) {
                        break;
                      }
                  }	

		
		//fetch product name, price from db and add to new_product array
        $new_product["name"] = $row['name']; 
        $new_product["price"] = $row['price'];
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['product_code']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['product_code']]); //unset old array item
            }           
        }
        $_SESSION["cart_products"][$new_product['product_code']] = $new_product; //update or create product session with new item  
    
}


//update or remove items 
if(isset($_POST["product_qty"]) || isset($_POST["remove_code"]))
{
	//update item quantity in product session
	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
		foreach($_POST["product_qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["product_qty"] = $value;
			}
		}
	}
	//remove an item from product session
	if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
		foreach($_POST["remove_code"] as $key){
			unset($_SESSION["cart_products"][$key]);
		}	
	}
}




//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
header('Location:'.$return_url);

?>