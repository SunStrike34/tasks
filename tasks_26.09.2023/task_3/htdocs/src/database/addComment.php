<?php

function addComment(array $comment) : bool
{
    $connect = connectToBD();

    $query = $connect ->prepare("INSERT INTO 
    comments (author, comment) 
    VALUES 
    (:author, :comment)");
    $query -> bindParam(':author', $comment['author'], PDO::PARAM_STR);
    $query -> bindParam(':comment', $comment['comment'], PDO::PARAM_STR);

    return $query -> execute();
}
