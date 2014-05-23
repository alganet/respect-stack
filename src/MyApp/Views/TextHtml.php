<?php
  
namespace MyApp\Views;
  
class TextHtml
{
    protected $twig;
  
    public function __construct($twig, $appBase)
    {
        $this->twig = $twig;
        $this->appBase = $appBase;
    }
  
    public function __invoke($envelope)
    {
        if (!$envelope && !is_array($envelope)) {
            return $envelope;
        }
  
        $identifier = key($envelope);
        $envelope['base'] = $this->appBase;
  
        return $this->twig->render(
            "$identifier.twig", 
            $envelope
        );
    }
}