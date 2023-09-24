<?php

function createCookies(array $email) : void
{
    setcookie('email', $email['email'], [
        'expires' => time() + 3600 * 24 * 30,
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
}
