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

$queryGetCards = "SELECT * FROM cardtypes";
$cardTypes = $pdo->query($queryGetCards)->fetchAll();


if (isset($_POST['clientToUpdate']))
{
    $_SESSION['client'] = $_POST['clientToUpdate'];
}

if (isset($_SESSION['client']))
{
    $id = $_SESSION['client'];

    $queryGetClient = "SELECT * FROM clients WHERE id = $id";
    $client = $pdo->query($queryGetClient)->fetch();

    if ($client['card'])
    {
        $cardId = $client['cardNumber'];

        $queryGetCard = "SELECT * FROM cards WHERE cardNumber = $cardId";
        $card = $pdo->query($queryGetCard)->fetch();

        $querryUpdateCard = "UPDATE cards SET cardNumber = ?, cardTypesId = ? WHERE cardNumber = $cardId";
        $updateCard = $pdo->prepare($querryUpdateCard);
    }

    $querryUpdateClient = "UPDATE clients SET lastName = ?, firstName = ?, birthDate = ?, card = ?, cardNumber = ? WHERE id = $id";
    $updateClient = $pdo->prepare($querryUpdateClient);

    if (isset($_POST["lastName"], $_POST["firstName"], $_POST["birthDate"], $_POST["cardNumber"]))
    {
        $updateClient->bindValue(1, $_POST['lastName'], PDO::PARAM_STR);
        $updateClient->bindValue(2, $_POST['firstName'], PDO::PARAM_STR);
        $updateClient->bindValue(3, $_POST['birthDate'], PDO::PARAM_STR);
        $updateClient->bindValue(4, isset($_POST['card']) ? 1 : 0, PDO::PARAM_BOOL);
        $updateClient->bindValue(5, isset($_POST['card']) ? $_POST['cardNumber'] : NULL, PDO::PARAM_INT);
        if (isset($_POST['card'], $_POST['cardTypes']))
        {
            $updateCard->bindValue(1, $_POST['cardNumber'], PDO::PARAM_INT);
            $updateCard->bindValue(2, $_POST['cardTypes'], PDO::PARAM_INT);
            $updateCard->execute();
            $updateCard->closeCursor();
            $updateCard = NULL;
        }
        $updateClient->execute();
        $updateClient->closeCursor();
        $updateClient = NULL;

        session_unset ();
        session_destroy ();

        header("location: selectClient.php");
    }

    if (isset($_POST['delete']))
    {
        $querryDelete = "DELETE FROM clients WHERE id = $id";
        $deleting = $pdo->exec($querryDelete);

        if ($client['card'])
        {
            $cardId = $client['cardNumber'];
            $querryDeleteCard = "DELETE FROM cards WHERE cardNumber = $cardId";
            $deletingCard = $pdo->exec($querryDeleteCard);
        }

        session_unset ();
        session_destroy ();

        header("location: selectClient.php");
    }
}

?>

<form method="post">
    <div>
        <label for="lastName">Last name: </label>
        <input type="text" name="lastName" value ="<?php echo $client['lastName']?>">
    </div>
    <div>
        <label for="firstName">First name: </label>
        <input type="text" name="firstName" value ="<?php echo $client['firstName']?>">
    </div>
    <div>
        <label for="birthDate">Birth date: </label>
        <input type="date" name="birthDate" value ="<?php echo $client['birthDate']?>">
    </div>
    <div>
        <label for="card">Card: </label>
        <input type="checkbox" name="card" <?php echo ($client['card']) ? "checked" : ""?>>
    </div>
    <div>
        <label for="cardNumber">Card number: </label>
        <input type="number" name="cardNumber" value ="<?php echo $client['cardNumber']?>">
    </div>
    <div>
        <label for="cardTypes">Card type: </label>
        <select name="cardTypes" id="">
            <?php
            foreach ($cardTypes as $cardType)
            {
                $type = $cardType['type'];
                $id = $cardType['id'];
                $selected = ($card['cardTypesId'] == $id) ? "selected" : "";
                echo "<option value='$id' $selected>$type</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit">
</form>

<form method="post">
    <button type="submit" name="delete">Delete</button>
</form>