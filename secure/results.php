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
              <li class="nav-item active">
                <a class="nav-link" href="/secure/index.php">Secure</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/user/index.php">User</a>
              </li>
                <li class="nav-item">
      			  <a class="nav-link" href="/market/index.php">Market</a>
      			</li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/login/login.php" method="post">
              <?php 
                session_start(); 
                if (isset($_SESSION["user"])) {
                    print( "<input type=\"hidden\" name=\"type\" value=\"logout\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Logout</button>");
                } else {
                    print( "<input type=\"hidden\" name=\"type\" value=\"login\" />" );
                    print( "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Login</button>");
                }
              ?>
            </form>
          </div>
        </nav>
        
        
        <section id="contact" style="margin:100px 0">
            <div class="section-content">
                <div class="container">
                    <?php
                        extract( $_POST );
                        if ( !$USERNAME || !$PASSWORD ) {
                            fieldsBlank();
                            die();
                        }
                        if ( isset( $NewUser ) ) {
                            if ( !( $file = fopen( "/home/ubuntu/workspace/resources/txt/password.txt", "a" ) ) ) {
                                print( "<section><div class='section-content'><div class='container'><h2>Could not open password file to add new user</h2></div></div></section>" );
                                die();
                            }

                            fputs( $file, "$USERNAME,$PASSWORD\n" );
                            userAdded( $USERNAME );
                        }
                        else {
                            if ( !( $file = fopen( "/home/ubuntu/workspace/resources/txt/password.txt", "r" ) ) ) {
                                print( "<section><div class='section-content'><div class='container'><h2>Could not open password file</h2></div></div></section>" );
                                die();
                            }

                            $userVerified = 0;

                            //read each line in file and check username
                            while ( !feof( $file ) && !$userVerified ) {
                                $line = fgets( $file, 255 );
                                $line = chop( $line );
                                $field = split( ",", $line, 2 );

                                if ( $USERNAME == $field[0] ) {
                                    $userVerified = 1;

                                    // call function checkPassword to verify user’s password
                                    if ( checkPassword( $PASSWORD, $field ) == true ) {
                                        accessGranted( $USERNAME );                            
                                    }
                                    else {
                                        wrongPassword();
                                    }
                                }
                            }

                            fclose( $file );
                            if( !$userVerified ) {
                                accessDenied();
                            }
                        }

                        //verify user password and return a boolean.
                        function checkPassword( $userpassword, $filedata ) {
                            if ( $userpassword == $filedata[1] ) {
                                return true;
                            } else {
                                return false;
                            }
                        }

                        function userAdded( $name ) {
                            echo "<h2>You have been added to user list.</h2>" ;
                        }

                        function accessGranted( $name ) {
                                    echo "<h2>User Information:</h2>";
                                    echo "<br>";
                                    $file_handle = fopen("/home/ubuntu/workspace/resources/txt/users.txt", "r");
                                    while (!feof($file_handle)) {
                                       $line = fgets($file_handle);
                                       echo "<p>$line</p>";
                                    }
                                    fclose($file_handle);
                        }

                        function wrongPassword() {
                            echo "<h2>You entered an invalid password.</h2>" ;
                        }

                        function accessDenied() {
                            echo "<h2>You entered an invalid user name.</h2>";
                        }

                        function fieldsBlank() {
                            echo "<h2>Please fill in all forms fields.</h2>";
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


