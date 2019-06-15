<?php


class Router
{

    public static function run(){
        //      имя_контроллера/имя_метода/параметры
        //если пришел просто /, нечего будет разбивать и нужны значения по умолчанию
        $controller='Index';
        $action='index';
        $params=null;
        $routes=explode('/',$_SERVER['REQUEST_URI']);
        //имя контроллера
        if (!empty($routes[1])){
            $controller=$routes[1];
        }
        //имя метода
        if (!empty($routes[2])){
            $action=$routes[2];
        }
        //параметры
        if (!empty($routes[3])){
            $params=$routes[3];
        }

        $controller=ucfirst(strtolower($controller)).'Controller';
        $action=strtolower($action).'Action';

        if (!class_exists($controller)){
            echo 'Класс не найден';
            return;
        }
        if(!method_exists($controller,$action)){
            echo 'Метод не найден';
            return;
        }
        $controller=new $controller();
        $controller->$action($params);


    }
}