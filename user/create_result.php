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
        
        
        <section id="contact" style="margin:100px 0">
            <div class="section-content">
                <div class="container">
                    <?php
                        extract( $_POST );
                        
                        // build SELECT query
                        $query = "INSERT INTO user VALUES ('$FIRSTNAME', '$LASTNAME', '$EMAIL', '$ADDRESS', '$HOMEPHONE', '$CELLPHONE','$USERNAME','$PASSWORD');";

                        if($result = mysqliConnect($query)) {
                        print( "<h3>Your data have been added successfully.</h3>" );
                        } else {
                          print( "<h3>Failed!</h3>" );
                        }
                        
                           
                       
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


