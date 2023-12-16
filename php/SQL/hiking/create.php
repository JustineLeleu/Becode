<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
        <div>
			<label for="available">Available</label>
			<input type="checkbox" name="available"/>
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>

<?php

include 'getData.php';
include 'isLogin.php';

if (!isLogin()) header("location: /login.php");

$querryAdd = 'INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES (?, ?, ?, ?, ?, ?)';
$adding = $pdo->prepare($querryAdd);

if (isset($_POST["name"], $_POST["difficulty"], $_POST["distance"], $_POST["duration"], $_POST["height_difference"]))
{
    $adding->bindValue(1, $_POST['name'], PDO::PARAM_STR);
    $adding->bindValue(2, $_POST['difficulty'], PDO::PARAM_STR);
    $adding->bindValue(3, $_POST['distance'], PDO::PARAM_INT);
    $adding->bindValue(4, $_POST['duration'], PDO::PARAM_STR);
    $adding->bindValue(5, $_POST['height_difference'], PDO::PARAM_INT);
    $adding->bindValue(6, isset($_POST['available']) ? 1 : 0, PDO::PARAM_BOOL);
    if ($adding->execute()) echo "<script>alert('La randonnée a été modifiée avec succès.')</script>";
    $adding->closeCursor();
    $adding = NULL;
}

?>