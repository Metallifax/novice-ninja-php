<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php'



//New part of script that allows the user to add their own script to the database.
//This section of the block with GET the add joke request.
if (isset($_GET['addjoke']))
{
    include 'form.html.php';
    exit();
}


//The logic behind the insertion method. Includes a try catch exception with a query execute.
if (isset($_POST['joketext']))
{
    // Database connection include.
    include 'db.inc.php';
    try 
    {   //Prepares the database for insertion by use of the page form.
        $sql = 'INSERT INTO joke SET
             joketext = :joketext,
             jokedate = CURDATE()';
        $s = $pdo->prepare($sql);
        $s->bindValue(':joketext',$_POST['joketext']);
        $s->execute();
    }
    catch(PDOException $e)
    {
        $error = 'Error adding submitted joke: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

//Updated the select query to implement the delete functionality, includes the id selection.
try
{
    $sql = "SELECT joke.id, joketext, name, email FROM joke INNER JOIN author ON authorid = author.id";
    $result = $pdo->query($sql);
}

catch(PDOException $e)
{
    $error = 'Error fetching jokes: ' . $e->getMessage();
    include 'output.html.php';
    exit();
}

//Primary delete function. Uses similar functionality to the add function.
if (isset($_GET['deletejoke']))
{
    //Database connection
    include 'db.inc.php';
    try
    {
        $sql = 'DELETE FROM joke WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s-> bindValue(':id', $_POST['id']);
        $s->execute();
    }
    catch (PDOException $e)
    {
        $error = 'Error deleting joke: ' . $e ->getMessage();
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}
//Organizes the sql query into organized rows and columns. This acts
//as a listener for the page.
while ($row = $result->fetch())
{
    $jokes[] = array(
        'id' => $row['id'],
        'text' => $row['joketext'],
        'name' => $row['name'],
        'email' => $row['email'],
    );
}

//Ties this file to the jokes.html.php file in order for the variables to be accessed on 
//that page.
include 'jokes.html.php'
?>