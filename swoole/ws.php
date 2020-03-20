<?php

/**
 *  websocket 服务器端 监听端口 9502
 */

    $port = 9502;
    echo "port is listsen on port ".$port ."\n\n";

    $server = new Swoole\Websocket\Server("0.0.0.0", $port);

    $server->on('open', function($server, $req) {
        echo "connection open: {$req->fd}\n";

        $data = [
            'errno' => 0,
            'msg'   => 'ok',
            'type'  => 's',
            'data'  => [
                'info'  => date("Y-m-d H:i:s")
            ]
        ];

        $server->push($req->fd,json_encode($data));



    });

    $server->on('message', function($server, $frame) {
        echo "received message: {$frame->data}\n";
        $data = [
            'errno' => 0,
            'msg'   => 'ok',
            'type'  => 'n',
            'data'  => [
                'msg'   => 'xxxxx'
            ]
        ];
        $server->push($frame->fd, json_encode($data));
    });

    $server->on('close', function($server, $fd) {
        echo "connection close: {$fd}\n";
    });

    $server->start();