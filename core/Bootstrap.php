<?php

namespace core;

class Bootstrap
{
    public static function run()
    {
        session_start();
        self::parseUrl();
    }

    //分析url生成控制器的方法常量
    public static function parseUrl()
    {
        if(isset($_GET["s"])){
            //分析s 生产控制器方法
            $info = explode("/",$_GET["s"]);
            $class = "\web\controller\\".ucfirst($info[0]);
            $action = $info[1];
        }else{
            //使用默认
            $class = "\web\controller\Index";
            $action = "show";
        }
        echo (new $class) -> $action();
    }
}