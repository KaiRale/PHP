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

