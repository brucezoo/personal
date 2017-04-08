<?php
// Use Composer autoloader
require 'vendor/autoload.php';

// Import Monolog namespaces
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
date_default_timezone_set('Asia/Shanghai');

// Setup Monolog logger
$log = new Logger('my-app-name');
$log->pushHandler(new StreamHandler('monolog.log', Logger::WARNING));

// Use logger
$log->warning('This is a warning!');
