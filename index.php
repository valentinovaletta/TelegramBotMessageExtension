<?php

require __DIR__ . '/vendor/autoload.php';

$log = new Monolog\Logger('name');
$name = new TestLib\TestClass\User('Ivan4');


$log->pushHandler(new Monolog\Handler\StreamHandler('app.log', Monolog\Logger::WARNING));
$log->Warning( $name->getName() );