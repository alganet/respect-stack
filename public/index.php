<?php
  
// Initialize Response Sandbox
$response = call_user_func(
    // When app is retrieved
    function ($app) {
  
        // Configuration Fallbacks
          
  
        return $app;
    }, 
      
    // Retrieve app from bootstrap
    include realpath(__DIR__ . '/../bootstrap.php')
  
)->router->run(); // Retrieve router from app and run it!
  
print $response;  // Print the response sandbox
  
// Return false when no route is match.
// This is required to make ".html", ".json" and so on
// routes work on the PHP 5.4 built in local server (php -S)
return $response ?: false;