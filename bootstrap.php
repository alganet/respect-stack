<?php
  
/**
 * Bootstrap File
 *
 * @see etc/start.dev.ini
 * @see public/index.php
 */
  
use Respect\Config\Container;  // Configuration/DI Container
  
require 'vendor/autoload.php'; // Autoload classes via Composer
  
// All application boostrapped files run on main root app folder
chdir(__DIR__); 
  
// Initialize Application Sandbox
return call_user_func(
  
    // When app is retrieved
    function ($app) {
  
        // Configurations
        date_default_timezone_set($app->timezone);
        error_reporting($app->errors);
  
        // Global exports
        foreach ($app->exports as $exportName => $exportValue) {
            $GLOBALS[$exportName] = $exportValue;
        }
  
        return $app;
    },
  
    // In order to retrieve an app
    call_user_func(function () {
        try {
            // Load a container
            // Tries to find environment via ENV vars, falls back to 'dev'
            // Loads the config/start.dev.ini file
            return new Container(
                'etc/bootstrap.' . 
                filter_var(getenv('ENVIRONMENT') ?: 'dev', FILTER_SANITIZE_STRING) 
                . '.ini'
            );
        // No app configuration found. Can't even log it properly.
        } catch (InvalidArgumentException $e) {
            header('HTTP/1.1 500 Server Error');
            error_log("Invalid Configuration.");
            die('Unexpected Error.');
        }
    })
)->application; // retrieve the app from sandbox and return it