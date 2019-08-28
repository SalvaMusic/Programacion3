<?php
    $operador = "/";
    $op1 = 3;
    $op2 = 4;

    switch ($operador)
    {
        case "+":
            print($op1+$op2);
            break;
        case "-":
            print($op1-$op2);
            break;
        case "*":
            print($op1*$op2);
            break;
        case "/":
            print($op1/$op2);
            break;
    }
?>