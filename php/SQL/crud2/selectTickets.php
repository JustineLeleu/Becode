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

$queryGetClients = "SELECT * FROM bookings";
$clients = $pdo->query($queryGetClients)->fetchAll();

?>

<form method="post" action="exo8-9.php">
    <div>
        <label for="ticketToUpdate">Client: </label>
        <select name="ticketToUpdate" id="">
            <?php
            foreach ($clients as $value)
            {
                $clientId = $value['clientId'];
                $id = $value['id'];
                echo "<option value='$id'>$clientId</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit">
</form>