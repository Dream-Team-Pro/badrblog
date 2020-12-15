<?php
    $dsn = "mysql:host=localhost;dbname=zblog";
    $username_db = "";
    $password_db = "";

    try{
    $con = new PDO($dsn, $username_db, $password_db);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo "You Are Connected <br>";
    }
    catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>