<?php
session_start();

$activator = $_SERVER['REMOTE_ADDR'];
$_SESSION['activator'] = $activator;

date_default_timezone_set('Africa/Lagos');

include("db.php");
include("functions.php");

?>