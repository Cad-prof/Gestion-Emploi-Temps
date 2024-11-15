<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEDT-Enseignant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Ajout d'un Enseignant</h2>
  <form action="enseignant.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="matricule">Matricule:</label>
      <input type="text" class="form-control" id="matricule" placeholder="Matricule" name="matricule">
    </div>
    <div class="mb-3">
      <label for="nom">Nom :</label>
      <input type="text" class="form-control" id="nom" placeholder="Nom " name="nom">
    </div>
    <div class="mb-3">
      <label for="prenom">Prénom :</label>
      <input type="text" class="form-control" id="prenom" placeholder="Prénom " name="prenom">
    </div>
    <div class="mb-3">
      <label for="spec">Spécialité:</label>
      <input type="text" class="form-control" id="spec" placeholder="Spécialité" name="spec">
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
    if (isset($_POST["matricule"]) || !empty($_POST["matricule"])){
      $mat=$_POST["matricule"];
      $nom=$_POST["nom"];
      $prenom=$_POST["prenom"];
      $spec=$_POST["spec"];
      // Requete Insertion
      $sql = "INSERT INTO Enseignant VALUES ('$mat', '$nom','$prenom', '$spec')";

      if (mysqli_query($conn, $sql)) {
        echo "Insertion réussie";
      } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
      }
    }    
  }
  mysqli_close($conn);
?>
