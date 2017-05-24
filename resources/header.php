<?php
if (!isset($TITLE)) {
  $TITLE = "UNTITLED PAGE";
}

function setActive($currentPage, $compare) {
  if(strcmp ($currentPage, $compare) == 0) {
    echo "class=\"nav-item active\"";
  }
}

function setCss($currentStyle) {
    if (isset($currentStyle)) {
        echo "<link href=\"css/$currentStyle.css?v=1.1\" rel=\"stylesheet\">";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>ECWeb</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        
        <!-- Custom CSS -->
        <?php setCss($style); ?>
    </head>
    <body>
<?php    
if($TITLE == "index") {
print<<<HERE     
<section id="cover">
    <div id="cover-caption">
        <div class="container">
            <div class="col-sm-10 col-sm-offset-1 col-centered">
                <h1 class="display-3">Welcome to ECWeb</h1>
                <p>We know what you want. We built what you dream.</p>
                
                <br>
                
                <a href="#nav-main" class="btn btn-primary btn-lg" role="button">GET START NOW</a>
                
            </div>
        </div>
    </div>
</section>
HERE;
}
?>
        
        <nav class="navbar sticky-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-main">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="home.php">ECWeb</a>

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