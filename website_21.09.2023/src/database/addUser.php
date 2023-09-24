<?php

function addUser(array $user) : bool
{
    $connect = connectToBD();

    $password = password_hash($user['password'], PASSWORD_DEFAULT);

    $query = $connect->prepare('INSERT INTO users
    (fullname, email, password, phone, active, mailing)
    VALUES
    (:name, :email, :password, :phone, 1, :mailing)');
    $query -> bindParam(':name', $user['name'], PDO::PARAM_STR);
    $query -> bindParam(':email', $user['email'], PDO::PARAM_STR);
    $query -> bindParam(':phone', $user['phone'], PDO::PARAM_STR);
    $query -> bindParam(':password', $password, PDO::PARAM_STR);
    $query -> bindParam(':mailing', $user['mailing'], PDO::PARAM_BOOL);

    return $query -> execute();
}
