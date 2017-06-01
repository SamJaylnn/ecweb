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
$TITLE="myacc";
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/resources/header.php'); 
?>
	
	<?php
  extract( $_POST );
  if (isset($_SESSION["user"])) {
	  //get id
    $results = $mysqli->query("SELECT * FROM `order` WHERE id = '$ORDER_ID'");

	  if ($results) {
	    $obj = $results->fetch_object();
	  
	  
	?>


    <div id="checkout-container" class="cart-view-table-back" style="margin: 100px auto; max-with:1000px">
        <h1 align="center" style="margin: 20px 10px 30px 10px"> Order Information</h1>
        <div class="container" >
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Date</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->order_date; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Full Name</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->full_name; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Address</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->address; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">City</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->city; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">State</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->state; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">ZIP</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->zip; ?></label>
            </div>
            <br>
            <div class="input-group">
              <label for="example-text-input" class="col-3 col-form-label">Phone Number</label>
              <label for="example-text-input" class="col-3 col-form-label"><?php echo $obj->phone; ?></label>
            </div>
            <br>

            <table width="100%" cellpadding="6" cellspacing="0"><thead><tr><td>Quantity</td><td>Name</td><td>Price</td><td>Total</td></tr></thead>
              <tbody>
             	<?php
                    $results2 = $mysqli->query("SELECT * FROM `order_detail` WHERE id = '$ORDER_ID'");
                    
                	if ($results2) {
                	    
            		$total = 0; //set initial total value
            		$b = 0; //var for zebra stripe table 
            		while ($obj2 = $results2->fetch_object())
                    {
            			//set variables to use in content below
              
            			
            		  $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
            		  echo '<tr class="'.$bg_color.'">';
            			echo '<td>'.$obj2->product_quantity.'</td>';
            			echo '<td>'.$obj2->product_name.'</td>';
            			echo '<td>'.$currency.$obj2->product_price.'</td>';
            			echo '<td>'.$currency.$obj2->product_total_price.'</td>';
                  echo '</tr>';
    
                    }

            		$shipping_cost = 'Shipping Cost : $ 1.50 <br />';
            	}
  	  
                ?>
                <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost; ?>Amount Payable :$ <?php echo sprintf("%01.2f", $obj->amount_payment);?></span></td></tr>
              </tbody>
            </table>
        </div>
    </div>
<?php
    }
} else {
print<<<HERE
  <div class="container" style="width: 400px; margin: 200px auto;">
    <h3 class="col form-signin-heading">Please login first</h3>
    <br>
    <a class="btn btn-primary" href="/home.php">Back</a>
</div>
HERE;
}
?>
        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
  
</body>
</html>
