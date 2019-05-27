<?php
$goods = [
    [
        'id'=>1,
        'title'=>'Piano',
        'price'=>2345
    ],
    [
        'id'=>2,
        'title'=>'Guitar',
        'price'=>1753
    ],
    [
        'id'=>3,
        'title'=>'Drum',
        'price'=>1224
    ],
];
$get = $_GET;
$id = $get['id']; // получаем id товара
$id=2;

// TODO: получить товар из массива $goods по id, сохранить в переменную $good
$good=$goods[array_search($id,array_column($goods,'id'))];



$isAuth = true; // флаг - авторизован пользователь или нет
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<section>
    <!--    TODO: вывести информацию о товаре $good-->
    <?php foreach ($good as $key=>$value){
        echo "<p>$key = $value</p>";
    }?>


</section>

<!--    TODO: если пользователь авторизован $isAuth - отобразить блок для добавления комментариев, в противном случае, сообщить, что ему нужно авторизоваться-->
    <?php   if ($isAuth):
                echo " <textarea> </textarea>";
            else: echo "<p>Авторизуйтесь, чтобы оставить комментарий</p>";
            endif;
    ?>

</body>
</html>