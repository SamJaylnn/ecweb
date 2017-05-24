<?php
  require_once(dirname(__FILE__) . "/resources/config.php");
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
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        
        <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-about">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="home.php">ECWeb</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
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
        
        
        <section id="about">
            <div class="section-content">
                <div class="container">
                    <div class="col-md-6">
                        <div class="about-text">
                            <h3>About us</h3>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima culpa nostrum voluptates praesentium quia, quae, dolor aperiam possimus architecto, tempore unde! Quasi fugit voluptate, maiores adipisci commodi nemo rem cumque.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error eum mollitia sit dolorem autem qui possimus ex voluptate, voluptatibus iste unde numquam illum, molestiae reprehenderit, eligendi. Illum quod esse voluptatibus.</p>
                            
                            <h5>Follow me on the web</h5>
                            <a href="https://twitter.com/" class="btn btn-sm btn-outline-secondary">twitter</a>
                            <a href="https://facebook.com/" class="btn btn-sm btn-outline-secondary">facebook</a>
                            <a href="https://youtube.com/" class="btn btn-sm btn-outline-secondary">youtube</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section id="what-we-do">
            <div class="section-content">
                <div class="container">
                    <h2>Coming soon...</h2>
                    <p class = lead> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis voluptates nemo at consequatur, blanditiis qui sint quidem dolores omnis aspernatur veniam. Quidem mollitia error sapiente accusantium facere sint reiciendis culpa!</p>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Strategy &amp; Planning</h4>
                                        <h6 class="card-subtitile">Support card subtitle</h6>
                                    </div>
                                    <img src="<?php echo $config["paths"]["img"]; ?>chalkboard.jpg" alt="a chalkboard">
                                    <div class="card-block">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempora officia nihil, laudantium impedit ut saepe quis neque, tempore quia hic! Nobis molestias dolor quia reprehenderit voluptatibus. Nostrum, minus. Blanditiis.</p>
                                        <button type="button" class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Creative &amp; Design</h4>
                                        <h6 class="card-subtitile">Support card subtitle</h6>
                                    </div>
                                    <img src="<?php echo $config["paths"]["img"]; ?>working.jpg" alt="working on a laptop">
                                    <div class="card-block">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempora officia nihil, laudantium impedit ut saepe quis neque, tempore quia hic! Nobis molestias dolor quia reprehenderit voluptatibus. Nostrum, minus. Blanditiis.</p>
                                        <button type="button" class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Programming &amp; Technical</h4>
                                        <h6 class="card-subtitile">Support card subtitle</h6>
                                    </div>
                                    <img src="<?php echo $config["paths"]["img"]; ?>programming.jpg" alt="fingers typing on a keyboard">
                                    <div class="card-block">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempora officia nihil, laudantium impedit ut saepe quis neque, tempore quia hic! Nobis molestias dolor quia reprehenderit voluptatibus. Nostrum, minus. Blanditiis.</p>
                                        <button type="button" class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
