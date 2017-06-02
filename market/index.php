<?php
session_start();
include_once("config.php");

//current URL of the Page. cart_update.php redirects back to this URL
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
<!-- All product-->
<?php
	getProduct ("ecweb", "http://www.shuzhongchen.com/market/listen.php", $mysqli,$current_url);
	getProduct ("vision", "http://54.193.91.74/public/Lab/final/productjson.php", $mysqli,$current_url);
	getProduct ("smile", "http://www.open7smile.us/sendproduct.php", $mysqli,$current_url);
	getProduct ("yuwei", "http://52.52.18.143/jasonproduct.php", $mysqli,$current_url);
	getProduct ("srivasa", "https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php", $mysqli,$current_url);
?>   
<!-- All product List End -->


</ul>

<div class="container">
	<a href="http://www.freepik.com">Some images of these product designed by Graphiqastock / Freepik</a>
</div>

    <!-- Footer Start -->
    <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/resources/footer.php'); 
    ?>
    <!-- Footer End -->
        
</body>
</html>

<?php
function rating($mysqli, $product_id) {
	$results = $mysqli->query("SELECT avg(rating) as avg FROM `user_rate` 
	where product_id = '$product_id' group by product_id" );
	if($results){ 
		//fetch results set as object and output HTML
		while($obj = $results->fetch_object())                    
		{
			$rating = number_format($obj->avg, 1, '.', '');
		}
	}
	return $rating;
}
?>

<!-- ecweb's product-->
<?php
function getProduct ($company, $url, $mysqli, $current_url) {
$urlArray = array($company=>$url);
foreach($urlArray as $Name =>$Name_value) {
	$url = $Name_value;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_HEADER, 0);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch);
    curl_close($ch);
    $arr = json_decode($output,1);

foreach ($arr as $Product) {
	$rating = rating($mysqli, $Product['id']);
$products_item .= <<<EOT
	<li class="product" type="margin-right:100px">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$Product['id']}" />
	<div class="product-thumb"><input type="image" src="images/{$Product['image']}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
	  <div class="name_row" style="height:70px;">
		<h5>{$Product['name']}</h5>
	  </div>
	  <h5>Rating: {$rating}</h5>
	  <h5 style="color:rgb(255,102,0)">$ {$Product['price']}</h5>
  
	  <form method="post" action="cart_update.php">
	  <input type="hidden" name="product_code" value="{$Product['id']}" />
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
}
}
?>   
<!-- ecweb List End -->