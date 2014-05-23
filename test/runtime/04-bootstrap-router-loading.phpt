--TEST--
Bootstrap Application Container should have a proper
router;

--FILE--
<?php
$app = require 'bootstrap.php';
$router = $app->router;
print get_class($router);
--EXPECT--
Respect\Rest\Router