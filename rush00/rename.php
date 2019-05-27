<?php

function next_id($param)
{
    if (($pon = fopen($param, "r")) !== FALSE)
    {
        $identMax = 0;
        if (file_get_contents($param))
        {
            while (($mtx = fgetcsv($pon, 0, ";")) !== FALSE)
            {
                if (isset($mtx) && isset($mtx[0]) && $mtx[0] > $identMax)
                    $identMax = $mtx[0];
            }
            $identMax++;
        }
        fclose($pon);
        return ($identMax);
    }
    return (-1);
}

function add_str($inFl, $txt)
{
    $identNext = next_id($inFl);
    if (($nof = fopen($inFl, "r+")) !== FALSE && $identNext >= 0)
    {
        ini_set('auto_detect_line_endings', TRUE);

        $txtNew = next_id($inFl).";".$txt;
        fseek($nof, 0, SEEK_END);
        fwrite($nof, "\n".$txtNew);
        fclose($nof);
    }
    else
        echo "Pizdets...#1<br>";
}

?>