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
$TITLE="secure";
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/resources/header.php'); 
?>
        
        
        <section id="login">
            <div class="section-content">
                <div class="container">   
                    <form action = "results.php" method = "post">
                        <h2>Admin Login</h2>
                        <br>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">User Name</label>
                        <div class="col">
                          <input name="USERNAME" class="form-control" type="text">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Password</label>
                        <div class="col" style="width:30%">
                          <input name = "PASSWORD" class="form-control" type="password">
                        </div>
                      </div>
                      <button type="submit" name="Enter" class="btn btn-primary">Enter</button>
                      <button type="submit" name="NewUser" class="btn btn-primary">New Admin</button>
                    </form>
                    <div>
                      <br>
                      <p>Use "admin" as user name and password to enter. Or you can fill the form and register a new admin account for your own.</p>
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


