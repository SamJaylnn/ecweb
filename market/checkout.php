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
?>
	
	


<div id="checkout-container" class="cart-view-table-back" style="margin: 100px auto; max-with:1000px">
    <h1 align="center" style="margin: 20px 10px 30px 10px">Input a Shipping Address</h1>
    <div class="container" >
        <form method="post" action="print_order.php">
        <div class="input-group">
          <label for="example-text-input" class="col-3 col-form-label">Full Name</label>
          <input type="text" name="FULL_NAME" value="Bill Gates" class="col-8 form-control" required>
        </div>
        <br>
        <div class="input-group">
          <label for="example-text-input" class="col-3 col-form-label">Address</label>
          <input type="text" name="ADDRESS" value="test address" class="col-8 form-control" required>
        </div>
        <br>
        <div class="input-group">
          <label for="example-text-input" class="col-3 col-form-label">City</label>
          <input type="text" name="CITY" value="Dong Shan" class="col-8 form-control" required>
        </div>
        <br>
        <div class="input-group">
          <label for="example-text-input" class="col-3 col-form-label">State</label>
          <input type="text" name="STATE" value="VA" class="col-8 form-control" required>
        </div>
        <br>
        <div class="input-group">
          <label for="example-text-input" class="col-3 col-form-label">ZIP</label>
          <input type="text" name="ZIP" value="94435" class="col-8 form-control" required>
        </div>
        <br>
        <div class="input-group">
          <label for="example-text-input" class="col-3 col-form-label">Phone Number</label>
          <input type="text" name="PHONE_NUMBER" value="(520)948-2312" class="col-8 form-control" required>
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
            ?>
            <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
            <tr><td colspan="5"><input type="submit" name="SUBMIT" class="button" style="background-color: #FFA500;" value="Submit"></td></tr>
          </tbody>
        </table>

        </form>
    </div>
</div>

        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
        
</body>
</html>
