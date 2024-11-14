<?php
    function compute($num1, $num2, $operator)
    {
        switch($operator) {
            case "+":
                return $num1 + $num2;
            case "*":
                return $num1 * $num2;
            case "/":
                return $num1 / $num2;
            default:
                return "Invalid operator input!";
        }
    }
    function greeting() 
    {
        $timeOfDay = (date('H') - 6 + 24) % 24;
        if($timeOfDay < 12) 
        {
            return "good morning";
        }
        else if($timeOfDay < 18)
        {
            return "good afternoon";
        }
        else 
        {
            return "good evening";
        }
    }
?>