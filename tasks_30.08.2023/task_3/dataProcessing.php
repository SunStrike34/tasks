<?php
function getComments() {
    include_once "connectBD.php";
try{
    $sql = "SELECT author, comment FROM data_comments";
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $comments = $connect->query($sql);
    $printComments = [];
    foreach ($comments as $key => $comment) {
        $printComments[$key] = "<div class='comment'>Автор: ".$comment['author']."<br>".$comment['comment']."</div>";
    }
    return $printComments; 
} catch (PDOException $error) {
    echo "Ошибка выполнения запроса: <br>" .$sql. $error -> getMessage();
}
}