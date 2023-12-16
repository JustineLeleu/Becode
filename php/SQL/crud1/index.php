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

$queryGet = 'SELECT * FROM clients';
$arrClients = $pdo->query($queryGet)->fetchAll();

foreach($arrClients as $row)
{
    echo $row["id"], " ", $row["lastName"]," ", $row["firstName"]," ", $row["birthDate"]," ", $row["card"]," ", $row["cardNumber"];
    echo "<br>";
}

echo "<br>";

$queryGet = 'SELECT * FROM showtypes';
$arrShows = $pdo->query($queryGet)->fetchAll();

foreach($arrShows as $row)
{
    echo $row["id"], " ", $row["type"];
    echo "<br>";
}

echo "<br>";

$queryGet = 'SELECT * FROM clients LIMIT 20';
$arrClients = $pdo->query($queryGet)->fetchAll();

foreach($arrClients as $row)
{
    echo $row["id"], " ", $row["lastName"]," ", $row["firstName"]," ", $row["birthDate"]," ", $row["card"]," ", $row["cardNumber"];
    echo "<br>";
}

echo "<br>";

$queryGet = 'SELECT * FROM clients WHERE card = 1';
$arrClients = $pdo->query($queryGet)->fetchAll();

foreach($arrClients as $row)
{
    echo $row["id"], " ", $row["lastName"]," ", $row["firstName"]," ", $row["birthDate"]," ", $row["card"]," ", $row["cardNumber"];
    echo "<br>";
}

echo "<br>";

$queryGet = 'SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName ASC';
$arrClients = $pdo->query($queryGet)->fetchAll();

foreach($arrClients as $row)
{
    echo "Nom : ", $row["lastName"];
    echo "<br>";
    echo "Prénom : ", $row["firstName"];
    echo "<br>";
}

echo "<br>";

$queryGet = 'SELECT title, performer, date, startTime FROM shows ORDER BY title ASC';
$arrShows = $pdo->query($queryGet)->fetchAll();

foreach($arrShows as $row)
{
    echo $row["title"], " par ", $row["performer"], ", le ", $row["date"], " à ", $row["startTime"];
    echo "<br>";
}

echo "<br>";

$queryGet = 'SELECT * FROM clients';
$arrClients = $pdo->query($queryGet)->fetchAll();

foreach($arrClients as $row)
{
    echo "Nom : ", $row["lastName"];
    echo "<br>";
    echo "Prénom : ", $row["firstName"];
    echo "<br>";
    echo "Date de naissance : ", $row["birthDate"];
    echo "<br>";
    echo "Carte de fidélité : ", ($row["card"]) ? "Oui" : "Non";
    echo "<br>";
    echo ($row["card"]) ? "Numéro de carte : ". $row["cardNumber"] : "";
    echo "<br>";
    echo "<br>";
}

?>