<?php

function authorize(array $user = []) : void
{
    $_SESSION['auth'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['id'] = $user['id'];
}

function isAuthorized() : bool
{
    return (bool) ($_SESSION['auth'] ?? false);
}

function logout() : void
{
    $_SESSION['auth'] = false;
    $_SESSION['email'] = '';
    $_SESSION['fullname'] = '';
}

function redirectExited(string $location = '/login/') : void
{
    if (! isAuthorized()) {
        header('Location: ' . $location);
        exit();
    }
}

function redirectАuthorized(string $location = '/') : void
{
    if (isAuthorized()) {
        header('Location: ' . $location);
        exit();
    }
}

function currentUser() : string
{
    return $_SESSION['fullname'] ?? '';
}
