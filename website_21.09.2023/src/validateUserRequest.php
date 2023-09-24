<?php

function validateUserRequest(array $user) : bool | string
{
    if (empty((string)$user['name']) && !is_null($user['name'])) {
        return 'Не задано имя';
    }

    if (empty((string)$user['email']) && !is_null($user['email'])) {
        return 'Не задан email';
    }

    if (empty((string)$user['password']) && !is_null($user['password'])) {
        return 'Не задан пароль';
    }

    if (empty((string)$user['password_confirmation']) && !is_null($user['password_confirmation'])) {
        return 'Не задан подтверждение пароля';
    }

    if ($user['password'] != $user['password_confirmation']) {
        return 'Пароли не совпадают';
    }

    if (empty((string)$user['phone']) && !is_null($user['phone'])) {
        return 'Не задан номер';
    }

    if (empty($user['mailing'])) {
        return 'Не отмечена подписка на email-рассылку';
    }

    return false;
}
