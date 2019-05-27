<?php
function my_check_copy($p1, $p2)
{
    foreach ($p2 as $elem)
    {
        if (empty($elem) == FALSE)
        {
            $p1[] = $elem;
        }
    }
    unset($p2);
    return ($p1);
}
function ft_split($p1)
{
    $c = " ";
    // $p1 = trim($p1);
    $div_arr = explode($c, $p1);
    $new_arr = array();
    sort($div_arr);
    return (my_check_copy($new_arr, $div_arr));
}