<?php
header('Access-Control-Allow-Origin: *');

require __DIR__.'/../vendor/autoload.php';

use RintoExandi\AtomicTime\Application;

$app = new Application();

echo $app->run();
