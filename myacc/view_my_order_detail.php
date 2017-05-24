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
        <li class="nav-item">
          <a class="nav-link" href="/market/index.php">Market</a>
        </li>
        <?php 
          session_start(); 
          if (isset($_SESSION["user"])) {
              print( "<li class=\"nav-item active\"> ");
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
