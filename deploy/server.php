<?php
$server = new swoole_websocket_server('127.0.0.1', 9502);
$server->set(array(
    'worker_num' => 1,    //worker process num
    'daemonize' => 1,
));

$server->on('message', function (swoole_websocket_server $server, $frame) {
    $server->push($frame->fd, "this is server");
});

$server->start();