--TEST--
Bootstrap should return a Container with application
resources.

--FILE--
<?php
print get_class(require 'bootstrap.php');
--EXPECT--
Respect\Config\Container