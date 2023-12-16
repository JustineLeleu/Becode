<?php

$id = $_GET['id'];

include 'getData.php';
include 'isLogin.php';

if (!isLogin()) header("location: /login.php");

else
{
    $querryDelete = "DELETE FROM hiking WHERE id = $id";
    $arr = $pdo->exec($querryDelete);

    header('Location: http://hiking/read.php');
}

?>