<?php

function resaveCookies() : void
{
    if (isset($_COOKIE['email']) && (isset($_SESSION['auth']) == true)) {
        setcookie('email', $_COOKIE['email'], [
            'expires' => time() + 3600 * 24 * 30,
            'path' => '/',
            'domain' => '',
            'secure' => false,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
    }
}
