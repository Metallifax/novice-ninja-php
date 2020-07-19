<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Jokes</title>
</head>
<body>
    
    <p><a href="?addjoke">Add your own joke</a></p>
    <br>
    <p>Here are all the jokes in the database:</p>
    <?php foreach ($jokes as $joke): ?>
        <form action="?deletejoke" method="post">
            <blockquote>
                <p>
                    <?php echo htmlspecialchars($joke['text'], ENT_QUOTES, 'UTF-8');?>
                    <input type="hidden" name="id" value="<?php echo $joke['id'];?>">
                    <input type="submit" value="Delete">
                </p>
            </blockquote>
        </form>
    <?php endforeach; ?>
</body>
</html>