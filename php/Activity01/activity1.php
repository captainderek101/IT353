<?php
    $user = $_GET["user"];
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $operator = $_GET["operator"];

    include 'functions.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Activity 01</title>
    </head>
    <body>
        <header>
            <h1> Processing form input with PHP </h1>
        </header>
        <h2> <?php echo greeting() ?> <?php echo $user ?> </h2>
        <div id="compute"> 
            <h3>Here is your lucky number: <?php echo compute($num1, $num2, $operator) ?></h3>
        </div>
    </body>
    <?php
        include 'footer.inc.html';
    ?>
</html>