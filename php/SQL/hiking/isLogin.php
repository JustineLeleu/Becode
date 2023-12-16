<?php

session_start();

function isLogin()
{
    if (isset($_SESSION["username"], $_SESSION["password"]))
    {
        return true;
    }

    return false;
}

?>