<?php
  require_once(dirname(__FILE__) . "/resources/config.php");
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
    </head>
    <body>
<?php
$TITLE="about";
require_once "./resources/header.php";
?>
        
        
        <section id="about">
            <div class="section-content">
                <div class="container">
                    <div class="col-md-6">
                        <div class="about-text">
                            <h3>About us</h3>
                            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima culpa nostrum voluptates praesentium quia, quae, dolor aperiam possimus architecto, tempore unde! Quasi fugit voluptate, maiores adipisci commodi nemo rem cumque.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error eum mollitia sit dolorem autem qui possimus ex voluptate, voluptatibus iste unde numquam illum, molestiae reprehenderit, eligendi. Illum quod esse voluptatibus.</p>
                            
                            <h5>Follow me on the web</h5>
                            <a href="https://twitter.com/" class="btn btn-sm btn-outline-secondary">twitter</a>
                            <a href="https://facebook.com/" class="btn btn-sm btn-outline-secondary">facebook</a>
                            <a href="https://youtube.com/" class="btn btn-sm btn-outline-secondary">youtube</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section id="what-we-do">
            <div class="section-content">
                <div class="container">
                    <h2>Coming soon...</h2>
                    <p class = lead> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis voluptates nemo at consequatur, blanditiis qui sint quidem dolores omnis aspernatur veniam. Quidem mollitia error sapiente accusantium facere sint reiciendis culpa!</p>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-group">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Strategy &amp; Planning</h4>
                                        <h6 class="card-subtitile">Support card subtitle</h6>
                                    </div>
                                    <img src="<?php echo $config["paths"]["img"]; ?>chalkboard.jpg" alt="a chalkboard">
                                    <div class="card-block">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempora officia nihil, laudantium impedit ut saepe quis neque, tempore quia hic! Nobis molestias dolor quia reprehenderit voluptatibus. Nostrum, minus. Blanditiis.</p>
                                        <button type="button" class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Creative &amp; Design</h4>
                                        <h6 class="card-subtitile">Support card subtitle</h6>
                                    </div>
                                    <img src="<?php echo $config["paths"]["img"]; ?>working.jpg" alt="working on a laptop">
                                    <div class="card-block">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempora officia nihil, laudantium impedit ut saepe quis neque, tempore quia hic! Nobis molestias dolor quia reprehenderit voluptatibus. Nostrum, minus. Blanditiis.</p>
                                        <button type="button" class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title">Programming &amp; Technical</h4>
                                        <h6 class="card-subtitile">Support card subtitle</h6>
                                    </div>
                                    <img src="<?php echo $config["paths"]["img"]; ?>programming.jpg" alt="fingers typing on a keyboard">
                                    <div class="card-block">
                                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis tempora officia nihil, laudantium impedit ut saepe quis neque, tempore quia hic! Nobis molestias dolor quia reprehenderit voluptatibus. Nostrum, minus. Blanditiis.</p>
                                        <button type="button" class="btn btn-success-outline" data-toggle="modal" data-target="#myModal">learn more</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
    <!-- Footer Start -->
    <?php
        require_once('./resources/footer.php'); 
    ?>
    <!-- Footer End -->
        
        
        <!-- jQuery first, then Bootstrap JS. -->
        <script src="bower_components/jquery/dist/jquery.js"></script>
        <script src="bower_components/tether/dist/js/tether.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        

    </body>
</html>
