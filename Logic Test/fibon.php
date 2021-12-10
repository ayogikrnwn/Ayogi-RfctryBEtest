<?php
function findNearestFib($num)
{
    $n = (int)(sqrt($num));
    return ($n * $n == $num);
}
 

// Mengecek Fibonaci atau Tidak
function checkFibonacci($array, $n)
{
    $count = 0;
    for ($i = 0; $i < $n; $i++)
    {
        if (findNearestFib(5 * $array[$i] *
                                $array[$i] + 4) ||
            findNearestFib(5 * $array[$i] *
                                $array[$i] - 4))
        {
            echo $array[$i]." ";
            $count++;
        }
    }
    if ($count == 0)
        echo "Tidak Ditampilkan\n";
}
 

$array = array(15, 1, 3);
$n = sizeof($array);
 
checkFibonacci($array, $n);
 
 
?>