<?php

require_once  '../vendor/autoload.php';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();

$message = 'to mobile';

$msg = new \PhpAmqpLib\Message\AMQPMessage($message);

$channel->basic_publish($msg, 'fanout-exchange');

$channel->close();

$connection->close();

echo 'Message published to fanout exchange';
