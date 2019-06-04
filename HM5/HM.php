<?php
//Удаление каталога. Написать рекурсивную функцию удаления непустого каталога
//написать функцию, которая будет удалять каталог и все его содержимое
//Осуществить рекурсивный вызов в подкаталогах
//Дано: path - путь к каталогу (каталог должен быти с подкаталогами и файлами)

function delete_func($path) {

    var_dump(getcwd());
    if (is_file($path)){
        return unlink($path);
    }
    if (is_dir($path)) {
        $arr=scandir($path);
        array_splice($arr,0,2);
            foreach ($arr as $value) {
                delete_func($path.'/'.$value);
            }
        return rmdir($path);
    }
}

//delete_func('dir_for_die');

//Сокращатель ссылок (используем функции) пользователь вводит в форму ссылку (используйте input type="url") вы получаете
// ее валидируете и обрабатываете: проверка на пустоту, filter_var - FILTER_VALIDATE_URL trim,
//если все хорошо: проверяете присутствует ли в файле ссылка, которую вводил пользователь, если есть,
// то получаете короткую ссылку и выводите на экран если нет, создаете хеш определенной длины (алгоритм
// придумать самостоятельно) если созданный хеш уже есть в файле, то создаете новый до тех пор,
// пока хеш не станет уникальным записать хеш в файл
//информация будет храниться в файле следующим образом: длинная ссылка:короткая ссылка
//Дополнительно: длинная ссылка:короткая ссылка:время, когда ссылка устареет При таком варианте,
// если время жизни закончилось, то нужно проверять его и, если нужно, перегенерировать ссылку

$post=$_POST;
var_dump($post);
$url=$post['for_url'];

function valid_url($url,$filename){
    $arr = file($filename, FILE_IGNORE_NEW_LINES  |
        FILE_SKIP_EMPTY_LINES);
    var_dump($arr);

    if (!$url){
        echo "URL не может быть пустой строкой<br>";
        return;
    }
    if (!filter_var(trim($url),FILTER_VALIDATE_URL)){
        echo "неверно заданный URL<br>";
        return;
    }

    $res=search($url,$arr,$filename);
    return;
}


//получить данные из файла
$arr = file('file_with_url.txt', FILE_IGNORE_NEW_LINES  |
    FILE_SKIP_EMPTY_LINES);
var_dump($arr);


valid_url($url,'file_with_url.txt');

//функция поиска по данным нужного URL
function search($url,&$array,$filename){
    $pos=null;
    foreach ($array as $value){
        $pos=strpos($value,$url);
        if ($pos!==false){
            var_dump(end(explode(' : ',$value)));
            return ;
        }
    }
    if ($pos!==1){
        echo 'попытка создать ссылку';
        $newurl=encryption_url_v1($url,$array);
        write_url($filename,$newurl);
        echo 'Создана новая ссылка';
        return;
    }
}

function encryption_url_v1($data,$arr){
    $pos=null;
    $data = ':'.$data . '/' . md5($data) . date('U') . ' : ' . $data;
    foreach ($arr as $value){
        $pos=strpos($value,$data);
        if ($pos!==false){
            encryption_url_v1($data,$arr);
        }
        return $data;
    }
}

//функция для внесения ссылки в файл
function write_url($filename,$data){
    $fp=fopen($filename,'a');
    fwrite($fp,$data);
    fclose($fp);
}

foreach ($arr as $key=>&$value){
    $arr[$key]=encryption_url($value);
}

//закодировать то что в файле
function encryption_url($data){
    $data=':'.$data.'/'.md5($data).date('U').' : '.$data;
    return $data;
}

//изначально в файле лежало несколько ссылок, поэтому нужны эти манипуляции с перезаписью
//функция для перезапси данных в файле
function perezapis($filename,$array){
    $fp=fopen($filename, 'w');
    foreach ($array as $value){
        fwrite($fp,$value. PHP_EOL);
    }
    fclose($fp);
}

//перезаписала в нужном формате
//perezapis('file_with_url.txt',$arr);




