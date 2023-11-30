<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

//redirect to main page
header("location:../main.php");
?>