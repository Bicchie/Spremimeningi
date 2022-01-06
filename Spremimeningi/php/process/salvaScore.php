<?php
    require_once "../utility/SpremiMeningiDB.php";
    
    $username = $_GET['username'];
    $gioco = $_GET['gioco'];
    $difficolta = $_GET['difficolta'];
    $mosse = $_GET['mosse'];
    $tempo = $_GET['tempo'];

    addScore($username,$gioco,$difficolta,$mosse,$tempo);

    header("Location: ./../../index.php");

?>