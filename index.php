<?php
//Magic Quotes fix
include $_SERVER['DOCUMENT_ROOT'] . '/includes/magicquotes.inc.php';



// New part of script that allows the user to add their own script to the database.
//This section of the block with GET the add joke request.
if (isset($_GET['addjoke'])) {
    include 'form.html.php';
    exit();
}


//The logic behind the insertion method. Includes a try catch exception with a query execute.
if (isset($_POST['joketext'])) { // Database connection include.
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

    try {   //Prepares the database for insertion by use of the page form.
        $sql = 'INSERT INTO joke SET
             joketext = :joketext,
             jokedate = CURDATE()';
        $s = $pdo->prepare($sql);
        $s->bindValue(':joketext', $_POST['joketext']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error adding submitted joke: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

//Primary delete function. Uses similar functionality to the add function.
if (isset($_GET['deletejoke'])) {
    //Database connection
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    //Database include
    try {
        $sql = 'DELETE FROM joke WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error deleting joke: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

//Database include
include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

try {
    $sql = 'SELECT joke.id, joketext, name, email
        FROM joke INNER JOIN author
        ON authorid = author.id';
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    $error = 'Error fetching jokes: ' . $e->getMessage();
    include 'error.html.php';
    exit();
}

//Organizes the sql query into organized rows and columns. This acts
//as a listener for the page.
foreach ($result as $row) {
    $jokes[] = array(
        'id' => $row['id'],
        'text' => $row['joketext'],
        'name' => $row['name'],
        'email' => $row['email'],
    );
}

//Ties this file to the jokes.html.php file in order for the variables to be accessed on 
//that page.
include 'jokes.html.php';
