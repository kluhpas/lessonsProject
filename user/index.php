<?php require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/checkSession.php"; ?>
<!DOCTYPE html>
<html lang="it-IT">
<head>
  <title>lessonsProject</title>
  <?php include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/head.php"; ?>
</head>
<body>
  <?php include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/navbar.php";  ?>
  <div class="container">
    <div class="jumbotron">
      <h5>Ciao <?php showName()?></h5>
      <p class="text-muted" id="p-index-jumbotron">Benvenuto in LessonsProject!</p>
    </div> <!-- .jumbotron -->
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Nuova lezione</h5>
          </div> <!-- .card-header -->
          <div class="card-body">
            <p class="card-text">Inserisci una nuova lezione.</p>
            <a href="/lessonsProject/user/newlesson.php" class="btn btn-primary">Inserisci</a>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-4 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Lezioni inserite</h5>
          </div> <!-- .card-header -->
          <div class="card-body">
            <p class="card-text">Guarda tutte le lezioni inserite, suddivise per atleta, giorno, arma.</p>
            <a href="/lessonsProject/user/viewlesson.php" class="btn btn-primary">Guarda</a>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-4 -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Statistiche</h5>
          </div> <!-- .card-header -->
          <div class="card-body">
            <p class="card-text">Guarda un po' di dati.</p>
            <a href="/lessonsProject/user/stats.php" class="btn btn-primary">Guarda</a>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-md-4 -->
    </div> <!-- .row -->
  </div> <!-- .container -->
  <script src="../js/script.js"></script>
</body>
</html>

<?php
function showName() {
  if (!isset($_SESSION["name"]) || !isset($_SESSION["surname"])) {
    require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/connectDB.php";
    require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/crudDB.php";

    $row = readNameSurname($conn, $_SESSION["id"]);

    if ($row != -1) {
      $_SESSION["name"] = $row["name"];
      $_SESSION["surname"] = $row["surname"];
      $conn->close();
    }
  }
  echo $_SESSION["name"];
}

?>
