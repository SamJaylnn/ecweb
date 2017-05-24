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
	
	<?php
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
