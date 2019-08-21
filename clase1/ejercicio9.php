<?php
    $array[5];
    $prom;
    
    for($i=0;$i<5;$i++)
    {
        $array[$i] == rand(1, 100);
        $prom += $array[$i];
    } 

    $prom = $prom/5;

    if($prom < 6)
    {
        print("El promedio es menor a 6");
    }else if($prom > 6)
    {
        print("El promedio es mayor a 6");
    }else
    {
        print("El promedio es 6");
    }

?>