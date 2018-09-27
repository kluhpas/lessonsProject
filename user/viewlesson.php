<?php require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/checkSession.php"; ?>
<!DOCTYPE html>
<html lang="it-IT">
<head>
  <title>lessonsProject</title>
  <?php include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/head.php"; ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
  <?php include $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/navbar.php";  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
      </div> <!-- .col-lg-4 -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 id="header-form">Opzioni di ricerca</h5>
          </div> <!-- .card-header -->
          <div class="card-body">
            <form class="form-horizontal" id="search-form" method="get" action="viewlesson.php" autocomplete="on">
              <div class="form-group">
                <label for="inputathlete">Cerca tramite cognome e nome</label>
                <input type="text" name="athlete" class="form-control" id="inputathlete" placeholder="Inserisci" value="<?php if(isset($_GET['athlete'])) echo $_GET['athlete'];?>">
                <input type="hidden" name="id" id="id" value="<?php if(isset($_GET['id'])) echo $_GET['id'];?>" >
              </div> <!-- .form-group -->
              <div class="form-group">
                <label for="dateLesson">Cerca tramite data</label>
                <input type="date" class="form-control" name="date" id="date" value="<?php if(isset($_GET['date'])) echo $_GET['date'];?>" >
              </div> <!-- .form-group -->
              <div class="form-group">
                <label for="weapon">Arma</label>
                <select class="form-control" name="weapon" id="weapon">
                  <option <?php if(!isset($_GET['weapon']) || ($_GET['weapon'] < 0 || $_GET['weapon'] > 2)) echo 'selected';?> value="-1">Seleziona un'arma</option>
                  <option <?php if(isset($_GET['weapon']))if($_GET['weapon'] == 0) echo 'selected';?> value="0">Spada</option>
                  <option <?php if(isset($_GET['weapon']))if($_GET['weapon'] == 1) echo 'selected';?> value="1">Fioretto</option>
                  <option <?php if(isset($_GET['weapon']))if($_GET['weapon'] == 2) echo 'selected';?> value="2">Sciabola</option>
                </select>
              </div> <!-- .form-group -->
                <button type="submit" class="btn btn-primary btn-block" id="btnsrc" value="search">Cerca</button>
            </form>
          </div> <!-- .card-body -->
        </div> <!-- .card -->
      </div> <!-- .col-lg-4 -->
      <div class="col-lg-4">
      </div> <!-- .col-lg-4 -->
    </div> <!-- .row -->
    <?php showData() ?>
  </div> <!-- .container -->




</body>
</html>

<script>

$(function() {
    $("#inputathlete").autocomplete({
        source: "search_athlete.php",
        select: function( event, ui ) {
            event.preventDefault();
            $("#id").val(ui.item.id);
            $("#inputathlete").val(ui.item.value);
          }
    });
});

</script>

<script src="../js/script.js"></script>

<?php
function showData() {
  require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/connectDB.php";
  require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/crudDB.php";

  if ($_SERVER["REQUEST_METHOD"] == "GET")
  {
    if (!isset($_GET["weapon"]) || ($_GET["weapon"] < 0 || $_GET["weapon"] > 2)) $weapon = -1; else $weapon = $_GET["weapon"];
    if (!isset($_GET["id"]) || empty($_GET["id"])) $id = -1; else $id = $_GET["id"];
    if (!isset($_GET["date"]) || empty($_GET["date"])) $date = "-1"; else $date = $_GET["date"];

    if ($weapon != -1 && $id != -1 && strcmp($date, "-1") != 0)
    {
      readLessons_all($conn, $id, $weapon, $date);
    }
    else if ($weapon != -1 && $id == -1 && strcmp($date, "-1") != 0) {
      readLessons_weapon_date($conn, $weapon, $date);
    }
    else if ($weapon == -1 && $id != -1 && strcmp($date, "-1") != 0) {
      readLessons_id_date($conn, $id, $date);
    }
    else if ($weapon != -1 && $id != -1 && strcmp($date, "-1") == 0) {
      readLessons_id_weapon($conn, $id, $weapon);
    }
    else if ($weapon == -1 && $id == -1 && strcmp($date, "-1") != 0) {
      readLessons_date($conn, $date);
    }
    else if ($weapon == -1 && $id != -1 && strcmp($date, "-1") == 0) {
      readLessons_id($conn, $id);
    }
    else if ($weapon != -1 && $id == -1 && strcmp($date, "-1") == 0) {
      readLessons_weapon($conn, $weapon);
    }
  }
}

function showResult($row, $athlete) {
switch ($row["arma"]) {
  case 0:
    $row["arma"] = "Spada";
    break;
  case 1:
    $row["arma"] = "Fioretto";
    break;
  case 2:
    $row["arma"] = "Sciabola";
    break;

  default:
    $row["arma"] = "Arma non selezionata.";
    break;
}

  echo '<div class="row">
          <div class="col-lg-1">
          </div> <!-- .col-lg-1 -->
          <div class="col-lg-10">
            <div class="card">
              <div class="card-header">' . $athlete["surname"] . ' ' . $athlete["name"] . ' - ' . $row["arma"] . '</div>
              <div class="card-body">
                <p class="card-text text-right">' . $row["data"] . '</p>
                <p class="card-text text-left">' . $row["descrizione"] . '</p>
              </div> <!-- .card-body -->
            </div> <!-- .card -->
          </div> <!-- .col-lg-10 -->
          <div class="col-lg-1">
          </div> <!-- .col-lg-1 -->
        </div> <!-- .row -->';
}

 ?>
