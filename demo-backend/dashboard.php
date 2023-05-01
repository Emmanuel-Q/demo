<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}

// Display the dashboard
?>
<h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
<p>This is the dashboard.</p>
<a href="logout.php">Logout</a>
