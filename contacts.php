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
$TITLE="contacts";
require_once "./resources/header.php";
?>
        
        
        <section id="contact" style="margin:80px 0 0 0">
            <div class="section-content">
              <div class="container">
                  <h2>Contact Me</h2>
                  <br>
                  <?php
                      $file_handle = fopen("resources/txt/contacts.txt", "r");
                      while (!feof($file_handle)) {
                         $line = fgets($file_handle);
                         echo "<p>$line</p>";
                      }
                      fclose($file_handle);
                  ?>
              </div>
              <br>
              <br>
              <div class="container">            
                  <h2>Get In Touch</h2>
                  <br>
                <div class="form-group row">
                  <label for="example-text-input" class="col-2 col-form-label">Name</label>
                  <div class="col-10">
                    <input class="form-control" type="text" placeholder="Bill Gates" id="text-input">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="example-email-input" class="col-2 col-form-label">Email</label>
                  <div class="col-10">
                    <input class="form-control" type="email" placeholder="bill.gates@ecweb.com" id="email-input">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="example-tel-input" class="col-2 col-form-label">Message</label>
                  <div class="col-10">
                    <input class="form-control" type="tel" placeholder="I want to..." id="message-input">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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




