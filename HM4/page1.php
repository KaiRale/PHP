<?php
$post = $_POST;
var_dump($post);
$email = $post['email'];
$password = $post['password'];
$name = $post['name'];
$birthdate = $post['birthdate'];
$gender = $post['gender'];
$country = $post['country'];

echo "email: $email<br>";
echo "password: $password<br>";
echo "name: $name<br>";
echo "birthdate: $birthdate<br>";
echo "gender: $gender<br>";
echo "country: $country";