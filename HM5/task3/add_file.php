<?php
//Загрузка нескольких файлов на сервер (обязательно проверять на тип и размер)
$file=$_FILES;



//проверка на тип
function valid_type($type){
    if (strncmp($type, 'image', 5)) {
        echo 'Невозможно загрузить файл такого типа<br>';
        return;
    } else {
        return true;}
}

//проверка на размер
function valid_size($size){
    if ($size>900000) {
        echo 'Размер файла не должен привышать 900Кб<br>';
        return;
    } else {
        return true;}
}



function moving_file($arr){
    $name=null;
    $ext=null;
    $tmp_name=null;
    for ($i=0; $i<count($arr['picture']['name']);$i++){
        if (valid_type($arr['picture']['type'][$i])!==true || valid_size($arr['picture']['size'][$i])!==true){
            continue;
        }
        $tmp_name = $arr['picture']['tmp_name'][$i];
        $name=md5($arr['picture']['name'][$i]).date('U');
        $ext=pathinfo($arr['picture']['name'][$i],PATHINFO_EXTENSION);

        if (move_uploaded_file($tmp_name,"img/$name.$ext")){
            echo "Файл успешно загружен =)<br>";
        }
        else {
            echo "Что то пошло не так =(<br>";
        }
    }
}
moving_file($file);




