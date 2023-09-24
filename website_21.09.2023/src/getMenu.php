<?php

function getMenu() : array
{
    $menu = [
        [
            'title' => 'Главная',
            'path' => '/',
            'sort' => 10,
            'auth' => false,
        ],
        [
            'title' => 'Каталог',
            'path' => '/catalog/',
            'sort' => 8,
            'auth' => true,
        ],
        [
            'title' => 'Акции',
            'path' => '/discounts/',
            'sort' => 6,
            'auth' => false,
        ],
        [
            'title' => 'Кредит',
            'path' => '/credit/',
            'sort' => 4,
            'auth' => false,
        ],
        [
            'title' => 'Контакты',
            'path' => '/contacts/',
            'sort' => 2,
            'auth' => false,
        ]
    ];
    return $menu;
}
