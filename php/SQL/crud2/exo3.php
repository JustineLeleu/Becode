<?php

try 
{
    $strConnection = 'mysql:host=localhost;dbname=becode;charset=utf8';
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $pdo = new PDO($strConnection, 'root', '', $arrExtraParam);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch(PDOException $e) 
{
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

$queryGetShowTypes = "SELECT * FROM showtypes";
$showTypes = $pdo->query($queryGetShowTypes)->fetchAll();
$queryGetGenres = "SELECT * FROM genres";
$showGenres = $pdo->query($queryGetGenres)->fetchAll();

$querryAddShow = 'INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
$addingShow = $pdo->prepare($querryAddShow);

if (isset($_POST["title"], $_POST["performer"], $_POST["date"], $_POST["duration"], $_POST["startTime"]))
{
    $addingShow->bindValue(1, $_POST['title'], PDO::PARAM_STR);
    $addingShow->bindValue(2, $_POST['performer'], PDO::PARAM_STR);
    $addingShow->bindValue(3, $_POST['date'], PDO::PARAM_STR);
    $addingShow->bindValue(4, $_POST['showType'], PDO::PARAM_INT);
    $addingShow->bindValue(5, $_POST['genre1'], PDO::PARAM_INT);
    $addingShow->bindValue(6, $_POST['genre2'], PDO::PARAM_INT);
    $addingShow->bindValue(7, $_POST['duration'], PDO::PARAM_STR);
    $addingShow->bindValue(8, $_POST['startTime'], PDO::PARAM_STR);
    $addingShow->execute();
    $addingShow->closeCursor();
    $addingShow = NULL;
}

?>

<form method="post">
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="performer">Performer: </label>
        <input type="text" name="performer">
    </div>
    <div>
        <label for="date">Date: </label>
        <input type="date" name="date">
    </div>
    <div>
        <label for="showType">Show type: </label>
        <select name="showType" id="">
            <?php
            foreach ($showTypes as $value)
            {
                $type = $value['type'];
                $id = $value['id'];
                echo "<option value='$id'>$type</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="genre1">First genre: </label>
        <select name="genre1" id="">
            <?php
            foreach ($showGenres as $value)
            {
                $genre = $value['genre'];
                $id = $value['id'];
                echo "<option value='$id'>$genre</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="genre2">Second genre: </label>
        <select name="genre2" id="">
            <?php
            foreach ($showGenres as $value)
            {
                $genre = $value['genre'];
                $id = $value['id'];
                echo "<option value='$id'>$genre</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="duration">Duration: </label>
        <input type="time" name="duration">
    </div>
    <div>
        <label for="startTime">Start time: </label>
        <input type="time" name="startTime">
    </div>
    <input type="submit">
</form>