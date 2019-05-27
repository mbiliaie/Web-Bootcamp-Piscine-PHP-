#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');

function show_result($p = -1)
{
    switch($p):
        case -1: print("Wrong Format\n"); break;
        default: print($p."\n");
    endswitch;
}

$mm = [
    1 => "Janvier",
    2 => "Février",
    3 => "Mars",
    4 => "Avril",
    5 => "Mai",
    6 => "Juin",
    7 => "Juillet",
    8 => "Août",
    9 => "Septembre",
    10 => "Octobre",
    11 => "Novembre",
    12 => "Décembre"];


$mm2 = [

    2 => "Fevrier",
    8 => "Aout",
    12 => "Decembre"];

$dd = [
    1 => "Lundi",
    2 => "Mardi",
    3 => "Mercredi",
    4 => "Jeudi",
    5 => "Vendredi",
    6 => "Samedi",
    7 => "Dimamche"];

if ($argc >= 2 && $argv[1] != NULL)
{
    if (preg_match("/^(\w{5,8}) (\d{1,2}) (\w{3,9}) (\d{4}) ([0-9:]{8})$/", $argv[1], $part))
    {
        $p1 = ucfirst($part[1]);
        $p3 = ucfirst($part[3]);
        if ((array_search($p1, $dd) && $set_mm = array_search($p3, $mm)) || (array_search($p1, $dd) && $set_mm = array_search($p3, $mm2)))
        {
            if (preg_match("/^(\d{2}):(\d{2}):(\d{2})$/", $part[5], $when))
            {
                $x = mktime((int)$when[1], (int)$when[2], (int)$when[3], (int)$set_mm, (int)$part[2], $part[4]);
                show_result($x);
            }
            else
                show_result();
        }
        else
            show_result();
    }
    else
        show_result();
}
?>