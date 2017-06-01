<?php
    function mysqliConnect($query) {
        $connect = mysqli_connect("us-cdbr-iron-east-03.cleardb.net", "bb322e8bfccea9", "245af7a1", "heroku_4314e8da0b6f03d");  
        $result = mysqli_query($connect, $query);
        return $result;
    }

    function mysqlConnect($query) {
        // Connect to MySQL
        if ( !( $database = mysql_connect( "us-cdbr-iron-east-03.cleardb.net", "bb322e8bfccea9", "245af7a1") ) )
            die( "Could not connect to database" );
            
        // open database
        if ( !mysql_select_db( "heroku_4314e8da0b6f03d", $database ) )
            die( "Could not open ecweb database" );
            
        // query ecweb database
        if ( !( $result = mysql_query( $query, $database ) ) ) {
            print( "Could not execute query! <br/>" );
            die( mysql_error() );
        }
        mysql_close( $database );
        return $result;
    }
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
                        $result = mysqliConnect($query);
                        
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
                    ?>
                </div>
            </div>        
        </section>
    </body>
</html>


