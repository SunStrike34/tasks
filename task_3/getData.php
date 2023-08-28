<?php
include_once "dataProcessing.php"; // GetData()
$data = GetData(); // SELECT-запрос, возвращает массив с комментариями
foreach ($data as $value) {
    echo "<div class='comment'>Автор: ".$value['author']."<br>".$value['comment']."</div>";
}