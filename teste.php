<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Intents;
use Discord\WebSockets\Event;

include __DIR__ . "/.env";

$discord = new Discord([
    'token' => env('token'),
    'intents' => Intents::getDefaultIntents()
//      | Intents::MESSAGE_CONTENT, // Note: MESSAGE_CONTENT is privileged, see https://dis.gd/mcfaq
]);

$discord->on('ready', function (Discord $discord){
    echo "Bot is ready!", PHP_EOL;

    $discord->loop->addPeriodicTimer(5, function () use ($discord) {
        // Obtém um canal específico pelo ID.
        $channel = $discord->getChannel(env('channelId'));

        // Envia uma mensagem para o canal.
        $channel->sendMessage('Mensagem a cada 5 segundos');
    });

    // Listen for messages.
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        if($message->author->bot) {
           return;
        }
        $channel = $message->channel;
        $channel->sendMessage("Testando resposta no bot: {$message->author->username}");
        //$message->reply('Testando resposta no bot');

        //echo "{$message->author->username}: {$message->content}", PHP_EOL;
        // Note: MESSAGE_CONTENT intent must be enabled to get the content if the bot is not mentioned/DMed.
    });
});

$discord->run();