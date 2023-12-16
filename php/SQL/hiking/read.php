<?php

include 'getData.php';
include 'isLogin.php';

$isLogin = isLogin();

$queryGet = 'SELECT * FROM hiking';
$arr = $pdo->query($queryGet)->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <header>
        <button onclick="location.href='/login.php'" <?php echo $isLogin ? 'hidden' : '' ; ?>>Login</button>
        <button onclick="location.href='/logout.php'" <?php echo $isLogin ? '' : 'hidden' ; ?>>Logout</button>
    </header>
    <h1>Liste des randonnées</h1>
    <table>
        <thead>
            <tr>
                <th>Id</td>
                <th>Name</td>
                <th>Difficulty</td>
                <th>Distance</td>
                <th>Duration</td>
                <th>Height difference</td>
                <th>Available</td>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($arr as $row)
            {
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><a href="/update.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']?></a></td>
                    <td><?php echo $row['difficulty']?></td>
                    <td><?php echo $row['distance']?></td>
                    <td><?php echo $row['duration']?></td>
                    <td><?php echo $row['height_difference']?></td>
                    <td><input type="checkbox" <?php echo ($row['available']) ? "checked" : ""?> disabled/></td>
                    <td><button onclick="location.href='/delete.php?id=<?php echo $row['id']; ?>'">Delete</button></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
        </table>

        <button onclick="location.href='/create.php'">Add hike</button>
    </body>
</html>