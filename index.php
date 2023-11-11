<?php

require __DIR__ . '/vendor/autoload.php';

use Discord\Bot\connect\Connect;
use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$result = Connect::getInstance()->query("select * from personal_access_tokens");

dd($result->fetchAll(PDO::FETCH_ASSOC)[0]);
$discord = new Discord([
    'token' => TOKEN,
    'intents' => Intents::getDefaultIntents()
//      | Intents::MESSAGE_CONTENT, // Note: MESSAGE_CONTENT is privileged, see https://dis.gd/mcfaq
]);

$discord->on('ready', function (Discord $discord) use ($result) {
    echo "Bot is ready!", PHP_EOL;

    $channel = $discord->getChannel(CHANNEL_ID);
    // Envia uma mensagem para o canal.
    $channel->sendMessage($result->fetchAll(PDO::FETCH_ASSOC)[0]['id']);
});