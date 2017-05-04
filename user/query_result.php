<?php
  require_once($_SERVER["DOCUMENT_ROOT"] . "/resources/database.php");
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
              <li class="nav-item active">
                <a class="nav-link" href="/user/index.php">User</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
        
        
        <section id="query—result" style="margin:100px 0">
            <div class="section-content" style="margin:0 auto">
                <div class="container">
                    <?php
                        extract( $_POST );
                        
                        // build SELECT query
                        $query = "SELECT * FROM user WHERE ". $KEYWORD . " = '" . $INPUT . "'";
                        $result = mysqlConnect($query);
                        
                            print( "<h3>Search Results</h3><br>" );
                            print( "<table class=\"table\"> ");
                            print( "<thead>" );
                            print( "<tr>" );
                            print( "<th>#</th>" );
                            print( "<th>First Name</th>" );
                            print( "<th>Last Name</th>" );
                            print( "<th>Email</th>" );
                            print( "<th>Address</th>" );
                            print( "<th>Home Phone</th>" );
                            print( "<th>Cell Phone</th>" );
                            print( "</tr>" );
                            print( "</thead>" );
                            print( "<tbody>" );
                            
                            for ( $counter = 1; $row = mysql_fetch_row( $result ); $counter++ ) {
                                  // build table to display results
                                  print( "<tr>" );
                                  print( "<th scope=\"row\">". "$counter" ."</th> " );
                                    
                                  foreach ( $row as $key => $value )
                                    
                                       print("<td align=\"left\">". "$value". "</td>");
                                        
                                  print("</tr>");
                            }
                            
                            print( "</tbody>" );
                            print( "</table>" );
                            $counter = $counter - 1;
                            print( "<br><h3>We have $counter result.</h3>" );
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


