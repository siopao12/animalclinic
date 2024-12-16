<?php
session_start();
$_SESSION = array(); // Clear session variables
session_destroy(); // Destroy session

// Redirect to landing page
header("Location: landing.php");
exit();
?>