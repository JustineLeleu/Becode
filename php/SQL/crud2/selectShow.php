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

$queryGetShows = "SELECT id, title, performer FROM shows";
$shows = $pdo->query($queryGetShows)->fetchAll();

?>

<form method="post" action="exo5.php">
    <div>
        <label for="showToUpdate">Show: </label>
        <select name="showToUpdate">
            <?php
            foreach ($shows as $value)
            {
                $title = $value['title'];
                $performer = $value['performer'];
                $id = $value['id'];
                echo "<option value='$id'>$title by $performer</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit">
</form>