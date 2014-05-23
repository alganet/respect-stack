<?php

namespace MyApp\Resources;
  
use Respect\Rest\Routable;
  
class Index implements Routable
{
    public function get($path)
    {
        return ['index' => "/".implode("/", $path)];
    }
}