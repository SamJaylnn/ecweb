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
        
        
        <section id="create" style="margin: 150px 0">
            <div class="section-content">
                <div class="container" style="max-width: 800px; align-items: center;">   
                    <form action = "create_result.php" method = "post">
                        <h2>User Creation</h4>
                        <br>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Username</label>
                        <div class="col">
                          <input name="USERNAME" class="form-control" type="text" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Password</label>
                        <div class="col">
                          <input name="PASSWORD" class="form-control" type="password" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">First Name</label>
                        <div class="col">
                          <input name="FIRSTNAME" class="form-control" type="text" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-email-input" class="col-2 col-form-label">Last Name</label>
                        <div class="col" style="width:30%">
                          <input name = "LASTNAME" class="form-control" type="text" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Email</label>
                        <div class="col">
                          <input name="EMAIL" class="form-control" type="text" required>
                        </div>
                      </div>
                      <div class="form-group row" style="align-items: center;">
                        <label for="example-text-input" class="col-2 col-form-label">Home Address</label>
                        <div class="col">
                          <input name="ADDRESS" class="form-control" type="text" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Home Phone</label>
                        <div class="col">
                          <input name="HOMEPHONE" class="form-control" type="text" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="example-text-input" class="col-2 col-form-label">Cell Phone</label>
                        <div class="col">
                          <input name="CELLPHONE" class="form-control" type="text" required>
                        </div>
                      </div>
                      <br>
                      <button type="submit" name="Enter" class="btn btn-primary">Create New User</button>
                    </form>
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
        
        <!-- Cannot submit empty input -->
        <script type="text/javascript">
            var x;
            x = document.getElementById("roll-input").value;
            if (x == "") {
                alert("Enter a Valid Roll Number");
                return false;
            };
        </script>
        
    </body>
</html>




