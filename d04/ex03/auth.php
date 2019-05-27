<?php
    function auth($login, $passwd) {
        if (!$login || !$passwd)
            return FALSE;
        $account = unserialize(file_get_contents('../private/passwd'));
        if ($account) {
            foreach ($account as $key => $value) {
                if ($value['login'] === $login && $value['passwd'] === hash('whirlpool', $passwd))
                    return TRUE;
            }
        }
        return FALSE;
    }
?>