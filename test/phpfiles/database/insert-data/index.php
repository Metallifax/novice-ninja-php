<?php
//Magic quotes block, some things are better left not learned. Just makes it so a backslashes //aren't inserted into every phrase in a sequel insertion.
//Be sure to include this before every sequal insert method or part of a program.
if (get_magic_quotes_gpc())
{
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process))
    {
        foreach ($val as $k => $v)
        {
            unset($process[$key][$k]);
            if (is_array($v))
            {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            }
            else
            {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}

//New part of script that allows the user to add their own script to the database.
//This section of the block with GET the add joke request.
if (isset($_GET['addjoke']))
{
    include 'form.html.php';
    exit();
}

//This block will be present whenever we alter, make calls, or query the database. Our main connection to the database in php.
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

//The logic behind the insertion method. Includes a try catch exception with a query execute.
if (isset($_POST['joketext']))
{
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
    $sql = "SELECT id, joketext FROM joke";
    $result = $pdo->query($sql);
}

catch(PDOException $e)
{
    $error = 'Error fetching joke: ' . $e->getMessage();
    include 'output.html.php';
    exit();
}

//Primary delete function. Uses similar functionality to the add function.
if (isset($_GET['deletejoke']))
{
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
    $jokes[] = array('id' => $row['id'],'text' => $row['joketext']);
}

//Ties this file to the jokes.html.php file in order for the variables to be accessed on 
//that page.
include 'jokes.html.php'
?>