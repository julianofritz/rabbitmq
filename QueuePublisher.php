<?php

require_once __DIR__ . '/vendor/autoload.php';

$messageStr = 'message1';

$connection = new \PhpAmqpLib\Connection\AMQPStreamConnection('localhost', 5672, 'guest', 'guest');

$channel = $connection->channel();

$msg = new \PhpAmqpLib\Message\AMQPMessage($messageStr);

$channel->basic_publish($msg, '', 'queue-1');

$channel->close();

$connection->close();

echo $messageStr;
