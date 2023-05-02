<html>
<body>
<h1>Mon exercice PHP</h1>


<?php
//Lister le contenu de la table FILMS

//1° - Connexion à la BDD
$base = new PDO('mysql:host=localhost; dbname=id20215400_cnamgreta', 'id20215400_boris', '=nq^^=vKz?FRiz7-');
$base->exec("SET CHARACTER SET utf8");

//2° - Préparation de requette et execution
$retour = $base->query('SELECT * FROM movies;');

//3° - Lecture du resultat de la requette
while ($data = $retour->fetch()){
echo $data['id']." ".$data['titre']." ".$data['genre']." ".$data['annee']."</br>";
}

?>
</br><a href="index.html">Retour à la page principale</a>
</body>
</html>