#!/usr/bin/php
<?php
function my_check_odd_even($p1)
{
    return $p1 % "2";
}
echo "Enter a number: ";
while (!(feof(STDIN)))
{
    $num = ltrim(fgets(STDIN));
    $num = rtrim($num);
    if (feof(STDIN) == 1)
        exit("\n");
    if (is_numeric($num) == 1)
    {
        if (my_check_odd_even($num) == 0)
            echo "The number "."$num"." is even\n";
        else
            echo "The number "."$num"." is odd\n";
    }
    else
        echo "'"."$num"."' is not a number\n";
    echo "Enter a number: ";
}
?>