<?php
extract( $_POST );
                      if ($HIDDEN_ID == NULL) {
                        session_start();
                        $HIDDEN_ID = $_SESSION["prev_id"];
                      } else {
                        session_start();
                        $_SESSION["prev_id"] = $HIDDEN_ID;
                      }
                      // Setup the previously visited item array
                      // Use json_encode / json_decode to get / set arrays in cookies.
                      $cookie = $_COOKIE['prev_visited_set'];
                      $cookie = stripslashes($cookie);
                      $temp_set = json_decode($cookie, true);
                      
                      if($temp_set == null) {
                        $temp_set = array($HIDDEN_ID);
                        
                        $json = json_encode($temp_set);
                        setcookie('prev_visited_set', $json, time() + (86400 * 30));
                      } else {
                        $arrlength = count($temp_set);
                        for($x = 0; $x < $arrlength; $x++) {
                          if ( $temp_set[$x] == $HIDDEN_ID ) {
                            unset($temp_set[$x]);
                          }
                        }
                        $temp_set = array_values($temp_set);
                        array_push($temp_set, $HIDDEN_ID);
                        
                        $json = json_encode($temp_set);
                        setcookie('prev_visited_set', $json, time() + (86400 * 30));
                      }
                      
                      // Setup the most visited item array
                      $cookie = $_COOKIE['most_visited_set'];
                      $cookie = stripslashes($cookie);
                      $temp_set = json_decode($cookie, true);
                      
                      if($temp_set == null) {
                        $temp_set = [];
                        $temp_set[(string)$HIDDEN_ID] = 1;
                        $json = json_encode($temp_set);
                        setcookie('most_visited_set', $json, time() + (86400 * 30));
                      } else {
                        if (array_key_exists((string)$HIDDEN_ID, $temp_set)) {
                          $temp_set[(string)$HIDDEN_ID] = $temp_set[(string)$HIDDEN_ID] + 1;
                        } else {
                          $temp_set[(string)$HIDDEN_ID] = 1;
                        }
                        arsort($temp_set);
                        $json = json_encode($temp_set);
                        setcookie('most_visited_set', $json, time() + (86400 * 30));
                      }

session_start();
include_once("config.php");

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/database.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/config.php");
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

        <link type="text/css" rel="stylesheet" href="style/rating_style.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
<!-- View Cart Box End -->

        <section id="product_content" style="margin:100px 0px">
          <div class="container"  style="width: 60%">
            <div class="row">
                  <?php
                  $found = 0;
                  $urlArray = array("ecweb"=>"http://www.shuzhongchen.com/market/listen.php",
    "vision"=>"http://54.193.91.74/public/Lab/final/productjson.php",
    "smile"=>"http://www.open7smile.us/sendproduct.php",
    "yuwei"=>"http://52.52.18.143/jasonproduct.php",
    "srivasa"=>"https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php");
                  $company = "ecweb";
                  foreach($urlArray as $Name =>$Name_value) {
                  	$url = $Name_value;
                    $company = $Name;
                      $ch = curl_init();
                      curl_setopt($ch, CURLOPT_URL, $url);  
                      curl_setopt($ch, CURLOPT_HEADER, 0);  
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                      $output = curl_exec($ch);
                      curl_close($ch);
                      $arr = json_decode($output,1);

                      
                      foreach ($arr as $row) { // search the json data by id
                          if ($row['id'] == $HIDDEN_ID) {
                             $found = 1;
                              break;
                          }
                      }
                      if ($found == 1) {
                        break;
                      }
                  }
                  
                  // get the rating from table user_rate
                  $query = "SELECT SUM(rating) AS sum FROM user_rate WHERE product_id='". $row['id']."'";  
                  $result2 = mysqlConnect($query);
                  $row2 = mysql_fetch_array($result2);
                  $sum = 0;
                  if ($row2['sum'] != null) {
                    $sum = $row2['sum'];
                  }
                  $query = "SELECT COUNT(*) AS count FROM user_rate WHERE product_id='". $row['id']."'";
                  $result3 = mysqlConnect($query);
                  $row3 = mysql_fetch_array($result3);
                  $count = 1;
                  if ($row3['count'] != null && $row3['count'] != 0) {
                    $count = $row3['count'];
                  }
                  
                  // calculate the average rating
                  $rating = number_format($sum / $count, 1, '.', '');
                  $rating_compare = number_format($sum / $count);
                  $half_star = 0;
                  if ($rating < $rating_compare) {
                      $half_star = 1;
                  }
                  
                  
                  ?>
                        <div class="col" style="max-width: 50%">
                          <img class="card-img-top img-fluid" src="/market/images/<?php echo $row['image']; ?>">
                        </div>
                        <div class="col" style="max-width: 50%;">
                          <h2><?php echo $row["name"]; ?></h2>
                          <br>
                          <p style="color:rgb(100,100,100); max-width: 60%;"><?php echo $row["description"]; ?></p>
                          <p style="color:rgb(255,102,0)">$ <?php echo $row["price"]; ?></p>
                          <div class="rate-ex3-cnt">
                              <div id="1" class="rate-btn-fixed1 rate-btn-fixed"></div>
                              <div id="2" class="rate-btn-fixed2 rate-btn-fixed"></div>
                              <div id="3" class="rate-btn-fixed3 rate-btn-fixed"></div>
                              <div id="4" class="rate-btn-fixed4 rate-btn-fixed"></div>
                              <div id="5" class="rate-btn-fixed5 rate-btn-fixed"></div>
                              <br>
                              <p><?php echo "rating: ".$rating; ?></p>
                          </div>
                        </div>
  
            </div>
           <div class='row' style="margin-top:40px; margin-left:60%">
        	  <form method="post" action="cart_update.php">
        	  <input type="hidden" name="product_code" value="<?php echo $HIDDEN_ID ?>" />
        	  <input type="hidden" name="type" value="add" />
        	  <input type="hidden" name="product_qty" value="1" />
        	  <input type="hidden" name="return_url" value="<?php echo $current_url ?>" />
        	  <input type="submit" name="ADD" style="margin-bottom: 0px;" class="btn btn-success" value="Add To Cart" />
        	  </form>
        	 </div>
          </div>
        </section>
          
          
