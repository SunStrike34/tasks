<?php
function printComments() : void {
    include_once "dataProcessing.php"; // GetComments()
    $comments = getComments(); // SELECT-запрос, возвращает массив с комментариями
    foreach ($comments as $comment) {
        print_r($comment);
    }
}