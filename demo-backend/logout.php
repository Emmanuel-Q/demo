<?php
session_start();

// Destroy the session variables
session_destroy();

// Redirect to the login page
header('Location: login.php');
exit;
