<?php
session_start();
include_once("config.php");
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
		<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<?php
  $TITLE="market";
  define('__ROOT__', dirname(dirname(__FILE__)));
  require_once(__ROOT__.'/resources/header.php'); 


  extract( $_POST );
  if (isset($_SESSION["user"])) {
	  //get id
    $results = $mysqli->query("SELECT Max(id) AS order_id FROM `order`");
	  $order_id = 1;
	  if ($results) {
	    $obj = $results->fetch_object();
	    $order_id = $obj->order_id;
	    $order_id = $order_id + 1;
	  }
	  
	?>


    <div id="checkout-container" class="cart-view-table-back" style="margin: 100px auto; max-with:1000px">
        <h1 align="center" style="margin: 20px 10px 30px 10px">Thank you for your order!</h1>
        <div class="container" >
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Order Number</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $order_id; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Full Name</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $FULL_NAME; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Address</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $ADDRESS; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">City</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $CITY; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">State</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $STATE; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">ZIP</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $ZIP; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Phone Number</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $PHONE_NUMBER; ?></label>
            </div>
            <br>
            <br>

            <table width="100%" cellpadding="6" cellspacing="0"><thead><tr><td>Quantity</td><td>Name</td><td>Price</td><td>Total</td></tr></thead>
              <tbody>
             	<?php
            	if(isset($_SESSION["cart_products"])) //check session var
                {
            		$total = 0; //set initial total value
            		$b = 0; //var for zebra stripe table 
            		foreach ($_SESSION["cart_products"] as $cart_itm)
                    {
            			//set variables to use in content below
            			$product_name = $cart_itm["name"];
            			$product_qty = $cart_itm["product_qty"];
            			$product_price = $cart_itm["price"];
            			$product_code = $cart_itm["product_code"];
            			$subtotal = ($product_price * $product_qty); //calculate Price x Qty
            			
            			$results = $mysqli->query("INSERT INTO order_detail (id, product_name, product_quantity, product_price, product_total_price)  
                              VALUES ('$order_id', '$product_name', '$product_qty', '$product_price', '$subtotal'); ");
              
            			
            		  $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
            		  echo '<tr class="'.$bg_color.'">';
            			echo '<td>'.$product_qty.'</td>';
            			echo '<td>'.$product_name.'</td>';
            			echo '<td>'.$currency.$product_price.'</td>';
            			echo '<td>'.$currency.$subtotal.'</td>';
                  echo '</tr>';
            			$total = ($total + $subtotal); //add subtotal to total var
                    }
            		
            		$grand_total = $total + $shipping_cost; //grand total including shipping cost

            		$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
            	}
  	  
  	          // add to order table
  	          $user = $_SESSION["user"];
  	          $today = date("Y-m-d H:i:s");
          	  $results = $mysqli->query("INSERT INTO `order` (id, username, full_name, address, city, state, zip, phone, shipping_cost, amount_payment, order_date)  
                              VALUES ('$order_id', '$user', '$FULL_NAME', '$ADDRESS', '$CITY', '$STATE', '$ZIP', '$PHONE_NUMBER','1.5','$grand_total', '$today'); ");
              

                ?>
                <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost; ?>Amount Payable :$ <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
              </tbody>
            </table>
        </div>
    </div>
<?php
unset($_SESSION["cart_products"]);
} else {
print<<<HERE
  <div class="container" style="width: 400px; margin: 200px auto;">
    <h3 class="col form-signin-heading">Please login first</h3>
    <br>
    <a class="btn btn-primary btn-block" style="margin: 0px auto;" href="/home.php">Back</a>
</div>
HERE;
}
?>
    <!-- Footer Start -->
    <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/resources/footer.php'); 
    ?>
    <!-- Footer End -->
  
</body>
</html>
