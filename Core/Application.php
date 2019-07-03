<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 10/06/2019
 * Time: 17:36
 */

class Application
{
    /**
     * @param $config
     */

    public static function run($config){
        $param = explode('/',$config['route']);
        $controller = ucfirst($param[0])."Controller";
        $action = $param[1]."Action";

        require ("App/Controller/" .$controller.'.php');

        $controller = new $controller($config['entityManager']);
        if (method_exists($controller, $action)){
            $controller->init();
            $controller->$action();
        }
        else{
            echo 'ERROR 404';
        }

    }
}