<div class="container" style="margin:0px auto; max-width:800px">
    <div class="row">
		<div class="col-md-12">
		    <div class="blog-comment">
				<h3 class="text-success">Reviews</h3>
                <hr/>
				<ul class="comments">
				<?php
$results = $mysqli->query("SELECT * FROM user_rate WHERE product_id = '". $HIDDEN_ID ."' 
ORDER BY ID DESC      
LIMIT 3" );
if($results){ 
$review_item = '';
//fetch results set as object and output HTML
while($obj = $results->fetch_object())
{				

$review_item .= <<<EOT
  				<li class="row">
  				  <img src="http://bootdey.com/img/Content/user_1.jpg" class="avatar" alt="">
  				  <div class="col">
  				      <p class="meta">{$obj->date}  <font class="text-success">$obj->username</font> Rates: <font color="#ff9933">$obj->rating</font></p>
  				      <p>
  				          {$obj->review}
  				      </p>
  				  </div>
  			  </li>
  			  <hr/>
EOT;
}
echo $review_item;
}
?>
				</ul>
			</div>
		</div>
	</div>
</div>

<br>
<br>


<!-- Star Rating Start --> 
<?php 
if(!isset($_SESSION["rating"][$HIDDEN_ID])) {
  
$comment_item .= <<<EOT
    <div class="container" style="text-align:center; margin-right: auto; margin-left: auto;">

        <div class="form-group">
          <label for="rating">Please rate our product:</label>
          <div class="rate-ex1-cnt" style="margin-right: auto; margin-left: auto;">
              
              <div id="1" class="rate-btn-1 rate-btn"></div>
              <div id="2" class="rate-btn-2 rate-btn"></div>
              <div id="3" class="rate-btn-3 rate-btn"></div>
              <div id="4" class="rate-btn-4 rate-btn"></div>
              <div id="5" class="rate-btn-5 rate-btn"></div>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label for="comment">Please give your review:</label>
          <textarea class="form-control" style="max-width:600px; margin:0px auto" rows="5" id="myTextarea"></textarea>
        </div>
        <br>
        <button onclick="myFunction()">Submit</button>
        <br><br><br><br>

        <div class="box-result-cnt">
EOT;
}
echo $comment_item;            


            ?>
          <br>

        </div><!-- /rate-result-cnt -->

    </div><!-- /tuto-cnt -->
    
<!-- Star Rating End -->

    
<script type="text/javascript">
    function codeAddress() {
      var rating = parseInt('<?php echo $rating; ?>');
      var j = parseInt(rating);
      $('.rate-btn-fixed').removeClass('rate-btn-fixed-hover');
      for (var i = j; i >= 0; i--) {
          $('.rate-btn-fixed'+i).addClass('rate-btn-fixed-active');
      };
      var half_star = parseInt('<?php echo $half_star; ?>');
      if ( half_star > 0) {
        j = j + 1;
        $('.rate-btn-fixed'+j).addClass('rate-btn-fixed-half');
      };
    }
    window.onload = codeAddress();


    var therate = 0;
    

    $('.rate-btn').hover(function(){
        $('.rate-btn').removeClass('rate-btn-hover');
        therating = $(this).attr('id');
        for (var i = therating; i >= 0; i--) {
            $('.rate-btn-'+i).addClass('rate-btn-hover');
        };
    });
                    
    $('.rate-btn').click(function(){   
        therate = $(this).attr('id');
        $('.rate-btn').removeClass('rate-btn-active');
        for (var i = therate; i >= 0; i--) {
            $('.rate-btn-'+i).addClass('rate-btn-active');
        };
    });

    
    function myFunction() {

      //var comment = "test 2017 05 10";
      var comment = document.getElementById("myTextarea").value;
      var return_url = "<?php echo $current_url; ?>";
      var product_id = "<?php echo $HIDDEN_ID; ?>";
      var company = "<?php echo $company; ?>";
      
      //var dataRate = 'act=rate&return_url=<?php echo $current_url; ?>&product_id=<?php echo $HIDDEN_ID; ?>&rate='+therate+'&comment='+comment;
      // Returns successful data submission message when the entered information is stored in database.

      // AJAX code to submit form.
       $.ajax({
              type: 'post',
              url: 'ajax.php',
              data: {
                  act: "rate",
                  return_url: return_url,
                  product_id: product_id,
                  rate: therate,
                  comment: comment,
                  company: company
              },
              success: function( data ) {
                 window.location.reload();
              }
          });


      }
      
</script>


 
        
        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
      

    </body>
</html>


