<?php
ob_start();
// Error Reporting
ini_set('display_errors','on');
error_reporting(E_ALL);
include 'Admincp/connect.php';

$sessionUser = "";
if(isset($_SESSION['user'])) {
    $sessionUser = $_SESSION['user'];
}
// Routes

$tpl = "includes/templates/"; //Templat Directory
$css = 'layout/css/'; //Css Directory
$js = 'layout/js/'; //Js Directory
$func = 'includes/functions/'; //Functions Directory
$lang = 'includes/languages/'; // Language Directory

// Include The Important Fiels
include $func."Functions.php";

// include 'includes/languages/ar.php';
include $lang.'en.php';

include $tpl."header.php";
include $tpl."footer.php";

ob_end_flush();
?>