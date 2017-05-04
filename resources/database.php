<?php
    function mysqliConnect($query) {
        $connect = mysqli_connect("localhost", "chenshuzhongs", "", "ecweb");  
        $result = mysqli_query($connect, $query);
        return $result;
    }
    
    function mysqlConnect($query) {
        // Connect to MySQL
        if ( !( $database = mysql_connect( "localhost", "chenshuzhongs", "") ) )
            die( "Could not connect to database" );
            
        // open database
        if ( !mysql_select_db( "ecweb", $database ) )
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