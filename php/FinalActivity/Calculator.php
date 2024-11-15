<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A PHP Calculator</title>
</head>
<body>
    <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
    <input type="number" name="num01"
    placeholder="Number one">
    <select name ="operator" id="selector">
        <option value="add"> + </option>
        <option value="subtract">-</option>
        <option value="multiply">*</option>
        <option value="exponent">^</option>
        <option value="divide">/</option>
        <option value="modulo">%</option>
    </select>
    <input type="number" name="num02"
    placeholder = "Number two">
    <button>Calculate</button>
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num01 = $_POST["num01"];
        $num02 = $_POST["num02"];
        $operator = $_POST["operator"];

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
            case "exponent":
                $result = $num01 ** $num02;
                echo "Result of $num01 ^ $num02 = $result";
                break;
            case "divide":
                if($num02 == 0) {
                    echo "Cannot divide by 0.";
                    break;
                }
                $result = $num01 / $num02;
                echo "Result of $num01 / $num02 = $result";
                break;
            case "modulo":
                if($num02 == 0) {
                    echo "Cannot modulo by 0.";
                    break;
                }
                $result = $num01 % $num02;
                echo "Result of $num01 % $num02 = $result";
                break;
            default:
                echo "Unknown operator.";
        }
        echo "</h2>";
    }
    ?>
</body>
</html>