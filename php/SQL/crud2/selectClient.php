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

$queryGetClients = "SELECT id, lastName, firstName FROM clients";
$clients = $pdo->query($queryGetClients)->fetchAll();

?>

<form method="post" action="exo4-6-7.php">
    <div>
        <label for="clientToUpdate">Client: </label>
        <select name="clientToUpdate" id="">
            <?php
            foreach ($clients as $value)
            {
                $lastName = $value['lastName'];
                $firstName = $value['firstName'];
                $id = $value['id'];
                echo "<option value='$id'>$lastName $firstName</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit">
</form>