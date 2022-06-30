<?php
ob_start();
session_start(); // Start The Session

session_unset();  //Unset The Data

session_destroy(); // Destroy The Session

header("Location: index.php");

exit();
ob_end_flush();

?>