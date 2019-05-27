<?php
function print_error()
{
    echo "ERROR\n";
    exit;
}
$dp = '../private';
$pwd = '../private/passwd';
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "OK") {
    if (file_exists($dp) == FALSE) {
        mkdir($dp);
    }
    if (file_exists($pwd) == FALSE) {
        file_put_contents($pwd, NULL);
    }
    $user_data = unserialize(file_get_contents($pwd));
    if ($user_data) {
        $exist = 0;
        foreach ($user_data as $key => $value) {
            if ($value['login'] === $_POST['login'])
                    $exist = 1;
        }
    }
    if ($exist) {
        print_error();
    } else {
        $temp['login'] = $_POST['login'];
        $temp['passwd'] = hash('whirlpool', $_POST['passwd']);
        $user_data[] = $temp;
        file_put_contents($pwd, serialize($user_data));
        echo "OK\n";
    }
} 
else {
        print_error();
}
?>