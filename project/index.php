<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CS2 Lineups - Search</title>
    </head>
    <body>
        <h1><a href="index.php">Search</a></h1>
        <?php
            include 'elements/navbar.inc.html';
        ?>
        <form action="index.php" method="GET">
            <?php
                include 'elements/filters.inc.php';
            ?>
            <p>
                <input type="submit" value="Apply Filters">
            </p>
        </form>
        <!-- List of results -->
        <ul>
            <li>
                <a href="lineup.php">Sample Lineup</a>
            </li>
        </ul>
    </body>
    <?php
        include 'elements/footer.inc.html';
    ?>
</html>