<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEDT-Salle</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Ajout d'une Salle</h2>
  <form action="salle.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="nomsalle">Nom Salle:</label>
      <input type="text" class="form-control" id="nomsalle" name="nomsalle">
    </div>
    <div class="mb-3">
      <label for="capacite">Capacité :</label>
      <input type="number" class="form-control" id="capacite" name="capacite">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
  </form>
</div>

</body>
</html>

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="GEDT";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    echo "Echec de la Connexion " . mysqli_connect_error();
  }else{
    if (isset($_POST["nomsalle"]) || !empty($_POST["nomsalle"])){
      $nomsalle=$_POST["nomsalle"];
      $capacite=$_POST["capacite"];
     
      // Requete Insertion
      $sql = "INSERT INTO Salle VALUES ('', '$nomsalle','$capacite')";

      if (mysqli_query($conn, $sql)) {
        echo "Insertion réussie";
      } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
      }
    }    
  }
  mysqli_close($conn);
?>
