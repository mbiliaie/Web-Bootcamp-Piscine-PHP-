#!/usr/bin/php
<?php
if (!empty($argv[1]) && $argv[1] != NULL)
{
    if (preg_match("/^\s*([-+]?\d+)\s*([\+\-\*\/\%])\s*([-+]?\d+)\s*$/", $argv[1], $a))
    {
        switch ($a[2])
        {
            case '+': print_r ($a[1] + $a[3]."\n"); break;
            case '-': print_r ($a[1] - $a[3]."\n"); break;
            case '*': print_r ($a[1] * $a[3]."\n"); break;
            case '/': print_r ($a[1] / $a[3]."\n"); break;
            case '%': print_r ($a[1] % $a[3]."\n");
        }
    }
    else
        print_r ("Syntax Error\n");
}
else
    print_r("Incorrect Parameters\n");
?>