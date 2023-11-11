<?php

require __DIR__ . '/vendor/autoload.php';

use Discord\Bot\connect\Connect;

$result = Connect::getInstance()->query("select * from personal_access_tokens");

dd($result->fetchAll(PDO::FETCH_ASSOC)[0]);