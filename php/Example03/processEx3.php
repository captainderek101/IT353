<?php
    $user = $_GET["user"];
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];

    include 'functions.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Process Example 3</title>
    </head>
    <body>
        <h1> Processing Form in PHP </h1>
        <h2> Welcome <?php echo $user ?>! </h2>
        <div> 
            <h3>The sum of <?php echo $num1 ?> and 
                <?php echo $num2 ?> is <?php echo compute($num1, $num2) ?></h3>
        </div>
    </body>
</html>