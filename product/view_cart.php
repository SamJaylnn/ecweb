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
        <li class="nav-item active">
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
        <li class="nav-item">
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
	
	
<h1 align="center" style="margin: 100px 0;">View Cart</h1>
<div class="cart-view-table-back" style="margin:0px auto 100px auto">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
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
			echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$currency.$product_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); //add subtotal to total var
        }
		
		$grand_total = $total + $shipping_cost; //grand total including shipping cost
		foreach($taxes as $key => $value){ //list and calculate all taxes in array
				$tax_amount     = round($total * ($value / 100));
				$tax_item[$key] = $tax_amount;
				$grand_total    = $grand_total + $tax_amount;  //add tax val to grand total
		}
		
		$list_tax       = '';
		foreach($tax_item as $key => $value){ //List all taxes
			$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
		}
		$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	}
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;"><?php echo $shipping_cost. $list_tax; ?>Amount Payable : <?php echo sprintf("%01.2f", $grand_total);?></span></td></tr>
    <tr><td colspan="5"><a href="index.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
    <tr><td colspan="5"><a href="checkout.php" class="button" style="background-color: #FFA500;">Check Out</a></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
        
</body>
</html>
