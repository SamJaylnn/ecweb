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
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
<?php
if (!isset($TITLE)) {
  $TITLE = "UNTITLED PAGE";
}

function setActive($currentPage, $compare) {
  if(strcmp ($currentPage, $compare) == 0) {
    echo "<li class=\"nav-item active\">";
  } else {
    echo "<li class=\"nav-item\">";
  }
}
?>

        
        <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-main">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="/index.php">ECWeb</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <?php setActive($TITLE, "home"); ?>
                <a class="nav-link" href="/home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <?php setActive($TITLE, "about"); ?>
                <a class="nav-link" href="/about.php">About</a>
              </li>
              <?php setActive($TITLE, "news"); ?>
                <a class="nav-link" href="/news.php">News</a>
              </li>
              <?php setActive($TITLE, "contacts"); ?>
                <a class="nav-link" href="/contacts.php">Contacts</a>
              </li>
              <?php setActive($TITLE, "secure"); ?>
                <a class="nav-link" href="/secure/index.php">Secure</a>
              </li>
              <?php setActive($TITLE, "user"); ?>
                <a class="nav-link" href="/user/index.php">User</a>
              </li>
              <?php setActive($TITLE, "market"); ?>
      				  <a class="nav-link" href="/market/index.php">Market</a>
      				</li>
      	    <?php 
                session_start(); 
                if (isset($_SESSION["user"])) {
                    setActive($TITLE, "myacc");
      			    print( "<a class=\"nav-link\" href=\"/myacc/view_my_order.php\">MyAcc</a> ");
      		        print( "</li> ");
                }
            ?>
            </ul>
          </div>
        </nav>


</script>
<?php 
    extract( $_POST );
    if ($type == 'login') {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/login/login_template.php");
    } else {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/login/logout_template.php");
    }
?>

    <!-- Footer Start -->
    <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
    ?>
    <footer id="footer-main" style="position:absolute;bottom:0px;width:100%">
        <div class="container">
            <p>Copyright &copy; 2017 Shuzhong Chen</p>
        </div>
    </footer>
    <!-- Footer End -->
    
        <!-- jQuery first, then Bootstrap JS. -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/tether/dist/js/tether.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
    </body>
</html>    