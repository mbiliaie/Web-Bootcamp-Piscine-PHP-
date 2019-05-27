#!/usr/bin/php
<?php
if ($argc == 2)
{
    $str = preg_replace('/\s+/', ' ', $argv[1]);
    $str = ltrim($str);
    $result_str = rtrim($str);
    print_r("$result_str\n");
}
?>