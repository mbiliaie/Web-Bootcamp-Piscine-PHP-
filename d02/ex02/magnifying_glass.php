#!/usr/bin/php
<?php

function to_upcase_links($ref)
{
    $i = 0;
    $rf = $ref[1];
    while ( $i < strlen($rf))
    {
        if ($rf[$i] == ">")
        {
            $i++;
            while ($rf[$i] != "<" && $i < strlen($rf))
            {
                $rf[$i] = strtoupper($rf[$i]);
                $i++;
            }
            if ($rf[$i + 1] == "/" && $rf[$i + 2] == "a")
                return $rf;
        }
        $i++;
    }
    return $rf;
}

function to_upcase_titles($ref)
{
    $tl = "title=\"";
    $i = 0;
    $rf = $ref[1];
    while ($i < strlen($rf))
    {
        if ($tl == substr($rf, $i, strlen($tl)))
        {
            $i = $i + strlen($tl);
            while ($rf[$i] != '"' && $i < strlen($rf))
            {
                $rf[$i] = strtoupper($rf[$i]);
                $i++;
            }
        }
        if ($rf[$i + 1] == "/" && $rf[$i + 2] == "a")
            return $rf;
        $i++;
    }
}

function up_dispatch($str, $callableParam)
{
    $pattern = "/(<a.+<\/a)/";
    $res = preg_replace_callback($pattern, $callableParam, $str);
    return $res;

}

if (isset($argv[1]))
{
    $txt = up_dispatch(file_get_contents($argv[1]), "to_upcase_links");
    echo  up_dispatch($txt, "to_upcase_titles");
}
?>