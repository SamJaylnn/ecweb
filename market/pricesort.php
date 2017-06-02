<?php
//include_once("config.php");
include_once("resources/look_for_product.php");
//current URL of the Page. redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html>
<head>
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>ECWeb</title>


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        
        <!-- Custom CSS -->
		<link href="/market/style/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php
$TITLE="market";
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/resources/header.php'); 
?>
        
<!-- Left bar Start -->
<?php
	include_once("resources/left_bar.php");
?>
<!-- Left bar End -->

<!-- View Cart Box Start -->
<?php
	include_once("resources/shopping_cart.php");
?>
<!-- View Cart Box End -->

<ul class="products">

<?php  
    echo "<div style=\"text-align:center; margin:40px auto 10px auto\">";
    echo "<h3>Sorted by products' price</h3>";
    echo "</div>";
    //topFive('all', $mysqli);
    
    $urlArray = array("ecweb"=>"https://ecwebsjsu.herokuapp.com/market/listen.php",
        "vision"=>"http://54.193.91.74/public/Lab/final/productjson.php",
        "smile"=>"http://www.open7smile.us/sendproduct.php",
        "yuwei"=>"http://52.52.18.143/jasonproduct.php",
        "srivasa"=>"https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php"
    );
    
    $i = 0;
    foreach($urlArray as $Name =>$Name_value) {
        $url = $Name_value;
        $company = $Name;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_HEADER, 0);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch);
        curl_close($ch);
        $arr = json_decode($output,1);
        //echo count($arr);
        foreach ($arr as $line) { // search the json data by id
            $array[$i]['mask'.$line['id']] = $line['price'];
        }
        //var_dump($array[$i]);
        $i++;
    }
    $result = array_merge($array[0], $array[1], $array[2], $array[3], $array[4]);
    //var_dump($result);
    if ($_GET['type'] == 'asc') {
        asort($result);
    } else {
        arsort($result);
    }
    //var_dump($result);
    $products_item = '';
    foreach ($result as $key => $value) {
        //echo substr($key,4);
        $row = lookForProduct(substr($key,4));
        
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
	  <div class="name_row" style="height:70px;">
		<h5>{$row['name']}</h5>
	  </div>
	  <h5>Rating: {$rating}</h5>
	  <h5 style="color:rgb(255,102,0)">$ {$row['price']}</h5>
  
	  <form method="post" action="cart_update.php">
	  <input type="hidden" name="product_code" value="{$row["id"]}" />
	  <input type="hidden" name="type" value="add" />
	  <input type="hidden" name="product_qty" value="1" />
	  <input type="hidden" name="return_url" value="{$current_url}" />
	  <input type="submit" name="ADD" style="margin:5px 0px;" class="btn btn-success" value="Add To Cart" />
	  </form>
	</div>

	</li>
EOT;
}
    echo $products_item;
?>

</ul>
              </div>
            </div>
          </div>
        </section>
        
    <!-- Footer Start -->
    <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/resources/footer.php'); 
    ?>
    <!-- Footer End -->
        
        <!-- jQuery first, then Bootstrap JS. -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/tether/dist/js/tether.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <!-- Smooth scrolling -->
        <script>
            $(document).ready(function(){
              // Add smooth scrolling to all links
              $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                  // Prevent default anchor click behavior
                  event.preventDefault();

                  // Store hash
                  var hash = this.hash;

                  // Using jQuery's animate() method to add smooth page scroll
                  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                  });
                } // End if
              });
            });
        </script>
        
    </body>
</html>