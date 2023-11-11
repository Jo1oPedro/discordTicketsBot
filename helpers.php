<?php

function env(string $indice)
{
    require __DIR__ . '/.env';
    return ${$indice};
}

function dd(...$arguments) {
    foreach($arguments as $argument) {
        var_dump($argument);
    }
    die();
}