<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Jokes</title>
</head>
<body>
    <p>Here are all the jokes in the database:</p>
    <?php foreach ($jokes as $joke): ?>
    <blockquote>
        <p>
            <p>
                <?php
                echo htmlspecialchars($joke, ENT_QUOTES, 'UTF-8');
                
                ?>
            </p>
        </p>
    </blockquote>
    <?php endforeach; ?>
</body>
</html>