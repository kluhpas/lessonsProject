<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  session_unset();
}
include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/checkDB.php";
include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/crudDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]) == true && empty($_POST["email"]) == false && empty($_POST["psw"]) == false)
{
  $email = checkPsw($_POST["email"]); /* Creare funzione ad hoc*/
  $psw = checkPsw($_POST["psw"]);

  if ($email != -1 && $psw != -1) {
    $servername = "localhost";
    $username = "root";
    $dbName = "dblessonlogin";
    $password = "admin";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: (" . $mysqli->errno . ") " . $conn->connect_error);
      exit();
    }
    echo $email;
    echo $psw;
    $row = read_compare($conn, $email, $psw);

    if ($row != -1) {
      $_SESSION["id"] = $row["id"];
      $conn->close();
      header("Location: /lessonsProject/user/index.php");

    }
    elseif ($row == -1) {
      $conn->close();
      header("Location: /lessonsProject/index.php?error=true");
    }
  }
  else {
    header("Location: /lessonsProject/index.php?error=true");
  }
}
else {
header("Location: /lessonsProject/index.php");
}
?>
