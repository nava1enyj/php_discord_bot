<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;
use Discord\WebSockets\Intents;
use Discord\Parts\User\Member;


$discord = new Discord([
    'token' => 'OTY0Mzk4MTY2NzE3OTIzMzQ4.YlkDyA.o3oQrR7cYNPK-UI_Fp4QggBrrlk',
    'loadAllMembers' => true,
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS
]);

$discord->on('ready', function (Discord $discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
    $discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
        echo "{$message->author->username}: {$message->content}", PHP_EOL;
        if(strpos($message->content,'!') === false) return;
        $msg_molot = explode(' ', $message->content);
        if($msg_molot[0] === '!молотилка'){
            $message->reply('тоби пизда');
            $channelMolo = $discord->getChannel('954782396572655626');
            $channelTilka = $discord->getChannel('954782446254178364');

//            foreach ($discord->guilds as $guild) {
//                foreach ($guild->members as $member) {
//              $message->content= $member->id;
//              print_r($member->id);
//              }
//           }
//
            for ($i=0;$i<85;$i++){

                $channelMolo->moveMember($msg_molot[1])->done(function (){

                });
                $channelTilka->moveMember($msg_molot[1])->done(function (){

                });
            }




        }
        else{
            $message->reply('ты чмо');
        }


    });
});

$discord->run();
