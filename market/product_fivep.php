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
