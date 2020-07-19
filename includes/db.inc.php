<?php
//Insert into an index.php program to make a connection to the database.
//Includes the password and user which may change from program
//to program.

try
{
    $pdo = new PDO('mysql:host=localhost;dbname=ijdb','webuser','Metallica6^');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
    $error = 'Unable to connect to the database server.';
    include 'error.html.php';
    exit();
}
