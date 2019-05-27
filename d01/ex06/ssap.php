#!/usr/bin/php
<?php
if ($argc > 1)
{
    $joined_argv = join(" ", $argv);
    $joined_argv = preg_replace('/\s+/', ' ', $joined_argv);
    $joined_argv = ltrim($joined_argv);
    $joined_argv = rtrim($joined_argv);
    $joined_argv = explode(" ", $joined_argv);
    array_shift($joined_argv);
    sort($joined_argv);
    foreach ($joined_argv as $elem)
        print_r("$elem\n");
}
?>