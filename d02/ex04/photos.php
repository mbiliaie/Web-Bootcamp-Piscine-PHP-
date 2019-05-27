#!/usr/bin/php
<?php

function check_add_slash ($linkImage, $domName)  // checks if link is complete, makes dir, gets content
{
    if (preg_match("/^\/.*/", $linkImage))
        $linkImage = $domName[1].$domName[2].$linkImage;
    else
        $linkImage = $domName[1].$domName[2]."/".$linkImage;
    return $linkImage;
}

function link_content_former($page, $domName) // forms a link, makes dir, gets content
{
    $i = 0;
    if (preg_match_all("/<img src=\"([^\"]*)\"/", $page, $imgs))
    {
        if (!file_exists($domName[2])) // creates a new directory if needed
            mkdir($domName[2]);
        while( isset($imgs[1][$i]))
        {
            $linkImage = $imgs[1][$i];
            preg_match("/.*\/([^\/]*)$/", $linkImage, $i_name);
            $imageName = $i_name[1];
            preg_match("/^(http).*/", $linkImage, $httpIm);
            if ($httpIm[1] != "http")   // to be checked
                check_add_slash($linkImage, $domName);
            $udImg = curl_init($linkImage);
            curl_setopt($udImg, CURLOPT_RETURNTRANSFER, 1);
            $img = curl_exec($udImg);
            file_put_contents($domName[2]."/".$imageName, $img);
            $i++;
        }
    }
}

if (isset($argv[1]) && preg_match("/^https?:\/\/[a-zA-Z0-9.-]{4,}\/?$/", $argv[1]))
{               
    preg_match("/^(https?:\/\/)([a-zA-Z0-9.-]{4,})(\/?)$/", $argv[1], $domName); // 'http/s/'     - domName[1]
    $ud = curl_init($argv[1]);                                                   //  domain name  - domName[2]
    curl_setopt($ud, CURLOPT_RETURNTRANSFER, 1);
    $page = curl_exec($ud); // gets complete html markup of the page
    link_content_former($page, $domName);
}
?>