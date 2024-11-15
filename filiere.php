<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEDT-Filière</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Ajout de Filière</h2>
  <form action="filiere.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="codefil">Code Filière:</label>
      <input type="text" class="form-control" id="codefil" placeholder="Code filière" name="codefil">
    </div>
    <div class="mb-3">
      <label for="nomfil">Nom Filière:</label>
      <input type="text" class="form-control" id="nomfil" placeholder="Nom filière" name="nomfil">
    </div>
    <div class="mb-3">
      <label for="vha">Volume Horaire Annuel:</label>
      <input type="number" class="form-control" id="vha" placeholder="Volume Horaire Annuel" name="vha">
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
    if (isset($_POST["codefil"]) || !empty($_POST["codefil"])){
      $codefil=$_POST["codefil"];
      $nomfil=$_POST["nomfil"];
      $vha=$_POST["vha"];
      // Requete Insertion
      $sql = "INSERT INTO Filiere VALUES ('$codefil', '$nomfil', '$vha')";

      if (mysqli_query($conn, $sql)) {
        echo "Insertion réussie";
      } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
      }
    }    
  }
  mysqli_close($conn);
?>
