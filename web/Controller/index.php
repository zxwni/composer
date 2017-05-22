<?php

namespace web\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use core\View;

class Index
{
    protected $view;
    public function __construct()
    {
        $this->view=new View();
    }

    public function show()
    {
        dd($_SESSION["phrase"]);
        return $this->view->make("index")->with("version",'1.0');
    }

    public function login()
    {
        $builder = new CaptchaBuilder;
        $builder->build($width = 100, $height = 30 );
        header('Content-type: image/jpeg');
        $_SESSION["phrase"] = $builder->getPhrase();
        $builder->output();
//        return $this->view->make("login");
    }
}