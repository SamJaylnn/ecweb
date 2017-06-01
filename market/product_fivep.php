<?php
session_start();
include_once("config.php");

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>ECWeb</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        
        <!-- Custom CSS -->
        <link href="/product/style/style.css" rel="stylesheet" type="text/css">

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
                session_start(); 
                if (isset($_SESSION["user"])) {
                    print( "<input type=\"hidden\" name=\"type\" value=\"logout\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Logout</button>");
                } else {
                    print( "<input type=\"hidden\" name=\"type\" value=\"login\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Login</button>");
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
<ul class="products">
  
<!-- View Cart Box End -->         
  <div style=\"text-align:center; margin:40px auto 10px auto\">
    <h3>Market place previous five</h3>
  </div>
  <?php  
  // Use json_encode / json_decode to get / set arrays in cookies.
  $cookie = $_COOKIE['prev_visited_set'];
  $cookie = stripslashes($cookie);
  $temp_set = json_decode($cookie, true);                    
  $count = 0;
  if ( $temp_set != null ) {

      $arrlength = count($temp_set);
      for ( $x = $arrlength - 1; $count <= 4 && $x >= 0; $x-- ) {
          $count = $count + 1;
          if ($count > 5) {
            break;
          }
          include_once("resources/look_for_product.php");
          $row = lookForProduct($temp_set[$x]);
          
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
		<form id='product_detail' method="post" action="product_detail.php">
		<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	  <input type="submit" style="border: none; background: none; font-size:20px; padding: 0; margin-bottom: 5px;" value="{$row["name"]}" /> <h5 style="color:rgb(255,102,0)">$ {$row["price"]}</h5>
	  </form>
  
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
  }
  ?>
  
  
  
<hr>  
  <div style=\"text-align:center; margin:40px auto 10px auto\">
    <h3>ECWeb previous five</h3>
  </div>  
<?php
$count = 0;
    for ( $x = $arrlength - 1; $count < 5 && $x >= 0; $x-- ) {

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
              if ($row['id'] == $temp_set[$x]) {
$count = $count + 1;
$products_ecweb .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
		<form id='product_detail' method="post" action="product_detail.php">
		<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	  <input type="submit" style="border: none; background: none; font-size:20px; padding: 0; margin-bottom: 5px;" value="{$row["name"]}" /> <h5 style="color:rgb(255,102,0)">$ {$row["price"]}</h5>
	  </form>
  
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
          }

      }
    
}
echo $products_ecweb;


?>
<hr>  
  <div style=\"text-align:center; margin:40px auto 10px auto\">
    <h3>Vision previous five</h3>
  </div>  
<?php
$count = 0;
    for ( $x = $arrlength - 1; $count < 5 && $x >= 0; $x-- ) {

      $found = 0;
      $urlArray = array("vision"=>"http://54.193.91.74/public/Lab/final/productjson.php");
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
              if ($row['id'] == $temp_set[$x]) {
$count = $count + 1;
$products_vision .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
		<form id='product_detail' method="post" action="product_detail.php">
		<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	  <input type="submit" style="border: none; background: none; font-size:20px; padding: 0; margin-bottom: 5px;" value="{$row["name"]}" /> <h5 style="color:rgb(255,102,0)">$ {$row["price"]}</h5>
	  </form>
  
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
          }

      }
    
}
echo $products_vision;


?>
<hr>
  <div style=\"text-align:center; margin:40px auto 10px auto\">
    <h3>Smile previous five</h3>
  </div>
<?php
$count = 0;
    for ( $x = $arrlength - 1; $count < 5 && $x >= 0; $x-- ) {

      $found = 0;
      $urlArray = array("ecweb"=>"http://www.open7smile.us/sendproduct.php");
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
              if ($row['id'] == $temp_set[$x]) {
$count = $count + 1;
$products_smile .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
		<form id='product_detail' method="post" action="product_detail.php">
		<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	  <input type="submit" style="border: none; background: none; font-size:20px; padding: 0; margin-bottom: 5px;" value="{$row["name"]}" /> <h5 style="color:rgb(255,102,0)">$ {$row["price"]}</h5>
	  </form>
  
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
          }

      }
    
}
echo $products_smile;


?>
<hr>
  <div style=\"text-align:center; margin:40px auto 10px auto\">
    <h3>Weiyu previous five</h3>
  </div>
<?php
$count = 0;
    for ( $x = $arrlength - 1; $count < 5 && $x >= 0; $x-- ) {

      $found = 0;
      $urlArray = array("yuwei"=>"http://52.52.18.143/jasonproduct.php");
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
              if ($row['id'] == $temp_set[$x]) {
$count = $count + 1;
$products_yuwei .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
		<form id='product_detail' method="post" action="product_detail.php">
		<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	  <input type="submit" style="border: none; background: none; font-size:20px; padding: 0; margin-bottom: 5px;" value="{$row["name"]}" /> <h5 style="color:rgb(255,102,0)">$ {$row["price"]}</h5>
	  </form>
  
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
          }

      }
    
}
echo $products_yuwei;


?>

<hr>
  <div style=\"text-align:center; margin:40px auto 10px auto\">
    <h3>Srivasa previous five</h3>
  </div>
<?php
$count = 0;
    for ( $x = $arrlength - 1; $count < 5 && $x >= 0; $x-- ) {

      $found = 0;
      $urlArray = array("srivasa"=>"https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php");
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
              if ($row['id'] == $temp_set[$x]) {
$count = $count + 1;
$products_srivasa .= <<<EOT
	<li class="product">
	<form method="post" action="product_detail.php">
	<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	<div class="product-thumb"><input type="image" src="images/{$row["image"]}" height="320px" width="100%"></div>
	</form>
	<div class="card-block">
		<form id='product_detail' method="post" action="product_detail.php">
		<input type="hidden" name="HIDDEN_ID" value="{$row["id"]}" />
	  <input type="submit" style="border: none; background: none; font-size:20px; padding: 0; margin-bottom: 5px;" value="{$row["name"]}" /> <h5 style="color:rgb(255,102,0)">$ {$row["price"]}</h5>
	  </form>
  
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
          }

      }
    
}
echo $products_srivasa;


?>
  
  
  
  
 </ul> 
              </div>
            </div>
          </div>
        </section>
        
        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
        
        
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
