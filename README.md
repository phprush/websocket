### 介绍
**一个简单的php websocket客户端**

### 使用说明
* _借鉴 `matyhtf/framework`(https://github.com/matyhtf/framework) 的 `websocket client` 实现 _
* _需要安装 `php swoole` (https://wiki.swoole.com/wiki/index/prid-1)_
* _需要安装 `phpunit` (https://phpunit.de/manual/6.5/zh_cn/installation.html)_

### 示例

```
<?php
use PhpRush\WebSocket\Client\WebSocket;
  
$cli = new WebSocket('127.0.0.1', 9501);
$cli->connect();
$cli->send("xxx0011xxx");
$cli->disconnect();
```

### API
* `connect` 连接 socket server
* `send` 向 socket server发送消息
* `recv` 接收 socket server返回的消息
* `disconnect` 断开 socket server


### 测试

###### 第一步，启动并进入docker环境(若未使用docker直接进去第二步)
```
  docker-compose -f docker-compose.dev.yml up -d --build
  docker-compose -f docker-compose.dev.yml exec web sh
```

###### 第一步，引入相关依赖
```
  composer update
```

###### 第二步，启动 socket server
```
  php deploy/server.php
```

###### 第二步，执行PHPunit
```
  phpunit
```

###### 第四步，停止 socket server
```
  ps aux|grep server|awk '{print $1}'|xargs kill -9
```