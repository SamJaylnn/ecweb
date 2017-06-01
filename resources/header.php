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

        
        <nav class="navbar sticky-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-main">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="home.php">ECWeb</a>

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
            <form class="form-inline my-2 my-lg-0" action="/login/login.php" method="post">
              <?php 
                if (isset($_SESSION["user"])) {
                    print( "<p style=\"color:#ffffff;margin:3px 10px;\">Welcome, ".$_SESSION["user"]."!   </p>" );
                    print( "<input type=\"hidden\" name=\"type\" value=\"logout\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\" onclick=\"FB.logout();\">Logout</button>");
                } else {
                    print( "<input type=\"hidden\" name=\"type\" value=\"login\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Login</button>");
                    print( "</form>");
                    print( "<form class=\"form-inline my-2 my-lg-0\" action=\"/login/login.php\" method=\"post\">");
                    print( "<input type=\"hidden\" name=\"type\" value=\"fb\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Facebook Login</button>");
                }
              ?>
            </form>
          </div>
        </nav>