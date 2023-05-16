<?php

require_once('src/TelegramBotMessageExtension/Message.php');

use TelegramBotMessageExtension\Message;

$id = 0; // telegram channel id
$token = ''; // telegram bot token 

$message = new Message($token, $id);

//send single text message
$singleMesage = $message->sendSingleMessage("<b>Hi!</b>\n<i>There</i>\n", "HTML");

//send sticker
$sticker = $message->sendSticker('CAACAgIAAxkBAAETkGNiblYnE7xLE5GJ1kABRAaf3WTd4QACrxQAAs7y2UmyHBuHGFJROCQE');

//send three messages that replace each other
//parameter must be an array of arrays, that describes each message. [[],[],[]]
$queue = $message->sendMessagesQueue([
    [
        'method' => 'sendMessage',
        'delay'  => 1000000,
        'param' => [
            'text' => '<i>Hello!</i>',
            'parse_mode' => 'HTML'
        ]
    ],
    [        
        'method' => 'sendSticker',
        'delay'  => 1000000,
        'param' => [
            'sticker' => 'CAACAgIAAxkBAAETkGNiblYnE7xLE5GJ1kABRAaf3WTd4QACrxQAAs7y2UmyHBuHGFJROCQE'
        ]
    ],
    [
        'method' => 'sendMessage',
        'delay'  => 1000000,
        'param' => [
            'text' => '<i>End!</i>',
            'parse_mode' => 'HTML'
        ]
    ]
]);