<?php
    $dsn = "mysql:host=localhost;dbname=zblog";
    $username = "elzero";
    $password = "";

    try{
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "You Are Connected <br>";
    }
    catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>