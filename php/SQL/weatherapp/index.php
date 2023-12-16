<?php

try 
{
    $strConnection = 'mysql:host=localhost;dbname=weatherapp;charset=utf8';
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $pdo = new PDO($strConnection, 'root', '', $arrExtraParam);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch(PDOException $e) 
{
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}

$querryAdd = 'INSERT INTO météo VALUES (?, ?, ?)';
$adding = $pdo->prepare($querryAdd);

if (isset($_POST['submit']))
{
    $adding->bindValue(1, $_POST['ville'], PDO::PARAM_STR);
    $adding->bindValue(2, $_POST['haut'], PDO::PARAM_INT);
    $adding->bindValue(3, $_POST['bas'], PDO::PARAM_INT);
    $adding->execute();
    $adding->closeCursor();
    $adding = NULL;
}

$querryDelete = 'DELETE FROM météo WHERE ville = ?';
$deleting = $pdo->prepare($querryDelete);

if (isset($_POST['checkbox']))
{
    $value = $_POST['checkbox'];
    $deleting->bindValue(1, $value);
    $deleting->execute();
    $deleting->closeCursor();
    $deleting = NULL;
}

$queryGet = 'SELECT DISTINCT * FROM météo';
$arr = $pdo->query($queryGet)->fetchAll();

?>

<table>
    <thead>
        <tr>
            <th>Ville</td>
            <th>Haut</td>
            <th>Bas</td>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($arr as $row)
        {
        ?>
            <tr>
                <td><?php echo $row['ville']?></td>
                <td><?php echo $row['haut']?></td>
                <td><?php echo $row['bas']?></td>
                <td><form method="post"><button type="submit" value="<?php echo $row['ville']?>" name="checkbox"></button></form></td>
            </tr>

        <?php
        }
        ?>
        </tbody>
</table>

<form method="post">
    <label for="ville">Ville</label>
    <input type="text" name="ville" required>

    <label for="haut">Haut</label>
    <input type="number" name="haut" required>

    <label for="bas">Bas</label>
    <input type="number" name="bas" required>

    <input type="submit" name="submit">
</form>