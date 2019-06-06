<?php
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
//var_dump($post);
$url=$post['for_url'];

const AUTH_ERROR='error';

//получить данные из файла
/*$arr = file('file_with_url.txt', FILE_IGNORE_NEW_LINES  |
    FILE_SKIP_EMPTY_LINES);
var_dump($arr);*/

function valid_url($url,$filename){
    $arr = file($filename, FILE_IGNORE_NEW_LINES  |
        FILE_SKIP_EMPTY_LINES);


    if (!$url){
        echo AUTH_ERROR;
        return AUTH_ERROR;
    }
    if (!filter_var(trim($url),FILTER_VALIDATE_URL)){
        echo AUTH_ERROR;
        return AUTH_ERROR;
    }

    $str=search($url,$arr,$filename);
    return $str;
}


valid_url($url,'file_with_url.txt');



//функция поиска по данным нужного URL + запись в файл сразу же
function search($url,&$array,$filename){
    $pos=null;
    $miniurl=null;
    foreach ($array as $value){
        $pos=strpos($value,$url);
        if ($pos!==false){
            $miniurl=end(explode(' : ',$value));
            echo "Значение из базы: $miniurl";
            return;
        }
    }
    if ($pos!==1){
        $miniurl=trim_url($url).gen_rand($array);
        $newurl=':'.$url.' : '.$miniurl;
        write_url($filename,$newurl);
        echo "Создана новая ссылка: $miniurl";
        return ;
    }
}

//генерация сокращалки
function gen_rand($arr){
    $h='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $rand=substr(str_shuffle($h),0,6);
    foreach ($arr as $value){
        $k=strrchr($value,'/');
        if($k==$h){
            return gen_rand($arr);
        }
    }
    return $rand;
}


//функция для внесения ссылки в файл
function write_url($filename,$data){
    $fp=fopen($filename,'a');
    fwrite($fp,$data);
    fclose($fp);
}

//функция для выделения основной ссылки
function trim_url($url){
    preg_match('!((http|https|ftp):\\/\\/)?([a-z0-9.]+)\\/!',$url,$match);
    return $match[0];
}


//изначально в файле лежало несколько ссылок, поэтому нужны эти манипуляции с перезаписью
//функция для перезапси данных в файле
/*function perezapis($filename,$array){
    $fp=fopen($filename, 'w');
    foreach ($array as $value){
        fwrite($fp,$value. PHP_EOL);
    }
    fclose($fp);
}*/

//перезаписала в нужном формате

/*foreach ($arr as $key=>$value) {
    $match=trim_url($value);
    $arr[$key]=':'.$value.' : '.$match.gen_rand($arr);
}*/


//perezapis('file_with_url.txt',$arr);




//это кусок удлиннятеля ссылок

/*function encryption_url_v1($data,$arr){
    $pos=null;
    $data = ':'.$data . '/' . md5($data) . date('U') . ' : ' . $data;
    foreach ($arr as $value){
        $pos=strpos($value,$data);
        if ($pos!==false){
            encryption_url_v1($data,$arr);
        }
        return $data;
    }
}*/


/*foreach ($arr as $key=>&$value){
    $arr[$key]=encryption_url($value);
}*/


//закодировать то что в файле
/*function encryption_url($data){
    $data=':'.$data.'/'.md5($data).date('U').' : '.$data;
    return $data;
}*/






