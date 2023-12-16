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

if (isset($_POST['ticketToUpdate']))
{
    $_SESSION['ticket'] = $_POST['ticketToUpdate'];
}

if (isset($_SESSION['ticket']))
{
    $id = $_SESSION['ticket'];

    $queryGetTickets = "SELECT * FROM tickets WHERE bookingsId = $id";
    $tickets = $pdo->query($queryGetTickets)->fetchAll();

    if (isset($_POST['delete']))
    {
        $querryDeleteBooking = "DELETE FROM bookings WHERE id = $id";
        $deletingBooking = $pdo->exec($querryDeleteBooking);
        $querryDeleteTicket = "DELETE FROM tickets WHERE bookingsId = $id";
        $deletingTicket = $pdo->exec($querryDeleteTicket);

        session_unset ();
        session_destroy ();

        header("location: selectTickets.php");
    }
}

?>

<form method="post">
    <?php
    foreach ($tickets as $ticket)
    {
        ?>

        <div>
            <label for="ticket">Numéro billets: </label>
            <input type="text" name="ticket" value ="<?php echo $ticket['id']?>">
        </div>
        <div>
            <label for="price">Prix: </label>
            <input type="text" name="price" value ="<?php echo $ticket['price']?>">
        </div>
        <div>
            <label for="bookingId">Numéro réservation: </label>
            <input type="text" name="bookingId" value ="<?php echo $ticket['bookingsId']?>">
        </div>

        <br>

        <?php
    }
    ?>

    <button type="submit" name="delete">Delete</button>
</form>