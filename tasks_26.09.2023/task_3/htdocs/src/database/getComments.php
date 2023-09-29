<?php
function getComments(): ?array
{
    $connect = connectToBD();

    $query = $connect->prepare("SELECT author, comment FROM comments");
    $query -> execute();

    return $query->fetchAll() ?: null; 
}
