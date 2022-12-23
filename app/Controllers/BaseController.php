<?php 

namespace App\Controllers;

use Laminas\Diactoros\Response\HtmlResponse as ResponseHtmlResponse;
// use FilesystemLoader;
// use Environment
// o Usar la barra (\) delante para usar el scope global

class BaseController {

    protected $templateEngine;

    public function __construct() {
        
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->templateEngine = new \Twig\Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
    }

    public function renderHTML($FileNAme, $data = []){
        return new ResponseHtmlResponse($this->templateEngine->render($FileNAme, $data));
    }
}

