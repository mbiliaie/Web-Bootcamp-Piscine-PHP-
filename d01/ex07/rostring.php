#!/usr/bin/php
<?php
function my_mod_space($p1)
{
    $p1 = ltrim($p1);
    $p1 = rtrim($p1);
    $p1 = preg_replace('/\s+/', ' ', $p1);
    return $p1;
}
if ($argc > 1 && $argv[1] != NULL)
{
    $arr = explode(" ", (my_mod_space($argv[1])));
    $start = array_shift($arr);
    $arr = join(" ", $arr);
    if (empty($arr) == FALSE)
        print_r("$arr ");
    print_r("$start\n");
}
?>