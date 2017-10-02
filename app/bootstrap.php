<?php

use App\FileLoader\YamlFileLoader;
use Pimple\Container;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;

require_once __DIR__ . '/../vendor/autoload.php';

$container = require_once __DIR__ . '/container.php';

// Load configuration
$locator = new FileLocator([__DIR__ . '/config']);
$resolver = new LoaderResolver([new YamlFileLoader($locator)]);
$loader = new DelegatingLoader($resolver);

$container['parameters'] = $loader->load(__DIR__ . '/config/parameters.yml');
