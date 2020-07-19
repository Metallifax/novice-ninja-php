<?php
//Previous excerpt that tries a database connection and returns if 
//true or false.
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=ijdb','webuser','Metallica6^');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    }
    catch (PDOException $e)
    {
        $output = 'Unable to connect to the database server.';
        include 'output.html.php';
        exit();
    }
$output = 'Database connection established.';
//First true mysql query using the database connection that we established above
//This example demo's the UPDATE method inside of a mysql query.
try
{
    $sql = "UPDATE joke SET jokedate='2020-07-08' WHERE joketext LIKE '%chicken%'";
    $affectedRows = $pdo->exec($sql);
}
catch(PDOException $e)
{
    $output = 'Error performing update: ' . $e->getMessage();
    include 'output.html.php';
    exit();
}

$output = "Updated $affectedRows rows.";
include 'output.html.php'
?>