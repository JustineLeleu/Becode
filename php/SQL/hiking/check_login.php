<?php

include 'getData.php';

if (isset($_POST['username'], $_POST['password']))
{
    $user = $_POST['username'];
    $password = $_POST['password'];
    $queryGetUser = "SELECT * FROM user WHERE username like '%$user%'";
    $arr = $pdo->query($queryGetUser)->fetch();

    if ($arr != null)
    {
        if ($arr["password"] == sha1($password))
        {
            session_start();
            $_SESSION["username"] = $user;
            $_SESSION["password"] = $password;
            
            header("location: /read.php");
        }
        else
        {
            echo "<script>alert('password incorrect')</script>";
            header("location: /login.php");
        }
    }
    else
    {
        echo "<script>alert('username incorrect')</script>";
        header("location: /login.php");
    }
}

?>