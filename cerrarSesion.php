<?php

session_start();
unset($_SESSION["ses_nombre"]);

session_destroy();
header("Location: index.php");

?>
