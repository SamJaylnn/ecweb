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
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        
        <!-- Custom CSS -->
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
<?php
$TITLE="news";
require_once "./resources/header.php";
?>
        
        
        <section id="news">
            <div class="section-content">
                <div class="container">
                    
                    <h3>Latest news</h3>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero placeat debitis ad vitae repudiandae architecto, ipsum tenetur odio animi nulla nihil deleniti voluptatibus et in incidunt consequuntur! Assumenda, suscipit, sunt!</p>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div class="card-columns">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo $config["paths"]["img"]; ?>computer.jpg" alt="computer">
                                    <div class="card-block">
                                        <h4 class="card-title">Card title that wraps to a new line</h4>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                                <div class="card card-block">
                                    <blockquote class="card-blockquote">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                        <footer>
                                            <small class="text-muted">
                                            Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo $config["paths"]["img"]; ?>working.jpg" alt="working">
                                    <div class="card-block">
                                        <h4 class="card-title">Card title</h4>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="card card-block card-inverse card-primary text-xs-center">
                                    <blockquote class="card-blockquote">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                                        <footer>
                                            <small>
                                            Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="card card-block text-xs-center">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                                <div class="card">
                                    <img class="card-img" src="<?php echo $config["paths"]["img"]; ?>concert.jpg" alt="concert">
                                </div>
                                <div class="card card-block text-xs-right card-warning card-inverse">
                                    <blockquote class="card-blockquote">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                        <footer>
                                            <small class="text-muted">
                                            Someone famous in <cite title="Source Title">Source Title</cite>
                                            </small>
                                        </footer>
                                    </blockquote>
                                </div>
                                <div class="card card-block">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <nav class="text-center">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>                       
                            
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
