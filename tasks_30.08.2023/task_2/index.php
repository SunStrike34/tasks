<?php
require_once "connectBD.php";

try{
    $requests = [
    "DELETE p FROM products AS p
    LEFT JOIN availabilities AS a ON a.product_id = p.id
    WHERE a.id IS NULL;",
    "DELETE c FROM categories AS c
    LEFT JOIN products AS p ON p.category_id = c.id
    WHERE p.id IS NULL;",
    "DELETE s FROM stocks AS s 
    LEFT JOIN availabilities AS a ON a.stock_id = s.id
    WHERE a.stock_id IS NULL;",
    ];
    
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($requests as $value) {
        $connect->query($value);
    }
    } catch (PDOException $error) {
        echo "Ошибка выполнения запроса: <br>" .$sql. $error -> getMessage();
    }
