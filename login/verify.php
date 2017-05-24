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
    </head>
    <body>
        <div class="container" style="width: 400px; margin: 200px auto;">
<?php

    extract( $_POST );
    $userVerified = 0;
    
        $urlArray = array(
            "ECWEB"=>"https://phpwebsite-chenshuzhongs.c9users.io/login/listen.php",
            "vision"=>"http://54.193.91.74/public/Lab/final/userjson.php",
            //"smile"=>"http://open7smile.us/send.php",
            //"HealthCart"=>"https://www.srivatsamulpuri.me/wp-content/uploads/2017/03/listen.php",
            "naser"=>"http://thenaser.com/userjson.php",
            //"WEIYU"=>"http://52.52.18.143/userjson.php"
        );
        foreach($urlArray as $Name =>$Name_value) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $Name_value);  
            curl_setopt($ch, CURLOPT_HEADER, 0);  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $output = curl_exec($ch);
            curl_close($ch);
            $arr = json_decode($output, 1);
            
            foreach ($arr as $statement) { // search the json data by id
                if (strtolower($statement['username']) == $USERNAME) {
                    if ($statement['password'] == $PASSWORD) {
                        $userVerified = 1;
                        break;
                    }
                }
            }
            if ($userVerified) break;
        }
    
    if ($userVerified) {
        session_start();
        $_SESSION["user"] = $USERNAME;
        print ("<h3 class=\"col form-signin-heading\">Welcome Come to ECWeb, ". $USERNAME ."!</h3>");
    } else {
        print ("<h3 class=\"col form-signin-heading\">Access denied! Wrong username or password!</h3>");
    }
        print("<br>");
        print ("<a class=\"btn btn-primary\" href=\"/home.php\">Start</a>");
        print ("</div>");
?>   
        </div>

        <!-- jQuery first, then Bootstrap JS. -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/tether/dist/js/tether.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
    </body>
</html>    