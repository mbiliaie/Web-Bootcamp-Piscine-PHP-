<?php

function if_cat($txt, $div_num)
{
    $mtx = explode(":#:", $txt);
    for($j = 0; isset($mtx[$j]); $j++)
    {
        if ( $mtx[$i] == $div_num)
            return 1;
    }
    return 0;
}

?>