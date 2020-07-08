<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf8">
    <title>Today&rsquo;s Date</title>
  </head>
  <body>
    <p>Today&rsquo;s date (according to this web server) is 
      <?php 
          echo date('l, F jS Y.');
        ?>
    </p>
    <p>and the time is:
      <?php
          echo date('h:ia.');
        ?>
    </p>
  </body>
</html>
