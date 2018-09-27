<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  if (!isset($_SESSION["id"])) {
    header("Location: /lessonsProject/index.php");
  }
}
else {
  header("Location: /lessonsProject/index.php");
}
 ?>
