<?php

require __DIR__ . '/vendor/autoload.php';

use Discord\Bot\connect\Connect;

$result = Connect::getInstance()->query("select * from users");

dd($result->fetchAll(PDO::FETCH_ASSOC)[0]);