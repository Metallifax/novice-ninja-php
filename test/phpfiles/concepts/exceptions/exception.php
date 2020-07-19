<?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=ijdb','Someunkownuserthatnooneincludingmyselfknowsforfearthatiwilldrunkenlyfillupdatabasesfulloflongintegerscuzfuckitknowumsayin\'','none-ya-bidniss');
        echo "Connection successful";
    }
    catch (PDOException $e)
    {
        $output = 'Unable to connect to the database server.';
        include 'output.html.php';
        exit();
    }
?>
