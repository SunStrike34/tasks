<?php

function includeTemplate(string $templatePath, array $data = []): void
{
    extract($data);

    $templateDir = APP_DIR . DIRECTORY_SEPARATOR . 'templates';

    include $templateDir . DIRECTORY_SEPARATOR . ltrim($templatePath, '/');
}
