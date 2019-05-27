#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Kiev");
$size_bin_line = 628;

if ($fd = fopen("/var/run/utmpx", "r"))
{
    $i = 0;
    while ($buffer = fread($fd, $size_bin_line))
    {
        $str = unpack("a256user/a4id/a32line/ipid/itype/I2time", $buffer);
        if ($str['type'] == 7)
        {
            $m[$i] = trim($str["line"]);
            $m[$i + 1] = trim($str["user"]);
            $m[$i + 2] = trim($str["time1"]);
            $i = $i + 3;
        }
    }
    $i = 0;
    while (!empty($m[$i]) && $m[$i] != NULL)
    {
        print ($m[$i + 1]." ".$m[$i]."  ".strftime("%b %e %H:%M", $m[$i + 2])." \n");
        $i = $i + 3;
    }
}
?>