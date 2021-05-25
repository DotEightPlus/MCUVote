<?php
include("functions/init.php");
session_start();

session_destroy();

redirect("./");
?>