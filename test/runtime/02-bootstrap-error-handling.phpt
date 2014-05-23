--TEST--
Bootstrap should fail if config file is not present
for the environment.

Application loads config files by the environment name
set by the ENVIRONMENT env var. Config file loaded is
config/runtime.ENVIRONMENT.ini. When not available, 
application will load runtime.dev.ini.

--FILE--
<?php
putenv('ENVIRONMENT=invalid');
require 'bootstrap.php';
--EXPECT--
Unexpected Error.Invalid Configuration.