<?php
    $a = 9;
    $b = 9;
    $c = 4;

    if ($a < $b && $a > $c || $a > $b && $a < $c )
    {
        print ($a);
    }else if ($c < $b && $c > $a || $c > $b && $c < $a)
    {
        print ($c);
    }else if ($b < $c && $b > $a || $b > $c && $b < $a)
    {
        print ($b);
    }else
    {
        print("No hay valor del medio");
    }
?>