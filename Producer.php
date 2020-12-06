<?php
require 'vendor/autoload.php';

if(sizeof($argv) != 2 || ! isset($argv[1])) {
	die('php producer.php "message string...');
}

$message = $argv[1];
if(strpos($message, ':') === false) {
	die('message string format : "key_namne : message body"');
}
list($key, $body) = array_map('trim', explode(':', $message, 2));

$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('127.0.0.1:9092');
$config->setBrokerVersion('1.0.0');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);

$producer = new \Kafka\Producer(function() {
	global $key, $body;
        return [
            [
                'topic' => 'test',
                'key' => $key,
                'value' => $body,
            ],
        ];
    }
);

$producer->success(function($result) {
    var_dump($result);
});
$producer->error(function($errorCode) {
    var_dump($errorCode);
});
$producer->send(true);
