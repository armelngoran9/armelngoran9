<?php

namespace AppGestion\controller;

class Controller{

    protected $viewPath;
    protected $template;
    protected $viewFolder;


    public function __construct($viewFolder = "")
    {
        $this->setViewPath($viewFolder);  
        $this->template = "templateHtml";
    }

    protected function render(string $view, array $variables = [])
    {       
        extract($variables);
        \ob_start();
        require $this->viewPath .  $view . ".php";
        $content = \ob_get_clean();
        require ROOT . "/view/" . "templates/" . $this->template . ".php";
    }

    protected function setViewPath(string $viewFolder){
        $this->viewPath = str_replace("\\", "/", ROOT . "/view/" . $viewFolder . "/");
    }

    protected function notFound(){
        echo "NOT FOUND";
    }
}