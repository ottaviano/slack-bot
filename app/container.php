<?php

use Pimple\Container;

$container = new Container;

$container['http.client'] = function() {
    return new GuzzleHttp\Client;
};

return $container;
