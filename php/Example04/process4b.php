<?php
    $days = $_GET["day"];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Activity 04 - Results</title>
    </head>
    <body>
        <header>
            <h1>Processing form input with from process 4a with PHP</h1>
        </header>
        <p> You submitted <?php echo count($days) ?> values. <br>
            <?php
                foreach($days as $day)
                {
                    echo "$day <br>";
                }
            ?>
        </p>
    </body>
</html>