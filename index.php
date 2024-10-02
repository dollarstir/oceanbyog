<?php
require_once('core/autoload.php');
$router = new Router(require __DIR__ . '/core/routes.php');
$router->launch();