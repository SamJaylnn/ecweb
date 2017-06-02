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
        
    <?php
        $TITLE="user";
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/resources/header.php'); 
    ?>
        
        
        <section id="query—result" style="margin:100px 0">
            <div class="section-content" style="margin:0 auto">
                <div class="container">
                    <?php
                        extract( $_POST );
                        
                        // build SELECT query
                        $query = "SELECT * FROM user WHERE ". $KEYWORD . " = '" . $INPUT . "'";
                        $result = mysqliConnect($query);
                        
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
                            
                            for ( $counter = 1; $row = mysqli_fetch_row( $result ); $counter++ ) {
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
    
    <!-- Footer Start -->
    <?php
        define('__ROOT__', dirname(dirname(__FILE__)));
        require_once(__ROOT__.'/resources/footer.php'); 
    ?>
    <!-- Footer End -->

    </body>
</html>


