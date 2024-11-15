<!DOCTYPE html>
<html lang="en">
<head>
  <title>GEDT-Liste Filières</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


</body>
</html>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "GEDT";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
   
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Filiere";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class=\"container mt-3\">
            <h2>Liste des Filières</h2>";
        echo "<table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>Code Filière</th>
                            <th>Nom Filièe</th>
                            <th>VHA</th>
                        </tr>
                    </thead>
                    <tbody>";
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row["CODEFIL"]."</td>
                                    <td>" . $row["NOMFIL"]. "</td>
                                    <td>" . $row["VHA"]. "</td>
                                </tr>";
                        }
                    echo "<tbody>
            </table>";
        echo  "</div>";
    } else {
        echo "0 results";
    }
    
    mysqli_close($conn);
?>