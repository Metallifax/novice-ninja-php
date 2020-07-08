<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <title>This is an index</title>
  </head>
  <body>
    <h1><?php echo 'This is a Page?';?></h1>
    <p><?php echo 'This is a <strong>test</strong>';?></p>
    <p>
    <?php 
       $hiThere = 'Hi ' . 'there!'; // assigns a value of 'Hi there!'
       $hiBack = 'Hi ' . 'back!';
       echo "$hiThere $hiBack";?>
    </p> 
    <br>
    <p>
      <?php 
        $a = 3;
        $b = 5;
        $result = $a + $b;
        echo "<strong>$a</strong> + <strong>$b</strong> is equal to <strong>$result</strong>."
      ?> 
    </p>
    <p>
      <?php 
        $myArray = array('one', 2, '3');
        echo "This is an <strong>array:</strong> <em>[$myArray[0], $myArray[1], $myArray[2]]</em> ";

      ?>
    </p>
    <p>
    <?php
      //Associative arrays
      $birthdays['Kevin'] = '1978-04-12';
      $birthdays['Stephanie'] = '1980-05-16';
      $birthdays['David'] = '1983-09-09';
      echo 'My birthday is: ' . $birthdays['Kevin']
      ?>
    </p>
    <p>
    <?php 
      $birthdays = array('Kevin' => '1978', 'Stephanie' => '1980', 'David' => '1983');
      echo "My birthday is: " . $birthdays['Kevin'];

    ?>
    </p>


</body>
</html>
