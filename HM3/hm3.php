<?php

//1.Дана строка, содержащая полное имя файла (например, 'C:\OpenServer\testsite\www\someFile.txt').
//Написать функцию, которая сможет выделить из подобной строки имя файла без расширения.

$url='C:\OpenServer\testsite\www\someFile.txt';

function searchFileName($str) {
    preg_match('![\\w]+[.]!', $str, $matches);
    $match=rtrim($matches[0], ".");
    return $match;
}
var_dump(searchFileName($url));

//2.Написать функцию - конвертер строки. Возможности (в зависимости от второго аргумента - флаг, который указывает,
//какую именно операцию следует выполнить): 1) перевод всех символов в верхний регистр,2) перевод всех символов
//в нижний регистр,3) перевод всех символов в нижний регистр и первых символов слов в верхний регистр.`
function convert($str,$flag){
//такая проверка почему то не работает
   /* if (($flag!=1)||($flag!=2)||($flag!=3)){
        echo 'Введите коорекный номер операции';
        return;
        }*/

    if ($flag==1){
        return strtoupper($str);
    }
    elseif ($flag==2){
        return strtolower($str);
    }
    elseif ($flag==3) {
        return ucwords(strtolower($str));
    }
    else {
        echo 'Введите коорекный номер операции';
    }
}

$string='Some string for test';
var_dump(convert($string,2));

//3.Создать функцию по преобразованию нотаций: строка вида 'this_is_string'
// преобразуется в 'thisIsString' (CamelCase-нотация)

$strForCamel='this_is_string_for_test';

function CamelCase($str){

    $str=str_replace(" ","",ucwords(str_replace("_"," ",$str)));
    $str=lcfirst($str);
    return $str;
}

var_dump(CamelCase($strForCamel));

//Сгенерировать 5 массивов из случайных чисел. Вывести массивы и сумму их элементов на экран.
//найти массив с максимальной суммой суммой элементов. Вывести его на экран еще раз.
//Генерация массива и подсчет суммы-разные функции
function arr_generate($n){
    $arr=[];
    for ($i=0; $i<=$n; $i++) {
        array_push($arr, rand(0, 100));
    }
    return $arr;
}

function arr_sum($arr){
    var_dump(array_sum($arr));
}

function big_arr($n,$func){
    $bigArr=[];
    for ($i=0; $i<=$n; $i++) {
        $num=rand(2,5);
        array_push($bigArr,$func($num));
        $sum=array_sum($bigArr[$i]);
        $bigArr[$i]['sum']=$sum;
    }
    return $bigArr;
}

function cmp($a,$b){
    if($a['sum']==$b['sum']){
        return 0;
    }
    return ($a['sum']<$b['sum'])?-1:1;
}

function max_arr($arr){
    uasort($arr,'cmp');
    return array_pop($arr);
}

echo '5 рандомных массивов и сумма их элементов:';
$createArr=big_arr(4,'arr_generate');
var_dump($createArr);
echo "Массив с максимальной суммой элементов:";
var_dump(max_arr($createArr));


