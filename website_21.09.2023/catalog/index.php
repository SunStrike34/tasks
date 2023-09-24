<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/core.php';
$cars = getCars();
redirectExited();
includeTemplate('/header.php', ['title' => 'Каталог моделей']);
includeTemplate('/cars_catalog.php', ['cars' => $cars]);
includeTemplate('/footer.php');
