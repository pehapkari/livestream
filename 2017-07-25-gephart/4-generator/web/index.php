<?php

use Gephart\Framework\Kernel;

include_once __DIR__ . "/../vendor/autoload.php";

$kernel = new Kernel();

$kernel->registerServices([
    \Admin\EventListener\MenuListener::class,
    \Admin\EventListener\UserListener::class
]);

$kernel->run();