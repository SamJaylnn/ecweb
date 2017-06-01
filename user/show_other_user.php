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
        
        
        <section id="query—result" style="margin:0 0">
            <div class="section-content" style="margin:0 auto">
                <div class="container">
                <?php
                	$ch = curl_init();
                	$timeout = 5;
                	curl_setopt($ch, CURLOPT_URL, "https://ecwebsjsu.herokuapp.com/user/show_user.php");
                	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                	$data = curl_exec($ch);
                	curl_close($ch);
                  echo $data;
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


