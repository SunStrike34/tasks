<?php

function findData(string $id) : ?array
{
    $connect = connectToBD();

    $query = $connect->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $query -> execute();

    return $query -> fetch(PDO::FETCH_ASSOC) ?: null;
}
