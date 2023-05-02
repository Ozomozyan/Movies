<html>
<head>
    <title>Recherche de films par année</title>
</head>
<body>
<h1>Recherche de films par année</h1>

<!-- Add a new form for searching movies by year -->
<form action="" method="post">
    <label for="annee">Rechercher un film par année :</label>
    <input type="number" name="annee" id="annee" required>
    <input type="submit" value="Rechercher">
</form>

<?php
// If the form is submitted, process the data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchYear = $_POST['annee'];

    // 1° - Connexion à la BDD
    $base = new PDO('mysql:host=localhost; dbname=id20172939_movies', 'id20172939_root', 'C>3Gmt-4_2h3Fp)/');
    $base->exec("SET CHARACTER SET utf8");

    // 2° - Préparation de requette et execution
    $query = $base->prepare('SELECT * FROM movies WHERE annee = :annee;');
    $query->bindParam(':annee', $searchYear, PDO::PARAM_INT);
    $query->execute();

    // 3° - Lecture du resultat de la requette
    if ($query->rowCount() > 0) {
        echo "<h2>Films de l'année " . htmlspecialchars($searchYear) . " :</h2>";
        while ($data = $query->fetch()) {
            echo $data['id'] . " " . $data['titre'] . " " . $data['genre'] . " " . $data['annee'] . "</br>";
        }
    } else {
        echo "<p>Aucun film trouvé pour l'année " . htmlspecialchars($searchYear) . ".</p>";
    }
}
?>

</br><a href="index.html">Retour à la page principale</a>
</body>
</html>
