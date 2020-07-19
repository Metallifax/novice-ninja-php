<?php
//This block will be present whenever we alter, make calls, or query the database as our main connection point from php.
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
// Second sequel query from the book that demos a selection query.
// If anything, I'll learn how to do exception status calls really well.
// Select differs substantially since SELECT pulls a large amount of data
// This data will go into seperate rows and columns as seen below.
try
{
    $sql = "SELECT joketext FROM joke";
    $result = $pdo->query($sql);
}
catch(PDOException $e)
{
    $error = 'Error fetching jokes: ' . $e->getMessage();
    include 'output.html.php';
    exit();
}

while ($row = $result->fetch())
{
    $jokes[] = $row['joketext'];
}
include 'jokes.html.php'
?>