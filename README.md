# telegram-bot-message-extension 
# allows you to create a message queue, send telegram messages that will expire and disappear after some time.

## Install the latest version with
```
$ composer require valentino/telegram-bot-message-extension
```
## Basic Usage

```php
<?php

use TelegramBotMessageExtension\Message;

$id = 0; // telegram channel id
$token = ''; // telegram bot token 

// create a message object
$message = new Message($token, $id);

//send single text message
$singleMessage = $message->sendSingleMessage("<b>Hi!</b>\n<i>There</i>\n", "HTML");

//send sticker
$sticker = $message->sendSticker('CAACAgIAAxkBAAETkGNiblYnE7xLE5GJ1kABRAaf3WTd4QACrxQAAs7y2UmyHBuHGFJROCQE');

//send a queue. parameter must be an array of arrays, that describes each message. [[],[],[]]
$queue = $message->sendMessagesQueue([
    [
        'method' => 'sendMessage',
        'delay'  => 2000000,
        'param' => [
            'text' => '<i>Hello!</i>',
            'parse_mode' => 'HTML'
        ]
    ],[        
        'method' => 'sendSticker',
        'delay'  => 2000000,
        'param' => [
            'sticker' => 'CAACAgIAAxkBAAETkGNiblYnE7xLE5GJ1kABRAaf3WTd4QACrxQAAs7y2UmyHBuHGFJROCQE'
        ]
    ]
]);
```
