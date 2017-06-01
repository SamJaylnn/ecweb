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
