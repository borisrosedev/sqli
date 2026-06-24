<?php 
session_start();
setcookie("token", $_SESSION["id"], time() - 3600);
session_unset();
session_destroy();
header("Location: ../index.php");