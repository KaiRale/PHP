<?php
require_once __DIR__.'/../src/Controllers/IndexController.php';
require_once __DIR__.'/../src/Controllers/InfoController.php';
require_once  __DIR__.'/../src/Core/Router.php';
$uri=$_SERVER['REQUEST_URI'];
//var_dump($uri);
Router::run();

//принцип работы роутера
/*if ($uri=='/'){
    $controller=new IndexController();
    $controller->indexAction();
}elseif ($uri=="/info/rules"){
    $controller=new InfoController();
    $controller->rulesAction();
} *///и т.д.

//правило отправления запросов на сервер
//      /имя_контроллера/имя_метода/данные

//Главная (картины) - запрос:
//Страница с описанием одной картины
//Статьи                            запрос: /article/show
//Страница с одной статьей -        запрос: /article/show/2, где 2 - id статьи
//Правила покупки и заказа картин   запрос: /info/rules
//Контакты                          запрос: /info/contacts