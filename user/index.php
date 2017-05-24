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
              <li class="nav-item active">
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
                if (isset($_SESSION["user"])) {
                    print( "<p style=\"color:#ffffff;margin:3px 10px;\">Welcome, ".$_SESSION["user"]."!   </p>" );
                    print( "<input type=\"hidden\" name=\"type\" value=\"logout\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Logout</button>");
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
        
        
        <section id="user_section" style="margin: 100px 0">
            <div class="section-content">
                <div class="container">  
                  <div class="row" style="max-width: 600px; margin: 0 auto">
                    <a href="query.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">User Search</a>
                  </div>
                  
                  <div class="row" style="max-width: 600px; margin: 30px auto">
                    <a href="create.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">User Creation</a>
                  </div>
                  
                  <div class="row" style="max-width: 600px; margin: 30px auto">
                    <a href="show_user.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Show All Users</a>
                  </div>
                  
                  <div class="row" style="max-width: 600px; margin: 30px auto">
                    <a href="show_other_user.php" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Show Other Company Users</a>
                  </div>
                </div>
            </div>
        </section>
         
                    
        <footer id="footer-main">
            <div class="container">
                <p>Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
    
        
        
        <!-- jQuery first, then Bootstrap JS. -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/tether/dist/js/tether.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <!-- Smooth scrolling -->
        <script>
            $(document).ready(function(){
              // Add smooth scrolling to all links
              $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                  // Prevent default anchor click behavior
                  event.preventDefault();

                  // Store hash
                  var hash = this.hash;

                  // Using jQuery's animate() method to add smooth page scroll
                  // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                  $('html, body').animate({
                    scrollTop: $(hash).offset().top
                  }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                  });
                } // End if
              });
            });
        </script>
        
    </body>
</html>




