<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A PHP Calculator</title>
</head>
<body>
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "get">
    <input type="number" name="num01"
    placeholder="Number one">
    <select name ="operator">
        <option value="add"> + </option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="divide">/</option>
    </select>
    <input type="number" name="num02"
    placeholder = "Number two">
    <button>Calculate</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $num01 = $_GET["num01"];
        $num02 = $_GET["num02"];
        $operator = $_GET["operator"];

        echo "<h2>";
        switch($operator) {
            case "add":
                $result = $num01 + $num02;
                echo "Result of $num01 + $num02 = $result";
                break;
            case "subtract":
                $result = $num01 - $num02;
                echo "Result of $num01 - $num02 = $result";
                break;
            case "multiply":
                $result = $num01 * $num02;
                echo "Result of $num01 * $num02 = $result";
                break;
            case "divide":
                $result = $num01 / $num02;
                echo "Result of $num01 / $num02 = $result";
                break;
            default:
                echo "Unknown operator.";
        }
        echo "</h2>";
    }
    ?>
</body>
</html>