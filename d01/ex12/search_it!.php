#!/usr/bin/php
<?php
if ($argc > 2 && isset($argv[1]) && isset($argv[2]))
{
    $i = 2;
    while ($i < $argc)
    {
        preg_match("/^(.[^:]*):(.*)$/", $argv[$i], $form_line);
        if ($form_line[1] === $argv[1])
            $val = $form_line[2];
        $i++;
    }
    if(isset($val))
        print "$val\n";
}
?>