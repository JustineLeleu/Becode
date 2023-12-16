<?php

session_start();

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


if (isset($_POST['showToUpdate']))
{
    $_SESSION['show'] = $_POST['showToUpdate'];
}

if (isset($_SESSION['show']))
{
    $id = $_SESSION['show'];

    $queryGetShow = "SELECT * FROM shows WHERE id = $id";
    $show = $pdo->query($queryGetShow)->fetch();

    $querryUpdateShow = "UPDATE shows SET title = ?, performer = ?, date = ?, showTypesId = ?, firstGenresId = ?, secondGenreId = ?, duration = ?, startTime = ? WHERE id = $id";
    $updateShow = $pdo->prepare($querryUpdateShow);

    if (isset($_POST["title"], $_POST["performer"], $_POST["date"], $_POST["duration"], $_POST["startTime"]))
    {
        $updateShow->bindValue(1, $_POST['title'], PDO::PARAM_STR);
        $updateShow->bindValue(2, $_POST['performer'], PDO::PARAM_STR);
        $updateShow->bindValue(3, $_POST['date'], PDO::PARAM_STR);
        $updateShow->bindValue(4, $_POST['showType'], PDO::PARAM_INT);
        $updateShow->bindValue(5, $_POST['genre1'], PDO::PARAM_INT);
        $updateShow->bindValue(6, $_POST['genre2'], PDO::PARAM_INT);
        $updateShow->bindValue(7, $_POST['duration'], PDO::PARAM_STR);
        $updateShow->bindValue(8, $_POST['startTime'], PDO::PARAM_STR);
        $updateShow->execute();
        $updateShow->closeCursor();
        $updateShow = NULL;

        session_unset ();
        session_destroy ();

        header("location: selectShow.php");
    }
}

?>

<form method="post">
    <div>
        <label for="title">Title: </label>
        <input type="text" name="title" value ="<?php echo $show['title']?>">
    </div>
    <div>
        <label for="performer">Performer: </label>
        <input type="text" name="performer" value ="<?php echo $show['performer']?>">
    </div>
    <div>
        <label for="date">Date: </label>
        <input type="date" name="date" value ="<?php echo $show['date']?>">
    </div>
    <div>
        <label for="showType">Show type: </label>
        <select name="showType" id="">
            <?php
            foreach ($showTypes as $value)
            {
                $type = $value['type'];
                $id = $value['id'];
                $selected = ($show['showTypesId'] == $id) ? "selected" : "";
                echo "<option value='$id' $selected>$type</option>";
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
                $selected = ($show['firstGenresId'] == $id) ? "selected" : "";
                echo "<option value='$id' $selected>$genre</option>";
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
                $selected = ($show['secondGenreId'] == $id) ? "selected" : "";
                echo "<option value='$id' $selected>$genre</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="duration">Duration: </label>
        <input type="time" name="duration" value ="<?php echo $show['duration']?>">
    </div>
    <div>
        <label for="startTime">Start time: </label>
        <input type="time" name="startTime" value ="<?php echo $show['startTime']?>">
    </div>
    <input type="submit">
</form>