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
        <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-products">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="/home.php">ECWeb</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/product/index.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/news.php">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contacts.php">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/secure/index.php">Secure</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/user/index.php">User</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/market/index.php">Market</a>
              </li>
       	    <?php 
                session_start(); 
                if (isset($_SESSION["user"])) {
                    print( "<li class=\"nav-item\"> ");
      			    print( "<a class=\"nav-link\" href=\"/myacc/view_my_order.php\">MyAcc</a> ");
      		        print( "</li> ");
                }
            ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/login/login.php" method="post">
              <?php 
                if (isset($_SESSION["user"])) {
                    print( "<input type=\"hidden\" name=\"type\" value=\"logout\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Logout</button>");
                } else {
                    print( "<input type=\"hidden\" name=\"type\" value=\"login\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Login</button>");
                    print( "</form>");
                    print( "<form class=\"form-inline my-2 my-lg-0\" action=\"/login/login.php\" method=\"post\">");
                    print( "<input type=\"hidden\" name=\"type\" value=\"fb\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Facebook Login</button>");
                }
              ?>
            </form>
          </div>
        </nav>
        
<!-- Left bar Start -->
<?php
	include_once("resources/left_bar.php");
?>
<!-- Left bar End -->

<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h4>Shopping Cart</h4>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$name = $cart_itm["name"];
		$product_qty = $cart_itm["product_qty"];
		$price = $cart_itm["price"];
		$product_code = $cart_itm["product_code"];
		$bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
		echo '<tr class="'.$bg_color.'">';
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
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


        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
        
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