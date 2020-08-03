<?php

// Large operations:
set_time_limit(0);
date_default_timezone_set('America/Sao_Paulo');
// Autoload
defined('PREFIX_PATH') || define('PREFIX_PATH', ((php_sapi_name() == "cli") ? "" : "../"));
require_once PREFIX_PATH."vendor/autoload.php";
define('NP_PATH', realpath(__DIR__.'/../'));
use Slim\App;
use Dotenv\Dotenv;
use NPCore\Hooks\Container;
use NPCore\AppCapsule;

// bootstrap ENV
(new Dotenv(realpath(__DIR__.'/../')))->load();

$container = new Container();
$app = new App($container);
AppCapsule::setAppInstance($app);

$router = $app;

require_once PREFIX_PATH."routes/web.php";
require_once PREFIX_PATH."routes/api.php";
