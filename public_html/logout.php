<?php
/*
 * Log out the user from the vehicle application. 
 * Retrun to the start page. 
 */

session_start();
session_destroy();
header("Location: index.php");
?>