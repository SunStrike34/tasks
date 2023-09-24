<?php

function checkUser(string $email, string $phone) : string | bool
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT email, phone FROM users WHERE email = :email OR phone = :phone  LIMIT 1');
    $query -> bindParam(':email', $email, PDO::PARAM_STR);
    $query -> bindParam(':phone', $phone, PDO::PARAM_STR);
    $query -> execute();
    $user = $query->fetch(PDO::FETCH_ASSOC) ?: null;

    if ($email == (is_array($user) ? $user['email'] : null)) {
        return 'Пользователь с таким email уже существует';
    }

    if ($phone == (is_array($user) ? $user['phone'] : null)) {
        return 'Пользователь с таким телефоном уже существует';
    }

    return false;
}
