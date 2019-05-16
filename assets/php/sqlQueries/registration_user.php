<?php
include '../DataBase.php';

$login = $_POST['reg_login'];

$pre_check_login = "SELECT Логин FROM users";
$result = mysqli_query($link,$pre_check_login);
$res_check_login = mysqli_fetch_all($result,MYSQLI_ASSOC);

$exists = (array_search($login, array_column($res_check_login, "Логин")) !== false);

if ($exists == 1) {
    echo '<script> alert("Такой логин уже существует!");document.location.href = "../../../registration.php";</script>';
}

$password = $_POST['reg_password'];
$surname = $_POST['reg_surname'];
$room = $_POST['reg_room'];

$pre_q = "insert into users values('$login','$password','$surname','$room')";

$q = mysqli_query($link, $pre_q);

if($q == true){
    echo '<script> alert("Регистрация прошла успешно!");document.location.href = "../../../index.php";</script>';
    
} else {
    echo '<script> alert("Ошибка регистрации! Повторите попытку снова!");document.location.href = "../../../registration.php";</script>';
}





