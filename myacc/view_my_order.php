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
<div class="container" style="text-align:center; width: 400px; margin: 200px auto;">
    <h5 style="margin: 0px auto;"> My Order </h5>
    <br>
<div class="list-group" style="margin: 0px auto;">


	<?php
  extract( $_POST );
  if (isset($_SESSION["user"])) {
	  $user = $_SESSION["user"];
      $results = $mysqli->query("SELECT * FROM `order` WHERE username = '$user'");
	  if ($results) {
	    while($obj = $results->fetch_object()) {
print <<<HERE
    <form action = "view_my_order_detail.php" method = "post">
        <input type="hidden" name="ORDER_ID" value="{$obj->id}" />
        <button type="submit" class="list-group-item list-group-item-action">&nbsp;&nbsp; {$obj->id}  &nbsp;&nbsp;&nbsp;  {$obj->order_date}</button>
    </form>
HERE;

	    }
	  }
  }
?>
</div>
</div>
        <footer id="footer-main">
            <div class="container">
                <p style="text-align: center;">Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
  
</body>
</html>
