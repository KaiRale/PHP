<?php
//Дано два текста. Определите степень совпадения текстов (разработать алгоритм определения соответствия по 5 балльной шкале).

$string1='this will be the first text we will compare';
$string3='this will be the first text we will compare';
$string2='and this is our second text for comparison, well, let\'s see what happens';

$similarity=function ($str1,$str2){
    similar_text($str1,$str2,$perc);
    $perc=number_format($perc,1);
    $sim=classGrad($perc);
    echo "Степень сходства по 5-ти бальной шкале: $sim ";
    return ;
};

function classGrad($num){
    $class=0;
    if ($num<=0){
        return $class=0;
    }
    elseif ($num<=20){
        return $class=1;
    }
    elseif ($num<=40){
        return $class=2;
    }
    elseif ($num<=60){
        return $class=3;
    }
    elseif ($num<=80){
        return $class=4;
    }
    else {
        return $class=5;
    }
};

$simil=$similarity($string1,$string2);



