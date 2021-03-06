<?php


class InfoController
{
    public function rulesAction(){
        echo "Генерация страницы с правилами покупки картин";
        $content='rules.php';
        $template='template.php';
        $data=[
            'title'=>'Правила'
        ];
        //вывели страничку $page
        echo $this->renderPage($content,$template,$data);
}

    public function contactsAction(){
         echo "Генерация страницы с контактами";
}

    public function renderPage($content,$template,$data=[]){
        extract($data);
        //преобразует массив к виду переменна($ключ = "значение") $title='Главная';
        ob_start();
        include_once __DIR__.'/../Views/'.$template;
        //перетащили считай все содержимое template.php
        // и весь этот треш гладется строкой в переменную $page
        $page=ob_get_contents();
        ob_end_clean();
        return $page;
    }
}