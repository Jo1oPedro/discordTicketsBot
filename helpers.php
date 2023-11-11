<?php

function dd(...$arguments) {
    foreach($arguments as $argument) {
        var_dump($argument);
    }
    die(1);
}