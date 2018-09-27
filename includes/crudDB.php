<?php
/*  read and compare the email and password
use in  user/login.php */
function read_compare($conn, $email, $psw) {
  $row = ["email"=>"","psw"=>"","id"=>"","privileges"=>""];
  if ($stmt = $conn->prepare("SELECT * FROM User WHERE email=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("s", $email))
      if ($stmt->execute())
        if ($stmt->bind_result($row['id'], $row['email'], $row['psw'], $row['privileges'])) /* Bind result query into an associative array*/
          if ($stmt->fetch())
           if (password_verify($psw, $row['psw'])) { /* Verifies that a password matches a hash */
            $stmt->close();
              return $row; /* Return an associative array */
            }
    $stmt->close();
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read psw with IDutente
use in  ... */
function read($conn, $IDutente) {
  if ($stmt = $conn->prepare("SELECT psw FROM User WHERE IDutente=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("i", $IDutente))
      if ($stmt->execute())
        if ($stmt->store_result())
          if ($stmt->bind_result($row)) /* Bind result query into a var*/
            if ($stmt->fetch())
              if ($stmt->num_rows === 1) { /* Check that there's a row */
                $stmt->close();
                return $row; /* Return an associative array */
              }
    $stmt->close();
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read name and surname with IDutente
use in  includes/crudDB.php
        user/index.php */
function readNameSurname($conn, $IDutente) {
  $row = ["name"=>"","surname"=>""];
  if ($stmt = $conn->prepare("SELECT nome, cognome FROM atleta WHERE id=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("i", $IDutente))
      if ($stmt->execute())
        if ($stmt->store_result())
          if ($stmt->bind_result($row['name'], $row['surname'])) /* Bind result query into a var*/
            if ($stmt->fetch())
              if ($stmt->num_rows === 1) { /* Check that there's a row */
                $stmt->close();
                return $row; /* Return an associative array */
              }
    $stmt->close();
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with idAthlete
use in  user/viewlesson.php */
function readLessons_id($conn, $idAthlete) {
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE id_atleta=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("i", $idAthlete))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with weapon
use in  user/viewlesson.php */
function readLessons_weapon($conn, $weapon) {
  echo "string";
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE arma=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("i", $weapon))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with date
use in  user/viewlesson.php */
function readLessons_date($conn, $date) {
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE data=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("s", $date))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with idAthlete and weapon
use in  user/viewlesson.php */
function readLessons_id_weapon($conn, $idAthlete, $weapon) {
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE id_atleta=? AND arma=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("ii", $idAthlete, $weapon))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with idAthlete and date
use in  user/viewlesson.php */
function readLessons_id_date($conn, $idAthlete, $date) {
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE id_atleta=? AND data=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("is", $idAthlete, $date))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with weapon and date
use in  user/viewlesson.php */
function readLessons_weapon_date($conn, $weapon, $date) {
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE arma=? AND data=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("is", $weapon, $date))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* read lezione with idAthlete, weapon and date
use in  user/viewlesson.php */
function readLessons_all($conn, $idAthlete, $weapon, $date) {
  if ($stmt = $conn->prepare("SELECT * FROM lezione WHERE id_atleta=? AND arma=? AND data=?;")) { /* Check that there aren't errors */
    if ($stmt->bind_param("iis", $idAthlete, $weapon, $date))
      if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows === 0)
          return -1;
        while($row = $result->fetch_assoc()) {
          $athlete = readNameSurname($conn, $row["id_atleta"]);
          showResult($row, $athlete);
        }
        $stmt->close();
        return 0;
      }
      $stmt->close();
      return -1;
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* update row with email
use in  ... */
function update($conn, $email, $name, $surname, $newEmail, $birthDate, $gender) {
  if ($stmt = $conn->prepare("UPDATE User SET name=?, surname=?, email=?, birthday=?, gender=? WHERE email=?")) { /* Check that there aren't errors */
    $stmt->bind_param("ssssis", $name, $surname, $newEmail, $birthDate, $gender, $email);
    if ($stmt->execute()) {
      $stmt->close();
      return 0;
    }
    $stmt->close();
  }

  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* delete row with email
use in  ... */
function delete($conn, $email) {
  if ($stmt = $conn->prepare("DELETE FROM User WHERE email=?")) { /* Check that there aren't errors */
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
      $stmt->close();
      echo "Record deleted successfully";
      return 0;
    }
    $stmt->close();
  }

  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* insert row in database "dblessondata" into table "lezione"
use in  newlesson.php */
function insertLesson($conn, $idAthlete, $weapon, $desc, $date, $dateNow, $utcDifference) {
  if ($stmt = $conn->prepare("INSERT INTO lezione (descrizione, data, datatime_input, utc_difference, arma, id_atleta) VALUES (?,?,?,?,?,?)")) { /* Check that there aren't errors */
    if ($stmt->bind_param("sssiii", $desc, $date, $dateNow, $utcDifference, $weapon, $idAthlete)) /* bind parameters for markers */
      if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return 0;
      }
    $stmt->close();
  }

  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* insert row
use in  ... */
function insertMaestro($conn, $table, $firstName, $lastName, $bday, $bplace, $codfisc, $gender, $address, $postcode, $codTes, $certMedic, $phoneNum, $email, $idSocieta) {
  if ($stmt = $conn->prepare("INSERT INTO maestro (codiceTesseramento, nome, cognome, dataNascita, luogoNascita, codiceFiscale, sesso, via, cap, telefono, email, scadenzaCertMedico, idSocieta) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)")) { /* Check that there aren't errors */
    if ($stmt->bind_param("isssssisssssi", $codTes, $firstName, $lastName, $bday, $bplace, $codfisc, $gender, $address, $postcode, $phoneNum, $email, $certMedic, $idSocieta)) /* bind parameters for markers */
      if ($stmt->execute()) {
        $username = $lastName . "." . $conn->insert_id;
        $stmt->close();
        if (addUserLogin($username, $table) == 0)
          return 0;
      }
    $stmt->close();
  }

  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* insert row
use in  ... */
function insertParent($conn, $firstNameParent, $lastNameParent, $phoneNumParent, $emailParent, $parentela)
{
  if ($stmt = $conn->prepare("INSERT INTO parente (nome, cognome, email, parentela) VALUES (?,?,?,?)")) { /* Check that there aren't errors */
    if ($stmt->bind_param("ssss", $firstNameParent, $lastNameParent, $phoneNumParent, $emailParent, $parentela)) /* bind parameters for markers */
      if ($stmt->execute()) {
        $stmt->close();
        return 0;
      }
    $stmt->close();
  }

  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* Set psw
use in  ... */
function setPsw($conn, $psw, $IDutente) {
  if ($stmt = $conn->prepare("UPDATE User SET psw=? WHERE IDutente=?")) { /* Check that there aren't errors */
    if ($stmt->bind_param("si", $psw, $IDutente))
      if ($stmt->execute()) {
        $stmt->close();
        return 0;
      }
    $stmt->close();
  }
  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}

/* scrivi commento
use in  ... */
function addUserLogin($usernameUser, $privileges)
{
  if (strcmp($privileges, "allievo") == 0)
		$privileges = 3;
	else if (strcmp($privileges, "maestro") == 0)
		$privileges = 2;
  else
    $privileges = 3;

  $servername = "localhost";
  $username = "admin";
  $dbName = "dblogin";
  $password = "FabRuwek3zas";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbName);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: (" . $conn->errno . ") " . $conn->connect_error);
    exit();
  }

  if ($stmt = $conn->prepare("INSERT INTO user (username, privileges) VALUES (?,?)")) { /* Check that there aren't errors */
    if ($stmt->bind_param("si", $usernameUser, $privileges)) /* bind parameters for markers */
      if ($stmt->execute()) {
        $stmt->close();
        return 0;
      }
    $stmt->close();
  }

  echo "Error(" . $conn->errno . "): " . $conn->error; /* Show a message of error with SQL statement, error number and error text */
  return -1;
}
?>
