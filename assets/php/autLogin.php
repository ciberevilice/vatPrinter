<?php
session_start();
include 'DataBase.php';

if(isset($_POST['login'])){
    
    $login = $_POST['login'];
    
    $_SESSION['username'] = $login;
    $_SESSION['connect'] = true;
            
    $password = $_POST['password'];
    
    $q = mysqli_query($link,"select * from users where Логин='$login'");
    
    $result = mysqli_fetch_array($q);
    
    if($password === $result['password']) {
        header("Location: ../../main.php");
    } else {
        echo '<script> alert("Неправильный логин/пароль! Повторите попытку снова!");document.location.href = "../../index.php";</script>';
    }
}



