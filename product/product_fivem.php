<?php
  require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/database.php");
  require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/config.php");
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
        <?php

        ?>

    </head>
        
    <body>
        <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse" id="nav-products">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="home.php">ECWeb</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="/home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about.php">About</a>
              </li>
              <li class="nav-item active">
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
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        
        
        
        
        <section id="product_content" style="margin:100px 0px">
          <div class="container-fluid">
            <div class="row">
              <div class="col-2 " id="sidebar" style="margin:0px auto">
                  <ul class="nav flex-column" >
                      <br>
                      <li class="nav-item"><a class="btn btn-primary" href="product_fivep.php">5 previously visited</a></li>
                      <br>
                      <li class="nav-item"><a class="btn btn-primary" href="product_fivem.php">5 mostly visited</a></li>
                  </ul>
              </div>
              <div class="col-sm-9" >
                    <?php  
                    
                    
                    // Use json_encode / json_decode to get / set arrays in cookies.
                    $cookie = $_COOKIE['most_visited_set'];
                    $cookie = stripslashes($cookie);
                    $temp_set = json_decode($cookie, true);              
                    if ( $temp_set != null ) {
                        $count = 0;
                        foreach ( $temp_set as $key => $value ) {
                            $query = "SELECT * FROM product WHERE id = ". (int)$key;
                            $result = mysqliConnect($query);
                            if ( $count % 3 == 0 ) {
                                print( "<div class=\"card-deck\"> " );
                            }
                            
                            if($result) {
                               // die( mysql_error() );
                            }
                            
                            if(mysqli_num_rows($result) > 0)  
                            {  
                                 while($row = mysqli_fetch_array($result))  
                                 {  
  
                            ?>
                            
                            <div class="card" style="max-width:30%">  
                                 <form method="post" action="product_detail.php">
                                  <input type="image" class="card-img-top img-fluid" src="<?php echo $config["paths"]["img"]."product/".$row["image"]; ?>" border="0" alt="Submit" />
                                  <div class="card-block">
                                      <h5 class="card-title"><?php echo $row["name"]; ?></h5> <h5 style="color:rgb(255,102,0)"><?php echo "$"; echo $row["price"]; ?></h5>
                                      <input type="hidden" name="HIDDEN_NAME" value="<?php echo $row["name"]; ?>" />  
                                      <input type="hidden" name="HIDDEN_ID" value="<?php echo $row["id"]; ?>" />  
                                      <input type="submit" name="MORE" style="margin-top:5px;" class="btn btn-success" value="More Information" /> 
                                  </div>  
            
                                 </form>  
                            </div>  
                            <?php  

                                 }  
                            }
                            
                              if ( $count % 3 == 2 ) {
                                print( "</div><br> " );
                              } 
                              $count++;
                              if ($count > 4) {
                                  break;
                              }
                            
                        }
                    }
                   
                    
                    ?>
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
