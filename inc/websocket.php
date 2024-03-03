<?php

use Workerman\Worker;

require_once 'workerman/vendor/autoload.php';

$ws_worker        = new Worker( 'websocket://34.67.193.156:443' );
$ws_worker->count = 4;

$ws_worker->onConnect = function ( $connection ) {
	echo 'Connection successfull';
};

$ws_worker->onMessage = function ( $connection, $data ) use ( $ws_worker ) {
	foreach ( $ws_worker->connections as $client_connection ) {
		$client_connection->send( '123' );
	}
};

$ws_worker->onClose = function ( $connection ) {
	echo 'Connection closed';
};
