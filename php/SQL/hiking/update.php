<?php

$id = $_GET['id'];

include 'getData.php';
include 'isLogin.php';

if (!isLogin()) header("location: /login.php");

$querryUpdate = "UPDATE hiking SET name = ?, difficulty = ?, distance = ?, duration = ?, height_difference = ?, available = ? WHERE id = $id";
$updating = $pdo->prepare($querryUpdate);

if (isset($_POST["name"], $_POST["difficulty"], $_POST["distance"], $_POST["duration"], $_POST["height_difference"]))
{
    if (!is_numeric($_POST["distance"]) || !is_numeric($_POST["height_difference"])) echo "<script>console.log('not int')</script>";

    else 
    {
        $updating->bindValue(1, $_POST['name'], PDO::PARAM_STR);
        $updating->bindValue(2, $_POST['difficulty'], PDO::PARAM_STR);
        $updating->bindValue(3, $_POST['distance'], PDO::PARAM_INT);
        $updating->bindValue(4, $_POST['duration'], PDO::PARAM_STR);
        $updating->bindValue(5, $_POST['height_difference'], PDO::PARAM_INT);
        $updating->bindValue(6, isset($_POST['available']) ? 1 : 0, PDO::PARAM_BOOL);
        if ($updating->execute()) echo "<script>alert('La randonnée a été modifiée avec succès.')</script>";
        $updating->closeCursor();
        $updating = NULL;
    }
}

$queryGet = "SELECT * FROM hiking WHERE id = $id";
$arr = $pdo->query($queryGet)->fetch();

?>

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
			<input type="text" name="name" value="<?php echo $arr['name']?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile" <?php if($arr['difficulty'] == 'très facile'){echo("selected");}?>>Très facile</option>
				<option value="facile" <?php if($arr['difficulty'] == 'facile'){echo("selected");}?>>Facile</option>
				<option value="moyen" <?php if($arr['difficulty'] == 'moyen'){echo("selected");}?>>Moyen</option>
				<option value="difficile" <?php if($arr['difficulty'] == 'difficile'){echo("selected");}?>>Difficile</option>
				<option value="très difficile" <?php if($arr['difficulty'] == 'très difficile'){echo("selected");}?>>Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="number" name="distance" value="<?php echo $arr['distance']?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="<?php echo $arr['duration']?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="number" name="height_difference" value="<?php echo $arr['height_difference']?>">
		</div>
        <div>
			<label for="available">Available</label>
			<input type="checkbox" name="available" <?php echo ($arr['available']) ? "checked" : ""?>/>
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>