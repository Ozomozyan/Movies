<html>
<body>
<h1>Reception des données du formulaire</h1>
<?php

$ID = $_GET['id'];
$TITRE= $_GET['titre'];
$GENRE = $_GET['genre'];
$ANNEE = $_GET['annee'];

echo $ID ." ".$TITRE." ".$GENRE." ".$ANNEE; 

//1° - Connexion à la BDD
$base = new PDO('mysql:host=localhost; dbname=movies', 'root', '');
$base->exec("SET CHARACTER SET utf8");
$sql = 'INSERT INTO movies VALUES('.$ID.',"'.$TITRE.'","'.$GENRE.'",'.$ANNEE.')';
//2° - Préparation de requette et execution
$retour = $base->query($sql);

?>
</br><a href="index.html">Retour à la page principale</a>
</body>
</html>