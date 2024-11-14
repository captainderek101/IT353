
<?php
    $user = "Your name";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Example 1 - PHP</title>
    </head>
    <body>
        <h1> Welcome <?php echo $user ?> ! </h1>
        <p>
            The server time is
            <?php
                echo "<strong>" . date("H:i:s") .
                "</strong>";
            ?>
        </p>
        <h1>PHP Index</h1>
    </body>
</html>