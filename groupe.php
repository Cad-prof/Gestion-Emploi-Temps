<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEDT-Groupe</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Ajout d'un Groupe</h2>
  <form action="groupe.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="fil">Filière:</label>
        <select class="form-select" id="fil" name="filiere">
            <option value="CSW">CSW</option>
            <option value="DWM">DWM</option>
            <option value="RT">RT</option>
            <option value="ASRI">ASRI</option>
        </select>
    </div>
    <div class="mb-3">
      <label for="nom">Nom du Groupe:</label>
      <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="mb-3">
      <label for="effectif">Effectif :</label>
      <input type="text" class="form-control" id="effectif" name="effectif">
    </div>
    <div class="mb-3">
      <label for="spec">Niveau:</label>
      <select class="form-select" id="niveau" name="niveau">
            <option value="L1">L1</option>
            <option value="L2">L2</option>
            <option value="L3">L3</option>
            <option value="M1">M1</option>
            <option value="M2">M2</option>
        </select>
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
    if (isset($_POST["nom"]) || !empty($_POST["nom"])){
      $filiere=$_POST["filiere"];
      $nom=$_POST["nom"];
      $effectif=$_POST["effectif"];
      $niveau=$_POST["niveau"];
      // Requete Insertion
      $sql = "INSERT INTO Groupe VALUES (null,'$filiere', '$nom','$effectif', '$niveau')";

      if (mysqli_query($conn, $sql)) {
        echo "Insertion réussie";
      } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
      }
    }    
  }
  mysqli_close($conn);
?>
