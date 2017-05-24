<?php
    session_start();
    //setcookie("username", $_SESSION['user'], time() - 60 * 60 * 24 * 5);
    session_destroy();
?>
<div class="container" style="width: 400px; margin: 200px auto;">
    <h3 class="col form-signin-heading">Good Bye!</h3>
    <br>
    <a class="btn btn-primary" href="/home.php">Back</a>
</div>