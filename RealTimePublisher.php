<?php

require_once __DIR__ . '/vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();

$message = [
    'to' => 'to@teste.com',
    'from' => 'from@teste.com',
    'subject' => 'teste message json'
];

$msg = new \PhpAmqpLib\Message\AMQPMessage(json_encode($message));

$channel->basic_publish($msg, '', 'queue-1');

$channel->close();

$connection->close();

echo 'Json Publisher';
