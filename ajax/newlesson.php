<?php
require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/checkSession.php";
require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/checkDB.php";
 /* Controllo se i vari campi sono vuoti, per l'arma c'è una funzione differente perché la fz empty() restituisce true con il valore "0" considerandolo carattere nullo */
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"]) && !empty($_POST["dateLesson"]) && !empty($_POST["desc"]) && !emptyWeapon($_POST["weapon"]))
{
  $idAthlete = checkId($_POST["id"]);
  $date = checkDateInput($_POST["dateLesson"]);
  $utcDifference = date("Z"); /* Dichiarazione e assegnazione dei secondi di differenza dal fuso orario UTC */
  date_default_timezone_set('UTC');
  $dateNow = date('Y-m-d H:i:s'); /* Dichiarazione e assegnazione della data e ora attuale al fuso orario UTC in formato yyyy-mm-dd hh-ii-ss */
  $weapon = checkWeapon($_POST["weapon"]);
  $desc = $_POST["desc"];

  if ($idAthlete != -1 && $date != -1 && $weapon != -1) {
      require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/connectDB.php";
      require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/crudDB.php";
      if (insertLesson($conn, $idAthlete, $weapon, $desc, $date, $dateNow, $utcDifference) == 0) {
        echo "Lezione aggiunta correttamente.";
      } else
        echo "Errore (3), inserimento lezione fallito.";
  }
  else
    echo "Errore (2), dato non valido.";
}
else
  echo "Errore (1), campo vuoto.";
  ?>
