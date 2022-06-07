<?php

require_once __DIR__ . '/vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();

$messages = ['first', 'second', 'third', 'fourth'];

foreach ($messages as $messageStr) {
    $msg = new \PhpAmqpLib\Message\AMQPMessage($messageStr);

    $channel->basic_publish($msg, '', 'queue-1');
}

$channel->close();

$connection->close();

echo 'Four messages published';
