<?php

function getDataUser() : array
{
    $data = [
        [
            'title' => 'ФИО',
            'value' => 'fullname',
            'sort' => 10,
        ],
        [
            'title' => 'Email',
            'value' => 'email',
            'sort' => 8,
        ],
        [
            'title' => 'Телефон',
            'value' => 'phone',
            'sort' => 6,
        ],
        [
            'title' => 'Активность',
            'value' => 'active',
            'sort' => 4,
        ],
        [
            'title' => 'Подписан на рассылку',
            'value' => 'mailing',
            'sort' => 2,
        ]
    ];
    return $data;
}
