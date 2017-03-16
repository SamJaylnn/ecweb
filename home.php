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
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

        
        <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-main">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="home.php">ECWeb</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="news.php">News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacts.php">Contacts</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        
        <section id="carousel">  
            <div id="carousel-home" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-home" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-home" data-slide-to="1"></li>
                <li data-target="#carousel-home" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="img/laptop_coffee_light.jpeg" alt="Responsive image">
                    <div class="carousel-caption">
                        <h1>Passion</h1>
                        <p>We love what we do.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="img/lego_keyboard.jpeg" alt="Responsive image">
                    <div class="carousel-caption">
                        <h1>Design</h1>
                        <p>We say what we do.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="img/screen_code.jpeg" alt="Responsive image">
                    <div class="carousel-caption">
                        <h1>Results</h1>
                        <p>We do what we say.</p>
                    </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel-home" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-home" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>    
        </section>
        
        
        <section id="what-we-do">
            <div class="section-content">
                <div class="container">
                    <h2>What we do</h2>
                    <p class = lead>ECWeb is optimized to every development. Let us show you unlimited posibilities.</p>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">E-Commerce</h4>
                                        <h6 class="card-subtitile">Visual & Pragmatic</h6>
                                    </div>
                                    <img src="img/e-commerce.jpeg" alt="e-commerce">
                                    <div class="card-block">
                                        <p class="card-text">Beautiful cinematic designs optimized for all screen sizes and types. Compatible with Retina high pixel density displays.</p>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Responsive Design</h4>
                                        <h6 class="card-subtitile">Fully responsive</h6>
                                    </div>
                                    <img src="img/responsive-design.jpg" alt="responsive-design">
                                    <div class="card-block">
                                        <p class="card-text">Featuring trending modern web standards. Clean and easy framework design for worry and hassle free customizations.</p>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Web Security</h4>
                                        <h6 class="card-subtitile">Dedicated support</h6>
                                    </div>
                                    <img src="img/web-security.jpeg" alt="web-security">
                                    <div class="card-block">
                                        <p class="card-text">Quick response with regular updates. Each update will include great new features and enhancements for free.</p>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">learn more</button>
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
