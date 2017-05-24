<?php
    extract( $_POST );
    if (isset($_POST["username"])) {
	    $_SESSION["user"] = $_POST["username"];
	} else {
	    var_dump($_GET);
	}
?>