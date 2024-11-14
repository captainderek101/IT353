<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Activity 04 - Inputs</title>
    </head>
    <body>
        <header>
            <h1>Another Page</h1>
        </header>
        <h2>Activity 04 - PHP</h2>
        <form action="process4b.php" method="GET">
            <?php
                include 'example4a.php';
            ?>
            <p>
                <input type="submit" value="Proceed">
            </p>
        </form>
    </body>
</html>