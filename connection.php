<?php
    try{
    $db = "iteh2lb1var2";
    $dsn = "mysql:host=localhost";
    $user = "root";
    $pass = "";
    $dbh = new PDO($dsn, $user, $pass);
    }
    catch (PDOException $e) {
        echo "Error!: " . $e->getMessage() . "<br/>"; die();
        }        
?>