<?php

require __DIR__ . '/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

$discord = new Discord([
    'token' => TOKEN,
    'intents' => Intents::getDefaultIntents()
//      | Intents::MESSAGE_CONTENT, // Note: MESSAGE_CONTENT is privileged, see https://dis.gd/mcfaq
]);

$discord->on('ready', function (Discord $discord){
    echo "Bot is ready!", PHP_EOL;
    $channel = $discord->getChannel(CHANNEL_ID);

    // Envia uma mensagem para o canal.
    $channel->sendMessage('Mensagem sob demanda');
});