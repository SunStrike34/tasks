<?php
function GetData() {
    include_once "connectBD.php";
try{
    $sql = "SELECT author, comment FROM data_comments";
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $connect->query($sql);
    return $data; 
} catch (PDOException $error) {
    echo "Ошибка выполнения запроса: <br>" .$sql. $error -> getMessage();
}
}