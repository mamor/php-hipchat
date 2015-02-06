## php-hipchat

A simple library for HipChat API

### Install

    $ composer require mamor/php-hipchat

### Example for "Send room notification" API

https://www.hipchat.com/docs/apiv2/method/send_room_notification

    <?php

    require_once './vendor/autoload.php';

    $hipChat = new Mamor\HipChat('YOUR_API_TOKEN');
    $hipChat->post('/v2/room/{id_or_name}/notification', ['message' => 'Hello!']);

    var_dump($hipChat->curl()->response);

### Methods

1. get($uri, $data = [])
1. post($uri, $data = [])
1. put($uri, $data = [])
1. patch($uri, $data = [])
1. delete($uri, $data = [])
1. head($uri, $data = [])
1. options($uri, $data = [])
1. curl() ... return Object of https://github.com/php-curl-class/php-curl-class

### License

Copyright 2015, Mamoru Otsuka. Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
