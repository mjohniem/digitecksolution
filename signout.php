<?php

    require_once('function.php');
    session_start();

    unset($_SESSION["email"]);
    unset($_SESSION["sid"]);

    redirect("$baseurl");
    exit;
?>