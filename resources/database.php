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