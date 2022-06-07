<?php

require_once __DIR__ . '/vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();

$callbackFunction = function ($msg) {
    echo 'Messege received = ' . $msg->body . PHP_EOL;
};

$channel->basic_consume('queue-1', '', false, true, false, false, $callbackFunction);

while (true) {
    $channel->wait();
}

$channel->close();

$connection->close();
