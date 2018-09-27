<?php
  // Start the session
  session_start();
  // remove all session variables
  session_unset();
  // destroy the session
  session_destroy();

  /* Redirect to a different page in the current directory that was requested */
  header("Location: /lessonsProject/index.php");
  exit;
?>
