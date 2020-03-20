<?php

    /**
     *  websocket 服务器端代码
     */

    $server = new Swoole\WebSocket\Server("0.0.0.0", 9501);
    echo '<pre>';print_r($server);echo '</pre>';


    //有客户端连接服务器
    $server->on('open', function (Swoole\WebSocket\Server $server, $request) {
        echo "有人来了 编号： fd{$request->fd}\n";
    });

    //客户端向服务器发送数据
    $server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
        echo "客户端发来的数据： {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        $server->push($frame->fd, "你好 你好 我是服务器");
    });

    //客户端断开连接
    $server->on('close', function ($ser, $fd) {
        echo "客户端标号 {$fd} 走了\n";
    });

    $server->start();