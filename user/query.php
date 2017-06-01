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
        
        <section id="query">
            <div class="section-content">
                <div class="container">   
                    <form action = "query_result.php" method = "post">
                        <h2>User Search</h4>
                        <br>
                      <div class="form-group row">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Search by</label>
                          <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="KEYWORD">
                            
                            <option value="first_name">First Name</option>
                            <option value="last_name">Last Name</option>
                            <option value="email">Email</option>
                            <option value="cell_phone">Cell Phone number</option>
                          </select>
                      </div>
                      <br>
                      <div>
                        <input class="col-10 col-form-label" type="content" placeholder="Please input something..." name="INPUT">
                      </div>
                      <br>
                      <button type="submit" name="Search" class="btn btn-primary">Search</button>
                    </form>
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




