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
        <section id="query—result" >
            <div class="section-content" style="margin:0 auto">
                <div class="container">
                    <?php
                        
                        // build SELECT query
                        $query = "SELECT * FROM user";
                        $result = mysqlConnect($query);
                        
                            print( "<h3>ECWeb User</h3><br>" );
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
                    ?>
                </div>
            </div>        
        </section>
    </body>
</html>


