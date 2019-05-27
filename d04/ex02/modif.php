<?php
function print_error()
{
    echo "ERROR\n";
    exit;
}
$pwd = '../private/passwd';
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == 'OK')
{
    $read_accounts = file_get_contents($pwd);
    if ($read_accounts === false || $read_accounts == false)
    {
        print_error();
    }
    $ud_change = [];
    $fl = 0;
    $pwd_encrypt = hash('whirlpool', $_POST['oldpw']);
    $account = unserialize(file_get_contents($pwd));
    foreach ($account as $key => $value)
    {
        if ($value['login'] == $_POST['login'] && $value['passwd'] == $pwd_encrypt)
        {
            $new_user['login'] = $_POST['login'];
            $new_user['passwd'] = hash('whirlpool', $_POST['newpw']);
            $ud_change[] = $new_user;
            $fl = 1;
            echo "OK" ."\n";
        }
        else
        {
            $ud_change[] = $value;
        }
    }
    file_put_contents($pwd, serialize($ud_change));
    if ($fl == 0)
    {
        print_error();
    }
}
else
{
    print_error();
}
?>