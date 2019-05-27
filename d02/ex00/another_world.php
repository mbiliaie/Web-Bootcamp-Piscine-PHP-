#!/usr/bin/php
<?php
if ($argc >= 2)
{
    $str_start = ltrim($argv[1]);
    $str_start = rtrim($str_start);
    $str_clean = preg_replace('/\s{1,}/', ' ', $str_start);
    print_r("$str_clean\n");
}
?>