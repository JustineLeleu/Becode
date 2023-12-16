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

$queryGetCards = "SELECT * FROM cardtypes";
$cardTypes = $pdo->query($queryGetCards)->fetchAll();

$querryAddClient = 'INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber) VALUES (?, ?, ?, ?, ?)';
$addingClient = $pdo->prepare($querryAddClient);
$querryAddCard = 'INSERT INTO cards (cardNumber, cardTypesId) VALUES (?, ?)';
$addingCard = $pdo->prepare($querryAddCard);

if (isset($_POST["lastName"], $_POST["firstName"], $_POST["birthDate"], $_POST["cardNumber"]))
{
    $addingClient->bindValue(1, $_POST['lastName'], PDO::PARAM_STR);
    $addingClient->bindValue(2, $_POST['firstName'], PDO::PARAM_STR);
    $addingClient->bindValue(3, $_POST['birthDate'], PDO::PARAM_STR);
    $addingClient->bindValue(4, isset($_POST['card']) ? 1 : 0, PDO::PARAM_BOOL);
    $addingClient->bindValue(5, isset($_POST['card']) ? $_POST['cardNumber'] : NULL, PDO::PARAM_INT);
    if (isset($_POST['card'], $_POST['cardTypes']))
    {
        $addingCard->bindValue(1, $_POST['cardNumber'], PDO::PARAM_INT);
        $addingCard->bindValue(2, $_POST['cardTypes'], PDO::PARAM_INT);
        $addingCard->execute();
        $addingCard->closeCursor();
        $addingCard = NULL;
    }
    $addingClient->execute();
    $addingClient->closeCursor();
    $addingClient = NULL;
}

?>

<form method="post">
    <div>
        <label for="lastName">Last name: </label>
        <input type="text" name="lastName">
    </div>
    <div>
        <label for="firstName">First name: </label>
        <input type="text" name="firstName">
    </div>
    <div>
        <label for="birthDate">Birth date: </label>
        <input type="date" name="birthDate">
    </div>
    <div>
        <label for="card">Card: </label>
        <input type="checkbox" name="card">
    </div>
    <div>
        <label for="cardNumber">Card number: </label>
        <input type="number" name="cardNumber">
    </div>
    <div>
        <label for="cardTypes">Card type: </label>
        <select name="cardTypes" id="">
            <?php
            foreach ($cardTypes as $cardType)
            {
                $type = $cardType['type'];
                $id = $cardType['id'];
                echo "<option value='$id'>$type</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit">
</form>