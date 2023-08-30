<?php
try{
    $connect = new PDO("mysql:host=localhost; dbname=shop_task", "root", "" );
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
        echo "Не удалось подключиться: " . $error -> getMessage();
    }
?>