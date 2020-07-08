<?php 
    $name = $_REQUEST['name'];
    $lastname = $_REQUEST['lastname'];
    if ($name == 'Kevin' && $lastname == 'Yank'){
        echo 'Welcome, oh glorious leader!';
    }
    elseif($name == 'Matt' && $lastname == 'Forgione'){
        echo 'Hey ' . $name . ' glad you\'re here!';
    }
    elseif($name == 'Jon' && $lastname == 'Snow'){
        echo 'You know nuthin\'';
    }
    else{
        echo 'Welcome to my website ' . $name . " " .$lastname . "!";
    }
    ?>
    