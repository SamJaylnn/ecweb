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
$TITLE="user";
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/resources/header.php'); 
?>
        
        
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
         
                    
    <!-- Footer Start -->
    <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/resources/footer.php'); 
    ?>
    <!-- Footer End -->
    
        
        
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




