<?php

namespace Tests\Client;

use Tests\TestCase;
use swoole_websocket_server;
use PhpRush\WebSocket\Client\WebSocket;

class WebSocketTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testConnect()
    {
        $cli = new WebSocket('127.0.0.1', 9502);
        $res = $cli->connect();

        $this->assertTrue($res);

        return $cli;
    }

    /**
     * @depends testConnect
     */
    public function testSend(WebSocket $cli)
    {
        $res = $cli->send("client");

        $this->assertNotFalse($res);

        $msg = $cli->recv();
        $this->assertEquals($msg, "this is server");

        return $cli;
    }

    /**
     * @depends testConnect
     */
    public function testDisconnect(WebSocket $cli)
    {
        $res = $cli->disconnect();

        $this->assertTrue($res);
    }
}
