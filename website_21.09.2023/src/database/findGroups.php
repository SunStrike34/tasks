<?php

function findGroups(string $user_id) : ?array
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM group_user
    LEFT JOIN groups ON groups.id = group_user.group_id
    WHERE group_user.user_id = :user_id;');
    $query -> bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $query -> execute();

    return $query -> fetchAll(PDO::FETCH_ASSOC) ?: null;
}
