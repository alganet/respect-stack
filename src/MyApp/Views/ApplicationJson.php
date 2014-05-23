<?php
  
namespace MyApp\Views;
  
class ApplicationJson
{
    public function __invoke($envelope)
    {
        header('Content-Type: application/json');
        return json_Encode($envelope);
    }
}