<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEDT-Utilisateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Ajout d'un Utilisateur</h2>
  <form action="utilisateur.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="nom">Nom Utilisateur:</label>
      <input type="email" class="form-control" id="nom" name="nom">
    </div>
    <div class="mb-3">
      <label for="mp">Mot de Passe :</label>
      <input type="password" class="form-control" id="mp" name="mp">
    </div>
    <div class="mb-3">
        <label for="profil">Profil :</label>
        <select name="profil" id="profil">
            <option value="etudiant">Etudiant</option>
            <option value="responsable">Responsable Pédagogique</option>
            <option value="enseignant">Enseignant</option>
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
    if (isset($_POST['nom']) || !empty($_POST['nom'])){
      $nom=$_POST["nom"];
      $mp=$_POST["mp"];
      $profil=$_POST["profil"];
      // Requete Insertion
      $sql = "INSERT INTO Utilisateur VALUES ('', '$nom','$mp', '$profil')";

      if (mysqli_query($conn, $sql)) {
        echo "Insertion réussie";
      } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
      }
    }    
  }
  mysqli_close($conn);
?>
