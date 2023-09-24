<?php

function deleteSection(array $menu, bool $isAuthorized): array
{
    $data = $menu;
    foreach ($data as $key => $item) {
        if (($item['auth'] == true) && ($isAuthorized == false)) {
            unset($data[$key]);
        }
    }
    return $data;
}
