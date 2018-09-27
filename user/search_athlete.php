<?php
require $_SERVER["DOCUMENT_ROOT"] .  "/lessonsProject/includes/connectDB.php";

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = $conn->query("SELECT * FROM atleta WHERE (cognome LIKE '{$searchTerm}%' OR nome LIKE '{$searchTerm}%') ORDER BY cognome, nome ASC");

// Generate skills data array
$skillData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
      $row["cognome"] = $row["cognome"] . " " . $row["nome"];
      $data["id"] = $row["id"];
      $data["value"] = $row["cognome"];
      array_push($skillData, $data);
    }
}

// Return results as json encoded array
echo json_encode($skillData);

?>
