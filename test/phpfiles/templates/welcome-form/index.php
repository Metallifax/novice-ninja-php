
<?php 
// Form needs to be submitted with a firstname --> if a request is made, include form template.
if (!isset($_REQUEST['firstname'])){
      include 'form.html.php';
}
// Post 'firstname', and 'lastname' and instantiate the vars. 
else{
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

// If firstname is Kevin, and lastname is Yank -> Render the page with what is shown in $output.
if ($firstname == 'Kevin' && $lastname == 'Yank'){
      $output = 'Welcome, oh glorious leader!';
}

// Added other characters for fun/understanding.
if ($firstname == 'Matt' && $lastname == 'Forgione'){
      $output = 'You\'re fine too I guess.. Just kidding! Welcome, ' .$firstname . " " . $lastname . "!";
}

if ($firstname == 'Jon' && $lastname == 'Snow'){
      $output = 'You know nuthin\', ' . $firstname . ' ' . $lastname . '...';
}

// If the _POST request doesn't yield the above variable, the output is as follows. Includes the safer option using htmlspecialchars.
else{
      $output = 'Welcome to our website, ' . 
      htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . ' ' .
      htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8') . '!' ;
}

// New concept --> includes the filename and all variables/ids/classes/types.
include 'welcome.html.php';
}