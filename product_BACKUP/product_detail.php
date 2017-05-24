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
          <a class="navbar-brand" href="/home.php">ECWeb</a>

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
          <div class="container"  style="width: 60%">
            <div class="row">
                  <?php
                      extract( $_POST );
                      
                      // Setup the previously visited item array
                      // Use json_encode / json_decode to get / set arrays in cookies.
                      $cookie = $_COOKIE['prev_visited_set'];
                      $cookie = stripslashes($cookie);
                      $temp_set = json_decode($cookie, true);
                      
                      if($temp_set == null) {
                        $temp_set = array($HIDDEN_ID);
                        
                        $json = json_encode($temp_set);
                        setcookie('prev_visited_set', $json, time() + (86400 * 30));
                      } else {
                        $arrlength = count($temp_set);
                        for($x = 0; $x < $arrlength; $x++) {
                          if ( $temp_set[$x] == $HIDDEN_ID ) {
                            unset($temp_set[$x]);
                          }
                        }
                        $temp_set = array_values($temp_set);
                        array_push($temp_set, $HIDDEN_ID);
                        
                        $json = json_encode($temp_set);
                        setcookie('prev_visited_set', $json, time() + (86400 * 30));
                      }
                      
                      // Setup the most visited item array
                      $cookie = $_COOKIE['most_visited_set'];
                      $cookie = stripslashes($cookie);
                      $temp_set = json_decode($cookie, true);
                      
                      if($temp_set == null) {
                        $temp_set = [];
                        $temp_set[(string)$HIDDEN_ID] = 1;
                        $json = json_encode($temp_set);
                        setcookie('most_visited_set', $json, time() + (86400 * 30));
                      } else {
                        if (array_key_exists((string)$HIDDEN_ID, $temp_set)) {
                          $temp_set[(string)$HIDDEN_ID] = $temp_set[(string)$HIDDEN_ID] + 1;
                        } else {
                          $temp_set[(string)$HIDDEN_ID] = 1;
                        }
                        arsort($temp_set);
                        $json = json_encode($temp_set);
                        setcookie('most_visited_set', $json, time() + (86400 * 30));
                      }

                           
                           
                           
                      // build SELECT query
                      $query = "SELECT * FROM product WHERE id = ". $HIDDEN_ID ;  
                      $result = mysqliConnect($query);
                      
                      if(mysqli_num_rows($result) > 0)  
                      {
                          $row = mysqli_fetch_array($result);
                  ?>
                        <div class="col" style="max-width: 50%">
                          <img class="card-img-top img-fluid" src="<?php echo $config["paths"]["img"]."product/".$row["image"]; ?>">
                        </div>
                        <div class="col" style="max-width: 50%">
                          <h2><?php echo $row["name"]; ?></h2>
                          <br>
                          <p style="color:rgb(100,100,100)"><?php echo $row["description"]; ?></p>
                          <form method="post" action="">
                                <input type="hidden" name="HIDDEN_NAME" value="<?php echo $row["name"]; ?>" />  
                                <input type="hidden" name="HIDDEN_ID" value="<?php echo $row["id"]; ?>" />  
                                <input type="submit" name="MORE" style="margin-top:5px;" class="btn btn-success" value="Add To Cart" /> 
                          </form>
                        </div>
                      
                          
                  <?php    
                                            //print( "<h3>". $row["name"]. "</h3><br>" );
                      }
                  ?>
            </div>
          </div>  
        </section>
        
        <footer id="footer-main">
            <div class="container">
                <p>Copyright &copy; 2017 Shuzhong Chen</p>
            </div>
        </footer>
        

    </body>
</html>


