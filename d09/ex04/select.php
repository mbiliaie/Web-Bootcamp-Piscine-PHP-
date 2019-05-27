<?php

$txt = file_get_contents('list.csv');
$mtx = explode("\n", $txt);
$res = json_encode($mtx);

print($res);

?>