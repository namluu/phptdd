<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->bootEnv(dirname(__DIR__).'/.env');
}

$debug = $_ENV['APP_DEBUG'] ?? $_SERVER['APP_DEBUG'] ?? false;

if ($debug) {
    umask(0000);
}
